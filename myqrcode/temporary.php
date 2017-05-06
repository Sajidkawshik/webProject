<?php 
 include('phpqrcode/qrlib.php'); 
 define('EXAMPLE_TMP_SERVERPATH', dirname(__FILE__).'/temp/');
 define('EXAMPLE_TMP_URLRELPATH', 'phpqrcode/temp/');
 $tempDir = "temp/";
 
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$email=$_GET['email'];
$username=$fname.' '.$lname;
$dept=$_GET['dept'];
$con_add=$_GET['con_add'];
$blood=$_GET['blood'];
//echo $blood;
$contact=$_GET['contact'];
//echo $contact;
$license=$_GET['license'];
$car=$_GET['car'];
$codeContents='Name:- '.$fname.' '.$lname.' '.'Adress:- '.$con_add.' '.'Mobile:- '.$contact.' '.'License NO:- '.$license.' '.'Car NO:- '.$car;
QRcode::png($codeContents, $tempDir.$license.'.png', QR_ECLEVEL_L, 3);
header("Location: http://csedu.cf/duvehicle/create_pdf/demopdf.php?username=$username&dept=$dept&car=$car&license=$license&email=$email");
?>