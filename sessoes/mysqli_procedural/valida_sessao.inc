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
	$email_usuario = mysqli_real_escape_string($conexao, $email_usuario);
	$senha_usuario = mysqli_real_escape_string($conexao, $senha_usuario);
	
	$resultado = mysqli_query($con, "SELECT * FROM usuarios WHERE username='$email_usuario' AND senha='$senha'");
	if(mysqli_num_rows($resultado)==0)
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
mysqli_close($con);
?>