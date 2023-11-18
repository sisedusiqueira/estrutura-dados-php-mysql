<?php
header("Content-type: image/png");
$imagem = ImageCreate(300, 300);
$branco = ImageColorAllocate($imagem, 255, 255, 255);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
$pontos = array(10, 150, 150, 10, 290, 150, 240, 290, 60, 290);
ImagePolygon($imagem, $pontos, 5, $azul);
ImagePng($imagem);
ImageDestroy($imagem);
?>
