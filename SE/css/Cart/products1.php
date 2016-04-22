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
#card{
width:1100px;
left:100px;
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
  function init() 
  {
     // document.getElementById("cart").innerHTML = "s";
   
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
        xmlhttp.onreadystatechange = function() 
		{
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
               document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
		//v=document.getElementById("addc").value ;
        xmlhttp.open("GET","beginc.php",true);
        xmlhttp.send();
    
}
function up1(str) 
{
     // document.getElementById("cart").innerHTML = "s";
   
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
        xmlhttp.onreadystatechange = function() 
		{
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
               document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
		//v=document.getElementById("addc").value ;
        
		xmlhttp.open("GET","add.php?action=add&I_ID="+str+"&quantity="+v,true);
        xmlhttp.send();
    
}  
function up1(str) 
{

   
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
        xmlhttp.onreadystatechange = function() 
		{
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
               document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
		//v=document.getElementById("addc").value ;
        
		xmlhttp.open("GET","add.php?action=add&I_ID="+str+"&quantity="+v,true);
        xmlhttp.send();
    
}

function up2(str) 
{
       alert("Added To Favourites");
   
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
        <a class="item" href="../main/About Us1.php">About Us</a>
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
<br>

  <div class="ui fitted divider"></div>
   <?php
	$sql = "select * from category ";
	$result = $conn->query($sql);
	if($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc() )
	   {

			$sql = "select * from subcategory where cat_id='".$row['Cat_ID']."'";
			$result2 = $conn->query($sql);
			
			echo  "<div class='ui simple dropdown item' id='mmenu'>"; 
			echo  "<i class='dropdown icon'></i>";	
			
			if($result2->num_rows <= 0) 
				echo "<a  href='../Cart/products.php?cat_id=".$row['Cat_ID']."' class='item'>".$row['cat_name']."</a>";
			else
				echo "<a class='item'>".$row['cat_name']."</a>";
			
			echo "<div class='menu'>";
			
			if($result2->num_rows > 0) 
				echo "<div class='header'>".$row['cat_name']."</div>";
			
			if($result2->num_rows > 0) 
			{
				while($row1 = $result2->fetch_assoc() )
				{
					echo "<a  href='../Cart/products.php?subcat_id=".$row1['subcat_id']."'class='item'>".$row1['subcat_name']."</a>";	
				}
			}
			echo "</div>";
			echo "</div>";
			echo "<div class='ui fitted divider'></div>";
	   }
	}
	?>
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
 
  
  </div><!--for carosel and row-->
  </div>
<div class="ui grid">
<div class="three wide column">
</div>
<div class="thirteen wide column">
<div id="product-grid">
	<div class="txt-heading">Products</div>
	
	<?php
	$temp="";
	$count=0;
	if ( isset( $_GET['cat_id'] ) && !empty( $_GET['cat_id'] ) )
		$product_array = $db_handle->runQuery("SELECT * FROM items WHERE Cat_ID='".$_GET['cat_id']."'ORDER BY I_ID ASC");
	else if ( isset( $_GET['subcat_id'] ) && !empty( $_GET['subcat_id'] ) )
		$product_array = $db_handle->runQuery("SELECT * FROM items WHERE subcat_id='".$_GET['subcat_id']."'ORDER BY I_ID ASC");
	
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value)
		{ 
			if($count==12) 
				break; 
			else 
				$count++;
	?> 
		
			<div class="product-item">
			<form> 
			<div class="product-image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($product_array[$key]["image"]).'" alt="photo">';?></div>
			<div><strong><?php echo $product_array[$key]["Item_Name"]; ?></strong></div>
			<div class="product-price"><?php echo "Rs ".$product_array[$key]["Price"]; ?></div>
			<?php $temp=$product_array[$key]["I_ID"];?>
			
			<div><img src="images.png" id="fav" onclick="up2('<?php echo $temp ?>')"><small>Add to Favourites</small></div>
			<div> 
			<input type="text" Item_Name="quantity" value="1" size="2" id="addc" onchange="f(this.value)"/>
			<input type="button" style="color:white;background-color:green;border-color:green;border-width:1px;"value="Add to cart" onclick="up1('<?php echo $temp ?>')"/>
			</div>
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
</body>
</html>