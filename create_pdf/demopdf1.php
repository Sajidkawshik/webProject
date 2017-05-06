<?php
require('fpdf.php');
$username = isset($_GET['username']) ? $_GET['username'] : 'default';
$dept = isset($_GET['dept']) ? $_GET['dept'] : 'CSE';
$car = isset($_GET['car']) ? $_GET['car'] : 'ka-1000';
$license=isset($_GET['license']) ? $_GET['license'] : 'license';
$email=isset($_GET['email']) ? $_GET['email'] : 'faltunoman2017@gmail.com';

$pdf=new FPDF();
$pdf->AddPage();
$image1='../myqrcode/temp/'.$license.'.png';
$image2='../myqrcode/temp/DU.png';



$pdf->SetY(70);
$pdf->SetFont('Times','B',18);
$pdf->Cell(0,10,'Name: '.$username,0,0,'C');
$pdf->SetY(78);
$pdf->Cell(0,10,'Car Number:- '.$car,0,0,'C');


$pdf->Cell( 0, 10, $pdf->Image($image1, 89, 100, 33.78), 0, 0, 'L', false );

$pdf->Cell( 40, 40, $pdf->Image($image2, 89, 22, 33.78), 0, 0, 'L', false );
$pdf->SetLineWidth(1.5);
$pdf->Line(20, 12, 210-20, 12);
$pdf->Line(20, 140, 210-20, 140);
$pdf->Line(20, 12, 20, 140);
$pdf->Line(210-20, 12, 210-20, 140);

$path='save_pdf/'.$license.'.pdf';
$pdf->output($path,'F');
header("Location: http://csedu.cf/duvehicle/swift.php?path=$path&email=$email");
?>