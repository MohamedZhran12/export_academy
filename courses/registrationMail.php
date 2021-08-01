<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $rootDir . 'phpMailer/Exception.php';
require $rootDir . 'phpMailer/PHPMailer.php';
require $rootDir . 'phpMailer/SMTP.php';

$mail = new PHPMailer(true);
try {
  $mail->SMTPDebug = SMTP::DEBUG_OFF;
  $mail->IsSMTP();
  $mail->Host = 'mail.exportacademy.net';
  $mail->SMTPAuth = true;
  $mail->Username = 'admin@exportacademy.net';
  $mail->Password = '=Bn{DMvb[0D0';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port = 465;
  $mail->setFrom('admin@exportacademy.net', $_POST['email']);

  $mail->addAddress('info.mexasb@gmail.com');
  // $mail->addAddress('mohamedzhran12@hotmail.com');
  $mail->isHTML(true);

  $mail->Body = $body;

  $mail->Subject = 'Thanks For Your Registration';

  $mail->send();
} catch (Exception $e) {
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
