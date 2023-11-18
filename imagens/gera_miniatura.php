<?php
// define a imagem a partir da qual ser� gerada a minuatura
$imagem = "miniaturas/gremio.jpg";

// **** configura��es da miniatura *******
$tamanho_fixo = "N";    // S ou N
$largura_fixa = 192;    // usado somente com tamanho_fixo=S
$altura_fixa = 144;     // usado somente com tamanho_fixo=S
$percentual = 40;       // usado somente com tamanho_fixo=N
// **************************************

if(!file_exists($imagem))
{
    echo "Arquivo da imagem n�o encontrado!";
    exit;
}
if($tamanho_fixo=="N" && ($percentual<1 || $percentual>100))
{
    echo "O percentual deve ser um n�mero entre 1 e 100!";
    exit;
}

// monta o nome do arquivo resultante
$arquivo_miniatura = explode('.', $imagem);
$arquivo_miniatura = $arquivo_miniatura[0]."_mini.jpg";

// l� a imagem de origem e obt�m suas dimens�es
$img_origem = ImageCreateFromJPEG($imagem);
$origem_x = ImagesX($img_origem);
$origem_y = ImagesY($img_origem);

// se n�o for tamanho fixo, calcula as dimens�es da miniatura
if($tamanho_fixo=="S")
{
    $x = $largura_fixa;
    $y = $altura_fixa;
}
else
{
    $x = intval ($origem_x * $percentual/100);
    $y = intval ($origem_y * $percentual/100);
}

// cria a imagem final, que ir� conter a miniatura
$img_final = ImageCreateTrueColor($x,$y);

// copia a imagem original redimensionada para dentro da imagem final
ImageCopyResampled($img_final, $img_origem, 0, 0, 0, 0, $x+1, $y+1, $origem_x , $origem_y);

// salva o arquivo
ImageJPEG($img_final, $arquivo_miniatura);

// libera a mem�ria alocada para as duas imagens
ImageDestroy($img_origem);
ImageDestroy($img_final);
?>

<html>
<head>
<title>Livro de PHP - Miniatura de imagem</title>
</head>
<body>
<p align="center">
<img src="<?php echo $imagem; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;
<img src="<?php echo $arquivo_miniatura; ?>">
</p>
<p align="center">
<b>Imagem original</b>: <?php echo $imagem." (".$origem_x." x ".$origem_y.")";?><br>
<b>Miniatura gerada</b>: <?php echo $arquivo_miniatura." (".$x." x ".$y.")";?>
</p>
</body>
</html>
