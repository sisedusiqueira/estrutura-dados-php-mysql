<?php
$conteudo = "Este texto ser� escrito no arquivo!";
$ponteiro = fopen ("arquivo.txt", "w");
    fwrite($ponteiro, $conteudo);
fclose ($ponteiro);
?>

