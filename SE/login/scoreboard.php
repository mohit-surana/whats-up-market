<?php 
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "cns";
$mname= "";
$mid="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 if(isset($_COOKIE['id'])){     //checks if this username was set (atleast once)
	 
 $mid = $_COOKIE['id'];


    
	




 }
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
</head>
<style>
body{
              background:url('bg2.png');
              padding:50px;
          }
</style>		  
<body>
<h1><center>SCOREBOARD</center></h1>
<div class="progress" style="margin-top:30px;"> &nbsp
<?php 
	 $sql = "select Points from student where T_no ='team#1' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:blue">
      Team #1
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#2' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points   
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;">
      Team #2
    </div>  
 </div>
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#3' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points   
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"style="width:<?php echo $mname/500*100?>%;background-color:red">
      Team #3
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#4' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points   
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:pink;color:black">
      Team #4
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#5' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points   
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:yellow">
      Team #5
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
  <?php 
	 $sql = "select Points from student where T_no ='team#6' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points  
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:purple">
      Team #6
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#7' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points   
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:orange">
      Team #7
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#8' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points 
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;;background-color:magenta;color:white">
      Team #8
    </div>  
 </div>
 
 <div class="progress" style="margin-top:60px;"> &nbsp
<?php 
	 $sql = "select Points from student where T_no ='team#9' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points    
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:grey">
      Team #9
    </div>  
 </div>
 
 
 <div class="progress" style="margin-top:60px;"> &nbsp
 <?php 
	 $sql = "select Points from student where T_no ='team#10' ";
	 
$result = $conn->query($sql);

       $row = $result->fetch_assoc(); //{
          $mname = $row['Points'];
		  echo $mname;
?> Points   
	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $mname/500*100?>%;background-color:black;color:white">
      Team #10
    </div>  
 </div>
 
 </body>
 </html>