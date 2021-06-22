<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
?>
<style>
  .main-dashboard {
    margin-left: 25.8em;
  }
</style>
<div class="container-fluid">
  <div class="row">
    <?php
    require_once($includes . 'admin-sidebar.php');
    ?>

    <div class="col-9 main-dashboard">
      <div class="row">
        <div class="col-12 breadcrumb-main">
          <p class="current-link">Admin Dashboard</p>
        </div>
        <div class="col">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
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
