<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");

require_once($includes . 'sections_info.php');
$sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_year = YEAR(CURDATE()) AND sys_course_month = MONTH(CURDATE())");
$sql->execute();
?>

<div class="header-in">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1><?php echo $section; ?></h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php"><i class="fas fa-home"></i> HOME</a></p>
          <p class="link-at"><?php echo $section; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="row">
    <div class="col-sm-3">
      <?php
      require_once($rootDir . 'sidebar.php');
      ?>
    </div>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-12">
          <h2 class="topic-in">
            <?php
            echo date("F", strtotime('m')) . ' ';
            echo date("Y") . ' ';
            echo $section; ?> </h2>
        </div>

        <?php
        if ($sql->rowCount() > 0) {
          foreach ($sql->fetchAll() as $courseInfo) {
        ?>
            <div class="col-sm-4">
              <div class="margin-30">
                <div class="courses-det">
                  <a class="button-1" href="course.php?id=<?php echo $courseInfo['sys_course_id']; ?>&cat_id=<?php echo $courseInfo['cat_id']; ?>&t=<? echo $table; ?>">
                    <div class="courses-image">
                      <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $courseInfo['sys_course_date']; ?>
                        - <?php echo $courseInfo['sys_course_month']; ?> - <?php echo $courseInfo['sys_course_year']; ?></p>
                      <img src="images/courses/<?php echo $courseInfo['sys_course_image']; ?>">
                    </div>
                    <div class="courses-desc1">
                      <p class="course-topic-1-2"><?php echo $courseInfo['sys_course_topic']; ?></p>
                      <p class="place"><i class="fas fa-map-marker-alt"></i></p>

                      <div class="course-set-pp">
                        <? require_once('common_component/price.php'); ?>
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
