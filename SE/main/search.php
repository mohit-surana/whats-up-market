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
 
//session_start();
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
		<link href="style1.css" type="text/css" rel="stylesheet" />
		
		</head>
<style>
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
left:90px;
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
<body>
<div class="ui inverted menu">
  <div class="item">
    Location:
  </div>
  <div class="item">
    Bangalore
  </div>
  <div class="item ">
    <img src="ph.png">08024567543</img>
  </div>
  <div class="item " href="fav2.php">
    <img src="images.png">Favourites</img>
  </div>
<div class="right menu">
    <div class="ui simple dropdown item">
      New User? <i class="dropdown icon"></i>
      <div class="menu">
        <a href="WhatIsWhatsUMarket.html" class="item">What is "what's Up market"</a>
        <a href="About Us1.html" class="item">About Us</a>
        <a href="Product quality.html" class="item">Product Quality</a>
      </div>
    </div>

<div class="item">
        <a href="../login/reg1.html"><div class="ui primary button">Sign Up</div></a>
    </div>
</div>

<div class="item">
        <a href="../login/login.html"><div class="ui primary button">Log in</div></a>
    </div>
</div>
<!--
<div class="four wide column"></div>
<div class="ui grid container">
<div class="ui card" width="800px" height="800px"></div>
<a img="cart.png"></a>-->
<div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card" >
<div class="ui grid container">
<div class="row">

<div class="three wide column">
    <div class="column">
<img src="logo.png" id="logo">
</div>
 
</div>
    <div class="column">
	
	<form class="navbar-form" role="search" action="../Cart/search.php" method="POST">
	
    <div class="input-group add-on" id="search">
	
      <input type="text" class="form-control input-input-xxlarge" placeholder="Search" name="srch_term" id="srch_term"style="box-shadow: 0px 10px 5px #888888;" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="s" ><i class="glyphicon glyphicon-search"></i></button>

	  </div>
	  
	         <div class="column">

	<a href="cart1.php"><img src="cart.png" id="cart">Cart
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

</div>

	
	<div class="ui grid">
<div class="three wide column">
</div>
<div class="thirteen wide column">
<div id="product-grid">
	<div class="txt-heading">Products</div>
	
	<?php
	extract($_POST);
	$search_item = $_POST["srch_term"]."%";
	$temp="";
	$count=0;
	$product_array = $db_handle->runQuery("SELECT * FROM items WHERE Item_Name LIKE '".$search_item."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){ if($count==12) break; else $count++;
	?> 
		
		<div class="product-item">
			<form> 
			<div class="product-image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($product_array[$key]["image"]).'" alt="photo">';?></div>
			<div><strong><?php echo $product_array[$key]["Item_Name"]; ?></strong></div>
			<div class="product-price"><?php echo "Rs ".$product_array[$key]["Price"]; ?></div>
			<?php $temp=$product_array[$key]["I_ID"];?>
			<<?php echo"<div><img src='images.png' id='fav'><small>Add to Favourites</small></div>"; ?>>
			<div> <input type="text" Item_Name="quantity" value="1" size="2" id="addc" onchange="f(this.value)"/><input type="button" style="color:white;background-color:green;border-color:green;border-width:1px;"value="Add to cart" onclick="up1('<?php echo $temp ?>')"/></div>
			</form>
			</div>
			
			
	<?php
			}
			
		
		
	}
	
	?>
	</div>
	</div>
</div>
	
</div>
</div>
</div>
</div>
	
?>
</div>
</div>
</body>
</html>