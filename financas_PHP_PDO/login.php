<?php
// obt�m os valores digitados
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

// acesso ao banco de dados
include "conecta_banco.inc";
$res = $con->query("SELECT * FROM usuarios_autorizados where usuario='$usuario' and senha='$senha'");
$registros=$res->fetchAll();
$linhas = sizeof($registros);
if($linhas==0)  // testa se a consulta retornou algum registro
{
	echo "<html><body>";
	echo "<p align=\"center\">O login n�o foi realizado porque os dados digitados s�o inv�lidos.</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
    setcookie("usuario", $usuario);
    setcookie("senha", $senha);
    // direciona para a p�gina inicial dos usu�rios cadastrados
    header ("Location: principal.php");
}
$con=null;
?>