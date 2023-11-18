<?php
	$remetente = "webmaster@algumdominio.com.br";
	$destinatario = "alguem@dominio.com.br";
	$mensagem = "Isto é um teste!";
	mail($destinatario, "Teste", $mensagem, "From: $remetente");
?>

