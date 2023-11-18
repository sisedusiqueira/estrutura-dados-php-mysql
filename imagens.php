<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}
$p->begin_page_ext(595, 842, "");

$im = $p->load_image ("jpeg", "jovem.jpg","");

if(!$im) { die("Erro: ".$p->get_errmsg()); }

    $p->fit_image($im, 20, 500, "scale 1");
    $p->fit_image($im, 170, 500, "scale 0.75");
    $p->fit_image($im, 280, 500, "scale 0.50");
    $p->fit_image($im, 355, 500, "scale 0.25");
    $p->fit_image($im, 395, 500, "scale 0.10");
$p->close_image ($im);

$p->end_page_ext("");
$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=imagens.pdf");
echo $buf;
?>
