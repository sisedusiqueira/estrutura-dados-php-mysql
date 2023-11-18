<?php
$ponteiro = fopen ("teste.txt", "r");
    $linha = fgets($ponteiro, 4096);
    echo $linha;
fclose ($ponteiro);
?>

