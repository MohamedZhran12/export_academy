<div class='margin-top'></div>
<script>
    window.onload = function () {
        document.querySelector('body').style.overflow = 'visible';
        document.getElementById('loader1').style.display = 'none';

    }
</script>
<?php
if (!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
  exit('<h2>Please check the the captcha</h2>');
} else {
  $captcha = $_POST['g-recaptcha-response'];
}
$secretKey = "6LeiRZwaAAAAAHJTeHf4VTZLpBflqqCk3PpeNfhU";

$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response, true);
if (!($responseKeys['success'])) {
  exit('<h2>Please Check The Captcha</h2>');
}
?>