<?php 
$curl = curl_init();

$url = "http://localhost/DSI_Exemplos/rest_exemplo/rest_server.php";

//POST
curl_setopt($curl, CURLOPT_POST, 1);
$data = array("param" => "value"); 
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//end POST

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
/*true para retornar a transferência como uma string 
do valor de retorno de curl_exec() em vez de enviá-la diretamente.*/

$result = curl_exec($curl);

$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo 'HTTP Status Code: ' . $httpcode . "<br>";

curl_close($curl);
print_r($result);

?>