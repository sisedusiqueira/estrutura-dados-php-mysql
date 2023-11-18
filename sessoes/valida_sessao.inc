<?php
session_start();

if(IsSet($_SESSION["email_usuario"]))
    $email_usuario = $_SESSION["email_usuario"];
if(IsSet($_SESSION["senha_usuario"]))
    $senha_usuario = $_SESSION["senha_usuario"];

if(!(empty($email_usuario) OR empty($senha_usuario)))
{
    include "conecta_mysql.inc";
	
	// Escapa os caracteres especiais, para evitar ataques de SQL Injection
	$email_usuario = $conexao->real_escape_string($email_usuario);
	$senha_usuario = $conexao->real_escape_string($senha_usuario);
	
	$resultado = $conexao->query("SELECT * FROM usuarios WHERE email='$email_usuario' AND senha='$senha_usuario'");
	if($resultado->num_rows==0)
	{	
		unset ($_SESSION['email_usuario']);
		unset ($_SESSION['senha_usuario']);
		echo "Você não efetuou o <a href='login.html'>login</a>!";
		exit();
	}
}
else
{
	echo "Você não efetuou o <a href='login.html'>login</a>!";
	exit();
}
$conexao->close();
?>