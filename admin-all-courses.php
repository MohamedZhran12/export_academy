<?php
require_once('adminheader.php');
require_once('adminnav.php');
global $conn;
$table = isset($_GET['t']) ? $_GET['t'] : 'sys_course';

if ($table == 'sys_course') {
  $sectionUrl = 'publictraining.php';
  $section = 'All Courses';
} else if ($table == 'sys_seminars') {
  $sectionUrl = 'seminar-conference.php';
  $section = 'All Seminar & Conferences';
} else if ($table == 'sys_professional_cert') {
  $sectionUrl = 'professional-certifications.php';
  $section = 'All Professional Certification';
} else if ($table == 'sys_special_programmes') {
  $sectionUrl = 'special-programs.php';
  $section = 'All Special Programmes';
} else if ($table == 'sys_trade_missions') {
  $sectionUrl = 'trade-missions.php';
  $section = 'All Trade Missions';
}
?>

<div class="margin-top"></div>

<div class="background-gradient">
  <div class="container-fluid">
    <div class="row">

      <?php
      require_once('admin-sidebar.php');
      ?>

      <div class="col-sm-9">
        <div class="row">
          <div class="background-white-in">
            <div class="padding-30-15">
              <div class="breadcrumb-main">
                <p class="current-link">Admin Dashboard</p>
                <i class="fas fa-chevron-right"></i>
                <p class="current-link"><? echo $section; ?></p>
              </div>
              <br>

              <div class="row">
                <div class="col-sm-3">
                  <?php
                  require_once('sidebar-admin.php');
                  ?>
                  <a class='btn btn-info mt-3' href="admin-edit-header_and_terms_text.php" class="side-menu-link">Edit
                    Header And Terms</a>
                </div>

                <div class="col-sm-9">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic"><? echo $section; ?></p>
                      </div>
                      <hr>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="row">

                          <?php
                          $sql = $conn->prepare("SELECT * FROM $table");
                          $sql->execute();
                          if ($sql->rowCount() > 0) {
                            foreach ($sql->fetchAll() as $row) {
                              ?>
                              <div class="col-sm-4">
                                <div class="background-white">
                                  <div class="margin-30">
                                    <div class="courses-det">
                                      <div class="courses-image">
                                        <p class="date"><i
                                              class="fas fa-calendar-alt"></i> <?php echo $row['sys_course_date']; ?>
                                          - <?php echo $row['sys_course_month']; ?>
                                          - <?php echo $row['sys_course_year']; ?></p>
                                        <img src="images/courses/<?php echo $row['sys_course_image']; ?>">
                                      </div>
                                      <div class="courses-desc1">
                                        <p class="course-topic-1-2"><?php echo $row['sys_course_topic']; ?></p>
                                        <p class="place"><i
                                              class="fas fa-map-marker-alt"></i> <?php echo $row['sys_course_venue']; ?>
                                        </p>
                                        <div class="courses-set-in">
                                          <? if ($row['sys_course_price'] != 0 || $row['sys_course_price_before'] != 0) { ?>
                                            <div class="courses-pricing">
                                              <span
                                                  class="cutoff">MYR <?php echo $row['sys_course_price_before']; ?></span>
                                              <p>MYR <?php echo $row['sys_course_price']; ?></p>
                                            </div>
                                          <? } ?>

                                          <div class="courses-more-det">
                                            <p class="view"><i
                                                  class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
                                            <p class="<?php echo $row['sys_course_session']; ?>"></p>
                                            <p class="icon-3"><i class="fas fa-certificate"></i></p>
                                          </div>
                                        </div>

                                        <div class="take-action">
                                          <a class="edit"
                                             href="admin-course-edit.php?id=<?php echo $row['sys_course_id']; ?>&t=<? echo $table; ?>"
                                             title="Edit Course">
                                            <p><i class="fas fa-edit"></i></p>
                                          </a>
                                          <a class="delete"
                                             href="admin-delete-course.php?id=<?php echo $row['sys_course_id']; ?>&t=<? echo $table; ?>"
                                             onclick="return confirm('Are you sure you want to delete?')"
                                             title="Delete Album">
                                            <p><i class="fas fa-trash-alt"></i></p>
                                          </a>

                                        </div>
                                      </div>
                                    </div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
