<?php
header("Content-type: image/png");
$imagem = ImageCreate(300, 300);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
$branco = ImageColorAllocate($imagem, 255, 255, 255);
$pontos = array(
150, 10,
190, 120,
290, 120,
210, 180,
255, 290,
150, 220,
45, 290,
90, 180,
10, 120,
110, 120
);
ImageFilledPolygon($imagem, $pontos, 10, $branco);
ImagePng($imagem);
ImageDestroy($imagem);
?>
