<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");


$id = $_GET['id'];

$sql = $conn->prepare("UPDATE sys_article SET sys_view = sys_view + 1 WHERE sys_id = ?");
$sql->execute([$id]);
?>


<?php
$sql = $conn->prepare("SELECT * FROM sys_article WHERE sys_id = ?");
$sql->execute([$id]);
if ($sql->rowCount() > 0) {
  foreach ($sql->fetchAll() as $row) {
?>
    <div class="header-in-course">
      <div class="overlay-white">
        <div class="container">
          <div class="header-in-topic">
            <h1><?php echo $row['sys_topic']; ?></h1>
            <div class="breadcrumb-in">
              <p class="link"><a href="index.php"><i class="fas fa-home"></i> HOME</a></p>
              <p class="link"><a href="articles.php">Articles</a></p>
              <p class="link-at"><?php echo $row['sys_topic']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="header-in-course-img">
        <img alt='image' src="/images/articles/<?php echo $row['sys_image']; ?>">
      </div>
    </div>


    <div class="background-white">
      <div class="container">
        <div class="padding-100">


          <div class="row">


            <div class="col-sm-9">
              <div class="padding-right-30">
                <div class="article-topic-main">
                  <div class="date-main">
                    <div class="date-set-date">
                      <?php echo $row['sys_date']; ?>
                    </div>
                    <div class="date-set-month">
                      <?php
                      $monthNum = $row['sys_month'];
                      $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                      echo $monthName; // Output: May
                      ?>
                    </div>
                    <div class="date-set-year">
                      <?php echo $row['sys_year']; ?>
                    </div>
                  </div>


                  <div class="main-topic-in-1">
                    <h2 class="topic-in-1"><?php echo $row['sys_topic']; ?></h2>
                  </div>
                </div>


                <br><br>


                <div class="row">

                  <div class="col-sm-12">
                    <div class="margin-30">
                      <div class="main-desc-in-1">
                        <img alt='image' src="/images/articles/<?php echo $row['sys_image']; ?>">

                        <?php echo $row['sys_dec']; ?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        <?php }
    } ?>


        <div class="col-sm-3">
          <?php
          // require_once($rootDir . 'components/calendar.php');
          ?>

          <br><br>

          <p class="menu-topic">Recent Posts</p>

          <div class="row">
            <div class="col-sm-12">
              <?php
              $sql = $conn->prepare("SELECT * FROM sys_article WHERE sys_year = YEAR(CURDATE()) ORDER BY sys_id DESC LIMIT 4 ");
              $sql->execute();
              if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $row) {
              ?>
                  <a href="article.php?id=<?php echo $row['sys_id']; ?>">
                    <div class="recent-main">
                      <div class="recent-image">
                        <div class="square image">
                          <img alt='image' src="/images/articles/<?php echo $row['sys_image']; ?>">
                        </div>
                      </div>

                      <div class="recent-text">
                        <div class="text-overflow-hide">
                          <p><?php echo $row['sys_topic']; ?></p>
                        </div>
                      </div>
                    </div>
                  </a>
              <?php }
              } ?>
            </div>
          </div>


        </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    require_once($includes . 'footer.php');
    ?>
