<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
require_once($includes . 'about_us_pages_config.php');

$table = 'mexa_tv_categories';
$sectionName = 'MEXA TV';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $stmt = $conn->prepare("insert into $table (title,description,created_at) values(?,?,?)");
  $stmt->execute([$_POST['title'], $_POST['description'], date("Y-m-d H:i:s")]);
  echo '
	<script>alert("MEXA TV Event added successfully");</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes . 'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Add <? echo $sectionName; ?> Event</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='title'>Title</label>
          <input type='text' class='form-control' id='title' name='title' placeholder='Title' required>
        </div>
        <div class='form-group'>
          <label for='description'>Description</label>
          <textarea id='description' class='form-control' name='description' placeholder='Description' required></textarea>
        </div>
        <div class='form-group'>
          <input type='submit' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description');
</script>
