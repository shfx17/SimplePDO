<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/config/config.php');

class DBConnect {
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;
	
	public $con;
	
	public function __construct(){
		$this->connect();
	}
	
	private function connect(){
		$this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
	}
	
	public function select($sql){
		$result = $this->con->query($sql);
		
		while($row = $result->fetch()) 
		{  
			echo $row['id'] . " " . $row['name'] . " " . $row['city'] . "<br />"; 
		}
		
		echo "<b>".$result->rowCount().' records</b>'; 
	}
	
	public function insert($sql, $name, $city){
		$resultInsert = $this->con->prepare($sql);
		$resultInsert->execute(array(
		 ':name' => "$name",
		 ':city' => "$city")
		 );
		 
		echo "Add a <b>".$resultInsert->rowCount().' record</b>';
	}
	
	public function update($sql, $name, $id){
		$resultUpdate = $this->con->prepare($sql); 
		$resultUpdate->execute(array(
		':name' => "$name", 
		':id' => "$id")
		); 
		
		echo 'Record has been changed: <b>'.$resultUpdate->rowCount().'</b>';
	}
	
	public function delete($sql, $name){
		$resultDelete = $this->con->prepare($sql); 
		$resultDelete->execute(array(
		':name' => "$name")
		); 
		
		echo 'Delete: <b>'.$resultDelete->rowCount().'</b>';
	}
	
	public function install(){
		$resultSelect = $this->con->query("SELECT * FROM users");
		
		if($resultSelect == FALSE){
			$sql = "CREATE TABLE users ( 
				id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				name VARCHAR(40) NOT NULL,
				city VARCHAR(40) NOT NULL
			)";
		
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$this->con->exec($sql);
			
			print("<center><b>Table created!</b></center>");
		} else {
			print("<center><b>Table exists!</b></center><br />");
			print("<center><a href='index.php'>Back to main site</a></center>");
		}
	}
}
?>