<?php
header("Content-type: image/jpeg");

$imagem = ImageCreate(200,200);

$azul = ImageColorAllocate($imagem, 0, 0, 255);
$branco = ImageColorAllocate($imagem, 255, 255, 255);

//ImageSetThickness ($imagem, 10);
ImageLine ($imagem, 0, 0, 199, 199, $branco);
ImageLine ($imagem, 0, 199, 199, 0, $branco);

ImageJpeg($imagem);
ImageDestroy($imagem);
?>
