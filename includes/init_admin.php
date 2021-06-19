<?php
session_start();
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$css = '/assets/css/';
$js = '/assets/js/';
$images = '/images/';
$rootDir = $_SERVER['DOCUMENT_ROOT'] . '/';
$includes = $rootDir . '/includes/';

require_once($includes . "config.php");
require_once($includes . "sys_config.php");
require_once($includes . "func_date.php");
require_once($includes . "func_utility.php");
require_once($includes . "admin_header.php");
require_once($includes . "admin_nav.php");

global $conn;

if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="/admin/login.php";</script>';
}
