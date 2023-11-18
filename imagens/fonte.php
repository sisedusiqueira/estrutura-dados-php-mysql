<?php
header("Content-type: image/jpeg");
$fonte = "/windows/fonts/impact.ttf";
$imagem = ImageCreate(400,70);
$amarelo = ImageColorAllocate($imagem, 255,255,0);
$preto = ImageColorAllocate($imagem, 0,0,0);
ImageTtfText($imagem, 24, 10, 70, 65, $preto, $fonte, "Juliano Niederauer");
ImageJpeg($imagem);
ImageDestroy($imagem);
?>

