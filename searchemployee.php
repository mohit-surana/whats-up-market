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
<?php
	$servername = "localhost";
	$username = "root";
	$password = '';
	$db = "supermarket";
	
	$conn = new mysqli($servername, $username, $password, $db);
	
	if($conn->connect_error)
		die("Connection Failed:" . $conn->connect_error);
	
	//echo "connected sucessfully";
	//$conn->close();
?>
<body>
	<nav class="navbar navbar-default" >
		<div class="container-fluid" style="background-color:#030303;height:100px">
			<div class="navbar-header col-md-6 text-center">
				<h1 style="color:white; margin-top:30px">Welcome XYZ</h1>
			</div>
			<ul class="nav navbar-nav " style=" margin-left:250px;padding-top:30px;color:#e0e0e0">
				 
				
				<li><a href="Manager_Profile.php" style="color:white" >Profile</a></li>
				<li><a href="Manager_Portal.php" style="color:white">Portal</a></li>
				<li><a href="#"><i class="material-icons" style=" margin-right:10px;color:white">sms</i></a></li>
				<li><img src="pic.jpg" height="40px" width="50px" ></li>
				<li><a href="Manager_Signout.php" style="color:white" >Signout</a>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
				<div class="list-group" style="margin-right:-15px;margin-left:2px">
					<a href="Manager_Employee_View.php" class="list-group-item active"><h4>Employee</h4></a>
					<a href="Manager_Customer_View.php" class="list-group-item"><h4>Customer</h4></a>
					<a href="#" class="list-group-item"><h4>Accounts</h4></a>
					<a href="Manager_Supply_ViewVendors.php" class="list-group-item"><h4>Supply</h4></a>
					<a href="#" class="list-group-item"><h4>Products</h4></a>
					<a href="#" class="list-group-item"><h4>Analysis</h4></a>
				</div>
			</div>
			
			
			<div class="col-md-9 container">
				<ul class="nav nav-tabs nav-justified" style="margin-left:-105px;margin-top:-21px">
					
						<li><a href="Manager_Employee_View.php">View employees</a></li>
						<li><a href="Manager_Employee_Add.php">Add employee</a></li>	
						<li><a href="Manager_Employee_Search.php">Search </a></li>
				</ul>
				<br/>
				<br/>
				<div style="padding-left:'30px';margin-left:30px;">
					<?php
				
						if($_POST['emp_search']=="")
						{
							echo "You did not choose an option. Please choose either name or ID of the employee to search";
						}
						else
						{
					
							if($_POST['emp_search']==2)
							{
								$emp_id = $_POST['searchfor'];
								$sql =" SELECT E_ID,Name,Salary,Contact_No,image FROM employee where E_ID='".$emp_id."'";
								$result = $conn->query($sql);
								
								
							}
							else
							{
								$emp_name = $_POST['searchfor'];
								$sql =" SELECT E_ID,Name,Salary,Contact_No,image FROM employee where Name LIKE '%".$emp_name."%'";
								$result = $conn->query($sql);
								
							}
					
							echo "<br/>";
							
							if ($result->num_rows > 0)
							{
								echo "<table class='table table-striped' class = 'table table-bordered' style='margin-left:-90px;margin-top:-10px '>";
								echo "<thead>
									<tr>
										<th>Employee ID</th>
										<th>Name</th>
										<th>Salary</th>
										<th>Contact No.</th>
										<th>Image</th>
									</tr>
								</thead>
								<tbody>";

								while($row = $result->fetch_assoc())
								{
									echo " <tr>
										<td>".$row["E_ID"]."</td>
										<td>".$row["Name"]."</td>
										<td>".$row["Salary"]."</td>
										<td>".$row["Contact_No"]."</td>";
									echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).' alt="" height="90px" width="90px"/></td>';
									echo "</tr>";
								}
							}
							else
							{
								echo "No results found";
							}
							echo "</tbody>
							</table>";
						}
				
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>