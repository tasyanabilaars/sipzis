<?php 
include '../koneksi.php';
include 'fpdf/fpdf';
$pdf = new FPDF("L","cm", "A4");
$pdf->WriteHTML('<h1>Hello world!</h1>');
$pdf->Output();


?>