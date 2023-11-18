<?php
header("Content-type: image/png");
$imagem = ImageCreate(300, 60);
$branco = ImageColorAllocate($imagem, 255, 255, 255);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
ImageRectangle($imagem, 0, 0, 299, 59, $azul);
ImagePng($imagem);
ImageDestroy($imagem);
?>
