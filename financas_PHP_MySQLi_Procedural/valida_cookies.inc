<?php
date_default_timezone_set("America/Sao_Paulo");
if(IsSet($_COOKIE["usuario"]))
    $usuario = $_COOKIE["usuario"];
if(IsSet($_COOKIE["senha"]))
    $senha = $_COOKIE["senha"];

if(!(empty($usuario) OR empty($senha)))
{
    include "conecta_banco.inc";

	// Escapa os caracteres especiais, para evitar ataques de SQL Injection
	$usuario = mysqli_real_escape_string($con, $usuario);
	$senha = mysqli_real_escape_string($con, $senha);
	
	$res = mysqli_query($con, "SELECT * FROM usuarios_autorizados WHERE usuario='$usuario' and senha='$senha'");
	if(mysqli_num_rows($res)==0)
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

mysqli_close($con);
?>
