<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


$table = 'our_management_categories';
$sectionName = 'Our Management';

$stmt = $conn->prepare("select title,id from $table order by id desc");
$stmt->execute();
$result = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo '
	<script type="text/javascript">alert("Image is Successfully Uploaded");
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
        <p class="current-link">Upload <? echo $sectionName; ?> Images</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' action='upload-our-management.php' method='post'
            enctype="multipart/form-data">
        <div class='row'>
          <div class='col-6'>
            <div class="form-group">
              <label class='font-weight-bold mr-3' for="title">Images: </label>
              <input type="file" name='images[]' id="images" multiple accept='image/*' required>
            </div>
            <div class='form-group'>
              <label for='category-title' class='font-weight-bold'>Select Event</label>
              <select id='category-title' name='category_id' class="custom-select" required>
                <option value="">Select Event</option>
                <? foreach ($result as $row) { ?>
                  <option value="<? echo $row['id'] ?>">
                    <? echo $row['title'] ?>
                  </option>
                <? } ?>
              </select>
            </div>
            <div class='form-group'>
              <input type='submit' value='Submit' class='btn btn-primary'>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
