<?php
// obtém os valores digitados
$email = $_POST["email"];
$senha = $_POST["senha"];

include "conecta_mysql.inc";

// Escapa os caracteres especiais, para evitar ataques de SQL Injection
$email = mysqli_real_escape_string($conexao, $email);
$senha = mysqli_real_escape_string($conexao, $senha);

// acesso ao banco de dados
$resultado = mysqli_query($conexao,"SELECT * FROM usuarios WHERE email='$email'");
$linhas = mysqli_num_rows ($resultado);
if($linhas==0)  // testa se a consulta retornou algum registro
{
	echo "<html><body>";
	echo "<p align=\"center\">E-mail não encontrado!</p>";
	echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
	$dados = mysqli_fetch_array($resultado);
	$senha_banco = $dados["senha"];
	
   	if ($senha != $senha_banco) // confere senha
	{
		echo "<html><body>";
		echo "<p align=\"center\">A senha está incorreta!</p>";
		echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
		echo "</body></html>";
	}
	else   // usuário e senha corretos. Vamos criar os cookies
    {
        setcookie("email_usuario", $email);
        setcookie("senha_usuario", $senha);
        // direciona para a página inicial dos usuários cadastrados
        header ("Location: pagina_inicial.php");
    }
}
mysqli_close($conexao);
?>