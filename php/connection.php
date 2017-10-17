<?php
class Connection{
public $servername = "localhost";
public $username = "root";
public $password = "";
public $dbname = "pms";

public $conn="";
 public function connectionDB(){
$this->conn =mysqli_connect($this->servername, $this->username, $this->password,$this->dbname);

// Check connection
	if ($this->conn->connect_error) {
		die("Connection failed: " . $this->conn->connect_error);
	}
	return $this->conn ;
 }
 
}

?>