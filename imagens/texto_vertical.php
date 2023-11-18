<?php
header("Content-type: image/png");
$imagem = ImageCreate(40,200);
$amarelo = ImageColorAllocate($imagem, 255, 255, 0);
$preto = ImageColorAllocate($imagem, 0, 0, 0);
ImageStringUp($imagem, 5, 10, 190, "Juliano Niederauer", $preto);
ImagePng($imagem);
ImageDestroy($imagem);
?>
