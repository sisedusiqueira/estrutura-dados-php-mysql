<?php
// cores e dígitos
$cor_fundo = "preto";
$cor_fonte = "branco";
$cor_borda = "verde";
$digitos = 7;
// dimensões do contador
$x = 54;
$y = 14;

// tamanho da fonte
$fonte = 3;

// define as margens
$margem_x = 3;
$margem_y = 0;


// chama função que retorna o próximo valor do contador
$contador = RetornaProximoValor($digitos);

// informa ao navegador o tipo de imagem que será retornada
header("Content-type: image/png");

// cria a imagem
$imagem = ImageCreate($x,$y);

// define as cores
$branco = ImageColorAllocate($imagem,255,255,255);
$preto = ImageColorAllocate($imagem,0,0,0);
$verde = ImageColorAllocate($imagem,0,255,0);
$vermelho = ImageColorAllocate($imagem,255,0,0);
$azul = ImageColorAllocate($imagem,0,0,255);
$amarelo = ImageColorAllocate($imagem,255,255,0);

// obtém o identificador das cores escolhidas
$cor_fundo = $$cor_fundo;
$cor_fonte = $$cor_fonte;
$cor_borda = $$cor_borda;

// desenha um retângulo com a cor do fundo
ImageFilledRectangle($imagem,0,0,$x,$y,$cor_fundo);

// desenha a borda
ImageRectangle($imagem,0,0,$x-1,$y-1,$cor_borda);

// escreve o valor atual do contador
ImageString($imagem,$fonte,$margem_x,$margem_y,$contador,$cor_fonte);

// Gera a imagem PNG a ser enviada ao navegador
ImagePNG($imagem);

// Libera a memória utilizada
ImageDestroy($imagem);


// ---- PARA ARMAZENAR EM UM BANCO DE DADOS MySQL, use esta função ------
function RetornaProximoValor ($digitos)
{
    $servidor = "localhost";
    $usuario = "root";
    $senha = "teste";
    $banco = "banco";

    $con = mysqli_connect($servidor, $usuario, $senha, $banco);
        $result = mysqli_query($con, "SELECT * FROM contador");
        $total = mysqli_num_rows($result);
        if($total>0)
        {
            $dados = mysqli_fetch_row($result);
           	$valor=$dados[0];
           	$valor++;
            $result = mysqli_query($con,"UPDATE contador SET valor=$valor");
        }
        else
        {
            $valor=1;
            $result = mysqli_query($con,"INSERT INTO contador VALUES (1)");
        }
    mysqli_close($con);

    while (strlen($valor) < $digitos)
        $valor = "0".$valor;

    return $valor;
}


?>
