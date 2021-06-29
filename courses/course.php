<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

require_once($includes . 'sections_info.php');

$sql = $conn->prepare("UPDATE $table  SET sys_course_view = sys_course_view + 1 WHERE sys_course_id = '$id'");
$sql->execute([$id]);

if ($isThereMoreDates) {
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

<div class="header-in-course mb-5" style="
    background-image: linear-gradient(
    90deg,
    #020024 0,
    rgb(0 212 255 / 48%) 100%
  ),url(/images/courses/<?php echo $courseDetails[0]['sys_course_image']; ?>);
    ">
  <div class="container">
    <div class="header-in-topic">
      <h1><?php echo $courseDetails[0]['sys_course_topic']; ?></h1>
      <div class="breadcrumb-in">
        <p class="link"><a href="index.php"><i class="fas fa-home"></i> Home</a></p>
        <p class="link">
          <a href="<? echo '/courses/';
                    echo ($isNewLayout) ? 'new' : 'old' . "_courses_layout.php?course=$table"; ?>">
            <?php echo $sectionName; ?>
          </a>
        </p>
        <p class="link-at"><?php echo $courseDetails[0]['sys_course_topic']; ?></p>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-9">
      <?php
      $sql = $conn->prepare("SELECT session_cat.*, $table.* FROM session_cat
  join $table
  WHERE session_cat.cat_id= ?
  and $table.sys_course_id=?");
      $sql->execute([$cat_id, $id]);
      if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $row) {
      ?>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-12 mb-2">
                    <strong>Date :</strong>
                    <? if ($isThereMoreDates) { ?>
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
              <? if ($isThereTrainer) { ?>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-user-friends"></i> <? echo $instructorType; ?></a>
                </li>
              <? } ?>
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
              <? if ($isThereTrainer) { ?>
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
              <? } ?>
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


      <? }
      } ?>
    </div>
    <div class="col-3">
      <div class="row">
        <? if ($isThereRightMenu) {
          require_once('common_component/right-menu.php');
        }
        if ($coursesCount > 0) {
          foreach ($courseDetails as $row) { ?>
            <div class="col-12">
              <div class="text-center">
                <a href="uploads/<?php echo $row['pdf']; ?>" class="button" download>Download Brochure</a>
                <a href="register.php?id=<?php echo $row['sys_course_id']; ?>&course=<?php echo $table; ?>" class="button2">Enquire
                  Now</a>
              </div>
            </div>
        <?php }
        } ?>
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
require_once($includes . 'footer.php');
?>
