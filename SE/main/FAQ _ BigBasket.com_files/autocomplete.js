/**
 * Created by anuranjit on 23/11/15.
 */
/**
 * default class mapping {
 *      input: "tt-input"
 *      hint: "tt-hint"
 *      menu: "tt-menu"
 *      dataset: "tt-dataset"
 *      suggestion: "tt-suggestion"
 *      empty : "tt-empty"
 *      open : "tt-open"
 *      cursor: "tt-cursor"
 *      highlight: "tt-highlight"
 * }
 * @param element an jquery element object
 * @param sourceType sourceType one of the two "remote" or "local"
 * @param displayProperties eg. ['a','b',''] properties in the dataSource(result)
 * @param suggestionProperties  eg. ['a','b',''] properties in the dataSource(result)
 * @param dataSource eg. [{'a':1,'b':2} or ''] for sourceType= local or for sourceType = remote{'url':'/get_area/' ,'type':'get/post', 'data':{}}
 * @param classMapping  for styling the following classes are default
 * @param template only an handelbar template
 * @param syncMatchString The key in the datasource to be used as the actual data if datasource is not defined it can be left blank
 */


function AutoComplete() {
    var dataSource;
    //var classMapping = {
    //    input: "tt-input",
    //    hint: "tt-hint",
    //    menu: "tt-menu",
    //    dataset: "tt-dataset",
    //    suggestion: "tt-suggestion",
    //    empty: "tt-empty",
    //    open: "uiv2_pincode_menu",
    //    cursor: "tt-cursor",
    //    highlight: "tt-highlight"
    //};
    this.cache = {};
    this.$timeOut = null;
    this.syncMatchString = null;
    this.initializeAutoComplete = function initializeAutoComplete(elementL, sourceTypeL, dataSourceL, syncMatchStringL, displayPropertiesL, suggestionPropertiesL, classMappingL, templateL,  callback) {
        if (this.isUndefined(elementL)) {
            throw new TypeError("The specified jquery object is undefined")
        }
        if (this.isUndefined(sourceTypeL)) {
            throw new TypeError("Source type should be one of the two remote or local and not undefined")
        }
        if (this.isUndefined(displayPropertiesL) && this.isUndefined(suggestionPropertiesL)) {
            throw new TypeError("One of the list of properties to display/suggest should be specified")
        }
        if (this.isUndefined(displayPropertiesL) && !this.isUndefined(suggestionPropertiesL)) {
            displayPropertiesL = suggestionPropertiesL;
        } else if (!this.isUndefined(displayPropertiesL) && this.isUndefined(suggestionPropertiesL)) {
            suggestionPropertiesL = displayPropertiesL
        }

        if (this.isUndefined(dataSourceL)) {
            throw new TypeError("Please specify a datasource for autoComplete")
        }
        this.$element = elementL;
        this.sourceType = sourceTypeL;
        this.displayProperties = displayPropertiesL;
        this.suggestionProperties = suggestionPropertiesL;
        this.dataSource = dataSourceL;
        this.classMapping = {
            input: "tt-input",
            hint: "tt-hint",
            menu: "uiv2_pincode_menu",
            dataset: "tt-dataset",
            suggestion: "tt-suggestion",
            empty: "tt-empty",
            open: "tt-open",
            cursor: "tt-cursor",
            highlight: "tt-highlight"
        };
        this.$template = templateL;
        this.syncMatchString = syncMatchStringL;
        var autoComplete = this;
        this.cache = {};
        events.on('remoteDataSourceChange', function (data) {
            autoComplete.dataSourceChange(data)
        }, this);
        this.callback = callback
    };


    this.isUndefined = function (property) {
        if(!property){
            return true;
        }
        return typeof property === "undefined";
    };

    /*
     Credits : Siddharth :D
     */
    this.substringMatcher = function (strs) {
        return function findMatches(q, callBack) {
            var matches, substrRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function (i, str) {
                if (substrRegex.test(str)) {
                    // the typeahead jQuery plugin expects suggestions to a
                    // JavaScript object, refer to typeahead docs for more info
                    matches.push({
                        value: str
                    });
                }
            });
            callBack(matches);
        };
    };

    this.getResults = function (dataResults) {
        if (dataResults instanceof Array) {
            return dataResults
        }
        return dataResults[this.syncMatchString]
    };

    this.getDataSource = function (query, syncResults, asyncResults) {
        var autoComplete = this;

        if (this.sourceType == "local") {
            var data = autoComplete.substringMatcher(this.getResults(dataSource));
            autoComplete.cache[query] = data ? typeof data != "undefined" : [];
            syncResults(data);
            return true;
        } else if (this.sourceType == "remote") {
            if (this.callback) {
                this.dataSource["data"] = this.callback(this.dataSource["data"]);
            }
            this.dataSource["data"]['term'] = query;
            this.getRemoteDataSource().done(function (response) {
                var results = autoComplete.getResultsFromJson(response);
                autoComplete.cache[autoComplete.getCacheKey(query)] = results;
                asyncResults(results);
                return true;
            })
        }
    };

    this.getResultsFromJson = function (data) {
        var keys = this.syncMatchString.split('.');
        for (var key in keys) {
            data = data[keys[key]]
        }
        return data
    };

    this.getRemoteDataSource = function () {
        return $.ajax({
            url: this.dataSource['url'],
            type: this.dataSource['type'],
            data: this.dataSource['data']
        })
    };

    this.dataSourceChange = function (data) {
        this.dataSource['data'] = $.extend(this.dataSource['data'], data.data);
        this.cache = {};
    };

    this.join = function (data, properties) {
        var displayArray = "";
        for (var val in properties) {
            if (data[properties[val]]) {
                displayArray += data[properties[val]] + ", ";
            }
        }
        displayArray = displayArray.trim();
        if (displayArray[displayArray.length - 1] == ",") {
            return displayArray.replace(/,$/, "");
        }
        return displayArray
    };


    this.render = function (min_length, limit) {
        var autoComplete = this;
        this.$element.typeahead({
            hint: true,
            highlight: true,
            minLength: min_length,
            classNames: autoComplete.classMapping
        }, {
            display: function (suggestion) {
                return autoComplete.join(suggestion, autoComplete.displayProperties).toString()
            },
            templates: {
                suggestion: function (data) {

                    if (typeof autoComplete.$template === "undefined"  ||  !autoComplete.$template) {
                        return '<li>' + autoComplete.join(data, autoComplete.suggestionProperties) + '</li>'
                    }
                    return Handlebars.compile(autoComplete.$template, data)
                },
                notFound: [
                    '<div class="empty-message">',
                    'No matches found - Please try again.',
                    '</div>'
                ].join('\n')
            },
            limit: limit,
            source: function (query, syncResults, asyncResults) {
                query = query.split(',')[0];
                var cacheKey = autoComplete.getCacheKey(query);
                if (typeof autoComplete.cache[cacheKey] != "undefined") {
                    syncResults(autoComplete.cache[cacheKey]);
                    return true
                }
                if (autoComplete.$timeOut) {
                    clearTimeout(autoComplete.$timeOut)
                }

                autoComplete.$timeOut = setTimeout(function () {
                    autoComplete.getDataSource(query, syncResults, asyncResults)
                }, 300)
            }
        })
    };
     this.getCacheKey = function(query){
         return query.trim().toLowerCase()
     }

}

var events = {
    events: {},
    instances: [],
    on: function (eventName, fn, instance) {
        this.events[eventName] = this.events[eventName] || [];
        this.events[eventName].push(fn);
        this.instances.push(instance)
    },
    off: function (eventName, fn) {
        if (this.events[eventName]) {
            for (var i = 0; i < this.events[eventName].length; i++) {
                if (this.events[eventName][i] === fn) {
                    this.events[eventName].splice(i, 1);
                    break;
                }
            }

        }
    },
    emit: function (eventName, data) {
        if (this.events[eventName]) {
            this.events[eventName].forEach(function (fn, index) {
                fn(data);
            });
        }
    }
};
