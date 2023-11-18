<?php
header("Content-type: image/png");

// inclui o arquivo com as configura��es
include 'config_grafico_colunas.inc';

// cria imagem e define as cores
$imagem = ImageCreate($largura, $altura);
$fundo = ImageColorAllocate($imagem, 236, 226, 226);
$preto = ImageColorAllocate($imagem, 0, 0, 0);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
$verde = ImageColorAllocate($imagem, 0, 255, 0);
$vermelho = ImageColorAllocate($imagem, 255, 0, 0);
$amarelo = ImageColorAllocate($imagem, 255, 255, 0);

// ------ defini��o dos dados ----------
// linhas representam os valores, colunas representam os intervalos
// obs: N�O ACEITA VALORES NEGATIVOS!!!

$texto_linha = array ("Gremio", "Juventude", "Inter", "Caxias");
$cores_linha = array ($azul, $verde, $vermelho, $amarelo);
$formatos = array ("losango", "quadrado", "triangulo","losango");
$texto_coluna = array ("2015", "2016", "2017");

$valores = array (
510000, 525000, 650000,
170000, 275000, 270000,
460000, 300000, 170000,
35000, 75000, 85000
);


$numero_linhas = sizeof($texto_linha);
$numero_colunas = sizeof($texto_coluna);
$numero_valores = sizeof($valores);

// ------ obt�m os valores m�nimo e m�ximo de y ----------
$y_maximo = 0;
for($i=0 ; $i<$numero_valores; $i++)
    if($valores[$i]>$y_maximo)
       $y_maximo = $valores[$i];

// ------ calcula o intervalo de varia��o entre os pontos de y ----------
$fator = pow (10, strlen(intval($y_maximo))-1);

if($y_maximo<1)
    $variacao=0.1;
elseif($y_maximo<10)
    $variacao=1;
elseif($y_maximo<2*$fator)
    $variacao=$fator/5;
elseif($y_maximo<5*$fator)
    $variacao=$fator/2;
elseif($y_maximo<10*$fator)
    $variacao=$fator;

// ------ calcula o n�mero de pontos no eixo y ----------
$num_pontos_eixo_y = 0;
$valor = 0;
while ($y_maximo>=$valor)
{
    $valor+=$variacao;
    $num_pontos_eixo_y++;
}

$valor_topo = $valor;
$dist_entre_pontos = $largura_eixo_y / $num_pontos_eixo_y;

// ------- Titulo ---------
ImageString($imagem, 3, 3, 3, $titulo, $preto);
// ------- Eixos x e y ---------
ImageLine($imagem, $inicio_grafico_x, $inicio_grafico_y, $inicio_grafico_x+$largura_eixo_x, $inicio_grafico_y, $preto);
ImageLine($imagem, $inicio_grafico_x, $inicio_grafico_y, $inicio_grafico_x, $inicio_grafico_y-$largura_eixo_y, $preto);

// ------- Pontos no eixo y ---------
$posy = $inicio_grafico_y;
$valor = 0;

for($i=0 ; $i<=$num_pontos_eixo_y; $i++)
{
    $posx = $inicio_grafico_x - (strlen($valor)+2)*6; // 6 da largura da fonte + 2 espa�os

    ImageString($imagem, 2, $posx, $posy-7, $valor, $preto);
    ImageLine($imagem, $inicio_grafico_x-6, $posy, $inicio_grafico_x+$largura_eixo_x, $posy, $preto);
    $valor += $variacao;
    $posy -= $dist_entre_pontos;
}

// ------- Imprime os labels ---------
$largura_coluna = floor($largura_eixo_x / $numero_colunas);
$posx = $inicio_grafico_x;

for($i=0 ; $i<$numero_colunas; $i++)
{
    $pos_label_x = $posx + ($largura_coluna/2) - (strlen($texto_coluna[$i])*6/2);
    $pos_label_y = $inicio_grafico_y+10;
    ImageString($imagem, 2, $pos_label_x, $pos_label_y, $texto_coluna[$i], $preto);
    $posx += $largura_coluna;
}

// ------- Desenha as linhas ---------
for($i=0 ; $i<$numero_linhas; $i++)
{
    $posx = $inicio_grafico_x + $largura_coluna/2;
    $primeiro_ponto = true;
    $indice_j = $i * $numero_colunas;

    for($j=$indice_j ; $j<$indice_j+$numero_colunas; $j++)
    {
        if($j>$indice_j)
            $primeiro_ponto=false;

        $posy = $valores[$j]/$valor_topo * $largura_eixo_y;
        $posy = $inicio_grafico_y - $posy;

        if(!$primeiro_ponto)
            ImageLine($imagem, $ponto_inicio_x, $ponto_inicio_y, $posx, $posy, $cores_linha[$i]);

        // desenha o ponto (de acordo com o formato definido)
        if($formatos[$i]=="losango")
        {
            $pontos = array($posx-4, $posy, $posx, $posy-4, $posx+4, $posy, $posx, $posy+4);
            ImageFilledPolygon($imagem, $pontos, 4, $cores_linha[$i]);
        }
        elseif($formatos[$i]=="quadrado")
        {
            ImageFilledRectangle($imagem, $posx-4, $posy-4, $posx+4, $posy+4, $cores_linha[$i]);
        }
        elseif($formatos[$i]=="triangulo")
        {
            $pontos = array($posx-4, $posy+4, $posx, $posy-4, $posx+4, $posy+4);
            ImageFilledPolygon($imagem, $pontos, 3, $cores_linha[$i]);
        }

        $ponto_inicio_x = $posx;
        $ponto_inicio_y = $posy;

        $posx += $largura_coluna;
    }
}

// ********* CRIA��O DA LEGENDA *********
if($exibir_legenda=="sim")
{
    // acha a maior string
    $maior_tamanho = 0;
    for($i=0 ; $i<$numero_linhas; $i++)
        if(strlen($texto_linha[$i])>$maior_tamanho)
            $maior_tamanho = strlen($texto_linha[$i]);

    // calcula os pontos de in�cio e fim do quadrado
    $x_inicio_legenda = $lx - $largura_fonte * ($maior_tamanho+4);
    $y_inicio_legenda = $ly;

    $x_fim_legenda = $lx;
    $y_fim_legenda = $ly + $numero_linhas * ($altura_fonte + $espaco_entre_linhas) + 2*$margem_vertical;
    ImageRectangle($imagem,	$x_inicio_legenda, $y_inicio_legenda,$x_fim_legenda, $y_fim_legenda, $preto);

    // come�a a desenhar os dados
    for($i=0 ; $i<$numero_linhas; $i++)
    {
        $x_pos = $x_inicio_legenda + $largura_fonte*3;
        $y_pos = $y_inicio_legenda + $i * ($altura_fonte + $espaco_entre_linhas) + $margem_vertical;

        ImageString($imagem, $fonte, $x_pos, $y_pos, $texto_linha[$i], $preto);
        ImageFilledRectangle ($imagem, $x_pos-2*$largura_fonte, $y_pos, $x_pos-$largura_fonte, $y_pos+$altura_fonte, $cores_linha[$i]);
        ImageRectangle ($imagem, $x_pos-2*$largura_fonte, $y_pos, $x_pos-$largura_fonte, $y_pos+$altura_fonte, $preto);
    }
}

ImagePng($imagem);
ImageDestroy($imagem);
?>
