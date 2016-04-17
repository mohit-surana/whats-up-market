<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "supermarket";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	if(isset($_COOKIE['id']))
	{     
		//checks if this username was set (atleast once)
		$user_name =  $_COOKIE['id'];  
		if($user_name == "none" || $user_name != '103')
		{    
			//if he hasnt signed in, it ll go to another page just to prompt him to sign in. else continue
			header('location:validation.php');
		}
	}
	else header('location:validation.php');
	$mid = $_COOKIE['id'];
	$mname= "";
	$sql = "select * from employee where E_ID ='".$mid."' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc() )
		{
			$mname = $row['Name'];
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
			side = document.getElementById("side");
			side.style.height = screen.height+50+"px";
		}
		function srch()  //for the search bar at the bottom of the page
		{
			str = document.getElementById('searchbar').value;
			find(str);
			return false;
		}
		function runScript(e) 
		{
			if (e.keyCode == 13) 
			{
				e.preventDefault();
				 srch();
			}
			return true;
		}
	</script>
	
</head>
<body onload="init()">
	<nav class="navbar navbar-default" >
		<div class="container-fluid" style="background-color:#030303;height:100px">
			<div class="navbar-header col-md-6 text-center">
				<h1 style="color:white;margin-top:30px">Welcome <?php echo $mname?> !</h1>
			</div>
			<ul class="nav navbar-nav " style=" margin-left:250px;padding-top:30px;color:#e0e0e0">
				<li><a href="Manager_Profile.php" style="color:white" >Profile</a></li>
				<li><a href="Manager_Portal.php"><i class="material-icons" style=" margin-right:10px;color:white">sms</i></a></li>
				<li><img src="pic.jpg" height="40px" width="50px" ></li>
				<li><a href="Manager_Signout.php" style="color:white" >Signout</a>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div id ="side" class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
				<div class="list-group" style="margin-right:-15px;margin-left:2px">
					<a href="Manager_Employee_View.php" class="list-group-item "><h4>Employee</h4></a>
					<a href="Manager_Customer_View.php" class="list-group-item"><h4>Customer</h4></a>
					<a href="Manager_Accounts_Summary.php" class="list-group-item"><h4>Accounts</h4></a>
					<a href="Manager_Supply_ViewVendor.php" class="list-group-item active"><h4>Supply</h4></a>
					<a href="Manager_Product_View.php" class="list-group-item"><h4>Products</h4></a>
				</div>
			</div>
			<div class="col-md-9 container">
				<ul class="nav nav-tabs nav-justified" style="margin-left:-105px;margin-top:-21px">
					
						<li><a href="Manager_Supply_ViewVendor.php">View Vendors</a></li>
						<li><a href="Manager_Supply_AddVendor.php">Add Vendor</a></li>	
						<li><a href="Manager_Supply_AddProduct.php">Add Products to Vendor </a></li>
						<li class="active"><a href="Manager_Supply_AddOrder.php"> Place Order </a></li>
				</ul>
				<?php 
					$sql = "SELECT I.Item_Name, I.I_ID, v.name,V.v_id, C.price FROM vendor as V, commodity as C, items as I WHERE V.v_id=C.v_id and C.i_id= I.I_ID ORDER BY I.Item_Name ASC ";
					//echo $sql;
					$result = $conn->query($sql);
					$slno = 1;
					$counter = 1;
					echo "<form role='form' action='update1.php' method='post'>
                        <div class='form-group'>
							<table class=\"table table-hovered table-bordered\">
								<thead>
									<tr>
										<th>Sl no</th>
										<th>Item</th>
										<th>Vendor</th>
										<th>Price</th>                                    
									</tr>
								</thead>
								<tbody >";
					if($result->num_rows > 0)
					{
                  
						while($row = $result->fetch_assoc())
						{
							$cname = $row['Item_Name'];
							$vname= $row['name'];
							$price = $row['price'];
							$i_id = $row['I_ID'];
							
							echo "<div id=\"".$cname."\"><tr><td> ".$slno."</td><td>".$cname."<td> ".$vname."</td><td>".$price. "<br><input type=\"checkbox\" name=\"item[$counter]\" value=\"$i_id\">
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
					type="text" autofocus  onkeypress="return runScript(event)"/>
				</h5>
       
			</div> 
		</div>
	</div>
</body>
</html>























