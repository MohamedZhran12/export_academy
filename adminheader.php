<?php
ob_start();

require_once("includes/sys_config.php");
require_once("includes/ini_set.php");
require_once("includes/func_date.php");
require_once("includes/func_utility.php");
require_once("includes/config.php");
?>


<?php
global $conn;
$sql = $conn->prepare("SELECT usr_id, usr_describe, usr_loginid, usr_password, usr_fullname, usr_email, usr_mobile, usr_country, usr_regdate, usr_lastlogin, usr_active, usr_decrypt, level_id, awr_id, gender_id, usr_state, born, usr_designation FROM sys_user WHERE usr_id =?");
$sql->execute([$_SESSION['user']['usr_id']]);
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/bootstrap.min.css">

  <!-- Place your kit's code here -->
  <script src="https://kit.fontawesome.com/6447b138b1.js" crossorigin="anonymous"></script>

  <link rel='stylesheet' href='assets/bootstrap-datepicker3.standalone.min.css'>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

  <!-- Style -->
  <link rel="stylesheet" href="assets/adminstyle.css">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/favicon/favicon.png"/>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179097857-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }

      gtag('js', new Date());

      gtag('config', 'UA-179097857-1');
  </script>

  <!-- fade in out-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init();
  </script>

  <title>Malaysian Export Academy</title>
</head>

<body>
