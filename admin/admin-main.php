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
        <div class="col-md-3 mb-2">
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
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM sys_seminars");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Seminars
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM sys_special_programmes");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Special Programmes
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM sys_professional_cert");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Professional Certificate
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM trade_shows");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Trade Shows
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM sys_trade_missions");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Trade Missions
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM consulting_services");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Consulting Services
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM export_coaching");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Export Coaching
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM global_network");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Global Network
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM in_house");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                In House
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM products");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Products
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM mexa_tv_videos");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Mexa TV
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-2">
          <div class="text-white">
            <div class="background-1">
              <h2><i class="fas fa-book-reader"></i>
                <?php
                $sql = $conn->prepare("select count(1) FROM sys_article");
                $sql->execute();
                $total = $sql->fetch()[0];
                echo " $total ";
                ?>
              </h2>
              <p>
                Articles
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
