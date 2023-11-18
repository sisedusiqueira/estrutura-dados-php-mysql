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

$mensagem = "Nome do usuário: $nome\n";
$mensagem .= "E-mail: $email\n";
$mensagem .= "Avaliação: $avaliacao\n";
$mensagem .= "Sugestões: $sugestoes";
mail($email_destino, "Sugestão de usuário", $mensagem, "From:contato@seusite.com.br","-r contato@seusite.com.br");

echo "Sua mensagem foi enviada com sucesso!";
?>

