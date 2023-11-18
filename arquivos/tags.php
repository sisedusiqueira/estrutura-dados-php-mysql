<?php
$ponteiro = fopen ("texto.txt", "r");
    $linha = fgetss($ponteiro, 4096);
    echo $linha;
fclose ($ponteiro);
?>

