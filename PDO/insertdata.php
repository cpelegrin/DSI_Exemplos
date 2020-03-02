<?php  

require_once "PDO.php";

$pdo = new usePDO();



$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('carlos', 30, 'M', 'solteiro', 'rua B no 01', 'cpelegrin','".sha1(123456)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('joao', 12, 'M', 'solteiro', 'rua A no 01', 'joao12','".sha1(654321)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('jose', 50, 'M', 'casado', 'rua B no 02', 'jose_vieira','".sha1(456789)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('maria', 35, 'F', 'casada', 'rua A no 02', 'maria','".sha1(987654)."')") ;

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('camila', 20, 'F', 'solteiro', 'rua C no 01', 'mila123','".sha1(123789)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('julia', 3, 'F', 'solteiro', 'rua C no 02', 'julinha2016','".sha1(987321)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('jonas', 78, 'M', 'divorciado', 'rua D no 01', 'jonas','".sha1(951357)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('ana', 21, 'F', 'solteiro', 'rua B no 03', 'ana','".sha1(753159)."')") ;

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('sergio', 27, 'M', 'casado', 'rua C no 03', 'sergio','".sha1(357951)."')");

$pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha)
VALUES ('cleide', 16, 'F', 'solteiro', 'rua D no 02', 'cleide','".sha1(159357)."')");

echo "<br>Dados inseridos com sucesso!<br>"

?>