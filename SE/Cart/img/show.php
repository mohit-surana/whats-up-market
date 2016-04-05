<?php

$username = "root";
$password = "bananaman";
$host = "localhost";
$database = "test";

@mysql_connect($host, $username, $password) or die("Can not connect to database: ".mysql_error());

@mysql_select_db($database) or die("Can not select the database: ".mysql_error());

$id = $_GET['id'];

if(!isset($id) || empty($id)){
die("Please select your image!");
}else{

$query = mysql_query("SELECT * FROM tbl_images WHERE id='".$id."'");
$row = mysql_fetch_array($query);
$content = $row['image'];

header('Content-type: image/jpg');
echo $content;

}

?>