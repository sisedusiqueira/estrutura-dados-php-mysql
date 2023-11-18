<?php
header("Content-type: image/png");
$imagem = ImageCreate(300, 300);
$branco = ImageColorAllocate($imagem, 255, 255, 255);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
ImageEllipse ($imagem, 150, 150, 290, 150, $azul);
ImagePng($imagem);
ImageDestroy($imagem);
?>
