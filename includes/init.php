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
require_once($includes . "header.php");
require_once($includes . "nav.php");

global $conn;
