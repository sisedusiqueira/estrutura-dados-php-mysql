<?php
// **** variáveis de configuração *******
$imagem = "foto.jpg";
$texto = "http://www.niederauer.com.br";
$fonte = 3;
$largura_fonte = 7;
$altura_fonte = 11;
$margem_x = 3;
$margem_y = 3;

// 0=não exibe, 1=exibe
$superior_esquerdo = 0;
$superior_direito = 0;
$inferior_esquerdo = 1;
$inferior_direito = 0;
// **************************************

if(!file_exists($imagem))
{
    echo "Arquivo da imagem não encontrado!";
    exit;
}

// define largura e altura do texto em pixels
$largura_texto = strlen($texto)*$largura_fonte + 2*$margem_x;
$altura_texto = $altura_fonte + 2*$margem_y;

// monta o nome do arquivo resultante
$arquivo_resultante = explode('.', $imagem);
$arquivo_resultante = $arquivo_resultante[0]."_escrito.jpg";

// lê a imagem de origem e obtém suas dimensões
$imagem_origem = ImageCreateFromJPEG($imagem);
$origem_x = ImagesX($imagem_origem)-1;
$origem_y = ImagesY($imagem_origem)-1;

// define as cores
$branco = ImageColorAllocate($imagem_origem, 255, 255, 255);
$azul = ImageColorAllocate($imagem_origem, 0, 0, 255);

// escreve o texto nos cantos especificados
if($superior_esquerdo)
{
    ImageFilledRectangle($imagem_origem, 0, 0, $largura_texto, $altura_texto, $azul);
    ImageString($imagem_origem, $fonte, $margem_x, $margem_y, $texto, $branco);
}
if($superior_direito)
{
    ImageFilledRectangle($imagem_origem, $origem_x-$largura_texto, 0, $origem_x, $altura_texto, $azul);
    ImageString($imagem_origem, $fonte, $origem_x-$largura_texto+$margem_x, $margem_y, $texto, $branco);
}
if($inferior_esquerdo)
{
    ImageFilledRectangle($imagem_origem, 0, $origem_y-$altura_texto, $largura_texto, $origem_y, $azul);
    ImageString($imagem_origem, $fonte, $margem_x, $origem_y-$altura_texto+$margem_y, $texto, $branco);
}
if($inferior_direito)
{
    ImageFilledRectangle($imagem_origem, $origem_x-$largura_texto, $origem_y-$altura_texto, $origem_x, $origem_y, $azul);
    ImageString($imagem_origem, $fonte, $origem_x-$largura_texto+$margem_x, $origem_y-$altura_texto+$margem_y, $texto, $branco);
}

// salva a nova imagem
ImageJPEG($imagem_origem, $arquivo_resultante);
// libera a memória
ImageDestroy($imagem_origem);
?>

<html>
<head>
<title>Arquivo resultante</title>
</head>
<body>
<h2 align="center"><u>Arquivo resultante:</u> <?php echo $arquivo_resultante; ?></h2>
<p align="center"><img src="<?php echo $arquivo_resultante; ?>"></p>
</body>
</html>

