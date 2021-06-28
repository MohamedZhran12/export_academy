<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");
require_once($includes . 'sections_info.php');

$sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_year = YEAR(CURDATE()) AND sys_course_month = MONTH(CURDATE())");
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
        require_once($rootDir . 'sidebar.php');
      }
      ?>
    </div>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-12 mb-3">
          <h2 class="font-weight-bold mb-5">
            <?php
            echo date("F", strtotime('m')) . ' ';
            echo date("Y") . ' ';
            echo $sectionName; ?> </h2>
          <?php echo $headerAndTerms[0]['value']; ?>
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
                      <p class="place"><i class="fas fa-map-marker-alt"></i></p>

                      <div class="course-set-pp">
                        <? require('common_component/price.php'); ?>
                        <div class="courses-more-det">
                          <p class="view"><i class="fas fa-eye"></i> <?php echo $courseInfo['sys_course_view']; ?></p>
                          <p class="<?php echo $courseInfo['sys_course_session']; ?>"></p>
                          <p class="icon-3"><i class="fas fa-certificate"></i></p>
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

<script>
  document.querySelectorAll('.myr_currency').forEach(function(item) {
    item.addEventListener('click', function() {
      const dataCourseID = this.getAttribute('data-course-id');
      document.querySelector(`.myr-${dataCourseID}`).classList.remove('d-none');
      document.querySelector(`.usd-${dataCourseID}`).classList.add('d-none');
    })
  });

  document.querySelectorAll('.usd_currency').forEach(function(item) {
    item.addEventListener('click', function() {
      const dataCourseID = this.getAttribute('data-course-id');
      document.querySelector(`.myr-${dataCourseID}`).classList.add('d-none');
      document.querySelector(`.usd-${dataCourseID}`).classList.remove('d-none');
    })
  });
</script>

<?php
require_once($includes . 'footer.php');
?>
