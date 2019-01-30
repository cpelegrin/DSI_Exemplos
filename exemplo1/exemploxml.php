<?php
// O arquivo test.xml contém um documento XML
if (file_exists('teste.xml')) { //se o arquivo existir na pasta especificada
    $xml = simplexml_load_file('teste.xml');//Faz a leitura do arquivo e o converte em um objeto

    print_r($xml);//imprime a estrutura do objeto
} else {
    exit('Falha ao abrir teste.xml.');
}

	$xml->idade = 30;//altera o valor do arquivo como um objeto
	echo "<br>Idade: $xml->idade";//somente para conferência, imprime o valor da chave idade

	$novoXml = fopen("xml_corrigido.xml", "w") or die("Impossível ler o arquivo");//cria novo arquivo
	fwrite($novoXml, $xml->asXML());//salva o novo arquivo em formato xml

	echo "<br>";
	$last_line = system('time', $retval);
	
?>