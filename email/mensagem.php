<?php
    $mensagem = "Seja bem vindo ao site da Novatec Editora!\n\n";
    $mensagem .= "Aqui voc� encontra as melhores publica��es de Inform�tica e Tecnologia. ";
    $mensagem .= "Confira nossa s�rie Guia de Consulta R�pida e cadastre-se para ";
    $mensagem .= "receber as novidades do site periodicamente.\n";
    $mensagem .= "Qualquer d�vida, entre em contato conosco ";
    $mensagem .= "pelo e-mail leitor@novateceditora.com.br\n\n";
    mail("usuario@dominio.com.br", "Mensagem de boas vindas", $mensagem);
?>

