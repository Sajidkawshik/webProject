<?php
require_once('C:/xampp/htdocs/PHPMailer-master/class.phpmailer.php');
$filename=$_GET['path'];
$email = new PHPMailer();
$email->From      = 'uprokash@gmail.com';
$email->FromName  = 'Your Name';
$email->Subject   = 'Message Subject';
$email->Body      = 'body';
$email->AddAddress( 'uprokash@gmail.com');
$file_to_attach = $filename;
$email->AddAttachment( $file_to_attach ,'form.pdf');
return $email->Send();
?>