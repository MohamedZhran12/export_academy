<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");
require_once($includes . 'sections_info.php');

$sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_year = YEAR(CURDATE()) AND sys_course_month = MONTH(CURDATE()) order by sys_course_date asc,sys_course_month, sys_course_year");
$sql->execute();

$courseTypeHeader = str_replace('sys_', '', $table) . '_header';
$courseTypeTerms = str_replace('sys_', '', $table) . '_terms';

$headerAndTermsStmt = $conn->prepare("select value from statics where name=? or name=?");
$headerAndTermsStmt->execute([$courseTypeHeader, $courseTypeTerms]);
$headerAndTerms = $headerAndTermsStmt->fetchAll();
?>

<div class="header-in">
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
      if ($isThereCalendar) {
        require_once($rootDir . 'components/calendar.php');
      }
      ?>
    </div>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-12"><?php require_once($rootDir . 'right-current-link.php'); ?></div>
        <div class="col-12 mb-3">
          <?php echo $headerAndTerms[0]['value']; ?>
          <h2 class="font-weight-bold my-4">
            <?php
            echo date("F", strtotime('m')) . ' ';
            echo date("Y") . ' ';
            echo $sectionName; ?> </h2>
        </div>

        <?php
        if ($sql->rowCount() > 0) {
          foreach ($sql->fetchAll() as $courseInfo) {
        ?>
            <div class="col-sm-4">
              <div class="margin-30">
                <div class="courses-det">
                  <a class="button-1" href="course.php?id=<?php echo $courseInfo['sys_course_id']; ?>&cat_id=<?php echo $courseInfo['cat_id']; ?>&course=<? echo $table; ?>">
                    <div class="courses-image">
                      <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $courseInfo['sys_course_date']; ?>
                        - <?php echo $courseInfo['sys_course_month']; ?> - <?php echo $courseInfo['sys_course_year']; ?></p>
                      <img alt='image' src="/images/courses/<?php echo $courseInfo['sys_course_image']; ?>">
                    </div>
                    <div class="courses-desc1">
                      <p class="course-topic-1-2"><?php echo $courseInfo['sys_course_topic']; ?></p>
                      <? if ($isThereVenue) { ?>
                        <p class="place"><i class="fas fa-map-marker-alt"></i> <? echo $courseInfo['sys_course_venue']; ?></p>
                      <? } ?>

                      <div class="course-set-pp">
                        <? require('common_component/price.php'); ?>
                        <? if ($courseInfo['sys_sst'][0] != 0) { ?>
                          <p class="mt-2"><?php echo $courseInfo['sys_sst']; ?></p>
                        <? } ?>
                        <div class="courses-more-det">
                          <p class="view d-inline mr-3"><i class="fas fa-eye"></i> <?php echo $courseInfo['sys_course_view']; ?></p>
                          <?php if ($courseInfo['cat_id'] == 2) { ?>
                            <i class="fas fa-map-marker-alt" style="background-color: #ffbb58;  color:#fff ;padding:5px; border-radius:4px"></i>
                          <? } else { ?>
                            <i class="fas fa-video" style="background-color: #ab0f90;  color:#fff ;padding:5px; border-radius:3px"></i>
                          <? } ?>
                          <p class="<?php echo $courseInfo['sys_course_session']; ?>"></p>

                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        <?php }
        } ?>

      </div>
      <div class='col-12 my-4'>
        <?php echo $headerAndTerms[1]['value']; ?>
      </div>
    </div>

  </div>
</div>

<script src='/courses/common_component/js/price_switch.js'></script>

<?php
require_once($includes . 'footer.php');
?>
