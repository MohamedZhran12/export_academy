<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

?>
<div class="header-in" style="background-image: url('../../images/header/Articles.webp'), url(../../images/header/about.jpg)">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1>Articles</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php">HOME</a></p>
          <p class="link-at">Articles</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="background-white">
  <div class="container">
    <div class="padding-100">

      <div class="row">
        <div class="container">

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Articles</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Social feeds</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <br>
              <div class="wrapper">

                <div class="row">
                  <?php

                  $sql = $conn->prepare("SELECT * FROM sys_article order by sys_id desc");
                  $sql->execute();
                  if ($sql->rowCount() > 0) {
                    foreach ($sql->fetchAll() as $row) {

                  ?>

                      <div class="col-md-4 mt-3">
                        <div class="product__inner">

                          <section class="product__image">
                            <img alt='image' src="/images/articles/<?php echo $row['sys_image']; ?>">
                          </section>

                          <div class="product__details">

                            <section class="product__name"><?php echo $row['sys_topic']; ?><br>
                            </section>

                            <p class="date-in">
                              <?php echo $row['sys_date']; ?>,
                              <?php
                              $monthNum = $row['sys_month'];
                              $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                              echo $monthName; // Output: May
                              ?>
                              <?php echo $row['sys_year']; ?>
                            </p>

                            <section class="product__short-description"><?php echo $row['sys_dec']; ?></section>

                            <div class="add-to-cart"><a href="article.php?id=<?php echo $row['sys_id']; ?>" class="button1">Read More</a></div>

                          </div><!-- /product__details -->

                        </div>
                      </div><!-- /product -->

                  <?php }
                  } ?>
                  <!-- /products -->
                </div><!-- /wrapper -->
              </div>
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
