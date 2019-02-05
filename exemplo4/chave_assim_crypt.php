<?php 

$data = "texto para ser criptografado";

$pubKey = file_get_contents('chaves/public.pem'); //busca o conteúdo do certificado pem em um arquivo
$public = openssl_get_publickey($pubKey); //cria uma chave publica no algritmo
openssl_public_encrypt($data, $crypted, $public);// efetua a criptografia salvando o conteúdo em crypted

$cryptedFile = fopen("criptografado", "w") or die("Impossível ler o arquivo");//cria novo arquivo
fwrite($cryptedFile, $crypted);//salva o arquivo com o conteúdo criptografado

echo "Conteúdo criptografado com sucesso";

?>