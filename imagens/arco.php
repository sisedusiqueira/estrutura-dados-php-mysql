<?php
header("Content-type: image/png");
$imagem = ImageCreate(300, 300);
$branco = ImageColorAllocate($imagem, 255, 255, 255);
$vermelho = ImageColorAllocate($imagem, 255, 0, 0);
ImageArc($imagem, 150, 150, 300, 300, 0, 180, $vermelho);
ImagePng($imagem);
ImageDestroy($imagem);
?>
