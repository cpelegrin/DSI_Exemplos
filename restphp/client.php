<?php 
	$url = "http://localhost/DSI_Exemplos/restphp/rest_server.php";

	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_POST, 1);
	$data = array('param' => 'value');
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);

	$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	echo "Http Status Code: ".$httpcode."<br>";

	curl_close($curl);
	print_r($result);

?>