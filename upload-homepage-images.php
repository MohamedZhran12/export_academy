<?php
require_once('upload_homepage_image.class.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $images = $_FILES['images'];
  for ($i = 0; $i < count($images['name']); $i++) {
    $image = [
      'extension' => pathinfo($images['name'][$i], PATHINFO_EXTENSION),
      'tmpName' => $images['tmp_name'][$i],
      'size' => $images['size'][$i],
      'url' => $_POST['url'],
      'title' => $_POST['title'],
      'description' => $_POST['description']
    ];
    $imageObject = new Image($image);
    $imageObject->startUploadingImage();
  }
  echo '
	<script type="text/javascript">alert("Image is Successfully Uploaded");
	"</script>';
}