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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
        <div class="list-group" style="margin-right:-15px;margin-left:2px">
    <a href="Manager_Employee_View.php" class="list-group-item"><h4>Employee</h4></a>
    <a href="Manager_Customer_View.php" class="list-group-item active"><h4>Customer</h4></a>
    <a href="#" class="list-group-item"><h4>Accounts</h4></a>
    <a href="#" class="list-group-item"><h4>Supply</h4></a>
    <a href="#" class="list-group-item"><h4>Products</h4></a>
    <a href="#" class="list-group-item"><h4>Analysis</h4></a>
  </div>
      </div>
      <div class="col-md-9 container">
        <ul class="nav nav-tabs nav-justified" style="margin-left:-105px;margin-top:-21px">
        <li><a href="Manager_Customer_View.php">View</a></li>
        <li class="active"><a href="Manager_Customer_Search.php">Search</a></li>
        <li><a href="Manager_Customer_PendingOrders.php">Orders</a></li>
        </ul>
      <div class="tab-content">
					
							<h3>Search</h3>
							<p>Provide details to search. Search by- </p>
							<form action="searchcustomer.php" method="post">
								<input type="radio" id="customer_search" name="customer_search" value="1"> Name of the customer</input> </br>
								<input type="radio" id="customer_search" name="customer_search" value="2"> ID of the customer</input> <br/> <br/>
								<input type="text" name="searchfor"/>
								<button type="submit"> SUBMIT</button>
							</form>
					
				</div>
    </div>
  </div>

</body>
</html>
