<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");
require_once($includes . 'sections_info.php');
$month = $_GET['month'];
$isNewYear = isset($_GET['year']) ? 1 : 0;

$courseTypeHeader = str_replace('sys_', '', $table) . '_header';
$courseTypeTerms = str_replace('sys_', '', $table) . '_terms';

$headerAndTermsStmt = $conn->prepare("select value from statics where name=? or name=?");
$headerAndTermsStmt->execute([$courseTypeHeader, $courseTypeTerms]);
$headerAndTerms = $headerAndTermsStmt->fetchAll();
?>

<div class="header-in" style="background-image: url(../../images/header/<? echo str_replace(' ', '_', $sectionName) . '.webp'; ?>), url(../../images/header/about.jpg)">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1><? echo $sectionName; ?></h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php"><i class="fas fa-home"></i> HOME</a></p>
          <p class="link"><? echo $sectionName; ?></p>
          <p class="link-at"><?php
                              $monthNum = $month;/*Here 1 is the month number*/
                              $dateObj = DateTime::createFromFormat('!m', $monthNum);/*Convert the number into month name*/
                              $monthName = $dateObj->format('F');
                              echo $monthName;
                              ?>
            <?php echo date("Y"); ?>

            Courses</p>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="background-white">
  <div class="container">
    <div class="padding-100">


      <div class="row">
        <div class="col-sm-3">
          <?php
          require_once($rootDir . 'components/calendar.php');
          ?>
        </div>

        <div class="col-sm-9">
          <div class="padding-left-30">
            <div class="my-main-list">
              <?php echo $headerAndTerms[0]['value']; ?>
              <h2 class="topic-in mt-3">
                <?php
                $monthNum = $month;/*Here 1 is the month number*/
                $dateObj = DateTime::createFromFormat('!m', $monthNum);/*Convert the number into month name*/
                $monthName = $dateObj->format('F');
                echo $monthName;
                ?>

                <?php echo date("Y") + $isNewYear; ?>

                Courses
              </h2>
            </div>

            <br><br>

            <div class="row">

              <?php
              $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_year= YEAR(CURDATE())+ $isNewYear and sys_course_month = ? order by sys_course_date asc,sys_course_month, sys_course_year");
              $sql->execute([$month]);
              if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $row) {

              ?>
                  <div class="col-sm-4">
                    <div class="margin-30">
                      <div class="courses-det">
                        <a class="button-1" href="/courses/course.php?id=<?php echo $row['sys_course_id']; ?>&cat_id=<?php echo $row['cat_id']; ?> &course=<? echo $table; ?>">
                          <div class="courses-image">
                            <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $row['sys_course_date']; ?>
                              - <?php echo $row['sys_course_month']; ?> - <?php echo $row['sys_course_year']; ?></p>
                            <img alt='image' src="/images/courses/<?php echo $row['sys_course_image']; ?>">
                          </div>
                          <div class="courses-desc1">
                            <p class="course-topic-1-2"><?php echo $row['sys_course_topic']; ?></p>
                            <p class="place"><i class="fas fa-map-marker-alt"></i> <?php echo $row['sys_course_venue']; ?></p>

                            <div class="course-set-pp">
                              <div class="courses-pricing">
                                <?php
                                $amount = $row['sys_course_price_before'];
                                if ($amount >= 1.00) {
                                  echo '<span class="cutoff">';
                                  echo "RM" . $row["sys_course_price_before"] . "";
                                  echo '</span>';
                                } else {
                                  echo '<br>';
                                }
                                ?>
                                <p>RM <?php echo $row['sys_course_price']; ?></p>
                              </div>

                              <div class="courses-more-det">
                                <p class="view"><i class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
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
              } ?>
            </div>
          </div>
          <?php echo $headerAndTerms[1]['value']; ?>
        </div>
      </div>
    </div>

  </div>
</div>


<?php
require_once($includes . 'footer.php');
?>
