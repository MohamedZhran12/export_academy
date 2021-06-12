<?php
require_once('adminheader.php');
require_once('adminnav.php');
?>


<div class="margin-top"></div>
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
            </div>
            <br>


            <div class="row">
              <div class="col">
                <div class="text-white">
                  <div class="background-1">
                    <h2><i class="fas fa-book-reader"></i>
                      <?php
                      global $conn;
                      $sql = $conn->prepare("select count(1) FROM sys_course");
                      $sql->execute();
                      $total = $sql->fetch()[0];
                      echo " $total ";
                      ?>
                    </h2>
                    <p>
                      Public Training
                    </p>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="text-white">
                  <div class="background-2">
                    <h2><i class="fas fa-book-reader"></i>
                      <?php
                      global $conn;
                      $sql = $conn->prepare("select count(1) FROM sys_article");
                      $sql->execute();
                      $total = $sql->fetch()[0];
                      echo " $total ";
                      ?>
                    </h2>
                    <p>
                      Articles & Events
                    </p>
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
