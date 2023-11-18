<?php
$arquivo_txt = "teste.txt";

if(file_exists($arquivo_txt))
    $texto = file_get_contents ($arquivo_txt);
else
{
    echo "Arquivo $arquivo_txt não encontrado!";
    exit;
}
    
$margem_vertical = 60;
$margem_horizontal = 40;

$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}
$p->set_info("Creator","txt2pdf.php");
$p->set_info("Author","Juliano Niederauer");
$p->set_info("Title","Conversor TXT para PDF");

// cria um modelo
$im = $p->load_image ("jpeg", "matematica.jpg","");
$modelo = $p->begin_template_ext(595,842,"");
    $p->save();
    $p->fit_image($im, 4, 791, "");
    $p->moveto(0,789);
    $p->lineto(595,789);
    $p->stroke();
    $font = $p->load_font("Times-Bold","winansi", "");
    $p->setfont($font,20);
    $p->show_xy("Só Matemática - www.somatematica.com.br",115,810);
    $p->restore();
$p->end_template();
$p->close_image ($im);

// cria a caixa de texto e insere o texto dividido em páginas
$objTexto = $p->create_textflow($texto,"fontname=Arial fontsize=12 encoding=winansi alignment=justify");
do
{
    $p->begin_page_ext(595, 842, "");
        $p->fit_image($modelo, 0, 0, "");  // modelo
        $result = $p->fit_textflow($objTexto, $margem_horizontal, $margem_vertical, 595-$margem_horizontal, 842-$margem_vertical, "");
    $p->end_page_ext("");

} while ($result != "_stop");


$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=txt2pdf.pdf");
echo $buf;
?>
