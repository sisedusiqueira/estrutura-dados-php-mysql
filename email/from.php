<?php
	$remetente = "webmaster@algumdominio.com.br";
	$destinatario = "alguem@dominio.com.br";
	$mensagem = "Isto � um teste!";
	mail($destinatario, "Teste", $mensagem, "From: $remetente");
?>

