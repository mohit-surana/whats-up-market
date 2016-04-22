<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$nquantity=1;
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM items WHERE I_ID='" . $_GET["I_ID"] . "'");
			if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["I_ID"]==$productByCode[0]["I_ID"])
				$nquantity=$item["quantity"]+$_POST["quantity"];	
			     }
		    }
			$itemArray = array($productByCode[0]["I_ID"]=>array('Item_Name'=>$productByCode[0]["Item_Name"], 'I_ID'=>$productByCode[0]["I_ID"], 'quantity'=>$nquantity, 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["I_ID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						   
							if($productByCode[0]["I_ID"] == $k)
							{
							$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];}
							
					}
				} else {
					
					//if()
					//$_SESSION["cart_item"][$productByCode[0]["I_ID"]]["quantity"]+=$_POST["quantity"];
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
}
?>
<html>
<head><link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-2.2.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>  
		<link rel="stylesheet" type="text/css" href="../semantic1/semantic.min.css">
		<script src="../semantic1/semantic.min.js"></script>
        <script src="../Semantic/package.js">
		</script>
		<link href="style1.css" type="text/css" rel="stylesheet" />
		
		</head>
<body>
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	
	$temp="";
	$count=0;
	$product_array = $db_handle->runQuery("SELECT * FROM items ORDER BY I_ID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){ 
	?>
		<div class="product-item">
			<form>
			<!--header('Content-type: image/jpg');
echo $content;-->
			<div class="product-image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($product_array[$key]["image"]).'" alt="photo"><br>';?></div>
			<?php  header('Content-type: text/plain');?>
			<div><strong><?php echo $product_array[$key]["Item_Name"]; ?></strong></div>
			<div class="product-price"><?php echo "Rs ".$product_array[$key]["Price"]; ?></div>
			<?php $temp=$product_array[$key]["I_ID"];?>
			
			<div> <input type="text" Item_Name="quantity" value="1" size="2" id="addc" onchange="f(this.value)"/><input type="button" value="Add to cart" onclick="up1('<?php echo $temp ?>')"/></div>
			</form>
			</div>
	<?php
			}
	}
	?>
</div>
</body>
</html>