<?php  

class usePDO {

	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname="meubanco";
	private $instance;

	function getInstance(){
		if(empty($instance)){
			$instance = $this->conexao();
		}
		return $instance;
	}

	private function conexao(){
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
    // set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage() . "<br>";
			die("Connection failed: " . $cnx->connect_error) . "<br>";
		}
	}

	function insert($sql){
		$cnx = $this->getInstance();
		print_r($cnx->query($sql));
		
	}

	function select($sql){
		$cnx = $this->getInstance();
		$result = $cnx->query($sql);

		return $result;
	}
}
?>