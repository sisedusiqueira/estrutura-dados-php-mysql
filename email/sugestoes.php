<?php
$email_destino = "webmaster@seusite.com.br";

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['avaliacao']) && isset($_POST['sugestoes']))
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $avaliacao = $_POST['avaliacao'];
    $sugestoes = $_POST['sugestoes'];
}
else
{
    echo "Todos os campos devem ser preenchidos!";
    exit;
}

$mensagem = "Nome do usu�rio: $nome\n";
$mensagem .= "E-mail: $email\n";
$mensagem .= "Avalia��o: $avaliacao\n";
$mensagem .= "Sugest�es: $sugestoes";
mail($email_destino, "Sugest�o de usu�rio", $mensagem, "From:contato@seusite.com.br","-r contato@seusite.com.br");

echo "Sua mensagem foi enviada com sucesso!";
?>

