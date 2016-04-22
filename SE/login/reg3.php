<?php
session_start();

$usr=$_POST['username'];
$pwd=$_POST['password'];
$email=$_SESSION['email'];
$ph=$_SESSION['ph'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";
$mid="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql ="INSERT INTO customer VALUES(NULL, '".$usr."', '".$email."','".$ph."');";
$result = $conn->query($sql);

$sql = "SELECT C_ID from customer where Email_id = '".$email."'";
//$sql = "SELECT C_ID from customer where Email_id = 'jaja1@gmail.com'";
$result = $conn->query($sql);
$cid="";

while($row = $result->fetch_array())
{
	$cid=$row["C_ID"];	
}

$sql4 = "INSERT INTO customer_login VALUES($cid, '".$pwd."')";
//$sql4 = "INSERT INTO customer_login VALUES($cid, 'paaaaaa')";
$result8 = $conn->query($sql4);
 


?>
<html>
  <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-1.12.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>                
        <script src="../Semantic/package.js"></script></head>
        <style>
          body{
             background:url('background.jpg');
              padding:50px;
          }
          #id{
          	width: 500px;
          }
        </style>
        <script>
   
    </script>

  </head>
  <body id="b" onload="init()">  
    <nav class="navbar navbar-default">
     <div class="container-fluid">
     
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
  <a class="navbar-brand" href="../main/main.html">What's Up Market!</a>
      
      </div>

     
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form id="signin" class="navbar-form navbar-right" role="form" action = "" method = "post">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="email" class="form-control" name="username" value="" placeholder="Username">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-raised btn-default">Login</button>
          <input type="hidden" name="title" value="LOGIN">
        </form>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
	<div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      Done!
    </div>
  </div>
<br>
  <div align = "center">
  <div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card">
              <div class="content">
                <div class="header">SignUp</div>
              </div>
              <div>
				<form action="login.php" method="post" onsubmit="">
		            <div align="center"> 
					<p>Registration Done! Please Login!</p>
					<br>
		            <div class = "col-md-12" align="center"><input class = "btn btn-raised btn-primary" type="submit" value="Login"></div>
		            </div>
		        </form>
		       </div>
    </div>
    </div>
  </body>
</html>