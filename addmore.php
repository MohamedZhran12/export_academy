<?php
$success_msg = 'Your Registration is submitted successfully.<br>
        Our team will get back to you as soon as possible.';
require_once('header.php');
require_once('nav.php');
require_once('registration_success.php');
?>
<!-- A meta tag that redirects after 5 seconds to one of my PHP tutorials-->
<meta http-equiv="refresh" content="2;url='<? echo $_POST['section']; ?>'">
<?php

if (!empty($_POST["name"])) {
  foreach ($_POST["name"] as $key => $name) {

    global $conn;
    $sql = $conn->prepare("INSERT INTO testing
    (name , designation, company_name, mobile, nature_business, person_incharge, person_email, person_mobile, address, tel, hrdf, sme, coursename, price, date, month, year)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $sql->execute([
      $name, , $_POST['designation'][$key], $_POST['company'], $_POST['mobile'][$key], $_POST['nature'], $_POST['person'], $_POST['email'], $_POST['personmobile'], $_POST['address'], $_POST['tel'], $_POST['hrdf'], $_POST['sme'], $_POST['coursename'], $_POST['price'], $_POST['date'], $_POST['month'], $_POST['year']
    ]);
  }
  require_once('public_training_mail_body.php');
  require_once('registrationMail.php');
}
?>

<?php
require_once('footer.php');
?>
