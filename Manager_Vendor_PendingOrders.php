<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="man.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<?php
	$servername = "localhost";
	$username = "root";
	$password = '';
	$db = "supermarket";
	
	$conn = new mysqli($servername, $username, $password, $db);
	
	if($conn->connect_error)
		die("Connection Failed:" . $conn->connect_error);
	
	//echo "connected sucessfully";
	//$conn->close();
?>
<body>
	<nav class="navbar navbar-default" >
  <div class="container-fluid" style="background-color:#030303;height:100px">
    <div class="navbar-header col-md-6 text-center">
      <h1 style="color:white;margin-top:30px">Welcome XYZ</h1>
    </div>
    <ul class="nav navbar-nav " style=" margin-left:200px;padding-top:30px;color:#e0e0e0">
      <li><a href="Manager_Profile.php" style="color:white" >Profile</a></li>
      <li><a href="Manager_Portal.php" style="color:white" >Portal</a></li>
      <li><a href="#"><i class="material-icons" style=" margin-right:10px;color:white">sms</i></a></li>
      <li><img src="pic.jpg" height="40px" width="50px" ></li>
      <li><a href="Manager_Signout.php" style="color:white" >Signout</a>
    </ul>
  </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
        <div class="list-group" style="margin-right:-15px;margin-left:2px">
    <a href="Manager_Employee_View.php" class="list-group-item "><h4>Employee</h4></a>
    <a href="Manager_Customer_View.php" class="list-group-item active"><h4>Customer</h4></a>
    <a href="#" class="list-group-item"><h4>Accounts</h4></a>
    <a href="#" class="list-group-item"><h4>Supply</h4></a>
    <a href="#" class="list-group-item"><h4>Products</h4></a>
    <a href="#" class="list-group-item"><h4>Analysis</h4></a>
  </div>
      </div>
      <div class="col-md-9 container">
        <ul class="nav nav-tabs nav-justified" style="margin-left:-105px;margin-top:-21px;">
        <li class="active" ><a href="Manager_Customer_View.php" style="font:bold 20px;">View</a></li>
        <li><a href="Manager_Customer_Search.php">Search</a></li>
        <li><a href="Manager_Customer_Details.php">Details</a></li>
        <li><a href="Manager_Customer_PendingOrders.php">Pending orders</a></li>
        </ul>
<?php
	$sql = "SELECT FROM transaction WHERE status LIKE '%pending%'";
	$result = $conn->query($sql);
	echo "<br/>";
	echo "<table class = 'table table-bordered' style='margin-left:-90px;margin-top:-10px'>";
	echo "<thead>
      <tr>
	     <th>TRANSACTION ID</th>
         <th>VENDOR ID</th>
         <th>DATE_OF_TRANSACTION</th>
		 <th>TIME_OF_TRANSACTION</th>
		 <th>TOTAL_PRICE</th>
      </tr>
   </thead>	
   <tbody>";
	if ($result->num_rows > 0)
	{

		while($row = $result->fetch_assoc())
		{
			echo " <tr>
						 <td>".$row["t_id"]."</td>
						 <td>".$row["v_id"]."</td>
						 <td>".$row["date"]."</td>
						 <td>".$row["time"]."</td>
						 <td>".$row["total_price"]."</td>
					  </tr>";
		}
	}
	echo "</tbody>
		</table>";
	
?>
    </div>
  </div>

</body>
</html>

