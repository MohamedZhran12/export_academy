<?php

$stmt = $conn->prepare('select * from homepage_images');
$stmt->execute();
$imagesCount = $stmt->rowCount();
$images = $stmt->fetchAll();
?>

<? if ($imagesCount) { ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php foreach ($images as $key => $row) { ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>" class="<?php if ($key == 0) echo 'active'; ?>"></li>
      <?php } ?>
    </ol>
    <div class="zoominbox">
      <div class="zoomoutbox">
        <div class="carousel-inner">
          <?php foreach ($images as $key => $row) { ?>
            <div class="carousel-item <?php if ($key == 0) echo 'active' ?>">
              <div class="container">
                <div class="header-text-absolute">
                  <div class="row">
                    <div class="col-12" style='margin-left:80px'>
                      <h1 class="header-topic"><?php echo $row['title']; ?></h1>
                      <p><?php echo $row['description']; ?></p>
                      <a href="<?php echo $row['url']; ?>" class="button">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <img alt='image' src="<?php echo $row['path'] . $row['name']; ?>" class="d-block w-100">
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<? } ?>
