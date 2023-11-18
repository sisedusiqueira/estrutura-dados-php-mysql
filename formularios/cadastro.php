<?php
$nome = $_POST["nome"];
$email = $_POST["email"];
$estado = $_POST["estado"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$confirmacao = $_POST["confirmacao"];

// elimina os erros mais comuns na digitação de e-mails
$email = str_replace (" ", "", $email);
$email = str_replace ("/", "", $email);
$email = str_replace ("@.", "@", $email);
$email = str_replace (".@", "@", $email);
$email = str_replace (",", ".", $email);
$email = str_replace (";", ".", $email);
$erro=0;

// verifica nome
if(empty($nome))
{
    $erro=1;
    $msg ="Por favor, digite seu nome corretamente.";
}

// verifica email
elseif (strlen($email)<8 || substr_count($email, "@")!=1  || substr_count($email, ".")==0)
{
    $erro=1;
    $msg ="Por favor, digite seu e-mail corretamente.";
}

// verifica estado
elseif(strlen($estado)!=2)
{
    $erro=1;
    $msg ="Por favor, escolha seu estado.";
}

// verifica login
elseif(strlen($login)<5 || strlen($login)>15)
{
    $erro=1;
    $msg = "O nome de usuário (login) deve ter entre 5 e 15 caracteres.";
}

elseif (strstr ($login, ' ')!=FALSE)
{
    $erro=1;
    $msg = "O nome de usuário (login) não pode conter espaços em branco.";
}

// verifica senha
elseif(strlen($senha)<5 || strlen($senha)>15)
{
    $erro=1;
    $msg = "A senha deve ter entre 5 e 15 caracteres";
}

elseif (strstr ($senha, ' ')!=FALSE)
{
    $erro=1;
    $msg = "A senha não pode conter espaços em branco.";
}

// compara senha com a confirmação da senha
elseif ($senha != $confirmacao)
{
    $erro=1;
    $msg = "Você digitou duas senhas diferentes.";
}

// se ocorreu erro, exibe a mensagem de erro
if($erro)
{
    echo "<html><body>";
    echo "<p align=center>$msg</p>";
    echo "<p align=center><a href='javascript:history.back()'>Voltar</a></p>";
    echo "</body></html>";
}
else
{
    // tratar os dados aqui (ex: gravar no banco de dados)
    echo "<html><body>";
    echo "<p align=center>Seu cadastro foi realizado com sucesso!</p>";
    echo "</body></html>";
}
?>
