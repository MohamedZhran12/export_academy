<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");



$stmt = $conn->prepare('SELECT gallery_categories.title, gallery_categories.description , gallery_images.name , gallery_images.path
   from gallery_categories
   JOIN gallery_images on gallery_images.category = gallery_categories.id order by gallery_categories.id desc');
$stmt->execute();
$categoriesImages = $stmt->fetchAll(PDO::FETCH_GROUP);
$headerStmt = $conn->prepare("select value from statics where name='csr page header'");
$headerStmt->execute();
$header = $headerStmt->fetch();
?>

  <div class="header-in-csr">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1>Our Gallery</h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php">HOME</a></p>
            <p class="link-at">Our Gallery</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-5">
    <div class='row'>
      This is Our Gallery
      </p>
    </div>
    <hr class='my-5'>
    <?
    foreach ($categoriesImages as $key => $category) {
      ?>
      <h4 class='my-4'> <? echo $key; ?> </h4>
      <div class='my-3'>
        <? echo $category[0]['description']; ?>
      </div>
      <div class="row">
        <? foreach ($category as $images) { ?>
          <div class="col-sm-4">
            <div class="margin-30">
              <div class="images-zoom">
                <img alt='image' src="<? echo $images['path'] . $images['name'] ?>">
              </div>
            </div>
          </div>
        <? } ?>
      </div>
      <hr class='my-5'>
    <? } ?>
  </div>

<?php
  require_once($includes . 'footer.php');
?>
