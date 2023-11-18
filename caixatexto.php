<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}
$p->begin_page_ext(595, 842, "");

$texto = "Estou escrevendo um texto dentro de uma caixa de texto! Que bacana!";
$opcoes = "fontname=Arial fontsize=38 encoding=winansi";

$objTexto = $p->create_textflow($texto,"$opcoes alignment=left");
$p->fit_textflow($objTexto, 50, 630, 545, 810, "");
$p->rect(50,630,500,180);
$p->stroke();
$p->delete_textflow($objTexto);

$objTexto = $p->create_textflow($texto,"$opcoes alignment=right");
$p->fit_textflow($objTexto, 50, 430, 545, 610, "");
$p->rect(50,430,500,180);
$p->stroke();
$p->delete_textflow($objTexto);

$objTexto = $p->create_textflow($texto,"$opcoes alignment=justify");
$p->fit_textflow($objTexto, 50, 230, 545, 410, "");
$p->rect(50,230,500,180);
$p->stroke();
$p->delete_textflow($objTexto);

$objTexto = $p->create_textflow($texto,"$opcoes alignment=center");
$p->fit_textflow($objTexto, 50, 30, 545, 210, "");
$p->rect(50,30,500,180);
$p->stroke();
$p->delete_textflow($objTexto);

$p->end_page_ext("");
//$p->set_parameter("openaction", "fitpage");
$p->end_document("");

$buf = $p->get_buffer();
$len = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$len");
header("Content-Disposition:inline; filename=caixatexto.pdf");
echo $buf;
?>
