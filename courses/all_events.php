<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

$sectionName = 'All Events';
$sections = ['sys_course', 'sys_seminars', 'sys_professional_cert', 'sys_special_programmes', 'sys_trade_missions'];
$allCourses = [];


function getSectionCoursesFromDatabase($section)
{
  global $conn;
  $month = isset($_GET['month']) ? $_GET['month'] : date('m');
  $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
  $sql = $conn->prepare("SELECT * FROM $section WHERE sys_course_year = ? AND sys_course_month = ? order by sys_course_date asc,sys_course_month, sys_course_year");
  $sql->execute([$year, $month]);
  return $sql->fetchAll();
}

foreach ($sections as $section) {
  $allCourses[$section] = getSectionCoursesFromDatabase($section);
}
?>

<div class="header-in" style="background-image: url('../../images/header/All_Events.webp'), url(../../images/header/about.jpg)">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1><?php echo $sectionName; ?></h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php"><i class="fas fa-home"></i> HOME</a></p>
          <p class="link-at"><?php echo $sectionName; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="row">
    <div class="col-sm-3">
      <?php
      $isNewYear = 0;
      require($rootDir . 'components/all_events_calendar.php');
      if (date('m') == 7 || date('m') == 12) {
        $isNewYear = 1;
        require($rootDir . 'components/all_events_calendar.php');
      }
      ?>
    </div>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-12 mb-3">
          <h2 class="font-weight-bold my-4">
            <?php
            echo isset($_GET['month']) ? DateTime::createFromFormat('!m', $_GET['month'])->format('F') : date("F", strtotime('m'));
            echo ' ';
            echo date("Y") . ' ';
            echo $sectionName; ?> </h2>
        </div>

        <?php
        if (count($allCourses)) {
          foreach ($allCourses as $sectionName => $sectionCourses) {
            foreach ($sectionCourses as $courseInfo) {
        ?>
              <div class="col-sm-4">
                <div class="margin-30">
                  <div class="courses-det">
                    <a class="button-1" href="course.php?id=<?php echo $courseInfo['sys_course_id']; ?>&cat_id=<?php echo $courseInfo['cat_id']; ?>&course=<? echo $sectionName; ?>">
                      <div class="courses-image">
                        <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $courseInfo['sys_course_date']; ?>
                          - <?php echo $courseInfo['sys_course_month']; ?> - <?php echo $courseInfo['sys_course_year']; ?></p>
                        <img alt='image' src="/images/courses/<?php echo $courseInfo['sys_course_image']; ?>">
                      </div>
                      <div class="courses-desc1">
                        <p class="course-topic-1-2"><?php echo $courseInfo['sys_course_topic']; ?></p>
                        <p class="place"><i class="fas fa-map-marker-alt"></i> <? echo $courseInfo['sys_course_venue']; ?></p>
                        <div class="course-set-pp">
                          <? require('common_component/price.php'); ?>
                          <? if ($courseInfo['sys_sst'][0] !== '0') { ?>
                            <p class="mt-2"><?php echo $courseInfo['sys_sst']; ?></p>
                          <? } ?>
                          <div class="courses-more-det">
                            <p class="view d-inline mr-3"><i class="fas fa-eye"></i> <?php echo $courseInfo['sys_course_view']; ?></p>
                            <?php if ($courseInfo['cat_id'] == 2) { ?>
                              <i class="fas fa-map-marker-alt" style="font-size:11px;background-color: #ffbb58;  color:#fff ;padding:5px; border-radius:4px"></i>
                            <? } else { ?>
                              <i class="fas fa-video" style="font-size:11px;background-color: #ab0f90;  color:#fff ;padding:5px; border-radius:3px"></i>
                            <? } ?>

                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
        <?php }
          }
        } ?>

      </div>
    </div>
  </div>
</div>

<script src='/courses/common_component/js/price_switch.js'></script>

<?php
require_once($includes . 'footer.php');
?>
