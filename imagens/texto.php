<?php
header("Content-type: image/png");
$imagem = ImageCreate(200,40);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
$branco = ImageColorAllocate($imagem, 255, 255, 255);
ImageString($imagem, 5, 3, 3, "Juliano Niederauer", $branco);
ImagePng($imagem);
ImageDestroy($imagem);
?>
