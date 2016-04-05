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
		</script>
		</head>
<style>

div#quality
{
margin-left:15px;
position:absolute;
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
       <a href="WhatIsWhatsUMarket.php" class="item">What is "what's Up market"</a>
        <a href="About Us1.php" class="item">About Us</a>
        <a href="Product quality.php" class="item">Product Quality</a>
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
<div class="ui card" style="box-shadow: 10px 10px 5px #888888; height:1500px;" id = "card" >
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
	
<div class="row">
<div class="three wide column">
<div class="ui secondary vertical menu" >
<br>

  <div class="ui fitted divider"></div>
  <a class="active item" id="mmenu" onclick="f()">
  <i class="dropdown icon"></i>
    Shops
  </a>
  
  
   <div id="shop" style="display:none" >
	  <div class="ui fitted divider"></div>
	  <div class="ui simple dropdown item" id="mmenu" style="background-color:white">
		<i class="dropdown icon"></i>
		Fruits
		<div class="menu">
		  <div class="header">Fruits</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	  
	  <div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Staples
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	  <div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Diary
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	<div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Meat
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	<div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Household
		<div class="menu">
		 <a href="WhatIsWhatsUMarket.php" class="item">What is "what's Up market"</a>
        <a href="About Us1.php" class="item">About Us</a>
        <a href="Product quality.php" class="item">Product Quality</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	<div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Personal Care
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	</div>
  </div>
  
 <div class="uiv2-left-nav-container">
	<div class="uiv2-left-nav-block">
	<ul>
		<li><a class="active" href="WhatIsWhatsUMarket.php">About What's Up Market!</a>
			<ul  style="margin-left:-19px; margin-top:5px">
				<li><a href="WhatIsWhatsUMarket.php">- What is What's Up &nbsp;&nbsp;Market ?</a></li>
				<li><a href="WhatIsWhatsUMarket.php">- Why shop here ?</a></li>
				
				<li><a href="WhatIsWhatsUMarket.php">- How to Order ?
				</a></li>
				<li><a href="WhatIsWhatsUMarket.php>- Who all can use ?</a></li>
				
			</ul>
		</li>
		
		<li><a href="privacy_Plocy.php">Privacy Policy</a></li>
		<li><a href="TermsConditions.php">Terms &amp; Conditions</a></li>
		<li><a href="FAQ.php">FAQ's</a></li>
		<li><a href="About Us1.php">Contact Us</a></li>
	</ul></div>
	</div>
  

  </div>

</div>
<!-- Insert your code here !-->
<div id="quality">
<h4 style="color:green">Our QUALITY POLICY</h4>
<p style="color:green">Quality is a word synonymous with What's Up Market and we take pride in our stringent quality standards. We go to great lengths and take the utmost care and precaution to ensure that each day our customers get nothing but the very best across all our products, services & interactions. Here are a few quality standards that we practice.
</p>
<h4 style="color:green">EXHAUSTIVE STOCK CHECKS</h4>
<p style="color:green">We make sure supermarket thoroughly check for all products for expiry dates each month and segregate those products that are close to expiry. These products are either sent back to vendors or discarded completely. Products that are sent back to vendors are usually re-sold through other channels by independent retail stores.</p>

<h4 style="color:green">RETURN POLICY</h4>
<p style="color:green">
In the unlikely event that the products purchased from us are expired or spoilt when purchased, we would be happy to replace or exchange the foods so purchased or refund the money to the customer.
</p>

<h4 style="color:green">ONLY HIGH QUALITY VENDORS</h4>
<p style="color:green">
We make sure supermarket deals with suppliers and vendors who trade ethically. We make sure they do not deal with the grey market or with vendors who have a reputation to deal in products by abusing and altering sell by dates. In the unlikely event that any of our suppliers is caught tampering with sell by dates, we penalize them appropriately and their supply contracts to our stores are terminated.
</p>
<h4 style="color:green">APPROPRIATE CARE IN STORAGE</h4>
<p style="color:green">
We make sure in the supermarket products as per recommended conditions and ideal temperatures.We ask them not to switch off their Freezers, Chillers or other refrigeration equipment at night. This is to ensure that temperature sensitive products are stored at correct temperatures all through. We switch on exhaust fans at night to adequate ensure air circulation for ambient products. Even though their store running costs are higher, we and they believe that this is a small price to pay to ensure 100% fit for consumption products at all times.
</p>

<h4 style="color:green">EVERYDAY FRESHNESS</h4>
<p style="color:green">All fresh produce and bakery products retailed at stores are procured on a daily basis. These are delivered every morning to the stores. Stale and old produce of the previous days is discarded or sent back to be resold through other channels. This ensures that  always get to choose from a wide variety of the freshest produce and bakery products.
</p>
</div>
<!--end!-->
</div>
</div>
</body>
</html>