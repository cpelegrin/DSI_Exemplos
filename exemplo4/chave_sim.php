<?php 
$data = "texto para ser criptografado"; //não confunda com psicografado :)


$key = openssl_random_pseudo_bytes(32); // chave de 256 bits, insegura, porém serve para o exemplo
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-ctr'));// cifra do vetor de inicialização (IV)
$encrypted = openssl_encrypt($data, 'aes-256-ctr', $key, 0, $iv);

echo "Dados criptografados: $encrypted <br>";

// $key e $iv devem ser os mesmos usados no openssl_encrypt()
// Uma forma de passar o IV é enviá-lo junto com o texto cifrado
// Por exemplo: $data = $iv . $crypt;
// $ivLength = openssl_cipher_iv_length('aes-256-ctr');
// $iv = substr($encrypted, 0, $ivLength);
// $crypt = substr($encrypted, $ivLength);
// $decrypted = openssl_decrypt($crypt, 'aes-256-ctr', $key, 0, $iv);

$decrypted = openssl_decrypt($encrypted, 'aes-256-ctr', $key, 0, $iv);
echo "Dados decifrados: $decrypted <br>";

?>