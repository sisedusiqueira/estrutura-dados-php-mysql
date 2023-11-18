<?php
// configurações do banco de dados
$servidor = "localhost";
$usuario_bd = "juliano";
$senha_bd = "12345";
$banco = "test";
$con = dbx_connect ("mysql", $servidor, $banco, $usuario_bd, $senha_bd);
?>
