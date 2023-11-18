<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

// cria o modelo
$im = $p->load_image ("jpeg", "postgresql.jpg","");
$template = $p->begin_template_ext(595,842,"");
    $p->save();
    $p->fit_image($im, 4, 795, "scale 0.15");
    $p->fit_image($im, 565, 795, "scale 0.15");
    $p->moveto(0,793);
    $p->lineto(595,793);
    $p->stroke();
    $font = $p->load_font("Times-Bold","winansi","");
    $p->setfont($font,30);
    $p->show_xy("Exemplo de modelo PDF",130,810);
    $p->restore();
$p->end_template();
$p->close_image ($im);

// Primeira página
$p->begin_page_ext(595, 842, "");
$p->fit_image($template, 0, 0, "");
$p->end_page_ext("");

// Segunda página
$p->begin_page_ext(595, 842, "");
$p->fit_image($template, 0, 0, "");
$p->end_page_ext("");

$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
Header("Content-type:application/pdf");
Header("Content-Length:$tamanho");
Header("Content-Disposition:inline; filename=modelo.pdf");
echo $buf;
?>
