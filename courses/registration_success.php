<?
// require_once($rootDir . 'verifyCaptcha.php');
?>

<div class="header-in-course">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1>Thank You</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php"><i class="fas fa-home"></i> Home</a></p>
          <p class="link-at">Thank You</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="padding-100">
  <div class="container">
    <div class="text-center">
      <h1>Thank You!</h1><br>
      <h5><? echo isset($success_msg) ? $success_msg : 'Your Registration is submitted successfully.<br>
        Our team will get back to you as soon as possible.'; ?></h5>
    </div>
  </div>
</div>
<?
require_once($includes . 'footer.php');
?>
