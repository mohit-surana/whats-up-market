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
       while($row = $result->fetch_assoc() )
          $mname = $row['Name'];
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
						<div class = "col-md-12" align="center"><input class = "btn btn-raised btn-primary" type="submit" name='submit' value="Login" onsubmit="alert(document.getElementById('id').value);"></div>
		            </div>	
		        </form>
		       </div>
			   
			    <?php
                session_start();
                if(isset($_POST['submit']))
                {
					$id=$_POST['id'];
					$pwd=$_POST['pwd'];
					if($id!=''&&$pwd!='')
					{
						$sql = "SELECT C_ID from customer where Email_id = '".$id."'";
						$result1 = $conn->query($sql);
						
						if($result1->num_rows > 0)				//Check if email id has been accessed 
						{ 
							$row = $result1->fetch_assoc();		//To Access C_ID of the email
							$sql = "SELECT password from customer_login where C_ID = '".$row['C_ID']."'";
							$result2 = $conn->query($sql);		// Query to access password associated with the C_ID
							
							//Check if password entered matches the one in the Database
							if($result2->fetch_assoc()['password'] != $pwd)
								echo "Password Do not Match!";
							
							//If password matches set the cookie and forward the request
							else			
							{
								$cookie_name = 'id';
								$cookie_value = $row['C_ID'];
								setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
								header('location:../main/user.php');
							}
						} 
						else									//If Email was not accessed Display the error msg.
						{
						   echo "Email-ID Entered is Not Correct!";	 
						}
					}
					else										//If Email or password was not entered display the error msg.
					{
						echo'Enter Both Username and Password';
					}
					
                }

				  ?>

				
    </div>
    </div>
  </body>
</html>