<?php
$ponteiro = fopen ("teste.txt", "r");
	$conteudo = fread ($ponteiro, 30);
	echo $conteudo;
fclose ($ponteiro);
?>

