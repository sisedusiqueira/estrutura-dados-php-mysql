<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}
$p->set_info("Creator","coordenadas.php");
$p->set_info("Author","Juliano Niederauer");
$p->set_info("Title","Sistema de coordenadas");

$p->begin_page_ext(595, 842, "");
    $font = $p->load_font("Helvetica-Bold","winansi","");
    $p->setfont($font,28.0);
    $p->show_xy( "Inferior esquerdo", 10, 10);
    $p->show_xy( "Inferior direito", 400, 10);
    $p->show_xy( "Superior esquerdo", 10, 802);
    $p->show_xy( "Superior direito", 370, 802);
    $p->show_xy( "Centro",595/2-50,842/2-14);
$p->end_page_ext("");

//$p->set_parameter("openaction", "fitpage");
$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=coordenadas.pdf");
echo $buf;
?>
