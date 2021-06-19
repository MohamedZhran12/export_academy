<?php
if ($_GET['t'] == 'sys_course') {
  $table = 'sys_course';
  $sectionUrl = 'public-training.php';
  $section = 'Public Training';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructor_type = 'Trainer/s';
} else if ($_GET['t'] == 'sys_seminars') {
  $table = 'sys_seminars';
  $sectionUrl = 'seminar-conference.php';
  $section = 'Seminar & Conferences';
  $details = 'Course Details';
  $modules = 'Tentative Programme';
  $instructor_type = 'Speaker/s';
} else if ($_GET['t'] == 'sys_professional_cert') {
  $table = 'sys_professional_cert';
  $sectionUrl = 'professional-certifications.php';
  $section = 'Professional Certification';
  $course_type = 'professional_certificate';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructor_type = 'Trainer/s';
} else if ($_GET['t'] == 'sys_special_programmes') {
  $table = 'sys_special_programmes';
  $sectionUrl = 'special-programs.php';
  $section = 'Special Programmes';
  $course_type = 'special_programmes';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructor_type = 'Trainer(s)/Speaker(s)';
} else if ($_GET['t'] == 'sys_trade_missions') {
  $table = 'sys_trade_missions';
  $sectionUrl = 'trade-missions.php';
  $section = 'Trade Missions';
  $details = 'Mission Info';
  $modules = 'Tentative Programme';
  $instructor_type = 'Trade Accelerator (TA)';
}

$coursesWithDates = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions'];
$coursesWithRightMenu = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmesa'];

$isThereMoreDates = in_array($table, $coursesWithDates);
$isThereRightMenu = in_array($table, $coursesWithRightMenu);
