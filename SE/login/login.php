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
 if(isset($_COOKIE['id'])){     //checks if this username was set (atleast once)
	 
      //header('location::../main/user.php');
	  setcookie('id', 'none', time() + (86400 * 30), "/");
	


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
              <div>
              <form role="form" action = "#" method ="post" >
              		<div class = "form-group">
		            <div class = "col-md-12"><input type = "text" class="form-control"  name="id" placeholder="Enter Name"></div></div>
		            <br>
					<div class = "form-group">
					<div class = "col-md-12"><input type = "password"  class="form-control" name="pwd" placeholder="Enter Password"> </label></div>
		            </div>
					<input type="hidden" name="title" value="REGISTER">
		            <div align="center"> 
		            <div class = "col-md-12" align="center"><input class = "btn btn-raised btn-primary" type="submit" name='submit' value="Login"></div>
		            </div>
					
					
					
					
					
					
		        </form>
		       </div>
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
                      header('location::../main/user.php');
                    else header('location:../main/user.php');
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
  </body>
</html>