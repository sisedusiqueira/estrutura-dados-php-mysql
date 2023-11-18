<?php
$arquivo = 'teste.pdf';
$pdf = new PDFlib();

//  abre um novo arquivo PDF
if ($pdf->begin_document($arquivo, "") == 0) {
	die("Erro: " . $pdf->get_errmsg());
}

$pdf->set_info("Author", "Juliano Niederauer");
$pdf->set_info("Title", "Documento teste");
$pdf->set_info("Creator", "Juliano Niederauer");
$pdf->set_info("Subject", "Meu primeiro documento PDF");

$pdf->begin_page_ext(595, 842, "");
	$fonte = $pdf->load_font("Helvetica-Bold", "winansi", "");
    $pdf->setfont($fonte, 16);
    $pdf->show_xy("Este é o meu primeiro documento PDF!!!", 150, 750);
$pdf->end_page_ext("");

$pdf->end_document("");

echo "Arquivo <strong>$arquivo</strong> criado!";
echo "<br><a href=$arquivo>Clique aqui para acessá-lo</a>";
?>