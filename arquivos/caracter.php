<?php
$ponteiro = fopen('teste.txt', 'r');
if (!$ponteiro)
    echo 'N�o foi poss�vel abrir o arquivo';
    
while (($caracter = fgetc($ponteiro)) != false)
    echo $caracter;
?>

