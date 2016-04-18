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
    if($user_name == "none" || $user_name == '103'){               //if he hasnt signed in, it ll go to another page just to prompt him to sign in. else continue
      header('location:validation.php');
    }
}
else header('location:validation.php');
  $cid = $_COOKIE['id'];
  $cname= "";
  $cimg ="";
$sql = "select * from employee where E_ID ='".$cid."' ";
$result = $conn->query($sql);
 if($result->num_rows > 0)
    {
      
       while($row = $result->fetch_assoc() ){
          $cname = $row['Name'];
          $cimg = $row['image'];
       }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="man.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function init()
      {
        //alert("hi");
        side = document.getElementById("side");
        //alert(window.innerHeight);
        side.style.height = screen.height+50+"px";
        //document.getElementById('Pear').scrollIntoView();
      }
      function srch()
      {
        str = document.getElementById('searchbar').value;
       find(str);
       return false;
      }
      function runScript(e) {

      if (e.keyCode == 13) {
        //alert("hi");
          e.preventDefault();
          srch();
          //var tb = document.getElementById("searchbar").value;
          //find(tb);
          //return false;
          }
          return true;
      }
    </script>
</head>
<body onload="init()">
	<nav class="navbar navbar-default" >
  <div class="container-fluid" style="background-color:#030303;height:100px">
    <div class="navbar-header col-md-6 text-center">
      <h1 style="color:white;margin-top:30px">Welcome <?php echo $cname?> !</h1>
    </div>
    <ul class="nav navbar-nav " style=" margin-left:300px;padding-top:30px;color:#e0e0e0">
      <li><a href="#"><i class="material-icons" style=" margin-right:10px;color:white">sms</i></a></li>
      <li><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $cimg ).' alt="" height="60px" width="50px"/>'; ?></li>
      <li><a href="Manager_Signout.php" style="color:white" >Signout</a>
    </ul>
  </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div id="side" class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
          <div class="list-group" style="margin-right:-15px;margin-left:2px">
            <a href="Cashier_Offline.php" class="list-group-item active"><h4>Offline Order</h4></a>
            <a href="Cashier_Online.php" class="list-group-item"><h4>Online Order</h4></a>
          
            <a href="Cashier_Notifications.php" class="list-group-item"><h4>Notifications</h4></a>
         </div>
      </div>
      <div class="col-md-9"> 
          
           <h4>Find items with barcode <a href="Cashier_Select_ItemBarcode.php"><span class="glyphicon glyphicon-chevron-right"></span>  </a> </h4>
           <br>
          <h4> Find items with name <a href="Cashier_Select_ItemName.php"> <span class="glyphicon glyphicon-chevron-right"></span> </a></h4>
        </div>  
      </div>
      
    </div>

</body>
</html>