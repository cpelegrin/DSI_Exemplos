<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(count($_POST)>0) {
		http_response_code(503);
		print("Retorno de um método POST: ");
		print_r($_POST);
	}
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['nome'])) {
		print("nome: ".$_GET['nome']."<br>");

	}
	print("Retorno de um método GET");
	//header("Content-Type: application/json; charset=UTF-8");
	//echo json_encode(array("resposta" => "Retorno de um método GET"));
}
?>