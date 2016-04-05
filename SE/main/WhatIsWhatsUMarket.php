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

div#contentsNewUser
{
position:absolute;
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
<div class="ui card" style="box-shadow: 10px 10px 5px #888888; height:1600px;" id = "card" >
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
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
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
				<li><a href="#contentsNewUser">- What is What's Up &nbsp;&nbsp;Market ?</a></li>
				<li><a href="#contentsNewUser2">- Why shop here ?</a></li>
				
				<li><a href="#contentsNewUser3">- How to Order ?
				</a></li>
				<li><a href="#contentsNewUser4">- Who all can use ?</a></li>
				
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







<div id="contentsNewUser">
<p ><h3>&nbsp;What's Up Market!</h3></p>
<p>&nbsp &nbsp &nbsp &nbsp Supermarkets are required for us from all walks of life, be it groceries, stationary, clothes, utensils and wide range of other things. Considering the importance of supermarket these days, it is tedious to manage them. It takes a lot of paper work and it is time consuming to manage the information for managers and administrators.While for customers its a time consuming to visit and look up at the items and purchase items.</p>

<p>&nbsp &nbsp &nbsp &nbsp Whats up market is a fully automated system where all the aspects related to the proper management of supermarket is done. These aspects involve managing information about the various products, staff, managers, customers, billing etc. This system provides an efficient way of managing the supermarket information. Also allows the customer to purchase and pay for the items purchased.</p>



<p>
&nbsp &nbsp &nbsp &nbsp Whats up market for customers includes the different categories of products, items available in those and their details so that they can add products to their cart. To make the process of ordering easier, the purchase history is maintained and displayed to the customer. An estimated time to complete the order, based on the current number of orders and employees, is provided to the customer.
</p>
<p>
&nbsp &nbsp &nbsp &nbsp Whats up market has online ordering as a feature which would enable customers to order items from the comfort of their homes. An easy to use interface will be provided in the form of a website. Each customer is provided an account through which he/she views all the product details and makes the orders. 
</p>

<div id="contentsNewUser2">
<p><h3>Why should I use What's Up Market ?</h3></p> <p>What's Up Market! allows you to walk away from the drudgery of supermarket shopping and welcome an easy relaxed way of browsing and shopping for groceries. Discover new products and shop for all your food and grocery needs from the comfort of your home or office.Take the items whenever you like just by visiting.No need to stand in long queues and carry heavy bags- get everything you need, when you need.
<ul style="list-style:square">
<li>No need to wait in line for bill.</li>
<li/>Easy and Efficient way of billing.
<li>No need to visit each floor for each items.</li>
<li>No need to search for items.</li>
<li>Pick and Go</li>
<li>Check for Discounts from home or office</li>
</ul>
</p>
</div>

<div id="contentsNewUser4">
<p><h3>We are not limited to customers !</h3></p>
<p>Yes, What's Up Markets! is not restricted for  the customers.We provide services which can be used by Managers of the supermarket to manage the supermarket.These services can be seen only by the managers.They need to log in separatly.<br/>
These are the main services in the mangers side: 
<ul style="list-style:square">
<li/>Employee Management
	<li/>Vendor Order
	<li/>Stock entry
	<li/>Various Report Generation.
	<li/>Account.
</ul>
</div>

<div id="contentsNewUser4">
<!-- HOW TO ORDER ? -->
<div>
<p>
&nbsp &nbsp &nbsp &nbsp Our projects main aim is to provide quality service and at the same time to maintain efficiency. The customer should be provided with full value for money. It is important to reduce processing on client side and the website should run in an efficient manner to make it easy for the customers. The website must serve all purposes without any lag or crashes. 

&nbsp &nbsp &nbsp &nbsp The customer will find it easy to use our website and shop for his household needs in an efficient manner. For that GUI plays a very important role. A proper design with all the required icons must be present on the customers screen.
</p>
<p>
&nbsp &nbsp &nbsp &nbsp To cater to the aforementioned criteria, we shall have quality testing done by members across other teams and based on their feedback, try to streamline our interfaces and fix the issues faced by them. This seems like a good option as most of the criteria can’t be measured via numbers.
</p>

</div>
<div id="contentsNewUser3">
<!-- HOW TO ORDER ? -->
<br/>
<h4>How to Order</h4>
<p>
1. Log in<br/>
2. Browse the website.<br/>
3. Choose Products<br/>
4. Add to cart<br/>
5. Generate Bill<br/>
6. Payment.

</div>








<!--end!-->
</div>
</div>
</body>
</html>