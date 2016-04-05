<?php 
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";
$mid="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 


$mid = $_COOKIE['id'];
$mname= "";
$sql = "select * from customer where C_ID ='".$mid."' ";
$result = $conn->query($sql);
 if($result->num_rows > 0)
    {
      
       while($row = $result->fetch_assoc() ){
          $mname = $row['Name'];
       }
    }

 
?>
<html>
<head><link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-2.2.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>  
		<link rel="stylesheet" type="text/css" href="../semantic1/semantic.min.css">
		<script src="../semantic1/semantic.min.js"></script>
        <script src="../Semantic/package.js">
		</script>
		<link href="style1.css" type="text/css" rel="stylesheet" />
		
		<script>
			function f()
			{
				d = document.getElementById("mmenu");	
				d.addEventListener("click",g);
			}
			function g()
			{
				d1 = document.getElementById("shop");
				d2 = document.getElementById("shop2");
				if(d1.style.display=="none")
					d1.style.display = "block";
				
				else
					d1.style.display = "none";
				
			}
			function init() {
     // document.getElementById("cart").innerHTML = "s";
   
	   if (window.XMLHttpRequest) {
            // I_ID for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // I_ID for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
		//v=document.getElementById("addc").value ;
        xmlhttp.open("GET","beginc.php",true);
        xmlhttp.send();
    
}
		</script>
		</head>
<style>

}

div.aboutUs
{
	margin-left:15px;
}

div#address
{
	margin-left:15px;
}
ul
{
list-style:none;
}
li
{
padding-bottom:5px;

}

.uiv2-left-nav-container
{
	margin-left:-25px;
	margin-top:-30px;
}
div#shop
{
	position:absolute;
	background:white;
	width:220px
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
#tb{
	cellpadding:10;
	cellspacing:5;
	
}
#card{
width:1100px;
left:200px;
height:1000px;
}
#ad{
width:250px;
left:10px;
border:2px;
border-color:grey;
border-style: solid;
}
#mmenu{
top:-50px;

}
#ad2{
border:2px;
border-color:grey;
border-style: solid;
}
#ad1{
width:280px;
border:2px;
border-color:grey;
border-style: solid;
}
#cart{
left:-400px;
width:50px;
}
#search{
left:100px;
width:600px;
top:50px;
}
#s{
height:35px;
width:50px;
top:-10px;
}
#logo{
width:300px;
}
#myCarousel{
height:232px;
width:720px;
left:40px;
top:-30px;
}
#hb{
left:-50px;

}
#l{
width:160px;
left:8px;
top:-32px;
height:40px;
background-color:grey;
}
#r{
width:160px;
left:20px;
top:-32px;
height:40px;
background-color:black;
}
#m{
width:160px;
left:20px;
top:-32px;
height:40px;
background-color:black;

}

 #mf{
 width:160px;
left:15px;
top:-32px;
height:40px;
background-color:black;

 }  
#umenu{
left:214px;
} 
#umenu,#umenu1,#umenu2,#umenu3#menu5{

height:35px;
}
#p1{
left:400px;
}
		body{
              background:url('bg2.png');
          
          }
</style>
<script>
$('.ui.dropdown')
  .dropdown()
;</script>
<body onload="init()">
<div class="ui inverted menu">
  <a class="item">
    Location:
  </a>
  <a class="item">
    Bangalore
  </a>
  <a class="item ">
    <img src="ph.png">08024567543</img>
  </a>
  <a class="item ">
    <img src="images.png">Favourites</img>
  </a>
<div class="right menu">
    <div class="ui simple dropdown item">
      New User? <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="WhatIsWhatsUMarket.php" >What is "what's Up market"</a>
        <a class="item" href="About Us1.php" >About Us</a>
        <a class="item" href="Product quality.php" >Product Quality</a>
      </div>
    </div>

<div class="item">
        <label>Welcome &nbsp <?php echo $mname;?></label>
    </div>
</div>

<div class="item">
        <a href="../login/login.php"><div class="ui primary button">Log out</div></a>
    </div>
</div>
<!--<div class="four wide column"></div>
<div class="ui grid container">
<div class="ui card" width="800px" height="800px"></div>
<a img="cart.png"></a>!-->
<div class="ui card" style="box-shadow: 10px 10px 5px #888888; height:2500px;" id = "card" >
<div class="ui grid container">
<div class="row">

<div class="three wide column">
    <div class="column">
<img src="logo.png" id="logo">
</div>
 
</div>
    <div class="column">
	
	<form class="navbar-form" role="search" >
	
    <div class="input-group add-on" id="search">
	
      <input type="text" class="form-control input-input-xxlarge" placeholder="Search" name="srch-term" id="srch-term"style="box-shadow: 0px 10px 5px #888888;" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="s" ><i class="glyphicon glyphicon-search"></i></button>

	  </div>
	  
	         <div class="column">

	<a href="../cart/cart1.php" ><img src="cart.png" ><span id="cart">Cart(0)</span>
	</a>
	</div>
	  </div>
	  
	   </form>
	  </div>
	 
    
 

</div>
	
<div >

<title>FAQ | WhatsUpMarket.com</title>
<link href="./FAQ _ BigBasket. com_files/css(2)" rel="stylesheet" type="text/css"><link rel="stylesheet" href="./FAQ _ BigBasket.com_files/jquery-ui.min.css" type="text/css" media="all">
<link href="./FAQ _ BigBasket.com_files/uiv2_main.min.css" rel="stylesheet" type="text/css">
<iframe src="./FAQ _ BigBasket.com_files/analyze.html" scrolling="no" width="1" height="1" style="display: none;"></iframe>
<script async="" src="./FAQ _ BigBasket.com_files/fbds.js"></script>
<script type="text/javascript" async="" src="./FAQ _ BigBasket.com_files/pixel.html"></script>
<script id="facebook-jssdk" src="./FAQ _ BigBasket.com_files/all.js"></script>
<script type="text/javascript" async="" src="./FAQ _ BigBasket.com_files/ecommerce.js"></script>
<script async="" src="./FAQ _ BigBasket.com_files/analytics.js"></script><script src="./FAQ _ BigBasket.com_files/jquery.min.js"></script>
<style type="text/css"></style><script type="text/javascript" src="./FAQ _ BigBasket.com_files/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="./FAQ _ BigBasket.com_files/typeahead.bundle.js"></script>
<script type="text/javascript" src="./FAQ _ BigBasket.com_files/typeahead.jquery.js"></script>

<link rel="stylesheet" href="./FAQ _ BigBasket.com_files/my-account.css" type="text/css">
<link rel="stylesheet" href="./FAQ _ BigBasket.com_files/flatpage.css" type="text/css"><style type="text/css">

        .uiv2-myaccount-right-col 
		{
            width: 745px;
        }
    </style><style type="text/css">
        .uiv2-flat-page-content img 
		{
            float: right;
        }
    </style>
<div class="uiv2-content-wrapper"><div class="sysMessage"></div></div><p><style type="text/css">
.uiv2-div100 {
                font: 400 14px/20px 'lato', serif;
            }	</style><script type="text/javascript">
        $(document).ready(function () {
            $('.uiv2-faq-sec-type').each(function () {
                var click_item = $(this).find('.uiv2-question-faq');
                var open_item = $(this).find('.uiv2-answer-faq');
                var close_item = $(this).find('.uiv2-close-txt');
                click_item.click(function () {
                    open_item.slideDown(500);
                });
                close_item.click(function () {
                    open_item.slideUp(500);
                });
            });
        });
    </script></p><div class="uiv2-myaccount-right-col uiv2-flat-page-content" style="width:800px"><p><label>FAQs</label></p><div class="uiv2-div100"><span class="uiv2-left uiv2-left-sec-top-faq">Kindly check the FAQ below if you are not very familiar with the functioning of this website. If your query is of urgent nature and is different from the set of questions then do write to us at customerservice@WhatsUp.com or call us on +18601231000 between 7 am &amp; 10 pm on all days including Sunday to get our immediate help.</span><span class="uiv2-left"><img src="./FAQ _ BigBasket.com_files/faq_vis.jpg"></span></div><div class="uiv2-div45 uiv2-left"><div class="uiv2-title-faq">
				Registration</div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I register? </span><span class="uiv2-answer-faq" style="display: none;"> You can register by clicking on the "Sign Up" link at the top right corner of the homepage. Please provide the information in the form that appears. You can review the terms and conditions, provide your payment mode details and submit the registration information. <span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Are there any charges for registration?</span><span class="uiv2-answer-faq"> No. Registration on What's Up Market! is absolutely free.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Do I have to necessarily register to shop on bigbasket? </span><span class="uiv2-answer-faq" style="display: inline;">You can surf and add products to the cart without registration but only registered shoppers will be able to checkout and place orders. Registered members have to be logged in at the time of checking out the cart, they will be prompted to do so if they are not logged in. <span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Can I have multiple registrations?</span><span class="uiv2-answer-faq" style="display: inline;">Each email address and contact phone number can only be associated with one bigbasket account.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-title-faq">
				Account Related</div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What is My Account?</span><span class="uiv2-answer-faq" style="display: inline;">My Account is the section you reach after you log in at What's Up Market!. My Account allows you to track your active orders, credit note details as well as see your order history and update your contact details.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I reset my password?</span><span class="uiv2-answer-faq" style="display: inline;">You need to enter your email address on the Login page and click on forgot password. An email with a reset password will be sent to your email address. With this, you can change your password. In case of any further issues please contact our customer support team.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What are credit notes &amp; where can I see my credit notes?</span><span class="uiv2-answer-faq" style="display: inline;">Credit notes reflect the amount of money which you have pending in your bigbasket account to use against future purchases. This is calculated by deducting your total order value minus undelivered value. You can see this in “My Account” under credit note details.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What is My Shopping List?</span><span class="uiv2-answer-faq" style="display: inline;">My Shopping List is a comprehensive list of all the items previously ordered by you on What's Up Market!. This enables you to shop quickly and easily in future.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-title-faq">
				Payment</div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What are the modes of payment?</span>
				<span class="uiv2-answer-faq">
				<span class="uiv2-div100">You can pay for your order on What's Up Market! using the following modes of payment:</span>
				a. Credit and debit cards (VISA / Mastercard / American Express)
				<span class="uiv2-div100">b. Cash after picking up the items.</span></span><span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Are there any other charges or taxes in addition to the price shown? Is VAT added to the invoice?</span><span class="uiv2-answer-faq">The VAT is included in the MRP of products. There are no additional taxes added by bigbasket to your order. The prices you see on our product pages are the prices you pay.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Is it safe to use my credit/ debit card on bigbasket?</span><span class="uiv2-answer-faq">Yes it is absolutely safe to use your card on What's Up Market!. A recent directive from RBI makes it mandatory to have an additional authentication pass code verified by VISA (VBV) or MSC (Master Secure Code) which has to be entered by online shoppers while paying online using visa or master credit card. It means extra security for customers, thus making online shopping safer<span class="uiv2-close-txt">Close</span></span></div>
				<div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">If I pay by credit card how do I get the amount back for items not picked up by me?</span><span class="uiv2-answer-faq">If you are not able to pick up the products in your order and you have already paid for them online, the balance amount will be refunded to account.<span class="uiv2-close-txt">Close</span></span></div>
				
				<div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What is bigbasket Wallet?</span><span class="uiv2-answer-faq">The bigbasket Wallet is a pre-paid credit account that is associated with your bigbasket account. This prepaid account allows you to pay a lump sum amount once to bigbasket and then shop multiple times without having to pay each time. <span class="uiv2-div100"><a href="http://www.bigbasket.com/faq/#">Click hear to know more...</a></span><span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How are the fruits and vegetables packaged?</span><span class="uiv2-answer-faq">Fresh fruits and vegetables are hand picked, hand cleaned and hand packed in reusable plastic trays covered with cling. We ensure hygienic and careful handling of all our products.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How are the fruits and vegetables weighed?</span><span class="uiv2-answer-faq">Every fruit and vegetable varies a little in size and weight. While you shop we show an estimated weight and price for everything priced by kilogram. At the time of delivery we weigh each item to determine final price. This could vary by 5% at maximum. Therefore if you have shopped for something that costs Rs. 100 per kg, and we delivery 1.5 kg of the product to you (eg cabbage, pineapple), you will still be charged a maximum of Rs. 105. In case the weight of the product is lesser than what you ordered, you will pay correspondingly less.
				
				
				<span class="uiv2-close-txt">Close</span></span></div>
				
				</div><div class="uiv2-div45 uiv2-right"><div class="uiv2-title-faq">
				Order Related</div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I add or remove products after placing my order?</span><span class="uiv2-answer-faq">Once you have placed your order you will not be able to make modifications on the website. Please contact our customer support team for any modification of order.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Is it possible to order an item which is out of stock?</span><span class="uiv2-answer-faq">No you can only order products which are in stock. We try to ensure availability of all products on our website however due to supply chain issues sometimes this is not possible<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I check the current status of my order?</span><span class="uiv2-answer-faq">The only way you can check the status of your order is by contacting our customer support team.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I check which items were not available from my order? Will someone inform me about the items unavailable in my order before delivery?</span><span class="uiv2-answer-faq">You will receive an email as well as an sms about unavailable items before the delivery of your order.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What is WYSIWYG Guarantee?</span><span class="uiv2-answer-faq">What You See Is What You Get is our promise to deliver every item ordered by you. If we fail to do so we will credit your bigbasket account with 50% of the value of the undelivered product immediately. For example if you had ordered for Rs. 1000 worth of products and one product worth Rs. 100 was not delivered (or if an incorrect product was delivered) Rs. 50 will automatically get credited to bigbasket account.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-title-faq">
				Customer Related</div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I contact customer service?</span><span class="uiv2-answer-faq"> Our customer service team is available throughout the week, all seven days from 7 am to 10 pm. They can be reached at +18601231000 or via email at <a href="http://www.bigbasket.com/faq/#">customerservice@WhatsUp.com</a><span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What are your timings to contact customer service?</span><span class="uiv2-answer-faq">Our customer service team is available throughout the week, all seven days from 7 am to 10 pm.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How can I give feedback on the quality of customer service?</span><span class="uiv2-answer-faq">Our customer support team constantly strives to ensure the best shopping experience for all our customers. We would love to hear about your experience with bigbasket. Do write to us at<a href="http://www.bigbasket.com/faq/#">kbn@What's Up Market!</a> in case of positive or negative feedback.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How do I raise a claim with customer service for any of Quality Guarantee?</span><span class="uiv2-answer-faq">If you face any issues with price, quality of products we will take every measure to address the issue and make it up to you. Please contact our customer support team with details or your order as well as the issue you faced.<span class="uiv2-close-txt">Close</span></span></div>
				<div class="uiv2-title-faq">
				Others</div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Do you have offline stores?</span><span class="uiv2-answer-faq">No we are a purely internet based company and do not have any brick and mortar stores.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">Where can I find currently running offers/ promotions?</span><span class="uiv2-answer-faq">There is a link called “Store Wide Offers” on the top right hand side of our website. All products with any discount or promotions are listed under this section.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">What do I do if an item is defective (broken, leaking, expired)?</span><span class="uiv2-answer-faq">We have a no questions asked return policy. In case you are not satisfied with a product received you can return it to the delivery personnel at time of delivery or you can contact our customer support team and we will do the needful.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How will I get my money back in case of a cancellation or return? What are the modes of refund?</span><span class="uiv2-answer-faq">The amount will be refunded to your What's Up Market! account to use as store credit in your forthcoming purchases. In case of credit card payments we can also credit the money back to your credit card. Please contact customer support for any further assistance regarding this issue.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">I am a corporate/ business. Can I place orders with What's Up Market!?</span><span class="uiv2-answer-faq">Yes, we do bulk supply of products at special prices to institutions such as schools, restaurants and corporates. Please contact as at <a href="">corporate@WhatsUp.com</a> to know more.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">I would like to suggest some products. Who do I contact?</span><span class="uiv2-answer-faq">If you are unable to find a product or brand that you would like to shop for, please write to us at customerservice@WhatsUp.com and we will try our best to make the product available to you.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">How and where I can give my feedback?</span><span class="uiv2-answer-faq">We always welcome feedback, both positive and negative from all our customers. Please feel free to write to us at customerservice@What's Up Market!, or call us sat 080-3355 1000 and we will do our best to incorporate your suggestions into our system.<span class="uiv2-close-txt">Close</span></span></div><div class="uiv2-faq-sec-type"><span class="uiv2-question-faq">I am a corporate/ business. Can I place orders with What's Up Market!?</span><span class="uiv2-answer-faq">Yes, we do bulk supply of products at special prices to institutions such as schools, restaurants and corporates. Please contact as at <a href="">corporate@What's Up Market!</a> to know more.<span class="uiv2-close-txt">Close</span></span></div></div></div><!--end Right Column -->
</div>


<!--end!-->
</div>
</div>
</body>
</html>