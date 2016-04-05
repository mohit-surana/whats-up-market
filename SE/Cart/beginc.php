
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$c=0;
if(!empty($_SESSION["cart_item"]))
    {
	foreach ($_SESSION["cart_item"] as $item)
	{$c=$c+1;}
	}
	echo "Cart($c)";
	?>