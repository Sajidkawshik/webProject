<?php
require('fpdf.php');
$username = isset($_GET['username']) ? $_GET['username'] : 'default';
$car = isset($_GET['car']) ? $_GET['car'] : 'ka-1000';
$license=isset($_GET['license']) ? $_GET['license'] : 'license';
$email=isset($_GET['email']) ? $_GET['email'] : 'faltunoman2017@gmail.com';

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(10,100,'Name:- '.$username);
$pdf->Cell(10,140,'Car Number:- '.$car);

$image1='C:/xampp/htdocs/webProject/myqrcode/temp/'.$license.'.png';
$image2='C:/xampp/htdocs/webProject/myqrcode/temp/DU.png';
$pdf->Cell( 40, 40, $pdf->Image($image2, 100, 10, 33.78), 0, 0, 'L', false );
$pdf->Cell( 40, 40, $pdf->Image($image1, 100, 100, 33.78), 0, 0, 'L', false );
//$pdf->Cell(40,10,'This is a faltu');
$path='C:/xampp/htdocs/webProject/save_pdf/'.$license;
$pdf->output($path,'F');
header("Location: http://localhost/webProject/swift.php?path=$path&email=$email");
?>