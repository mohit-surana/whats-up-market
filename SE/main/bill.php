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
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-2.2.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
    <script src="../Semantic/semantic.js"></script>
    <script src="../Semantic/semantic.min.js"></script>  
	<link rel="stylesheet" type="text/css" href="../semantic1/semantic.min.css">
	<script src="../semantic1/semantic.min.js"></script>
    <script src="../Semantic/package.js"></script>
	<link href="style1.css" type="text/css" rel="stylesheet" />
	<link href="print.css" rel="stylesheet" type="text/css" media="print"> 
	<link href="screen.css" rel="stylesheet" type="text/css" media="screen">
	
</head>
<style>


#card{
width:1100px;
left:200px;
height:1000px;
}


#logo{
width:300px;
}
body{
background:url('bg2.png');
}
</style>

<body>

<div class="no_print">
<div class="ui inverted menu">
	<a class="item">Location:</a>
	<a class="item">Bangalore</a>
	<a class="item "><img src="ph.png">08024567543</img></a>
	<a class="item "><img src="images.png">Favourites</img></a>
	<div class="right menu">
		<div class="ui simple dropdown item">New User? <i class="dropdown icon"></i>
		<div class="menu">
			<a class="item">What is "what's Up market"</a>
			<a class="item">About Us</a>
			<a class="item">Product Quality</a>
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
</div>
</div>
<div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card" >
	<div class="no_print">
	<div class="ui grid container">
		<div class="row">

			<div class="three wide column">
				<div class="column">
					<img src="logo.png" id="logo">
				</div>
			</div>
		</div>
	</div>
	</div>
	<table id = "bill">
		<td>Name and Address of Shopping Mall</td>
<?php
	$name = "xyz";
	$email = "something@gmail.com";
	$phone = "1234567890";
	
	$cid = $_COOKIE['id'];
	//$cid = 201;
	
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "supermarket";
	$mid="";
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$query = "SELECT Name,Email_id,Contact_No from customer where C_ID='".$cid."'";
	$result = $conn->query($query);
	
	$row = $result->fetch_assoc();
	$name = $row["Name"];
	$email = $row["Email_id"];
	$phone = $row["Contact_No"];
	
		echo "<table id = 'customer_info'>";
		echo  "<tr><td>Name:</td><td id='customer_name' colspan='3'>".$name."</td></tr>";
		echo  "<tr><td>Email:</td><td id='customer_email' colspan='3'>".$email."</td></tr>";		
		echo  "<tr><td>Phone:</td><td id='customer_phone' colspan='3'>".$phone."</td></tr>";		
		echo "</table>";	
	
	$status = "Pending";
	$query = "SELECT o_id from supermarket.order where c_id='".$cid."'";
	$result = $conn->query($query);
	
	$row = $result->fetch_assoc();
	$oid = $row["o_id"];
		
		echo "<table id = 'purchase_info'>";
		echo "<tr><th>Sl No.</th><th>Name</th><th>Quantity</th><th>Cost</th></tr>";
	
	$query = "SELECT i_id,quantity,price from order_details where o_id='".$oid."'";
	$result = $conn->query($query);
	
	$sl_no = 1;
	$total = 0;
		while ($row = $result->fetch_assoc())
		{
			$q = "SELECT Item_Name from items where I_ID='".$row['i_id']."'";
			$r = $conn->query($q);
			$n = $r->fetch_assoc();
			
			$item_name = $n["Item_Name"];
			$item_quantity = $row["quantity"];
			$item_price = $row["price"];
			echo "<td>".$sl_no."</td><td>".$item_name."</td><td>".$item_quantity."</td><td>".$item_price."</td>";
			$sl_no += 1;
			$total += $item_price;
		}
		echo "<tr><th colspan=3>Total</th><th>".$total."</th>";
		echo "</table>";
?>		
	</table>

	<p>
	<input type="button" value="Print" onclick = "window.print()" id="print_button"/>

</div>
	

</div>
<!-- Insert your code here !-->

<!--end!-->

</body>
</html>