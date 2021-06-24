<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


$table = 'our_management_images';
$sectionName = 'Our Management';
$stmt = $conn->prepare("select name,path,id from $table");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SESSION['user']['level_id'] == 1 && $_GET['delete'] == 'image') {

  $stmt = $conn->prepare("DELETE FROM $table WHERE id=?");
  $stmt->execute([$_GET['image_id']]);
  unlink($_GET['full_path']);
  echo '
	<script>alert("Image is Successfully Deleted");
	location.href="' . str_replace('/', '', $_SERVER['SCRIPT_NAME']) . '"' .
    '</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes.'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Delete <? echo $sectionName; ?> Images</p>
      </div>
      <div class='row'>
        <? foreach ($result as $row) { ?>
          <div class='col-3'>
            <a class='delete-image' data-fullpath='<? echo $row['path'] . $row['name']; ?>'
               data-id='<? echo $row['id']; ?>' href='#'><img alt='image' class='mt-3' src='<? echo $row['path'] . $row['name']; ?>'
                                                              alt='image'></a>
          </div>
        <? } ?>
      </div>
    </div>

    <script>
        var elements = document.querySelectorAll('.delete-image');
        elements.forEach(ele => {
            ele.addEventListener('click', function (e) {
                var isConfirmed = confirm('are you sure to delete this image?');
                var id = ele.getAttribute('data-id');
                var fullPath = ele.getAttribute('data-fullpath');
                if (isConfirmed) {
                    window.location.href = `admin-delete-our-management-images.php?delete=image&image_id=${id}&full_path=${fullPath}`;
                }
            })
        })
    </script>
