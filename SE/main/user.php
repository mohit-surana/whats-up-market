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
 
    
require_once("dbcontroller.php");
$db_handle = new DBController();


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
		<!--<link href="style.css" type="text/css" rel="stylesheet" />!-->
		
		</head>
<style>
#card{
width:1100px;
left:200px;
height:800px;
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
        xmlhttp.open("GET","../cart/beginc.php",true);
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
        <a class="item" href="WhatIsWhatsUMarket.php">What is "what's Up market"</a>
        <a class="item" href="AboutUs1.php">About Us</a>
        <a class="item" href="Product quality.php" >Product Quality</a>
      </div>
    </div>

<div class="item">
       <label>Welcome &nbsp <?php echo $mname;?></label>
    </div>
</div>

<div class="item">
        <a href="../login/login.php"><div class="ui primary button">Log Out</div></a>
    </div>
</div>
<!--<div class="four wide column"></div>
<div class="ui grid container">
<div class="ui card" width="800px" height="800px"></div>
<a img="cart.png"></a>!-->
<div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card" >
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

<div class="ui simple dropdown item" id="umenu">
      International Products <i class="dropdown icon"></i>
      <div class="menu">
        <a  class="item"  >What is "what's Up market"</a>
        <a  class="item">About Us</a>
        <a class="item">Product Quality</a>
      </div>
    </div>
<div class="ui simple dropdown item" id="umenu">
      Health<i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">What is "what's Up market"</a>
        <a class="item">About Us</a>
        <a class="item">Product Quality</a>
      </div>
    </div>

<div class="ui simple dropdown item" id="umenu">
      Party<i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">What is "what's Up market"</a>
        <a class="item">About Us</a>
        <a class="item">Product Quality</a>
      </div>
    </div>

<div class="ui simple dropdown item" id="umenu">
      Fasting <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">What is "what's Up market"</a>
        <a class="item">About Us</a>
        <a class="item">Product Quality</a>
      </div>
    </div>

<div class="ui simple dropdown item" id="umenu">
      Summer <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">What is "what's Up market"</a>
        <a class="item">About Us</a>
        <a class="item">Product Quality</a>
      </div>
    </div>	
	
<div class="row">
<div class="three wide column">
<div class="ui secondary vertical menu" >
  <div class="ui fitted divider"></div>
  <a class="active item" id="mmenu">
  <i class="dropdown icon"></i>
    Shops
  </a>
    <div class="ui fitted divider"></div>
  <div class="ui simple dropdown item" id="mmenu">
    <i class="dropdown icon"></i>
    Fruits
    <div class="menu">
      <div class="header">Fruits</div>
      <a class="item" href="../Cart/products.php">Products</a>
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

</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="4.png" alt="Chania">
    </div>

    <div class="item">
      <img src="2.png" alt="Chania">
    </div>

    <div class="item">
      <img src="3.png" alt="Flower">
    </div>

    <div class="item">
      <img src="1.png" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
 
  <br>
  
  <div id="hb">
<div class="ui black basic labels" id="cb">
<a class="ui black pointing  label" id="l" data-slide-to="0" data-target="#myCarousel"><center>Offer1</center></a>
   
  </a>
<a class="ui black pointing  label" id="mf" data-slide-to="1" data-target="#myCarousel"><center>Offer2</center></a>
    
  </a>
 <a class="ui black pointing label" id="m" data-slide-to="2" data-target="#myCarousel"><center>Offer3</center></a>
    
  </a>
 <a class="ui black  pointing label" id="r" data-slide-to="3" data-target="#myCarousel"><center>Offer4</center></a>
 
  </a>
</div>
</div>
</div>
<div class="row">
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="ad.png" alt="Chania" id="ad">&nbsp &nbsp &nbsp &nbsp &nbsp
  <img src="ad1.png" alt="Chania" id="ad1">&nbsp &nbsp &nbsp &nbsp &nbsp
  <img src="ad3.png" alt="Chania" id="ad2">
</div>
  </div>
</div>
</div>

</body>
</html>