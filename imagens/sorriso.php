<?php
header("Content-type: image/png");
$imagem = ImageCreate(300, 300);
// aloca as cores
$branco = ImageColorAllocate($imagem, 255, 255, 255);
$verde = ImageColorAllocate($imagem, 0, 255, 0);
$amarelo = ImageColorAllocate($imagem, 255, 255, 0);
$azul = ImageColorAllocate($imagem, 0, 0, 255);

// desenha o rosto
ImageFilledEllipse ($imagem, 150, 150, 295, 295, $verde);
ImageEllipse ($imagem, 150, 150, 295, 295, $azul);

// desenha os olhos
ImageFilledEllipse ($imagem, 90, 90, 30, 30, $amarelo);
ImageEllipse ($imagem, 90, 90, 30, 30, $azul);
ImageFilledEllipse ($imagem, 210, 90, 30, 30, $amarelo);
ImageEllipse ($imagem, 210, 90, 30, 30, $azul);

// desenha o nariz
ImageFilledEllipse ($imagem, 150, 150, 20, 20, $amarelo);
ImageEllipse ($imagem, 150, 150, 20, 20, $azul);

// desenha a boca
ImageArc($imagem, 150, 160, 200, 150, 0, 180, $azul);

// envia a imagem
ImagePng($imagem);
ImageDestroy($imagem);
?>
