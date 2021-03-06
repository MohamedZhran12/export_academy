<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");

$categoryTable = 'mexa_tv_categories';
$videosTable = 'mexa_tv_videos';

$stmt = $conn->prepare("SELECT $categoryTable.title, $categoryTable.description, $videosTable.url
   from $categoryTable
   JOIN $videosTable on $videosTable.category = $categoryTable.id order by $categoryTable.id desc");
$stmt->execute();
$categoriesVideos = $stmt->fetchAll(PDO::FETCH_GROUP);
?>

  <div class="header-in" style="background-image: url('../../images/header/Mexa_TV.webp'), url(../../images/header/about.jpg)">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1>MEXA TV</h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php">HOME</a></p>
            <p class="link-at">MEXA TV</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-5">
    <hr class='my-5'>
    <?
    foreach ($categoriesVideos as $key => $category) {
      ?>
      <h4 class='my-4'> <? echo $key; ?> </h4>
      <div class='my-3'>
        <? echo $category[0]['description']; ?>
      </div>
      <div class="row">
        <? foreach ($category as $videos) { ?>
          <div class="col-sm-4">
            <div class="margin-30">
              <? echo $videos['url']; ?>
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
