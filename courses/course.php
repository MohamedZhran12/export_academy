<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

require_once($includes . 'sections_info.php');

$sql = $conn->prepare("UPDATE $table SET sys_course_view = sys_course_view + 1 WHERE sys_course_id = ?");
$sql->execute([$id]);


if ($isThereGroups) {
  $groupSql = $conn->prepare("select $groupsTable.name from $groupsTable
join $table
on $table.group_id = $groupsTable.ID
where $table.sys_course_id=?");
  $groupSql->execute([$id]);
  $groupName = $groupSql->fetch();
}

if ($isThereMoreDates) {
  $sql = $conn->prepare("select course_date_start,course_date_end from courses_dates where course_type=? and course_id=?");
  $sql->execute([$table, $id]);
  $dates = $sql->fetchAll();
}

$courseDetailsStmt = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
$courseDetailsStmt->execute([$id]);
$coursesCount = $courseDetailsStmt->rowCount();
$courseDetails = $courseDetailsStmt->fetchAll();
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
      if ($coursesCount > 0) { ?>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 mb-2">
                  <? if ($isThereMoreDates || $isThereCalendar) { ?>
                    <strong>Date :</strong>
                  <? } ?>
                  <? if ($isThereMoreDates) { ?>
                    <? foreach ($dates as $dateRow) { ?>
                      <div class="dates">
                        <span><? echo date('d - M - Y', strtotime($dateRow['course_date_start'])); ?></span>
                        <strong>To</strong>
                        <span><? echo date('d - M - Y', strtotime($dateRow['course_date_end'])); ?></span>
                      </div>
                    <? }
                  } else if ($isThereCalendar) {
                    $dateWithoutDay = ' - ' . DateTime::createFromFormat('!m', $courseDetails[0]['sys_course_month'])->format('F') . ' - ' . $courseDetails[0]['sys_course_year'];
                    ?>
                    <span><?php echo $courseDetails[0]['sys_course_date'] . $dateWithoutDay ?></span>
                    <span> To <? echo $courseDetails[0]['sys_course_dateend'] . $dateWithoutDay ?></span>
                  <? } ?>
                </div>
                <div class="col-12 mb-2">
                  <strong>Time :</strong>
                  <span><?php echo date('h:i a', strtotime($courseDetails[0]['sys_course_time'])) . ' - '  . date('h:i a', strtotime($courseDetails[0]['sys_course_timeout'])) ?></span>
                </div>
                <div class="col-12 mb-2">
                  <strong>Mode of program :</strong>
                  <span><? echo $courseDetails[0]['cat_id'] == 1 ? 'Virtual Programme' : 'Public Programme'; ?></span>
                </div>
                <div class="col-12 mb-4">
                  <strong><? echo $courseDetails[0]['cat_id'] == 1 ? 'Platform: ' : 'Venue: '; ?></strong>
                  <span>
                    <?php echo $courseDetails[0]['sys_course_venue']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>

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
            <? if (isset($courseDetails[0]['certification_name'])) { ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-certification-tab" data-toggle="pill" href="#pills-certification" role="tab" aria-controls="pills-certification" aria-selected="false"><i class="fas fa-user-friends"></i> Certified By</a>
              </li>
            <? } ?>
          </ul>
        </div>

        <div class="col-12">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

              <?php echo $courseDetails[0]['sys_course_intro']; ?>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php echo $courseDetails[0]['sys_course_module']; ?>
            </div>
            <? if ($isThereTrainer) { ?>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                <div class="trainer-name-info">
                  <h1 class="ff-name">
                    <?php
                    echo $courseDetails[0]['sys_course_trainer'][0];
                    ?>
                  </h1>
                  <p class="trainers-name"><b><?php echo $courseDetails[0]['sys_course_trainer']; ?></b></p>
                </div>
                <?php echo $courseDetails[0]['sys_course_trainer_info']; ?>

              </div>
            <? } ?>
            <? if (isset($courseDetails[0]['certification_name'])) { ?>
              <div class="tab-pane fade" id="pills-certification" role="tabpanel" aria-labelledby="pills-certification-tab">
                <div class="trainer-name-info">
                  <p class="trainers-name"><b><?php echo $courseDetails[0]['certification_name']; ?></b></p>
                </div>
                <?php echo $courseDetails[0]['certification_info']; ?>
              </div>
            <? } ?>
          </div>
        </div>
    </div>
    <div class="col-3">
      <div class="row">
        <? if ($isThereRightMenu) {
          require_once('common_component/right-menu.php');
        }


        if ($isThereGroups) {
          $groupEncoded = (is_array($groupName)) ? urlencode($groupName[0]) : '';
          $subTopic = urlencode($courseDetails[0]['sys_course_topic']);
          $orangePages = "in_house_form.php?topic=$groupEncoded&sub_topic=$subTopic&in_house=0";
          $in_house = "in_house_form.php?topic=$groupEncoded&sub_topic=$subTopic&in_house=1";
          $formUrl = $table == 'in_house' ? $in_house : (isset($isNewLayout) ? $orangePages : $oldPages);
        } else {
          $formUrl = "register.php?id={$courseDetails[0]['sys_course_id']}&course=$table";
        }
        ?>

        <div class="col-12">
          <div class="text-center">
            <a href="/uploads/<?php echo $courseDetails[0]['pdf']; ?>" class="button" download>Download Brochure</a>
            <a href="<? echo $formUrl; ?>" class="button2"><? echo $isThereGroups ? 'Enquire Now' : 'Register'; ?></a>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php
require_once($includes . 'footer.php');
?>
