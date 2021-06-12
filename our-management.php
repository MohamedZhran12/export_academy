<?php
require_once('header.php');
require_once('nav.php');
$categoryTable = 'our_management_categories';
$imagesTable = 'our_management_images';
$sectionName = 'Our Management';
global $conn;
$stmt = $conn->prepare("SELECT $categoryTable.title, $categoryTable.description , $imagesTable.name , $imagesTable.path
   from $categoryTable
   JOIN $imagesTable on $imagesTable.category = $categoryTable.id order by $categoryTable.id desc");
$stmt->execute();
$categoriesImages = $stmt->fetchAll(PDO::FETCH_GROUP);

?>
  <div class="margin-top"></div>
  <div class="header-in-csr">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1><? echo $sectionName; ?></h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php">HOME</a></p>
            <p class="link-at"><? echo $sectionName; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-5">
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
          <div class="col-sm-12">
            <div class="margin-30">
              <img src="<? echo $images['path'] . $images['name'] ?>">
            </div>
          </div>
        <? } ?>
      </div>
      <hr class='my-5'>
    <? } ?>
  </div>
<?php
require_once('footer.php');
?>