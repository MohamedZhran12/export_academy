<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
require_once($includes . 'about_us_pages_config.php');

require_once('includes/upload_abstract_image.class.php');
require_once("includes/upload_image.class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $images = $_FILES['images'];
  $categoryID = $_POST['category_id'];
  for ($i = 0; $i < count($images['name']); $i++) {
    $image = [
      'extension' => pathinfo($images['name'][$i], PATHINFO_EXTENSION),
      'tmpName' => $images['tmp_name'][$i],
      'size' => $images['size'][$i],
      'categoryID' => $categoryID,
      'table' => $mediaTable,
      'mainDirectory' => "../../images/$mediaTable/",
    ];
    $imageObject = new Image($image);
    $imageObject->startUploadingImage();
  }
  echo '
	<script>alert("Image is Successfully Uploaded");
  location.href="/admin/control_info_pages/upload-images.php";
	</script>';
}
