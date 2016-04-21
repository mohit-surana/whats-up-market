var bwEncodeCode39 = function(plaintext) {
    var table = {
        "0": "bwbWBwBwb",
        "1": "BwbWbwbwB",
        "2": "bwBWbwbwB",
        "3": "BwBWbwbwb",
        "4": "bwbWBwbwB",
        "5": "BwbWBwbwb",
        "6": "bwBWBwbwb",
        "7": "bwbWbwBwB",
        "8": "BwbWbwBwb",
        "9": "bwBWbwBwb",
        "A": "BwbwbWbwB",
        "B": "bwBwbWbwB",
        "C": "BwBwbWbwb",
        "D": "bwbwBWbwB",
        "E": "BwbwBWbwb",
        "F": "bwBwBWbwb",
        "G": "bwbwbWBwB",
        "H": "BwbwbWBwb",
        "I": "bwBwbWBwb",
        "J": "bwbwBWBwb",
        "K": "BwbwbwbWB",
        "L": "bwBwbwbWB",
        "M": "BwBwbwbWb",
        "N": "bwbwBwbWB",
        "O": "BwbwBwbWb",
        "P": "bwBwBwbWb",
        "Q": "bwbwbwBWB",
        "R": "BwbwbwBWb",
        "S": "bwBwbwBWb",
        "T": "bwbwBwBWb",
        "U": "BWbwbwbwB",
        "V": "bWBwbwbwB",
        "W": "BWBwbwbwb",
        "X": "bWbwBwbwB",
        "Y": "BWbwBwbwb",
        "Z": "bWBwBwbwb",
        "-": "bWbwbwBwB",
        ".": "BWbwbwBwb",
        " ": "bWBwbwBwb",
        "$": "bWbWbWbwb",
        "/": "bWbWbwbWb",
        "+": "bWbwbWbWb",
        "%": "bwbWbWbWb",
        "*": "bWbwBwBwb"
    };

    return _.chain("*" + plaintext.toUpperCase() + "*")//Wrap in start and stop characters, and convert to uppercase
        .map(function(c) { return table[c]; })  //Map each character to its table equivalent
        .compact()//Remove unknown characters, which would've mapped to undefined
        .join("w")  //Between each character, there should be a thin white space
        .value();
};

var cwEncode = function(bwEncoding) {
    var mapper = function(c) {
        var black = [0,0,0];
        var white = [255,255,255];
        var thin = 2;
        var thick = 4;
        var table = {
            b: { color: black, width: thin },
            B: { color: black, width: thick },
            w: { color: white, width: thin },
            W: { color: white, width: thick }
        };
        return table[c];
    };
    return _.map(bwEncoding, mapper);
};

var measureText = function(text) {
    var paper = new Raphael(0, 0, 0, 0);
    var text = paper.text(-100, -100, text);
    var measurements = text.getBBox();
    paper.remove();
    return [measurements.width, measurements.height];
}

var drawRegular = function(cwEncoding, paper, middleStuff) {
    var width = _.chain(cwEncoding)
        .map(function(c) { return c.width; })
        .reduce(function(memo, num) { return memo + num }, 0)
        .value();
    var height = 100;
    paper.setSize(width, height);
    var currentPosition = 0;
    _.each(cwEncoding, function(c) {
        var color = "rgb(" + c.color.join() + ")";
        paper.rect(currentPosition, 0, c.width, height).attr( { fill: color, "stroke-width": 0 });
        currentPosition += c.width;
    });

    if(typeof(middleStuff) === 'string') {
        var textElement = paper.text(width / 2, -100, middleStuff);
        var measurements = textElement.getBBox();
        textElement.attr({ y: height - measurements.height / 2});
        measurements = textElement.getBBox();
        paper.rect(measurements.x - 5, measurements.y - 5, measurements.width + 10, measurements.height + 5).attr( { "stroke-width": 0, fill: "#FFFFFF" });
        textElement.toFront();
    }
};


var constructRefresher = function() {
    var paper = new Raphael(document.getElementById('canvas_container'), 0, 0);

    return function(viewModel) {
        paper.clear();
        var bwEncoding = bwEncodeCode39(viewModel.plaintext());
        var cwEncoding = cwEncode(bwEncoding);

        if(viewModel.isCircular()) {
            drawCircular(cwEncoding, paper, viewModel.showText() ? viewModel.plaintext() : undefined);
        }
        else {
            drawRegular(cwEncoding, paper, viewModel.showText() ? viewModel.plaintext() : undefined);
        }
    }
};

function init()
{
	var plaintext = "";
	var a = bwEncodeCode39(plaintext);
	var b = cwEncode(a);

	var myViewModel = {
		plaintext: ko.observable(""),
		isCircular: ko.observable(false),
		showText: ko.observable(false),
		symbology: ko.observable("code39")
	};

	ko.applyBindings(myViewModel);

	var refresh = constructRefresher();
	var refreshOnSubscribe = function(newValue) { refresh(myViewModel); };

	myViewModel.plaintext.subscribe(refreshOnSubscribe);
	myViewModel.isCircular.subscribe(refreshOnSubscribe);
	myViewModel.showText.subscribe(refreshOnSubscribe);

	refresh(myViewModel);
}