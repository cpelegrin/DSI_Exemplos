<?php  

class usePDO {

	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname="meubanco";

	function conexao(){
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
    // set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully<br>"; 
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage() . "<br>";
			die("Connection failed: " . $cnx->connect_error) . "<br>";
		}
	}

	function insert($sql){
		$cnx = $this->conexao();
		print_r($cnx->query($sql));
		


	}

	function select($sql){
		$cnx = $this->conexao();

		$result = $cnx->query($sql);
		$cnx->close();

		return $result;
	}
}
?>