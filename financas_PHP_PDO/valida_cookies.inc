<?php
date_default_timezone_set("America/Sao_Paulo");
if(IsSet($_COOKIE["usuario"]))
    $usuario = $_COOKIE["usuario"];
if(IsSet($_COOKIE["senha"]))
    $senha = $_COOKIE["senha"];

if(!(empty($usuario) OR empty($senha)))
{
    include "conecta_banco.inc";

	$res = $con->query("SELECT * FROM usuarios_autorizados WHERE usuario='$usuario' and senha='$senha'");
	$registros=$res->fetchAll();

	if(sizeof($registros)==0)
	{
        setcookie("usuario");
        setcookie("senha");
        echo "Você não efetuou o LOGIN!";
        exit;
    }
}
else
{
    echo "Você não efetuou o LOGIN!";
    exit;
}

$con=null;
?>
