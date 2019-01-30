<?php  
require_once ('../nusoap/lib/nusoap.php');
require_once ('../PDO/PDO.php');

//Criando servidor SOAP
$server = new soap_server; 

$server->configureWSDL('demo','urn:demo'); //Definição de namespace para o wsdl

$server->register('get_names', //registro das funções que estarão disponíveis no web service
	array(), //parametro de entrada da função, ou inputs
	array("result"=>"xsd:string") //parametros de retorno da função, ou outputs, deve-se definir o tipo do retorno
);

$server->register('get_names_and_ages',//função
	array(), // inputs
	array("result"=>"xsd:string") // outputs
);

$server->register('get_age_by_name',//função
	array("name" =>"xsd:string"), //inputs, deve-se definir os tipos dos parâmetros
	array("result"=>"xsd:integer") // outputs
);

// Criando uma função 
function get_names(){ 

	$database = new usePDO;
	$result = $database->select('SELECT nome FROM pessoa');
	$resultString = "";
		while ($row = $result->fetch()) {
			$resultString.=$row['nome'].";";
		}
	return $resultString; 
} 

function get_names_and_ages(){ 

	$database = new usePDO;
	$result = $database->select('SELECT nome, idade FROM pessoa');
	$resultString = "";
		while ($row = $result->fetch()) {
			$resultString.=$row['nome'].",".$row['idade'].";";
		}
	return $resultString; 
} 

function get_age_by_name($name){
	$database = new usePDO;
	$result = $database->select("SELECT idade FROM pessoa WHERE nome='$name'");
	return $result->fetch()['idade']; 
} 

//Criando um servidor HTTP 
@$server->service(file_get_contents("php://input"));

?>