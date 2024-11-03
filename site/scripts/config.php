<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'suits';
$porta = 3306;

$mysqli = new mysqli($servidor, $usuario, $senha, $banco, $porta);

if ($mysqli->connect_error) {
    die("Erro na conexão:1 " . $mysqli->connect_error);
}

?>