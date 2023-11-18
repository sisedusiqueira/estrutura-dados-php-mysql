<?php
include 'valida_cookies.inc';

// ********* CONFIGURA��ES DO PROGRAMA *********
// documento
$largura = 842;
$altura = 595;
$margem_vertical = 30;
$margem_horizontal = 30;
$tamanho_fonte = 14;
$tamanho_fonte_titulo = 20;

// obt�m o valor do cookie e do par�metro
$usuario = $_COOKIE["usuario"];
$data = $_GET["data"];
$titulo = "Lista de despesas - $data";

// monta a data para busca no banco de dados
$meses = array ("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");
$aux = explode("-",$data);
$mes = $aux[0];
$ano = $aux[1];
$mes = array_search($mes, $meses)+1;
$data_buscar = "$ano-$mes-01";

// consulta SQL que ir� gerar o relat�rio
$consulta = "select descricao,valor from receitas_despesas where usuario='$usuario' and data='$data_buscar' and (tipo='DF' or tipo='DV') order by descricao";
$colunas_resultantes = array ("descricao", "valor");

// tabela a ser gerada no PDF
$texto_colunas = array ("Descri��o", "Valor (R\$)");
$largura_coluna = array (200, 70);

// executa a consulta
include "conecta_banco.inc";
$result = $con->query($consulta);
$registros=$result->fetchAll();
$total = sizeof($registros);

if($total==0)
{
    $con=null;
    echo "O relat�rio n�o foi gerado porque a consulta n�o retornou registros!";
    exit;
}

// cria o documento PDF
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

// c�lculos
$altura_celula = $tamanho_fonte+3;
$altura_titulo = $tamanho_fonte_titulo+3;
$altura_tabela = $altura - 2*$margem_vertical;
$linhas_por_pagina = intval (($altura_tabela-$altura_titulo)/$altura_celula)-1; // tirar 1 devido ao cabe�alho
$num_paginas  = ceil($total/$linhas_por_pagina);
$linha_atual = 0;

// gera as p�ginas
for($i=0; $i<$num_paginas; $i++)
{
    // cria nova p�gina
    $p->begin_page_ext($largura,$altura,"");

    // t�tulo do relat�rio
    $font = $p->load_font("Times-Bold", "winansi", "");
    $p->setfont($font, $tamanho_fonte_titulo);

    $posy = $altura - $margem_vertical;
    $posx = $margem_horizontal;
    $pag_atual = $i+1;
    $p->show_xy($titulo." (p�gina $pag_atual)", $posx, $posy);

    // cria o cabe�alho da tabela em negrito
    $font = $p->load_font("Times-Bold", "winansi", "");
    $p->setfont($font, $tamanho_fonte);
    $posy -= $altura_titulo;
    $posx = $margem_horizontal;

    $p->moveto($posx, $posy-3);
    $p->lineto($largura-$margem_horizontal, $posy-3);
    $p->stroke();

    for($k=0; $k<sizeof($texto_colunas); $k++)
    {
        $p->show_xy($texto_colunas[$k], $posx, $posy);
        $posx += $largura_coluna[$k];
    }

    // tira o negrito da fonte
    $font = $p->load_font("Times-Roman", "winansi", "");
    $p->setfont($font, $tamanho_fonte);

    // escreve os registros
    $inicio = $linha_atual;
    $fim = $linha_atual + $linhas_por_pagina;
    if($fim > $total)
        $fim = $total;

    for($j=$inicio; $j<$fim; $j++)
    {
        $linha_atual = $j;
        $posx = $margem_horizontal;
        $posy -= $altura_celula;
        
        for($k=0; $k<sizeof($colunas_resultantes); $k++)
        {
            $valor = $registros[$linha_atual][$colunas_resultantes[$k]];
            $p->show_xy($valor, $posx, $posy);
            $posx += $largura_coluna[$k];
        }
        $linha_atual++;
    }

    // encerra a p�gina
    $p->end_page_ext("");

}
$con=null;

// encerra o documento PDF
$p->end_document("");

$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=relatorio.pdf");
echo $buf;
?>
