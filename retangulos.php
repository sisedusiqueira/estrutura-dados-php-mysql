<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

$p->begin_page_ext(595, 842, "");
    // Retângulo
    $p->rect(70,650,200,100);
    $p->stroke();
    // Quadrado preenchido
    $p->setcolor("fill","rgb", 1, 1, 0, 0);
    $p->rect(350,650,100,100);
    $p->fill_stroke();
    // Retangulo pontilhado
    $p->setcolor("stroke","rgb", 0, 0, 1, 0);
    $p->setdash(4,6);
    $p->rect(40,600,500,200);
    $p->stroke();
$p->end_page_ext("");

$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=retangulos.pdf");
echo $buf;
?>
