<?php
require_once ('../nusoap/lib/nusoap.php');
//Endereço do WSDL
$wsdl = "http://www.dneonline.com/calculator.asmx?WSDL";

//Criando cliente Soap
$client = new nusoap_client($wsdl, 'wsdl');

//Verificação de algum erro
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2>' . $err;
	exit();
}

/********* imprime os métodos do WSDL*/
$proxy = $client->getProxyClassCode();

print_r($proxy);
echo "<br>";
echo "<br>";
/**********/

//chamada dos métodos
// $result1=$client->call('get_names', array());
// print_r($result1."<br>");

// $result2=$client->call('get_names_and_ages', array());
// print_r($result2."<br>");


echo "<br>";
echo "<br>";

$params = array('intA'=>1, 'intB'=>2);

$result3=$client->call('Add', $params, 'http://testuri.com', 'http://tempuri.org/Add');
print_r($result3);
?>