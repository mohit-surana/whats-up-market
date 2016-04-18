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
        <a onclick="srch()" style="left:315px;bottom:10px;z-index:1005;position:fixed"><span class="glyphicon glyphicon-search"></span></a>
        <div>
          <?php 
           $sql = "Select * from `items` ORDER BY `Item_Name` ASC ";
            //echo $sql;
            $result = $conn->query($sql);
              $slno = 1;
              $counter = 1;
               echo "<form role=\"form\" action=\"update.php\" method=\"post\">
                        <div class='form-group'>
                        Customer name : <input type=\"text\" name='name'/><br><br>
                        Email id : <input type=\"text\" name='id'/><br><br>
                        Phone number : <input type=\"tel\" name='tel'/><br>
                        <br>
                        <table class=\"table table-hovered table-bordered\">
                              <thead>
                                 <tr>
                                    <th>Sl no</th>
                                    <th>Item</th>
                                    <th>Price</th>                                    
                                 </tr>
                              </thead>
                              <tbody >";
             if($result->num_rows > 0)
                {
                  
                   while($row = $result->fetch_assoc() ){
                      $cname = $row['Item_Name'];
                      $price = $row['Price'];
                      $i_id = $row['I_ID'];
                      //echo "<h2>Select quantity</h2>";
                      /*echo "<br />";
                      echo "<h4>Name :<span style = \"font-weight:normal; font-size:15px\" >"." ".$cname."</span></h4>";
                      echo "<h4>Price :<span style = \"font-weight:normal; font-size:15px\" >"." ".$price."</span></h4>";
                      //echo "<form action='update.php'>";
                      echo "<h4>Quantity : <input type='text' name='quant'><span><button class='glyphicon glyphicon-plus'></button></span></h4>";
                      //echo "<button class='glyphicon glyphicon-plus'></button>";
                      //echo "</span>";
                     // $cimg = $row['image'];*/
                   
                      echo "<div id=\"".$cname."\"><tr><td> ".$slno."</td><td>".$cname."<td>".$price. "<br><input type=\"checkbox\" name=\"item[$counter]\" value=\"$i_id\">
            <br>Quantity : <input type =\"text\" name=\"quantity[$counter]\"></td></tr></div>";
            $slno++;
            $counter++;         
                   }
                }
                echo "</tbody>";
                echo "</table>";
                echo "<input type='submit' style='right:100px;position:absolute;bottom:10px;margin-top:10px'>";
                echo "</div>";
                echo "</form>";
          ?>
        </div> 
        <div  style="position:fixed; width:350px; left:0px;bottom:0px;z-index:1000;background-color:#e0e0e0">
        
          <h5 style="margin:2 50 2 2; color:black;padding-left:5px;padding-right:5px;" >Search for items : <input id="searchbar" style="color:black" 
            type="text" autofocus  onkeypress="return runScript(event)"/></h5>
       
        </div>  
      </div>
      
    </div>

</body>
</html>