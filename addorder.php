<html>
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
 
	//////////////////////////////////////////////////////////////////////////////
	$item = $_POST['item'];  //get array of chosen items
	$quantity = $_POST['quantity'];  //get array of the quantity of each chosen item
	/*foreach($quantity as $value)
		echo $value." ";
	echo "<br>";
	foreach($item as $value)
		echo $value." ";
	echo "<br>";*/
	$sql = "SELECT MAX(`t_id`) as t_id FROM `transaction`";   //get the transaction-id of the last transaction
	$tid = "";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$tid = $row["t_id"];
			$tid+=1;
        }
    }
	echo $tid ;
	$totalprice=0; // initialize total price of this order.
	$status="pending";
	$sql = "INSERT INTO `transaction` (`t_id`, `date`, `time`, `total_price`, `status` ) VALUES ('$tid', CURRENT_DATE(), CURRENT_TIME(), '$totalprice', '$status')";
	
	$result = $conn->query($sql);
	for($i = 0; $i<38; $i++)
   	{
		echo $i . "</br> ";
   		if(isset($item[$i]))
		{
			echo "item id:".$item[$i];  //get item_id of the chosen item
			echo "quant :".$quantity[$i]; //get quantity of the chosen item
			//write query to get price of product
			//store in var
			$price = "";
			$finalquantity=0;
			
			$sql = "select * from `items` where I_ID='$item[$i]'";  //select item whose id equals id of this chosen item to get its price
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$price = $row["Price"];
					
				}
			}
			
			$sql= "SELECT v_id from commodity where i_id= '$item[$i]'";
			
			$result=$conn->query($sql);
			//$vendor_name=$_POST['vname']; //get the name of the vendor from whom the product is being bought
			//$sql= "select v_id from vendor where name='$vendor_name'"; // get the vendor id of this vendor
			//$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
				{
					$vid=$row["v_id"];
				}
			}
			$totalprice=$totalprice+$price*$quantity[$i];  //find total price so far of all items being chosen
			$sql = "INSERT INTO `supermarket`.`transaction_details` (`t_id`, `v_id`, `i_id`, `quantity`) VALUES ( $tid, '$vid', '$item[$i]', '$quantity[$i]')";
			//echo $sql;
			$result = $conn->query($sql);
			if($conn->query($sql)==TRUE) echo "item inserted";

			//increase stocks
			$sql="select quantity from stock where i_id='$item[$i]'";  //find the quantity of the item before this order.
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
				{
					$quantity1= $row["quantity"];
				}
			}
			$finalquantity= $quantity1 + $quantity[$i];  // the new quantity of the item after this order 
			$sql= "update stock set quantity='$finalquantity' where i_id= '$item[$i]'"; 
			//update the db with the new value of the quantity for this item
			$result = $conn->query($sql);
			//get stock from barcode
			//$sql = "SELECT ";
			//header('location:Cashier_Offline.php');

		   /* $val = $item[$i];
			echo "item id $val";
			$q = $quantity[$i];
			$price = 0;
			$sql = "Select price from items where itemid=$val";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			$price = $row["price"];
			}
			}
			$price =$price * $q;

			if(isset($coupon[0]))
			{
			  
			 $sql = "Insert into orders values( '$oid', '$val','$q' ,'$price' , '$cid', '$coupon', CURRENT_DATE(),CURRENT_TIME() )";
			}
			else $sql = "Insert into orders values( '$oid', '$val','$q' ,'$price' , '$cid', 'XYZ111', CURRENT_DATE(),CURRENT_TIME() )";
			if($conn->query($sql)==TRUE) echo "ORDER PLACED";
			  //echo "items recorded";
			else echo "Error ".$sql. "<br>".$conn->error;;*/
		}
	}
	$sql= "update transaction set total_price='$totalprice' where t_id= '$tid'"; 
	 // make an entry in transaction table to insert this transaction
	if($conn->query($sql)==TRUE) echo "ORDER PLACED";
	header( "refresh:5; url=Manager_Supply_AddOrder.php" );
?>
</html>