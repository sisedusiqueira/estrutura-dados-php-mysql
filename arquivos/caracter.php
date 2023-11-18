<?php
$ponteiro = fopen('teste.txt', 'r');
if (!$ponteiro)
    echo 'Não foi possível abrir o arquivo';
    
while (($caracter = fgetc($ponteiro)) != false)
    echo $caracter;
?>

