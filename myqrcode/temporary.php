<?php 
 include('phpqrcode/qrlib.php'); 
 define('EXAMPLE_TMP_SERVERPATH', dirname(__FILE__).'/temp/');
 define('EXAMPLE_TMP_URLRELPATH', 'phpqrcode/temp/');
 $tempDir = EXAMPLE_TMP_SERVERPATH;
 
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$con_add=$_GET['con_add'];
$blood=$_GET['blood'];
//echo $blood;
$contact=$_GET['contact'];
//echo $contact;
$license=$_GET['license'];
$car=$_GET['car'];
$codeContents=$fname.' '.$lname.' '.$con_add.' '.$contact.' '.$license.' '.$car;
QRcode::png($codeContents, $tempDir.$license.'.png', QR_ECLEVEL_L, 3);
header("Location: http://localhost/webProject/create_pdf/demopdf.php?name=$license");
?>