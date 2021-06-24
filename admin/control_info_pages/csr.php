<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");



$stmt = $conn->prepare('SELECT csr_categories.title, csr_categories.description , csr_images.name , csr_images.path
   from csr_categories
   JOIN csr_images on csr_images.category = csr_categories.id order by csr_categories.id desc');
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
        <h1>Corporate Social Responsibility</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php">HOME</a></p>
          <p class="link-at">Corporate Social Responsibility</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container py-5">
  <div class='row'>
    <p class="text-justify"><? echo $header['value']; ?>
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