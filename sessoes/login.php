<?php
// obt�m os valores digitados
$email = $_POST["email"];
$senha = $_POST["senha"];

include "conecta_mysql.inc";

// Escapa os caracteres especiais, para evitar ataques de SQL Injection
$email = $conexao->real_escape_string($email);
$senha = $conexao->real_escape_string($senha);

// acesso ao banco de dados
$resultado = $conexao->query("SELECT * FROM usuarios WHERE email='$email'");
$linhas = $resultado->num_rows;
if($linhas==0)  // testa se a consulta retornou algum registro
{
	echo "<html><body>";
	echo "<p align=\"center\">E-mail n�o encontrado!</p>";
	echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
	$dados = $resultado->fetch_array();
	$senha_banco = $dados["senha"];
	
	if ($senha != $senha_banco) // confere senha
	{
		echo "<html><body>";
		echo "<p align=\"center\">A senha est� incorreta!</p>";
		echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
		echo "</body></html>";
	}
	else   // usu�rio e senha corretos. Vamos criar as vari�veis de sess�o
	{
		session_start();
		$_SESSION['email_usuario'] = $email;
		$_SESSION['senha_usuario'] = $senha;
		// direciona para a p�gina inicial dos usu�rios cadastrados
		header ("Location: pagina_inicial.php");
	}
}
$conexao->close();
?>