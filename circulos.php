<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

$p->begin_page_ext(595, 842, "");
    // Círculo
    $p->setcolor("fill","rgb", 0, 0.8, 0, 0);
    $p->circle(150,700,100);
    $p->fill_stroke();
    // Arco
    $p->setcolor("fill","rgb", 1, 1, 0, 0);
    $p->arc(400,700,100,0,180);
    $p->closepath();
    $p->fill_stroke();
$p->end_page_ext("");
$p->end_document("");

$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=circulos.pdf");
echo $buf;
?>
