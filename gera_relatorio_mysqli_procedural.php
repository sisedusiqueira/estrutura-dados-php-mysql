<?php
// ********* CONFIGURAÇÕES DO PROGRAMA *********
// documento
$largura = 842;
$altura = 595;
$margem_vertical = 30;
$margem_horizontal = 30;
$tamanho_fonte = 14;
$tamanho_fonte_titulo = 20;
$titulo = "Lista de Preços da Novatec Editora";

// banco de dados
$servidor = "localhost";
$usuario = "juliano";
$senha = "teste";
$banco = "test";

// consulta SQL que irá gerar o relatório
$consulta = "SELECT * FROM livros ORDER BY titulo";
$colunas_resultantes = array ("isbn", "titulo", "autor", "preco");

// tabela a ser gerada no PDF
$texto_colunas = array ("ISBN", "Título", "Autor", "Preço");
$largura_coluna = array (90, 360, 280, 150);

// ********* NÃO ALTERE DAQUI EM DIANTE *********

// executa a consulta
$con = mysqli_connect($servidor, $usuario, $senha, $banco);
$result = mysqli_query($con, $consulta);
$total = mysqli_num_rows($result);

if($total==0)
{
    mysqli_close($con);
    echo "O relatório não foi gerado porque a consulta não retornou registros!";
    exit;
}

// cria o documento PDF
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

// cálculos
$altura_celula = $tamanho_fonte+3;
$altura_titulo = $tamanho_fonte_titulo+3;
$altura_tabela = $altura - 2*$margem_vertical;
$linhas_por_pagina = intval (($altura_tabela-$altura_titulo)/$altura_celula)-1; // tirar 1 devido ao cabeçalho
$num_paginas  = ceil($total/$linhas_por_pagina);
$linha_atual = 0;

// gera as páginas
for($i=0; $i<$num_paginas; $i++)
{
    // cria nova página
    $p->begin_page_ext($largura,$altura,"");

    // título do relatório
    $font = $p->load_font("Times-Bold","winansi","");
    $p->setfont($font, $tamanho_fonte_titulo);
    $posy = $altura - $margem_vertical;
    $posx = $margem_horizontal;
    $pag_atual = $i+1;
    $p->show_xy($titulo." (página $pag_atual)", $posx, $posy);

    // cria o cabeçalho da tabela em negrito
    $font = $p->load_font("Times-Bold","winansi","");
    $p->setfont($font,$tamanho_fonte);
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
    $font = $p->load_font("Times-Roman","winansi","");
    $p->setfont($font,$tamanho_fonte);

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
        $dados = mysqli_fetch_array($result);
        
        for($k=0; $k<sizeof($colunas_resultantes); $k++)
        {
            $valor = $dados[$colunas_resultantes[$k]];
            $p->show_xy($valor, $posx, $posy);
            $posx += $largura_coluna[$k];
        }
        $linha_atual++;
    }

    // encerra a página
    $p->end_page_ext("");

}
mysqli_close($con);

// encerra o documento PDF
$p->set_parameter("openaction", "fitpage");
$p->end_document("");

$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=relatorio.pdf");
echo $buf;
?>
