<?php
require_once 'lib/swift_required.php';
require_once 'lib/swift_init.php';
require_once 'lib/swift_required_pear.php';
$path=$_GET['path'];
$email=$_GET['email'];
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('ducar2k17@gmail.com')
            ->setPassword('ducar2017')
            ->setEncryption('ssl');

$mailer = new Swift_Mailer($transport);
$message = Swift_Message::newInstance()
      ->setFrom('ducar2k17@gmail.com')
      ->setTo($email)
      ->setSubject('Subject')
      ->setBody('Body')
      ->attach(Swift_Attachment::fromPath($path)->setFilename('form.pdf'))
    ;

$mailer->send($message);
//header('Location: admin.html');
?>