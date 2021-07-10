<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");



$month = $_GET['month'];

?>

<div class="margin-top"></div>

<div class="header-in">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1>Public Training</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php"><i class="fas fa-home"></i> HOME</a></p>
          <p class="link"><a href="publictraining.php">Public Training</a></p>
          <p class="link-at"><?php
                              $monthNum  = $month;/*Here 1 is the month number*/
                              $dateObj   = DateTime::createFromFormat('!m', $monthNum);/*Convert the number into month name*/
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
          require_once('sidebar.php');
          ?>
        </div>





        <div class="col-sm-12">
          <div class="padding-left-30">
            <div class="my-main-list">
              <h2 class="topic-in">
                <?php
                $monthNum  = $month;/*Here 1 is the month number*/
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);/*Convert the number into month name*/
                $monthName = $dateObj->format('F');
                echo $monthName;
                ?>

                <?php echo date("Y"); ?>

                Courses
              </h2>

              <?php
              require_once('right-link.php');
              ?>
            </div>

            <br><br>




            <div class="row">

              <?php
              $sql = $conn->prepare("SELECT * FROM sys_course WHERE sys_course_month = ? AND sys_course_session='webinar' ORDER BY sys_course_price DESC");
              $sql->execute([$month]);
              if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $row) {
              ?>


                  <div class="col-sm-4">
                    <div class="margin-30">
                      <div class="courses-det">
                        <a class="button-1" href="course.php?id=<?php echo $row['sys_course_id']; ?>&cat_id=<?php echo $row['cat_id']; ?>">
                          <div class="courses-image">
                            <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $row['sys_course_date']; ?> - <?php echo $row['sys_course_month']; ?> - <?php echo $row['sys_course_year']; ?></p>
                            <img src="images/courses/<?php echo $row['sys_course_image']; ?>">
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
                                <p class="<?php echo $row['sys_course_session']; ?>"></p>
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
    </div>
  </div>
</div>

<?php
require_once($includes . 'footer.php');
?>
