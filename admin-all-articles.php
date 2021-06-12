<?php
require_once('adminheader.php');
require_once('adminnav.php');
global $conn;
?>


<div class="margin-top"></div>

<div class="background-gradient">
  <div class="container-fluid">
    <div class="row">
      <?php
      require_once('admin-sidebar.php');
      ?>

      <div class="col-9">
        <div class="row">
          <div class="background-white-in">
            <div class="padding-30-15">
              <div class="breadcrumb-main">
                <p class="current-link">Admin Dashboard</p>
                <i class="fas fa-chevron-right"></i>
                <p class="current-link">All Articles</p>
              </div>
              <br>


              <div class="row">
                <div class="col-3">
                  <?php
                  require_once('sidebar-admin.php');
                  ?>
                </div>

                <div class="col-9">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic">All Articles</p>
                      </div>
                      <hr>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="row">

                          <?php
                          $sql = $conn->prepare("SELECT * FROM sys_article");
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
                                              class="fas fa-calendar-alt"></i> <?php echo $row['sys_date']; ?>
                                          - <?php echo $row['sys_month']; ?> - <?php echo $row['sys_year']; ?></p>
                                        <img src="images/articles/<?php echo $row['sys_image']; ?>">
                                      </div>
                                      <div class="courses-desc1">
                                        <p class="course-topic-1-2"><?php echo $row['sys_topic']; ?></p>

                                        <div class="take-action">
                                          <a class="delete"
                                             href="admin-delete-article.php?id=<?php echo $row['sys_id']; ?>"
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
