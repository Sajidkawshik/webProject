<?php
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$image1='C:/xampp/htdocs/webProject/myqrcode/temp/kaw1000.png';
$image2='C:/xampp/htdocs/webProject/myqrcode/temp/DU.png';
$pdf->Cell( 40, 40, $pdf->Image($image2, 50, 50, 33.78), 0, 0, 'L', false );
$pdf->Cell( 40, 40, $pdf->Image($image1, 100, 100, 33.78), 0, 0, 'L', false );
//$pdf->Cell(40,10,'This is a faltu');
$path='C:/xampp/htdocs/webProject/save_pdf/kaw-1000.pdf';
$pdf->output($path,'F');
header("Location: http://localhost/webProject/sendpdf.php?path=$path");
?>