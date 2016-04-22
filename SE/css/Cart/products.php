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
		<link rel="stylesheet" type="text/css" href="../css/my.css">
		<script src="../semantic1/semantic.min.js"></script>
        <script src="../Semantic/package.js"></script>
		<script src="../js/toastr.min.js"></script>
		<link href="style1.css" type="text/css" rel="stylesheet" />
		<link href="../css/my.css" type="text/css" rel="stylesheet" />
		<link href="../css/toastr.min.css" rel="stylesheet"/>
		</head>
<style>
#card{
width:1100px;
left:90px;
height:1500px;
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
top:10px;
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
 #fav{
	 width:20px;
	 height:20px;
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

  
  v=1;
  function f(value)
  {
	  if(value<0)
	  {
		  alert("Please enter valid quantity!")
	  }
	  else
	  v=value;
	  
	 
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
function up1(str) {<?php echo "<script> alert('hi')</script>"; ?>
     // document.getElementById("cart").innerHTML = "s";
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "5",
  "hideDuration": "1000",
  "timeOut": "1600",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
//toastr.success('Your Product has been added to cart');
Command: toastr["success"]("<center>  Product has been added to the cart.</center>");
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
        
		xmlhttp.open("GET","add.php?action=add&I_ID="+str+"&quantity="+v,true);
        xmlhttp.send();
    
}  
function up2(str) 
{
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "5",
  "hideDuration": "1000",
  "timeOut": "1600",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
//toastr.success('Your Product has been added to cart');
Command: toastr["success"]("<center> Added to Favourites.</center>");	   
if (window.XMLHttpRequest) 
	   {
            // I_ID for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
		else 
		{
            // I_ID for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
       
      //  xhttp.open("POST", "fav.php", true);
		xmlhttp.open("GET","fav.php?I_ID="+str,true);
        xmlhttp.send();
    
}
</script>
<body onload="init()">
<div class="ui inverted menu">
  <a class="item">
    Location:
  </a>
  <div class="item">
    Bangalore
  </div>
  <div class="item ">
    <img src="ph.png">08024567543</img>
  </div>
  <a class="item" href="fav2.php">
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
	
      <input type="text" class="form-control input-input-xxlarge" placeholder="Search" Item_Name="srch-term" id="srch-term"style="box-shadow: 0px 10px 5px #888888;" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="s" ><i class="glyphicon glyphicon-search"></i></button>

	  </div>
	  
	         <div class="column">

	<a href="cart1.php" ><img src="cart.png" ><span id="cart">Cart(0)</span>
	</a>
	</div>
	  </div>
	  
	  
	   </form>
	  </div>
	 
    
 

</div>
	
<div class="row">
<div class="three wide column">
<div class="ui secondary vertical menu" >
<a class="active item" id="mmenu">
  <i class="dropdown icon"></i>
    Shops
  </a>
  <?php
	$sql = "select * from category ";
	$result = $conn->query($sql);
	if($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc() )
	   {

			$sql = "select * from subcategory where cat_id='".$row['Cat_ID']."'";
			$result2 = $conn->query($sql);
			
			echo  "<div class='ui simple dropdown item' id='mmenu' style='height:30px;'>"; 
			echo  "<i class='dropdown icon'></i>";	
			
			if($result2->num_rows <= 0) 
				echo "<a  href='../Cart/products.php?cat_id=".$row['Cat_ID']."' class='item' style='margin-top:-12px;'>".$row['cat_name']."</a>";
			else
				echo "<a class='item' style='margin-top:-12px;'>".$row['cat_name']."</a>";
			
			echo "<div class='menu'>";
			
			if($result2->num_rows > 0) 
				echo "<div class='header'>".$row['cat_name']."</div>";
			
			if($result2->num_rows > 0) 
			{
				while($row1 = $result2->fetch_assoc() )
				{
					  echo "<a  href='../Cart/products.php?subcat_id=".$row1['subcat_id']."'class='item' style='margin-top:-12px;' >".$row1['subcat_name']."</a>";	
				}
			}
			echo "</div>";
			echo "</div>";
	   }
	}
	?>

  </div>

</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel"  style="margin-top:-55px;">
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
<br>
  <!-- Left and right controls -->
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
  
  </div><!--for carosel and row-->
  
  </div>
  
  <div id="product-grid" style="width:750px; margin-left:220px;margin-top:-155px;">
	<div class="txt-heading">Products</div>
<div class="container" style="width:900px;margin-left:-15px;">



<!--	<table>
	<tbody>
	<tr> -->

	<?php
	$temp="";
	$count=-1;
	if ( isset( $_GET['cat_id'] ) && !empty( $_GET['cat_id'] ) )
		$product_array = $db_handle->runQuery("SELECT * FROM items WHERE Cat_ID='".$_GET['cat_id']."'ORDER BY I_ID ASC");
	else if ( isset( $_GET['subcat_id'] ) && !empty( $_GET['subcat_id'] ) )
		$product_array = $db_handle->runQuery("SELECT * FROM items WHERE subcat_id='".$_GET['subcat_id']."'ORDER BY I_ID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){ $count++;
	?> 
	<?php if($count%4==0): ?> 
		<div class="row" style="height:300px;width:738px;">
	<?php endif; ?>
		<div class="col-md-3" >
		<div class="product-item" style="height:271px;">
			
			<div class="product-image" style="margin-left:10px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($product_array[$key]["image"]).'" alt="photo">';?></div>
			<div><strong><?php echo $product_array[$key]["Item_Name"]; ?></strong></div>
			<div class="product-price"><?php echo "Rs ".$product_array[$key]["Price"]; ?></div>
			<?php $temp=$product_array[$key]["I_ID"];?>
			<div><span style="cursor:pointer"><img src="images.png" id="fav" onclick="up2('<?php echo $temp ?>')"><small>Add to Favourites</span></small></div>
			<div> <input type="text" Item_Name="quantity" value="1" size="2" id="addc" onchange="f(this.value)"/><input type="button" style="color:white;background-color:green;border-color:green;border-width:1px;"value="Add to cart" onclick="up1('<?php echo $temp ?>')"/></div>
			</div>
			</div>
	
	<?php if(($count+1)%4==0): ?> 
		</div>
	<?php endif; ?>		
	
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
</body>
</html>