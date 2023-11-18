<?php
    $destinatario = "joao@dominio.com.br";
    $mensagem = "<font color=\"#0000FF\">Teste</font>";
    mail($destinatario, "Teste", $mensagem, "Content-Type: text/html");
?>

