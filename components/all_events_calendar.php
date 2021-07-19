<?php

function getSectionCoursesCount($section, $month)
{
  global $conn;
  $sql = $conn->prepare("SELECT * FROM $section WHERE sys_course_year = YEAR(CURDATE()) AND sys_course_month = ? order by sys_course_date desc,sys_course_month, sys_course_year");
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
?>

<div class="side-bar-main">
  <div class="side-topic">
    <strong>Calendar <?php echo date("Y"); ?></strong>
  </div>
  <div class="side-des">
    <div class="container">
      <div class="row">
        <?php
        for ($i = 1; $i <= 12; $i++) {
          $index = $i < 10 ? '0' . $i : $i;
        ?>
          <div class="col-6 p-0">
            <a href="/courses/all_events.php?month=<? echo $index; ?>">
              <p class="calendar"><? echo DateTime::createFromFormat('!m', $index)->format('F'); ?></p>
              <span class="total-r">
                <?php
                echo sumCoursesCountForAMonth($index);
                ?>
              </span>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
