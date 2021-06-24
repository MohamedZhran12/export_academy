<?php
require_once('upload_logos_image.class.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $images = $_FILES['images'];
  for ($i = 0; $i < count($images['name']); $i++) {
    $image = [
      'extension' => pathinfo($images['name'][$i], PATHINFO_EXTENSION),
      'tmpName' => $images['tmp_name'][$i],
      'size' => $images['size'][$i],
      'partner_type' => $_POST['partner_type']
    ];
    $imageObject = new Image($image);
    $imageObject->startUploadingImage();
  }
  echo '
	<script>alert("Image is Successfully Uploaded");
	location.href="admin-upload-csr-images.php"</script>';
}
