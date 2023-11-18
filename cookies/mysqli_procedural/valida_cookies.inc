<?php
if(IsSet($_COOKIE["email_usuario"]))
    $email_usuario = $_COOKIE["email_usuario"];
if(IsSet($_COOKIE["senha_usuario"]))
    $senha_usuario = $_COOKIE["senha_usuario"];

if(!(empty($email_usuario) OR empty($senha_usuario)))
{
    include "conecta_mysql.inc";
	
	// Escapa os caracteres especiais, para evitar ataques de SQL Injection
	$email_usuario = mysqli_real_escape_string($conexao, $email_usuario);
	$senha_usuario = mysqli_real_escape_string($conexao, $senha_usuario);

	// Consulta ao banco de dados
	$resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email='$email_usuario' AND senha='$senha_usuario'");
	if(mysqli_num_rows($resultado)==0)
	{
		setcookie("email_usuario");
		setcookie("senha_usuario");
		echo "Você não efetuou o login!";
		exit();
	}
}
else
{
    echo "Você não efetuou o <a href='login.html'>login</a>!";
    exit();
}
mysqli_close($conexao);
?>