<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$nquantity=$_GET["quantity"];
	$c=0;
	
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_GET["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM items WHERE I_ID='" . $_GET["I_ID"] . "'");
			if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["I_ID"]==$productByCode[0]["I_ID"])
				$nquantity=$item["quantity"]+$_GET["quantity"];	
			    
			     }
		    }
			$itemArray = array($productByCode[0]["I_ID"]=>array('name'=>$productByCode[0]["Item_Name"], 'I_ID'=>$productByCode[0]["I_ID"], 'quantity'=>$nquantity, 'price'=>$productByCode[0]["Price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["I_ID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						   
							if($productByCode[0]["I_ID"] == $k)
							{
							$_SESSION["cart_item"][$k]["quantity"] = $_GET["quantity"];}
							
					}
				} else {
					
					//if()
					//$_SESSION["cart_item"][$productByCode[0]["code"]]["quantity"]+=$_POST["quantity"];
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["I_ID"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	

	
}
if(!empty($_SESSION["cart_item"]))
    {
	foreach ($_SESSION["cart_item"] as $item)
	{$c=$c+1;}
	}
	echo "Cart($c)";
}
?>