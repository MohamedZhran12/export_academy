<?php
if ($_GET['course'] == 'sys_course') {
  $table = 'sys_course';
  $sectionName = 'Public Training';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer/s';
} else if ($_GET['course'] == 'sys_seminars') {
  $table = 'sys_seminars';
  $sectionName = 'Seminar & Conferences';
  $details = 'Course Details';
  $modules = 'Tentative Programme';
  $instructorType = 'Speaker/s';
} else if ($_GET['course'] == 'sys_professional_cert') {
  $table = 'sys_professional_cert';
  $sectionName = 'Professional Certification';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer/s';
} else if ($_GET['course'] == 'sys_special_programmes') {
  $table = 'sys_special_programmes';
  $sectionName = 'Special Programmes';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
} else if ($_GET['course'] == 'sys_trade_missions') {
  $table = 'sys_trade_missions';
  $sectionName = 'Trade Missions';
  $details = 'Mission Info';
  $modules = 'Tentative Programme';
  $instructorType = 'Trade Accelerator (TA)';
} else if ($_GET['course'] == 'consulting_services') {
  $table = 'consulting_services';
  $sectionName = 'Consulting Services';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
  $groupsTable = $table . '_groups';
} else if ($_GET['course'] == 'export_coaching') {
  $table = 'export_coaching';
  $sectionName = 'Export Coaching';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
  $groupsTable = $table . '_groups';
} else if ($_GET['course'] == 'in_house') {
  $table = 'in_house';
  $sectionName = 'In House';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
  $groupsTable = $table . '_groups';
} else if ($_GET['course'] == 'products') {
  $table = 'products';
  $sectionName = 'Products';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
  $groupsTable = $table . '_groups';
} else if ($_GET['course'] == 'global_network') {
  $table = 'global_network';
  $sectionName = 'Global Network';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
  $groupsTable = $table . '_groups';
} else if ($_GET['course'] == 'trade_shows') {
  $table = 'trade_shows';
  $sectionName = 'Trade Shows';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructorType = 'Trainer(s)/Speaker(s)';
  $groupsTable = $table . '_groups';
}

$coursesWithDates = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions'];
$coursesWithPrices = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions'];
$coursesWithCalendars = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions', 'trade_shows'];
$coursesWithVenue = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions', 'trade_shows'];
$coursesWithTaxes = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions'];
$coursesWithRightMenu = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes'];
$coursesWithGroups = ['consulting_services', 'trade_shows', 'global_network', 'products', 'in_house', 'export_coaching'];

$isThereMoreDates = in_array($table, $coursesWithDates);
$isTherePrices = in_array($table, $coursesWithPrices);
$isThereCalendar = in_array($table, $coursesWithCalendars);
$isThereTaxes = in_array($table, $coursesWithTaxes);
$isThereVenue = in_array($table, $coursesWithVenue);
$isThereRightMenu = in_array($table, $coursesWithRightMenu);
$isThereGroups = in_array($table, $coursesWithGroups);
