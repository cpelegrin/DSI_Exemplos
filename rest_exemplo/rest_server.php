<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(count($_POST)>0) {
		print "<PRE>";
		http_response_code(503);
		print_r($_POST);
		print "</PRE>";
	}
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['nome'])) {
		print("nome: ".$_GET['nome']."<br>");

	}
	print("Isso aqui é um GET");
	//header("Content-Type: application/json; charset=UTF-8");
	//echo json_encode(array("resposta" => "Isso aqui é um método GET"));
}
?>