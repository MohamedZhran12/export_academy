<?php
require_once('upload_our_achievements_image.class.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $images = $_FILES['images'];
  $categoryID = $_POST['category_id'];
  for ($i = 0; $i < count($images['name']); $i++) {
    $image = [
      'extension' => pathinfo($images['name'][$i], PATHINFO_EXTENSION),
      'tmpName' => $images['tmp_name'][$i],
      'size' => $images['size'][$i],
      'categoryID' => $categoryID
    ];
    $imageObject = new Image($image);
    $imageObject->startUploadingImage();
  }
  echo '
	<script type="text/javascript">alert("Image is Successfully Uploaded");
	location.href="admin-upload-csr-images.php"</script>';
}