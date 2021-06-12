<?php
require_once("header.php");
require_once("includes/func_get_user_detail.php");
global $conn;
if (isset($_POST['txt_email']) && isset($_POST['txt_password'])) {

  $sql = $conn->prepare("SELECT * FROM sys_user
						 WHERE usr_email=?
						 AND usr_password=?
						 AND usr_active = 1;");
  $sql->execute([$_POST['txt_email'], md5($_POST['txt_password'])]);

  if ($sql->rowCount() > 0) {

    $row_verify = $sql->fetch();

    $str_location = "admin-main.php";

    $_SESSION['user'] = func_get_user_detail($row_verify['usr_loginid']); // store user id into session
    $_SESSION['usr_id'] = $row_verify['usr_id'];

    $_SESSION['last_login'] = time();  // get current timestamp
    func_update_user_login($row_verify['usr_loginid']);
    echo "<script>";
    echo "location.href='$str_location'";
    echo "</script>";

    exit();
  } else {

    echo "<script>";
    echo "alert('Login Fail!! Your credential specified not match or login account inactive.');";
    echo "location.href='loginnew.php?error=1'";
    echo "</script>";
    exit();
  }
}
