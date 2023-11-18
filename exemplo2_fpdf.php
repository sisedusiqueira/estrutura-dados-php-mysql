<?php
require("fpdf/fpdf.php");

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetXY(10, 20);
$pdf->SetFont('Helvetica', 'B', 20);
$pdf->Cell(75, 5, 'Esta é a classe FPDF');
$pdf->SetFont('Helvetica', 'I', 14);
$pdf->Cell(0, 5, '(http://www.fpdf.org)');
$pdf->ln();

$pdf->SetLineWidth(0.5);
$pdf->Line(10, 27, 200, 27);
$pdf->ln(5);

$pdf->SetFont('Courier', 'B', 10);
$pdf->SetLineWidth(0.2);
$pdf->MultiCell(0, 5, "O comando MultiCell nos permite escrever dentro de uma caixa de texto e utilizar quebras de linha.\nA quebra de linha pode ser automática ou forçada com o caracter \\n", 1, 1);
$pdf->ln(5);

$pdf->SetFillColor(153, 153, 153);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(0, 10, "Esta é uma caixa de texto com preenchimento em cinza e texto escrito em branco. O alinhamento do texto é o justificado.", 1, 'J', 1, 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->ln(5);

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(0, 5, 'Alguns tipos de fontes:', 0, 1);
$pdf->SetFont('Courier', 'B', 12);
$pdf->Cell(0, 5, 'Texto em Courier 12 em negrito', 0, 1);
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(0, 5, 'Texto em Helvetica 10', 0, 1);
$pdf->SetFont('Arial', 'BI', 14);
$pdf->Cell(0, 5, 'Texto em Arial 14 em negrito e itálico', 0, 1);
$pdf->ln(5);

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(60, 5, "Escrevendo textos com cores", 0, 0);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(30, 5, "Vermelho", 0, 0);
$pdf->SetTextColor(0, 255, 0);
$pdf->Cell(30, 5, "Verde", 0, 0);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(30, 5, "Azul", 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->ln(5);

$pdf->Cell(0, 5, 'É possível definir o alinhamento dos textos em uma célula:', 0, 1);
$pdf->Cell(0, 5, 'Alinhamento à esquerda', 1, 1, 'L');
$pdf->Cell(0, 5, 'Alinhamento centralizado', 1, 1, 'C');
$pdf->Cell(0, 5, 'Alinhamento à direita', 1, 1, 'R');
$pdf->Output();
?>
