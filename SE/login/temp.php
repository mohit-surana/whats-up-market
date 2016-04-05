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
    if($user_name == '103'){               //if he hasnt signed in, it ll go to another page just to prompt him to sign in. else continue
      header('location:Manager_profile.php');
    }
    elseif ($user_name != 'none') {
      header('location:index.html');
    }
}
$mid = $_COOKIE['id'];
$mname= "";
$sql = "select * from employee where E_ID ='".$mid."' ";
$result = $conn->query($sql);
 if($result->num_rows > 0)
    {
      
       while($row = $result->fetch_assoc() ){
          $mname = $row['Name'];
       }
    }


?>
<!DOCTYPE HTML>
<html>
<head>
	 <title>
	 	Login
	 </title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<style>
body{
              background:url('background.jpg');
              padding:50px;
          }
          #id{
          	width: 500px;
          }
		  </style>
<body>

     <body id="b" >  
    
     
  

  <br>
  <br>
  <br>
  <br>
	<br>
<br>
  <div align = "center">
  <div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card">
              <div class="content">
                <div class="header">Log In</div>
              </div>

   	<div class="col-md-4"></div>
   	<div class="col-md-4">
     <h1>Sign In : </h1><br> 
   		<form role="form" action = "#" method ="post">
               <div class="form-group">
              User name : <input type = "text" class="form-control"  name="id" placeholder="Enter Name"><br>
              </div>
              <div class="form-group">
              Password :<input type = "password"  class="form-control" name="pwd" placeholder="Enter Password"><br>
             </div>
              <input type="submit" name='submit' value='Sign In'>
     </form> 
     <?php
                 
                session_start();
                if(isset($_POST['submit']))
                {
                mysql_connect('localhost','root','') or die(mysql_error());
                mysql_select_db('supermarket') or die(mysql_error());
                $id=$_POST['id'];
                $pwd=$_POST['pwd'];
                 
                 if($id!=''&&$pwd!='')
                 {
                   $query=mysql_query("select * from customer_login where C_ID='".$id."' and password='".$pwd."'") or die(mysql_error()) ;
                   $res=mysql_fetch_row($query);
                   if($res)
                   {
                    $_SESSION['id']=$id;
                    if($id == '103')
                      header('location:index.html');
                    else header('location:index.html');
                    $cookie_name = 'id';
                    $cookie_value = $id;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                     }
                     else
                     {
                      echo'The entered username or password is incorrect';
                     }
                   }
                   else
                   {
                    echo'Enter both username and password';
                   }
                  }


                  ?>

           
   	</div>
	</div>
   </div>
</body>
</html> 