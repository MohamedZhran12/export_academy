<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

require_once($includes . 'sections_info.php');

$sql = $conn->prepare("UPDATE $table  SET sys_course_view = sys_course_view + 1 WHERE sys_course_id = '$id'");
$sql->execute([$id]);

if ($table == 'sys_professional_cert' || $table == 'sys_special_programmes') {
  $sql = $conn->prepare("select course_date_start,course_date_end from courses_dates where course_type=? and course_id=?");
  $sql->execute([$table, $id]);
  $dates = $sql->fetchAll();
}

$courseDetailsStmt = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
$courseDetailsStmt->execute([$id]);
$coursesCount = $courseDetailsStmt->rowCount();
$courseDetails = $courseDetailsStmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $sql = $conn->prepare("INSERT INTO sys_subsribers
	  (sys_name)
	  VALUES
	  (?)");

  $sql->execute([$name]);
  echo '
	<script>alert("Article Successfully Uploaded!");
	</script>';
}
?>


<?php
$sql = $conn->prepare("SELECT session_cat.*, $table.* FROM session_cat
  join $table
  WHERE session_cat.cat_id= ?
  and $table.sys_course_id=?");
$sql->execute([$cat_id, $id]);
if ($sql->rowCount() > 0) {
  foreach ($sql->fetchAll() as $row) {
?>
    <div class="header-in-course" style="
    background-image: linear-gradient(
    90deg,
    #020024 0,
    rgb(0 212 255 / 48%) 100%
  ),url(/images/courses/<?php echo $row['sys_course_image']; ?>);
    ">
      <div class="container">
        <div class="header-in-topic">
          <h1><?php echo $row['sys_course_topic']; ?></h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php"><i class="fas fa-home"></i> Home</a></p>
            <p class="link"><a href="#"><?php echo $sectionName; ?></a></p>
            <p class="link-at"><?php echo $row['sys_course_topic']; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="padding-100">


        <div class="row">
          <div class="col-sm-9">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-12 mb-2">
                    <strong>Date :</strong>
                    <? if ($table == 'sys_professional_cert' || $table == 'sys_special_programmes') { ?>
                      <? foreach ($dates as $dateRow) { ?>
                        <div class="dates">
                          <span><? echo date('d - M - Y', strtotime($dateRow['course_date_start'])); ?></span>
                          <strong>To</strong>
                          <span><? echo date('d - M - Y', strtotime($dateRow['course_date_end'])); ?></span>
                        </div>
                      <? }
                    } else {
                      $dateWithoutDay = ' - ' . DateTime::createFromFormat('!m', $row['sys_course_month'])->format('F') . ' - ' . $row['sys_course_year'];
                      ?>
                      <span><?php echo $row['sys_course_date'] . $dateWithoutDay ?></span>
                      <span> To <? echo $row['sys_course_dateend'] . $dateWithoutDay ?></span>
                    <? } ?>
                  </div>
                  <div class="col-12 mb-2">
                    <strong>Time :</strong>
                    <span><?php echo date('h:i a', strtotime($row['sys_course_time'])) . ' - '  . date('h:i a', strtotime($row['sys_course_timeout'])) ?></span>
                  </div>
                  <div class="col-12 mb-2">
                    <strong>Venue :</strong>
                    <span><?php echo $row['session_name'] . ' - ' . $row['sys_course_venue']; ?></span>
                  </div>
                </div>
              </div>
          <?php }
      } ?>

          <?php

          if ($coursesCount > 0) {
            foreach ($courseDetails as $row) {
          ?>
              <div class="col-12">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-graduation-cap"></i> <? echo $details; ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-book"></i> <? echo $modules; ?>
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-user-friends"></i> <? echo $instructorType; ?></a>
                  </li>
                  <? if (isset($row['certification_name'])) { ?>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-certification-tab" data-toggle="pill" href="#pills-certification" role="tab" aria-controls="pills-certification" aria-selected="false"><i class="fas fa-user-friends"></i> Certified By</a>
                    </li>
                  <? } ?>
                </ul>
              </div>

              <div class="col-12">
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
                        echo $row['sys_course_trainer'][0];
                        ?>
                      </h1>
                      <p class="trainers-name"><b><?php echo $row['sys_course_trainer']; ?></b></p>
                    </div>
                    <?php echo $row['sys_course_trainer_info']; ?>

                  </div>

                  <? if (isset($row['certification_name'])) { ?>
                    <div class="tab-pane fade" id="pills-certification" role="tabpanel" aria-labelledby="pills-certification-tab">
                      <div class="trainer-name-info">
                        <p class="trainers-name"><b><?php echo $row['certification_name']; ?></b></p>
                      </div>
                      <?php echo $row['certification_info']; ?>
                    </div>
                  <? } ?>
                </div>
              </div>
            </div>
          </div>

      <? }
          } ?>


      <? if ($isThereRightMenu) {
        require_once('common_component/right-menu.php');
      }
      ?>

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

      </div>
    </div>
    <?php
    require_once($includes . 'footer.php');
    ?>
