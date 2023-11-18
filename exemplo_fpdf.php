<?php
require("fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',36);
$pdf->Cell(50,30,'Hello World!');
$pdf->Output();
?>