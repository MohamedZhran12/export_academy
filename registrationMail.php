<?php
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mohamedzhranfive@gmail.com';
$mail->Password = 'neeyqphifmmnitgl';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$email = isset($_POST['email']) ? $_POST['email'] : 'admin@exportacademy.net';
$mail->setFrom($email, 'Export Academy');

$mail->addAddress('shafarook06@gmail.com');
// $mail->addAddress('zaheer.ahsan85@gmail.com');
// $mail->addAddress('mohamedzhran12@hotmail.com');
$mail->isHTML(true);

$mail->Body = $body;

$mail->Subject = 'Thanks For Your Registration';

if (!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent';
}