<?php
require_once ('../nusoap/lib/nusoap.php');
//Endereço do WSDL
$wsdl = "http://localhost/DSI_exemplos/exemplo3/ws_soap.php?wsdl";

//Criando cliente Soap
$client = new nusoap_client($wsdl, 'wsdl');

//Verificação de algum erro
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2>' . $err;
	exit();
}

/********* imprime os métodos do WSDL
$proxy = $client->getProxyClassCode();

print_r($proxy);
echo "<br>";
echo "<br>";
**********/

//chamada dos métodos
$result1=$client->call('get_names', array());
print_r($result1."<br>");

$result2=$client->call('get_names_and_ages', array());
print_r($result2."<br>");

$result3=$client->call('get_age_by_name', array('name'=>'carlos'));
print_r($result3."<br>");
?>