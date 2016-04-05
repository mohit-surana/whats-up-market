<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$nquantity=1;
//$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

//if($pageWasRefreshed ) {
 
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["code"]==$productByCode[0]["code"])
				$nquantity=$item["quantity"]+$_POST["quantity"];	
			     }
		    }
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$nquantity, 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						   
							if($productByCode[0]["code"] == $k)
							{
							$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];}
							
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
					if($_GET["code"] == $k)
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
<HTML>
<HEAD>
<link href="style.css" type="text/css" rel="stylesheet" />

</HEAD>
<style>
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
<script>
function del(code)
{
	<?php if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["code"]==code)
				$item["quantity"]=$item["quantity"]-1;	
			     }
		    }
			?>
}
</script>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["code"]; ?></td>
				<td><?php echo $item["quantity"]; ?>&nbsp <button type="button" class="btn btn-warning btn-circle" id="remove" onclick="del('<?php echo $item["code"]; ?>')"><i class="glyphicon glyphicon-remove"></i></button></td>
				<td align=right><?php echo "$".$item["price"]; ?></td>
				<td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>


</BODY>
</HTML>