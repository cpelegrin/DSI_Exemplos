<?php
// O arquivo test.json contém um documento Json
if (file_exists("teste.json")) { //se o arquivo existir na pasta especificada
    $str = file_get_contents("teste.json");//lê o arquivo como string
	$json = json_decode($str);//Decodifica a string Json para um objeto

	print_r($json); //imprime a strutura do objeto
} else {
    exit("Falha ao abrir teste.json.");
}

	$json->idade = 30;//altera o valor do arquivo como um objeto
	echo "<br>Idade: $json->idade";//somente para conferência, imprime o valor da chave idade

	$novoJson = fopen("json_corrigido.json", "w") or die("Impossível ler o arquivo");//cria novo arquivo
	fwrite($novoJson, stripslashes(json_encode($json)));//salva o novo arquivo em formato json
?>