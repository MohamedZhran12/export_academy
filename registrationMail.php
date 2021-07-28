<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

$mail = new PHPMailer(true);
try {
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->IsSMTP();
  $mail->Host = 'mail.exportacademy.net';
  $mail->SMTPAuth = true;
  $mail->Username = 'admin@exportacademy.net';
  $mail->Password = 'Z7AgB&2;,HEr';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port = 465;
  $email = isset($_POST['email']) ? $_POST['email'] : 'admin@exportacademy.net';
  $mail->setFrom($email, 'Export Academy');

  // $mail->addAddress('mohamedzhranfive@gmail.com');
  $mail->addAddress('zaheer.ahsan85@gmail.com');
  // $mail->addAddress('mohamedzhran12@hotmail.com');
  $mail->isHTML(true);

  $mail->Body = $body;

  $mail->Subject = 'Thanks For Your Registration';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
