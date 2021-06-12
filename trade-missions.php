<?php
require_once('header.php');
require_once('nav.php');

$id = $_GET['id'];
$month = $_GET['month'];
$table = 'sys_trade_missions';
$section = 'Trade Missions';
global $conn;
$sql = $conn->prepare("UPDATE $table SET sys_course_view = sys_course_view + 1 WHERE sys_course_id = ?");
$sql->execute([$id]);
?>

<div class="margin-top"></div>

<div class="header-in">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1>Trade Missions</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php"><i class="fas fa-home"></i> HOME</a></p>
          <p class="link-at">Trade Missions</p>
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


        <div class="col-sm-9">
          <div class="padding-left-30">
            <div class="my-main-list">
              <h2 class="topic-in"><?php echo date("F", strtotime('m')); ?><?php echo date("Y");
                echo ' ' . $section; ?> </h2>

              <!--
<div class="right">
<li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_date.php") { ?>  class="active"   <?php } ?>><a href="course_date.php?month=<?php echo $month; ?>"><p class="list-option-active"><i class="far fa-clock"></i> Date</p></a></li>
<li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_price.php") { ?>  class="active"   <?php } ?>><a href="course_price.php?month=<?php echo $month; ?>"><p class="list-option"><i class="fas fa-arrow-down"></i> Price</p></a></li>
</div>
-->
              <?php
              require_once('right-current-link.php');
              ?>
            </div>

            <br><br>
            <div class="row">

              <?php
              $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_year = YEAR(CURDATE()) AND sys_course_month = MONTH(CURDATE())");
              $sql->execute([]);
              if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $row) {
                  ?>


                  <div class="col-sm-4">
                    <div class="margin-30">
                      <div class="courses-det">
                        <a class="button-1"
                           href="course.php?id=<?php echo $row['sys_course_id']; ?>&cat_id=<?php echo $row['cat_id']; ?> &t=<? echo $table; ?>&section=<? echo urlencode($section); ?>">
                          <div class="courses-image">
                            <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $row['sys_course_date']; ?>
                              - <?php echo $row['sys_course_month']; ?> - <?php echo $row['sys_course_year']; ?></p>
                            <img src="images/courses/<?php echo $row['sys_course_image']; ?>">
                          </div>
                          <div class="courses-desc1">
                            <p class="course-topic-1-2"><?php echo $row['sys_course_topic']; ?></p>
                            <p class="place"><i
                                  class="fas fa-map-marker-alt"></i> <?php //echo $row['sys_course_venue'];
                              ?></p>

                            <div class="course-set-pp">
                              <div class="courses-pricing-rm col-sm-12 mb-3">
                                <?php
                                $amount = $row['sys_course_price'];
                                if ($amount >= 1.00) {
                                  echo '<span class="cutoff">';
                                  echo "MYR" . $row["sys_course_price_before"] . "";
                                  echo '</span>';
                                  echo "<p>MYR";
                                  echo $row['sys_course_price'];
                                  echo '</p>';
                                } else {
                                  echo '<br>';
                                }
                                ?>


                              </div>

                              <div style='display:none' class="courses-pricing-usd col-sm-12">
                                <?php
                                $amount = $row['sys_course_price_usd'];
                                if ($amount >= 1.00) {
                                  echo '<span class="cutoff">';
                                  echo "USD" . $row["sys_course_price_before_usd"] . "";
                                  echo '</span>';
                                  echo "<p>USD";
                                  echo $row['sys_course_price_usd'];
                                  echo '</p>';
                                } else {
                                  echo '<br>';
                                }
                                ?>
                              </div>
                              <div>
                                <label>Currency :</label>
                                <?php if ($row['sys_course_price'] >= 1.00) { ?>
                                  <label for='rm_currency'>MYR</label>
                                  <input type='radio' class='myr_currency' checked
                                         name='currency-<?php echo $row['sys_course_id']; ?>'>
                                <?php } ?>
                                <?php if ($row['sys_course_price_usd'] >= 1.00) { ?>
                                  <label for='usd_currency'>USD</label>
                                  <input type='radio' class='usd_currency'
                                         name='currency-<?php echo $row['sys_course_id']; ?>'>
                                <?php } ?>
                              </div>
                              <div class="courses-more-det">
                                <p class="view"><i class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
                                <p class="<?php echo $row['sys_course_session']; ?>"></p>
                                <!--<p class="icon-2"><i class="fas fa-map-marker-alt"></i></p>-->
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

  <script>
      document.querySelectorAll('.myr_currency').forEach(function (item) {
          item.addEventListener('click', function () {
              this.parentElement.parentElement.children[0].style.display = 'block'
              this.parentElement.parentElement.children[1].style.display = 'none'
          })
      });

      document.querySelectorAll('.usd_currency').forEach(function (item) {
          item.addEventListener('click', function () {
              this.parentElement.parentElement.children[0].style.display = 'none'
              this.parentElement.parentElement.children[1].style.display = 'block'
          })
      });
  </script>


  <?php
  require_once('footer.php');
  ?>
