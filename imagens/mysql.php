<?php
$servidor = "Juliano";
$usuario = "juliano";
$senha = "teste";
$banco = "test";

//$con = mysql_connect($servidor, $usuario, $senha);
    $result = mysql_db_query($banco, "select count(*) from usuario");
    $total = mysql_numrows($result);
    $total = mysql_result($result,0,0);
//mysql_close($con);

echo "<p align=center>Existem $total usuários cadastrados no banco de dados</p>";
?>

