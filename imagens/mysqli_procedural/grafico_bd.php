<?php
header("Content-type: image/png");

// inclui o arquivo com as configurações
include 'config_grafico.inc';

// cria imagem e define as cores
$imagem = ImageCreate($largura, $altura);
$fundo = ImageColorAllocate($imagem, 236, 226, 226);
$preto = ImageColorAllocate($imagem, 0, 0, 0);
$azul = ImageColorAllocate($imagem, 0, 0, 255);
$verde = ImageColorAllocate($imagem, 0, 255, 0);
$vermelho = ImageColorAllocate($imagem, 255, 0, 0);
$amarelo = ImageColorAllocate($imagem, 255, 255, 0);

$cores = array ($azul, $verde, $vermelho, $amarelo);     // definir mais...

// ------ definição dos dados ----------
$servidor = "localhost";
$usuario = "juliano";
$senha = "12345";
$banco = "bdteste";

$con = mysqli_connect($servidor, $usuario, $senha, $banco);
    $res = mysqli_query($con, "SELECT estado,count(*) FROM usuario GROUP BY estado");
    $num_linhas = mysqli_num_rows($res);

    for($i=0 ; $i<$num_linhas; $i++)
    {
		$linha = mysqli_fetch_row($res);
        $dados[] = $linha[0];
        $valores[] = $linha[1];
    }
mysqli_close($con);


// ------ cálculo do total ----------
$total = 0;
$num_linhas = sizeof($dados);
for($i=0 ; $i<$num_linhas; $i++)
    $total += $valores[$i];


// ------ desenha o gráfico ----------
ImageEllipse ($imagem, $centrox, $centroy, $diametro, $diametro, $preto);
ImageString($imagem, 3, 3, 3, "Total: $total pessoas", $preto);

$raio = $diametro/2;

for($i=0 ; $i<$num_linhas; $i++)
{
    $percentual = ($valores[$i] / $total) * 100;
    $percentual = number_format($percentual, 2);
    $percentual .= "%";
    
    $val = 360 * ($valores[$i] / $total);
    $angulo += $val;
    $angulo_meio = $angulo - ($val / 2);
    
    $x_final = $centrox + $raio * cos(deg2rad($angulo));
    $y_final = $centroy + (- $raio * sin(deg2rad($angulo)));

    $x_meio = $centrox + ($raio/2 * cos(deg2rad($angulo_meio))) ;
    $y_meio = $centroy + (- $raio/2 * sin(deg2rad($angulo_meio)));

    $x_texto = $centrox + ($raio * cos(deg2rad($angulo_meio))) * 1.2;
    $y_texto = $centroy + (- $raio * sin(deg2rad($angulo_meio))) * 1.2;

    ImageLine($imagem, $centrox, $centroy, $x_final, $y_final, $preto);
    ImageFillToBorder($imagem, $x_meio, $y_meio, $preto, $cores[$i]);
    ImageString($imagem, 2, $x_texto, $y_texto, $percentual, $preto);
}


// *********** CRIAÇÃO DA LEGENDA *********************
if($exibir_legenda=="sim")
{
    // acha a maior string
    $maior_tamanho = 0;
    for($i=0 ; $i<$num_linhas; $i++)
        if(strlen($dados[$i])>$maior_tamanho)
            $maior_tamanho = strlen($dados[$i]);

    // calcula os pontos de início e fim do quadrado
    $x_inicio_legenda = $lx - $largura_fonte * ($maior_tamanho+4);
    $y_inicio_legenda = $ly;

    $x_fim_legenda = $lx;
    $y_fim_legenda = $ly + $num_linhas * ($altura_fonte + $espaco_entre_linhas) + 2*$margem_vertical;
    ImageRectangle($imagem,	$x_inicio_legenda, $y_inicio_legenda,$x_fim_legenda, $y_fim_legenda, $preto);

    // começa a desenhar os dados
    for($i=0 ; $i<$num_linhas; $i++)
    {
        $x_pos = $x_inicio_legenda + $largura_fonte*3;
        $y_pos = $y_inicio_legenda + $i * ($altura_fonte + $espaco_entre_linhas) + $margem_vertical;

        ImageString($imagem, $fonte, $x_pos, $y_pos, $dados[$i], $preto);
        ImageFilledRectangle ($imagem, $x_pos-2*$largura_fonte, $y_pos, $x_pos-$largura_fonte, $y_pos+$altura_fonte, $cores[$i]);
        ImageRectangle ($imagem, $x_pos-2*$largura_fonte, $y_pos, $x_pos-$largura_fonte, $y_pos+$altura_fonte, $preto);
    }
}

ImagePng($imagem);
ImageDestroy($imagem);
?>
