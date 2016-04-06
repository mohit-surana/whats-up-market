<?php 
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 if(isset($_COOKIE['id'])){     //checks if this username was set (atleast once)
    $user_name =  $_COOKIE['id'];  
    if($user_name == "none"){               //if he hasnt signed in, it ll go to another page just to prompt him to sign in. else continue
      header('location:validation.php');
    }
}
else header('location:validation.php');
  $cid = $_COOKIE['id'];

?>
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
<body>
	<nav class="navbar navbar-default" >
  <div class="container-fluid" style="background-color:#030303;height:100px">
    <div class="navbar-header col-md-6 text-center">
      <h1 style="color:white;margin-top:30px">Welcome <?php echo $cid?></h1>
    </div>
    <ul class="nav navbar-nav " style=" margin-left:250px;padding-top:30px;color:#e0e0e0">
      <li><a href="#" style="color:white" >Home</a></li>
      <li><a href="#"><i class="material-icons" style=" margin-right:10px;color:white">sms</i></a></li>
      <li><img src="pic.jpg" height="40px" width="50px" ></li>
      <li><a href="Cashier_Signout.php" style="color:white" >Signout</a>
    </ul>
  </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
        <div class="list-group" style="margin-right:-15px;margin-left:2px">
    <a href="Manager_Employee_View.php" class="list-group-item "><h4>Employee</h4></a>
    <a href="Manager_Customer_View" class="list-group-item"><h4>Customer</h4></a>
    <a href="#" class="list-group-item"><h4>Accounts</h4></a>
    <a href="#" class="list-group-item"><h4>Supply</h4></a>
    <a href="#" class="list-group-item"><h4>Products</h4></a>
    <a href="#" class="list-group-item"><h4>Analysis</h4></a>
  </div>
      </div>
       <div class="col-md-9 container">
        <img src="pic.jpg" style="margin-left:300px">
        <div style="text-align:center">
           <h3>XYZ</h3><br>
           <h4>Designation : </h4>  Store Manager<br>
            <h4>Experience : </h4>  Two years of experience as Store manager at Big Bazaar. 

       </div>
      </div>
  </div>

</body>
</html>