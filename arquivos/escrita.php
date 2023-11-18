<?php
$conteudo = "Este texto será escrito no arquivo!";
$ponteiro = fopen ("arquivo.txt", "w");
    fwrite($ponteiro, $conteudo);
fclose ($ponteiro);
?>

