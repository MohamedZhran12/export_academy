<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

require_once($includes . 'about_us_pages_info.php');

$stmt = $conn->prepare("SELECT $categoryTable.title, $categoryTable.description , $mediaTable.name , $mediaTable.path
   from $categoryTable
   JOIN $mediaTable on $mediaTable.category = $categoryTable.id order by $categoryTable.id desc");
$stmt->execute();
$categoriesImages = $stmt->fetchAll(PDO::FETCH_GROUP);
//   $headerStmt=$conn->prepare("select value from statics where name='csr page header'");
//   $headerStmt->execute();
//   $header=$headerStmt->fetch();
?>

<div class="header-in-csr">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1><? echo $name; ?></h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php">HOME</a></p>
          <p class="link-at"><? echo $name; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container py-5">
  <!--<div class='row'>-->
  <!--   <p class="text-justify"><? echo $header['value']; ?>-->
  <!--   </p>-->
  <!--</div>-->
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
        <div class="<? echo ($name == 'Our Management') ? 'col-12' : 'col-4'; ?>">
          <div class="margin-30">
            <div class="<? echo ($name != 'Our Management') ? 'images-zoom' : ''; ?>">
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
