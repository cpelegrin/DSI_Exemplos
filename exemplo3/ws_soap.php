<?php  
require_once ('../nusoap/lib/nusoap.php');
require_once ('../PDO/PDO.php');

//criando servidor SOAP
$server = new soap_server; 

$server->configureWSDL('demo','urn:demo');

$server->register('get_names',
	array(), // inputs
	array("result"=>"xsd:string") // outputs
);

$server->register('get_names_and_ages',
	array(), // inputs
	array("result"=>"xsd:string") // outputs
);

$server->register('get_age_by_name',
	array("name" =>"xsd:string"), // inputs
	array("result"=>"xsd:integer") // outputs
);

// criando uma função 
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

// create HTTP listener 
@$server->service(file_get_contents("php://input"));

?>