<?php
$arquivo = "contador.txt";  // arquivo do contador

if(file_exists($arquivo))   // se existe, lê o valor atual e o incrementa
{
    $valor_atual = file_get_contents($arquivo);
    $valor_atual = chop($valor_atual);
    $valor_atual++;
}
else
    $valor_atual = 1;

// grava o novo valor no arquivo
$ponteiro = fopen ($arquivo, "w");
    fwrite($ponteiro, $valor_atual);
fclose ($ponteiro);
?>

