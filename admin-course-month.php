<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");

$id = $_GET['id'];
$month = $_GET['month'];
?>




<div class="background-gradient">
  <div class="container-fluid">
    <div class="row">
      <?php
      require_once($includes.'admin-sidebar.php');
      ?>


      <div class="col-sm-9">
        <div class="row">
          <div class="background-white-in">
            <div class="padding-30-15">
              <div class="breadcrumb-main">
                <p class="current-link">Admin Dashboard</p>
                <i class="fas fa-chevron-right"></i>
                <p class="current-link">All Courses</p>
              </div>
              <br>


              <div class="row">
                <div class="col-3">
                  <?php
                  require_once('sidebar.php');
                  ?>
                </div>

                <div class="col-9">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic">All Courses</p>
                      </div>
                      <hr>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="row">

                          <?php

                          $sql = $conn->prepare("SELECT * FROM sys_course WHERE sys_course_month = ?");
                          $sql->execute([$month]);
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
                                        <!--
                			<div class="star-rating">
                			<i class="fas fa-star"></i>
                			<i class="fas fa-star"></i>
                			<i class="fas fa-star"></i>
                			<i class="fas fa-star"></i>
                			<i class="fas fa-star"></i>
                			<p>122</p>
                			</div>
                -->

                                        <div class="courses-set-in">
                                          <div class="courses-pricing">
                                            <span
                                                class="cutoff">RM <?php echo $row['sys_course_price_before']; ?></span>
                                            <p>RM <?php echo $row['sys_course_price']; ?></p>
                                          </div>

                                          <div class="courses-more-det">
                                            <p class="view"><i
                                                  class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
                                            <p class="<?php echo $row['sys_course_session']; ?>"></p>

                                            <p class="icon-3"><i class="fas fa-certificate"></i></p>
                                          </div>
                                        </div>

                                        <div class="take-action">

                                          <a class="edit"
                                             href="admin-course-edit.php?id=<?php echo $row['sys_course_id']; ?>"
                                             title="Edit Course">
                                            <p><i class="fas fa-edit"></i></p>
                                          </a>
                                          <a class="delete"
                                             href="admin-delete-course.php?id=<?php echo $row['sys_course_id']; ?>"
                                             onclick="return confirm('Are you sure you want to delete?')"
                                             title="Delete Course">
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
