<?php
    $mensagem = "Seja bem vindo ao site da Novatec Editora!\n\n";
    $mensagem .= "Aqui você encontra as melhores publicações de Informática e Tecnologia. ";
    $mensagem .= "Confira nossa série Guia de Consulta Rápida e cadastre-se para ";
    $mensagem .= "receber as novidades do site periodicamente.\n";
    $mensagem .= "Qualquer dúvida, entre em contato conosco ";
    $mensagem .= "pelo e-mail leitor@novateceditora.com.br\n\n";
    mail("usuario@dominio.com.br", "Mensagem de boas vindas", $mensagem);
?>

