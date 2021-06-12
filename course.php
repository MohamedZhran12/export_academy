<?php
require_once('header.php');
require_once('nav.php');

$id = $_GET['id'];
$cat_id = $_GET['cat_id'];
$table = isset($_GET['t']) ? $_GET['t'] : 'sys_course';
if ($table == 'sys_course') {
  $sectionUrl = 'publictraining.php';
  $section = 'Public Training';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructor_type = 'Trainer/s';
} else if ($table == 'sys_seminars') {
  $sectionUrl = 'seminar-conference.php';
  $section = 'Seminar & Conferences';
  $details = 'Course Details';
  $modules = 'Tentative Programme';
  $instructor_type = 'Speaker/s';
} else if ($table == 'sys_professional_cert') {
  $sectionUrl = 'professional-certifications.php';
  $section = 'Professional Certification';
  $course_type = 'professional_certificate';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructor_type = 'Trainer/s';
} else if ($table == 'sys_special_programmes') {
  $sectionUrl = 'special-programs.php';
  $section = 'Special Programmes';
  $course_type = 'special_programmes';
  $details = 'Course Details';
  $modules = 'Modules';
  $instructor_type = 'Trainer(s)/Speaker(s)';
} else if ($table == 'sys_trade_missions') {
  $sectionUrl = 'trade-missions.php';
  $section = 'Trade Missions';
  $details = 'Mission Info';
  $modules = 'Tentative Programme';
  $instructor_type = 'Trade Accelerator (TA)';
}
global $conn;
$sql = $conn->prepare("UPDATE $table  SET sys_course_view = sys_course_view + 1 WHERE sys_course_id = '$id'");

$sql->execute([$id]);

if ($table == 'sys_professional_cert' || $table == 'sys_special_programmes') {
  $sql = $conn->prepare("select course_date_start,course_date_end from courses_dates where course_type=? and course_id=?");
  $sql->execute([$course_type, $id]);
  $dates = $sql->fetchAll();
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel")) {
  $name = $_POST['name'];
  $sql = $conn->prepare("INSERT INTO sys_subsribers
	  (sys_name)
	  VALUES
	  (?)");

  $sql->execute([$name]);
  echo '
	<script type="text/javascript">alert("Article Successfully Uploaded!");
	</script>';
}
?>

<div class="margin-top"></div>

<?php
$sql = $conn->prepare("SELECT session_cat.*, $table.* FROM session_cat
  join $table
  WHERE session_cat.cat_id= ?
  and $table.sys_course_id=?");
$sql->execute([$cat_id, $id]);
if ($sql->rowCount() > 0) {
  foreach ($sql->fetchAll() as $row) {
?>
    <div class="header-in-course">
      <div class="overlay-white">
        <div class="container">
          <div class="header-in-topic">
            <h1><?php echo $row['sys_course_topic']; ?></h1>
            <div class="breadcrumb-in">
              <p class="link"><a href="index.php"><i class="fas fa-home"></i> Home</a></p>
              <p class="link"><a href="#"><? echo isset($_GET['section']) ? $_GET['section'] : '' ?></a></p>
              <p class="link-at"><?php echo $row['sys_course_topic']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="header-in-course-img">
        <img src="images/courses/<?php echo $row['sys_course_image']; ?>">
      </div>
    </div>


    <div class="background-white">
      <div class="container">
        <div class="padding-100">


          <div class="row">
            <div class="col-sm-9">


              <h4>
                <b><?php echo $row['sys_course_topic']; ?></b>
              </h4>
              <br>


              <table class="table-mystyle">
                <tbody>
                  <? if ($table == 'sys_professional_cert' || $table == 'sys_special_programmes') { ?>

                    <tr>
                      <td><b>Date :</b></td>
                    </tr>
                    <? foreach ($dates as $dateRow) { ?>
                      <tr>
                        <td><? echo date('d - M - Y', strtotime($dateRow['course_date_start'])); ?></td>
                        <td><b>To</b></td>
                        <td><? echo date('d - M - Y', strtotime($dateRow['course_date_end'])); ?></td </tr>
                        <br>
                      <? } ?>
                    <? } else { ?>
                      <tr>
                        <td><b>Date</b></td>
                        <td>:</td>
                        <td><?php echo $row['sys_course_date']; ?>

                          <?php

                          if (empty($row['sys_course_dateend'])) {
                            echo "";
                          } else {
                            echo "- " . $row["sys_course_dateend"] . "";
                          }
                          ?>

                          <?php
                          $monthNum = $row['sys_course_month'];
                          $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                          echo $monthName; // Output: May
                          ?>
                          <?php echo $row['sys_course_year']; ?></td>
                      </tr>
                    <? } ?>

                    <tr>
                      <td><b>Time</b></td>
                      <td>:</td>
                      <td>
                        <?php
                        $date = $row['sys_course_time'];
                        echo date('h:i a', strtotime($date));
                        ?>
                        -
                        <?php
                        $date = $row['sys_course_timeout'];
                        echo date('h:i a', strtotime($date));
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Venue</b></td>
                      <td>:</td>
                      <td><?php echo $row['session_name'] . ' - ' . $row['sys_course_venue']; ?></td>
                    </tr>
                </tbody>
              </table>
            <? } ?>
            <br><br>
          <?php } ?>


          <?php
          $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
          $sql->execute([$id]);
          if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $row) {
          ?>
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-graduation-cap"></i> <? echo $details; ?></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-book"></i> <? echo $modules; ?>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-user-friends"></i> <? echo $instructor_type; ?></a>
                </li>
                <? if (isset($row['certification_name'])) { ?>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-certification-tab" data-toggle="pill" href="#pills-certification" role="tab" aria-controls="pills-certification" aria-selected="false"><i class="fas fa-user-friends"></i> Certified By</a>
                  </li>
                <? } ?>
              </ul>


              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  <?php echo $row['sys_course_intro']; ?>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <?php echo $row['sys_course_module']; ?>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                  <div class="trainer-name-info">
                    <h1 class="ff-name">
                      <?php
                      $text = $row['sys_course_trainer'];
                      $pieces = substr($text, 0, 1);
                      echo $pieces;
                      ?>
                    </h1>


                    <p class="trainers-name"><b><?php echo $row['sys_course_trainer']; ?></b></p><br>
                  </div>
                  <?php echo $row['sys_course_trainer_info']; ?>

                </div>

                <? if (isset($row['certification_name'])) { ?>
                  <div class="tab-pane fade" id="pills-certification" role="tabpanel" aria-labelledby="pills-certification-tab">

                    <div class="trainer-name-info">
                      <h1 class="ff-name">
                        <?php
                        $text = $row['certification_name'];
                        $pieces = substr($text, 0, 1);
                        echo $pieces;
                        ?>
                      </h1>


                      <p class="trainers-name"><b><?php echo $row['certification_name']; ?></b></p><br>
                    </div>
                    <?php echo $row['certification_info']; ?>

                  </div>
                <? } ?>
              </div>
              </p><br><br>
            </div>

        <? }
          } ?>


        <div class="col-sm-3">
          <div class="sticky">
            <div class="border-box">

              <?php
              $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
              $sql->execute([$id]);
              if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $row) {
                  $amount = $row['sys_course_price_before'];

                  if ($amount <= 1.00) {
                    echo "<p><b>Price</b></p> ";
                  } else {
                    echo "<p><b>Early Bird</b></p>";
                  }
              ?>
                  <div>
                    <label>Currency :</label>
                    <?php if ($row['sys_course_price'] >= 1.00) { ?>
                      <label for='rm_currency'>MYR</label>
                      <input type='radio' id='myr_currency' checked name='currency'>
                    <?php } ?>
                    <?php if ($row['sys_course_price_usd'] >= 1.00) { ?>
                      <label for='usd_currency'>USD</label>
                      <input type='radio' id='usd_currency' name='currency'>
                    <?php } ?>
                  </div>
                  <?

                  $amount = $row['sys_course_price'];
                  if ($amount >= 1.00) {
                  ?>
                    <div id='myr_price'>
                      <p class="price-before">MYR <?php echo $row['sys_course_price']; ?></p>
                      <p class="norm-price">
                        <?
                        echo 'Normal Price ';
                        echo '<span class="dashed">';
                        echo "MYR" . $row["sys_course_price_before"] . "";
                        echo '</span>';
                        ?>

                      </p>
                    </div>

                    <?php
                    $amount = $row['sys_course_price_usd'];
                    if ($amount >= 1.00) {
                    ?>
                      <div id='usd_price' style='display:none'>
                        <p class="price-before">USD <?php echo $row['sys_course_price_usd']; ?></p>
                        <p class="norm-price">
                  <?
                      echo 'Normal Price ';
                      echo '<span class="dashed">';
                      echo "USD" . $row["sys_course_price_before_usd"] . "";
                      echo '</span>';
                    }
                  }
                }
              }
                  ?>

                        </p>
                      </div>
                      <div>


                        <?php
                        $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
                        $sql->execute([$id]);
                        if ($sql->rowCount() > 0) {
                          foreach ($sql->fetchAll() as $row) {
                        ?>
                            <p><?php if ($row['sys_sst'][0] != 0) echo $row['sys_sst']; ?></p>
                        <?php }
                        } ?>


                        <?php
                        $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
                        $sql->execute([$id]);
                        if ($sql->rowCount() > 0) {
                          foreach ($sql->fetchAll() as $row) {
                        ?>
                            <div class="width-full">
                              <div class="left-align">
                                <p class="view"><i class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
                              </div>
                              <div class="right-align">
                                <p class="<?php echo $row['sys_course_session']; ?>"></p>
                                <p class="icon-3"><i class="fas fa-certificate"></i></p>
                              </div>
                            </div>

                            <div class="more-det-group">

                              <div class="more-det-main">
                                <div class="more-det-icon">
                                  <p class="more-det"><i class="far fa-clock"></i></p>
                                </div>
                                <div class="more-det-text">
                                  <p class="more-det"><?php echo $row['sys_course_days']; ?> Day/s</p>
                                </div>
                                <div class='more-det-text'>
                                  <? if ($row['sys_cpd_points'][0] != 0) { ?>
                                    <p class="more-det"><?php echo $row['sys_cpd_points'] . ' CPD Points'; ?></p>
                                  <? } ?>
                                </div>
                              </div>

                              <?php
                              $sql = $conn->prepare("SELECT $table.is_lunch,$table.is_cpd_text,$table.is_hrdf
                                                        FROM  $table
                                                        where $table.sys_course_id=?");
                              $sql->execute([$id]);
                              if ($sql->rowCount() > 0) {
                                foreach ($sql->fetchAll() as $row) {

                              ?>
                                  <div class="more-det-main">

                                    <div class="more-det-icon">
                                      <p class="more-det"><i class="fas fa-check"></i></p>
                                    </div>
                                    <? if ($row['is_cpd_text']) { ?>
                                      <div class="more-det-text">
                                        <p class="more-det">Certificate of Attendance Will be Provided</p>
                                      </div>
                                    <? } ?>
                                    <? if ($row['is_hrdf']) { ?>
                                      <div class="more-det-text">
                                        <p class="more-det">HRDF SBL Claimable</p>
                                      </div>
                                    <? } ?>
                                    <? if ($row['is_lunch']) { ?>
                                      <div class="more-det-text">
                                        <p class="more-det">Lunch & Refreshment Provided</p>
                                      </div>
                                    <? } ?>
                                  </div>
                              <?php }
                              } ?>

                            </div>
                      </div>


                      <?php
                            $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
                            $sql->execute([$id]);
                            if ($sql->rowCount() > 0) {
                              foreach ($sql->fetchAll() as $row) {
                      ?>
                          <div class="text-center">
                            <a href="uploads/<?php echo $row['pdf']; ?>" class="button" download>Download Brochure</a>
                            <a href="register.php?id=<?php echo $row['sys_course_id']; ?>&t=<?php echo $table; ?>" class="button2">Enquire
                              Now</a>
                          </div>
            </div>
          </div>
        </div>
          </div>
      <?php }
                            } ?>

        </div>
    <?php }
                        } ?>

    <div id="popup1" class="overlay">
      <div class="popup">
        <h2>Download Brochure</h2>
        <hr>
        <a class="close" href="#">&times;</a>
        <div class="container">
          <form name="frm_add_channel" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="margin-bottom-30">
                <div class="row">
                  <div class="col-sm-4">Name</div>
                  <div class="col-sm-8"><input type="text" class="form" name="name"></div>
                </div>
              </div>

              <div class="margin-bottom-30">
                <div class="row">
                  <div class="col-sm-4">Company Name</div>
                  <div class="col-sm-8"><input type="text" class="form" name="name"></div>
                </div>
              </div>

              <div class="margin-bottom-30">
                <div class="row">
                  <div class="col-sm-4">Email</div>
                  <div class="col-sm-8"><input type="text" class="form" name="name"></div>
                </div>
              </div>

              <div class="margin-bottom-30">
                <div class="row">
                  <div class="col-sm-4">Mobile</div>
                  <div class="col-sm-8"><input type="text" class="form" name="name"></div>
                </div>
              </div>

              <div class="col-sm-4"></div>
              <div class="col-sm-8">
                <input type="submit" class="button" value="Download Brochure" onclick="return checking()" />
                <input type="hidden" name="MM_insert" value="frm_add_channel">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
      </div>
      <script>
        document.getElementById('myr_currency').addEventListener('click', function() {
          document.getElementById('myr_price').style.display = 'block';
          document.getElementById('usd_price').style.display = 'none';
        })
        document.getElementById('usd_currency').addEventListener('click', function() {
          document.getElementById('usd_price').style.display = 'block';
          document.getElementById('myr_price').style.display = 'none';
        })
      </script>


      <?php
      require_once('footer.php');
      ?>
