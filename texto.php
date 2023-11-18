<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}
$p->begin_page_ext(595, 842, "");
$font = $p->load_font("Helvetica-Bold","winansi","");
$p->setfont($font,32.0);

// primeiro texto
$p->set_parameter("overline", "true");
$p->show_xy("Linha sobre o texto", 50, 780);
$p->set_parameter("overline", "false");

// segundo texto
$p->set_parameter("underline", "true");
$p->continue_text("Texto sublinhado");
$p->set_parameter("underline", "false");

// terceiro texto
$p->set_parameter("strikeout", "true");
$p->continue_text("Texto tachado");
$p->set_parameter("strikeout", "false");

// quarto texto
$p->setcolor("fill","rgb", 0, 0, 1, 0);
$p->continue_text("Texto azul");

// quinto texto
$p->set_value("textrendering", "1");
$p->setcolor("stroke","rgb", 1, 0, 0, 0);
$p->continue_text("Texto contornado em vermelho");

// sexto texto
$p->set_value("textrendering", "2");
$p->setcolor("fill","rgb", 0, 0, 1, 0);
$p->setlinewidth(2);
$p->continue_text("Texto azul, contorno vermelho");

$p->end_page_ext("");
$p->end_document("");

$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=texto.pdf");
echo $buf;
?>
