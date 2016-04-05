
<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "supermarket";
	private $conn;
	function __construct() {
		$this->conn = $this->connectDB();
		
	}
	
	function connectDB() {
		$this->conn = new mysqli($this->host,$this->user,$this->password,$this->database);
		if(!$this->conn)
		{
			
			echo"alert('aaaaaa');";
		}
		return $this->conn;
	}
	
	
	
	function runQuery($query) {
		if ($result = $this->conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $resultset[] = $row;
		
		}

    /* free result set */
    $result->free();
												}
	
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>
