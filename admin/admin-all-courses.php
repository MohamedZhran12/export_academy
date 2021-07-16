<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
require_once($includes . 'sections_info.php');
?>
<div class="background-gradient">
  <div class="container-fluid">
    <div class="row">
      <?php
      require_once($includes . 'admin-sidebar.php');
      ?>

      <div class="col-sm-9">
        <div class="row">
          <div class="background-white-in">
            <div class="padding-30-15">
              <div class="breadcrumb-main">
                <p class="current-link">Admin Dashboard</p>
                <i class="fas fa-chevron-right"></i>
                <p class="current-link"><? echo $sectionName; ?></p>
              </div>
              <br>

              <div class="row">
                <div class="col-sm-3">
                  <?php
                  require_once($rootDir . 'components/calendar.php');
                  ?>
                  <a class='btn btn-info mt-3' href="/admin-edit-header_and_terms_text.php?course=<? echo $table; ?>" class="side-menu-link">Edit
                    Header And Terms</a>
                </div>

                <div class="col-sm-9">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic"><? echo $sectionName; ?></p>
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
                                        <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $row['sys_course_date']; ?>
                                          - <?php echo $row['sys_course_month']; ?>
                                          - <?php echo $row['sys_course_year']; ?></p>
                                        <img alt='image' src="/images/courses/<?php echo $row['sys_course_image']; ?>">
                                      </div>
                                      <div class="courses-desc1">
                                        <p class="course-topic-1-2"><?php echo $row['sys_course_topic']; ?></p>
                                        <p class="place">
                                          <i class="fas fa-map-marker-alt"></i>
                                          <?php echo $row['sys_course_venue']; ?>
                                        </p>
                                        <div class="courses-set-in">
                                          <? if ($row['sys_course_price'] !== '0' || $row['sys_course_price_before'] !== '0') { ?>
                                            <div class="courses-pricing">
                                              <span class="cutoff">MYR <?php echo $row['sys_course_price_before']; ?></span>
                                              <p>MYR <?php echo $row['sys_course_price']; ?></p>
                                            </div>
                                          <? } ?>

                                          <div class="courses-more-det">
                                            <p class="view"><i class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
                                            <p class="<?php echo $row['sys_course_session']; ?>"></p>

                                          </div>
                                        </div>

                                        <div class="take-action">
                                          <a class="edit" href="/admin/control_courses/course-edit.php?id=<?php echo $row['sys_course_id']; ?>&course=<? echo $table; ?>" title="Edit Course">
                                            <p><i class="fas fa-edit"></i></p>
                                          </a>
                                          <a class="delete" href="admin-delete-course.php?id=<?php echo $row['sys_course_id']; ?>&course=<? echo $table; ?>" onclick="return confirm('Are you sure you want to delete?')" title="Delete Album">
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
