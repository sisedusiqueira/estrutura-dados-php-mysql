<?php
$p = new PDFlib();
if ($p->begin_document("", "") == 0) {
	die("Erro: " . $p->get_errmsg());
}

$p->begin_page_ext(595, 842, "");
    $im = $p->load_image ("jpeg", "gremio.jpg","");

    // adiciona um bookmark
    $topico = $p->create_bookmark("Clubes", "");
    $p->create_bookmark("Grêmio", "parent $topico");

    // adiciona um weblink
    $p->fit_image($im, 250, 700, "");
    $largura = $p->get_value ("imagewidth", $im);
    $altura = $p->get_value ("imageheight", $im);
    $url = $p->create_action("URI", "url=http://www.gremio.net");
    $p->create_annotation (250, 700, 250+$largura, 700+$altura, "Link", "action {activate $url}");

	$p->close_image($im);
    $font = $p->load_font("Helvetica-Bold","winansi", "");
    $p->setfont( $font, 20);
    $p->show_xy( "Página sobre o Grêmio", 40, 800);
$p->end_page_ext("");

$p->begin_page_ext(595, 842, "");
    $im = $p->load_image ("jpeg", "flamengo.jpg","");

    // adiciona um weblink
    $p->fit_image($im, 250, 700, "");
    $largura = $p->get_value ("imagewidth", $im);
    $altura = $p->get_value ("imageheight", $im);
    $url = $p->create_action("URI", "url=http://www.flamengo.com.br");
    $p->create_annotation (250, 700, 250+$largura, 700+$altura, "Link", "action {activate $url}");
    $p->close_image($im);

    // adiciona um bookmark
    $p->create_bookmark("Flamengo", "parent $topico");

    // conteúdo da página
    $p->setfont($font, 20);
    $p->show_xy("Página sobre o Flamengo", 40, 800);
$p->end_page_ext("");

$p->end_document("");
$buf = $p->get_buffer();
$tamanho = strlen($buf);
header("Content-type:application/pdf");
header("Content-Length:$tamanho");
header("Content-Disposition:inline; filename=referencias.pdf");
echo $buf;
?>
