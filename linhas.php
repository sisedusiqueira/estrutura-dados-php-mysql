<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

$p->begin_page_ext(595, 842, "");
    // desenha duas linhas e uma curva
    $p->moveto(400,700);
    $p->lineto(200,750);
    $p->lineto(400,800);
    $p->curveto(100,800, 100,750, 100,700);
    $p->stroke();
    
    // desenha mesma figura, só que preenchida
    $p->setcolor("fill","rgb", 0, 1, 0, 0);
    $p->moveto(400,550);
    $p->lineto(200,600);
    $p->lineto(400,650);
    $p->curveto(100,650, 100,600, 100,550);
    $p->closepath();
    $p->fill_stroke();
$p->end_page_ext("");

$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=linhas.pdf");
echo $buf;
?>
