<?php 

$privateKey = file_get_contents('chaves/private.key');//busca a chave privada em um arquivo
$data = file_get_contents("criptografado"); //lê dados criptografados do arquivo

$key = openssl_pkey_get_private($privateKey, ""); //importa a chave privada para o algoritmo. Pode ser utilizado uma senha
openssl_private_decrypt($data, $decrypted, $key);// executa a descriptografia, salva dados em decrypted
echo $decrypted; // imprime dados decifrados

?>