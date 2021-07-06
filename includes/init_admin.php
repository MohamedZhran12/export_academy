<?php
require_once('init_base.php');
require_once($includes . "admin_header.php");
require_once($includes . "admin_nav.php");

global $conn;

if ($_SESSION['user']['level_id'] != 1) {
  echo '<script>alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="/admin/login.php";</script>';
}
