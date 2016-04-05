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
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$nquantity=1;
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
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM items WHERE I_ID='" . $_GET["I_ID"] . "'");
			if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["I_ID"]==$productByCode[0]["I_ID"])
				$nquantity=$item["quantity"]+$_POST["quantity"];	
			     }
		    }
			$itemArray = array($productByCode[0]["I_ID"]=>array('Item_Name'=>$productByCode[0]["Item_Name"], 'I_ID'=>$productByCode[0]["I_ID"], 'quantity'=>$nquantity, 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["I_ID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						   
							if($productByCode[0]["I_ID"] == $k)
							{
							$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];}
							
					}
				} else {
					
					//if()
					//$_SESSION["cart_item"][$productByCode[0]["I_ID"]]["quantity"]+=$_POST["quantity"];
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["I_ID"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
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
/*function del(code)
{
	alert(code);
	<?php if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["code"]==code)
				$item["quantity"]=$item["quantity"]-1;	
			     }
		    }
			?>
}*/
$('.ui.dropdown')
  .dropdown();
</script>
<body>
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
      <a class="item" href="../main/WhatIsWhatsUMarket.php">What is "what's Up market"</a>
        <a class="item" href="../main/AboutUs1.php">About Us</a>
        <a class="item" href="../main/Product quality.php" >Product Quality</a>
      </div>
    </div>

<div class="item">
        <label>Welcome &nbsp <?php echo $mname;?></label>
    </div>
</div>

<div class="item">
        <a href="../login/login.php"><div class="ui primary button">Sign Out</div></a>
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
<a href="../main/user.php"><img src="logo.png" id="logo"></a>
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

	<a href="cart1.php"><img src="cart.png" id="cart">Cart<?php		
	$c=0;
	if(!empty($_SESSION["cart_item"]))
    {
	foreach ($_SESSION["cart_item"] as $item)
	{$c=$c+1;}
	}
	echo "($c)";
	?>
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
      <a class="item" href="../Cart/products.php">Prodcuts</a>
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
    
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="cart1.png" alt="Chania">
    </div>

    
  </div>

  <!-- Left and right controls -->
 
  <br>
  

&nbsp &nbsp &nbsp &nbsp
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="cart1.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table id="tb">
<tbody>
<tr>
<th><strong>Name  </strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?>  </strong></td>
				<td><?php echo $item["I_ID"]; ?></td>
				<td><?php echo $item["quantity"]; ?> <button type="button" class="btn btn-warning btn-circle" id="remove" ><i class="glyphicon glyphicon-remove"></i></button></td>
				<td align=right><center><?php echo "Rs".$item["price"]; ?></center></td>
				<td><a href="cart1.php?action=remove&I_ID=<?php echo $item["I_ID"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>
		

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "Rs".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>


</div>
</div>
</div>
</body>
</html>