<html>
<body>
<h2 align="center">Exclusão de registros</h2>
<?php
include 'valida_cookies.inc';
$usuario = $_COOKIE["usuario"];
$id = $_GET["id"];

// conecta ao banco de dados e exclui o registro
include "conecta_banco.inc";
$res = $con->exec("delete from receitas_despesas where usuario='$usuario' and id='$id'");
$con=null;
?>
<p align="center">Exclusão realizada!</p>
<p align="center"><a href="excluir.php">Excluir outra</a> -
<a href="principal.php">Voltar</a></p>
</body>
</html>
