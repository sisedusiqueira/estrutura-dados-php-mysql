<?php
// configurações do banco de dados
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "12345";
$banco = "test";

$con = new PDO("mysql:host=$servidor;dbname=$banco", $usuario_bd, $senha_bd);
?>