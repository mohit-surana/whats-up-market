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
      }
      function Back()
      {
        window.location = "Cashier_Online.php";
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
      <div id="side" class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100; height:100%" >
          <div class="list-group" style="margin-right:-15px;margin-left:2px">
            <a href="Cashier_Offline.php" class="list-group-item "><h4>Offline Order</h4></a>
            <a href="Cashier_Online.php" class="list-group-item"><h4>Online Order</h4></a>
            
            <a href="Cashier_Notifications" class="list-group-item"><h4>Notifications</h4></a>
         </div>
      </div>
      <div class="col-md-9" >
        <?php 
          $oid =  $_COOKIE['bill'];
          echo "<h1Bill Summary</h1>";
          echo "<h3>Order Id:<span style = \"font-weight:normal; font-size:15px\" >"." ".$oid."</span></h3>";
          $sql = "SELECT * FROM `order` where o_id = '$oid'";
           $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
        
              while($row = $result->fetch_assoc() ){
              $c_id = $row['c_id'];
              $date = $row['date'];
              $time = $row['time'];
              $q = "SELECT * FROM `customer` WHERE C_ID = '$c_id' ";
              $result2 = $conn->query($q);
              while($row2 = $result2->fetch_assoc() ){
                $name = $row2['Name'];
              }
            }
           }

          echo "<h3>Customer Name:<span style = \"font-weight:normal; font-size:15px\" >"." ".$name."</span></h3>";  
          echo "<h3>Time :<span style = \"font-weight:normal; font-size:15px\" >"." ".$time."</span></h3>";
          echo "<h3>Date :<span style = \"font-weight:normal; font-size:15px\" >"." ".$date."</span></h3>";
          echo "<h3>Items :</h3>";
          echo "<table class=\"table table-bordered\">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>";
          $sql = "SELECT * FROM `order_details` WHERE o_id = '$oid'";
           $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
        
              while($row = $result->fetch_assoc() ){
                $i_id = $row['i_id'];
                $quant = $row['quantity'];
                $price = $row['price'];
                $sql2 = "Select * from `items` WHERE I_ID = '$i_id'";
                $result2 = $conn->query($sql2);
                //echo $i_id;
                if($result2->num_rows > 0)
                {            
                  while($row2 = $result2->fetch_assoc() ){
                      //echo "hi";
                    $iname = $row2['Item_Name'];
                    echo "<tr>";
                    echo "<td>".$iname."<td>".$quant."<td>".$price."</h5>";
                    echo "</tr>";
                  }
                }
            }
           }
           $sql = "Update `order` SET status = 'Delivered' where o_id='$oid'";
           $result = $conn->query($sql);
           
        ?>
        <button onclick="Back()">Print and Return</button>
      </div>
       
    </div>

</body>
</html>