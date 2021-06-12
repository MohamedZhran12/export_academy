<?php
require_once('adminheader.php');
require_once('adminnav.php');

if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}

$stmt = $conn->prepare("select name,path,id from images");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SESSION['user']['level_id'] == 1 && $_GET['delete'] == 'image') {
  global $conn;
  $stmt = $conn->prepare('DELETE FROM images WHERE id=?');
  $stmt->execute([$_GET['image_id']]);
  unlink($_GET['full_path']);
  echo '
	<script type="text/javascript">alert("Image is Successfully Deleted");
	location.href="' . str_replace('/', '', $_SERVER['SCRIPT_NAME']) . '"' .
    '</script>';
}
?>
<div class="margin-top"></div>
<div class="container-fluid">
  <div class="row">
    <? require_once('admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main mt-5">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Delete CSR Images</p>
      </div>
      <div class='row'>
        <? foreach ($result as $row) { ?>
          <div class='col-3'>
            <a class='delete-image' data-fullpath='<? echo $row['path'] . $row['name']; ?>'
               data-id='<? echo $row['id']; ?>' href='#'><img class='mt-3' src='<? echo $row['path'] . $row['name']; ?>'
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
                    window.location.href = `admin-delete-csr-images.php?delete=image&image_id=${id}&full_path=${fullPath}`;
                }
            })
        })
    </script>