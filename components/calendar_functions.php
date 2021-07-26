<?php
function getSectionCoursesCount($section, $month)
{
  global $conn;
  global $isNewYear;
  $sql = $conn->prepare("SELECT * FROM $section WHERE sys_course_year = YEAR(CURDATE()) + $isNewYear AND sys_course_month = ? order by sys_course_date desc,sys_course_month, sys_course_year");
  $sql->execute([$month]);
  return $sql->rowCount();
}

function sumCoursesCountForAMonth($month)
{
  $totalCoursesCount = 0;
  $sections = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions'];
  foreach ($sections as $section) {
    $totalCoursesCount += getSectionCoursesCount($section, $month);
  }
  return $totalCoursesCount;
}
