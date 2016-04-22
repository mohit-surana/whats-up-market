<html>
<body>

<?php 
	$t=$_GET["I_ID"];
	$info=array();
	
	if(!isset($_COOKIE["I_ID"])) 
	{
		array_push($info,$t);
		setcookie("I_ID", json_encode($info),time() + (86400 * 30), "/");	
	}
	else
	{
		$info = json_decode($_COOKIE['I_ID'], true);
		$is_present = true;
		foreach($info as $key=>$value)
		{
			if($value == $t)
				$is_present = false;
			
		}
		if($is_present)
		{
			array_push($info,$t);
			setcookie("I_ID", json_encode($info),time() + (86400 * 30), "/");
		}
	}
?>


</body>
</html>