<?php
$success_msg = 'Your Registration is submitted successfully.<br>
        Our team will get back to you as soon as possible.';
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

require_once('registration_success.php');
?>
<!-- A meta tag that redirects after 5 seconds to one of my PHP tutorials-->

<?php

if (!empty($_POST["name"])) {
  require_once('public_training_mail_body.php');
  require_once('registrationMail.php');
}
?>

<?php
require_once($includes . 'footer.php');
?>
