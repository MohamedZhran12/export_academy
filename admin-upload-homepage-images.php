<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo '
	<script>alert("Image is Successfully Uploaded");
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
        <p class="current-link">Upload Homepage Images</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' action='upload-homepage-images.php' method='post'
            enctype="multipart/form-data">
        <div class='row'>
          <div class='col-12'>
            <div class="form-group">
              <div class='row'>
                <div class='col-12'>
                  <label class='font-weight-bold mr-3' for="url">Url :</label>
                </div>
                <div class='col-12'>
                  <input type="text" class='form-control' name='url' id="url" multiple required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class='row'>
                <div class='col-12'>
                  <label class='font-weight-bold mr-3' for="title">Title :</label>
                </div>
                <div class='col-12'>
                  <textarea class='form-control' name='title' id="title" multiple required></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class='row'>
                <div class='col-12'>
                  <label class='font-weight-bold mr-3' for="decription">Description :</label>
                </div>
                <div class='col-12'>
                  <textarea class='form-control' name='description' id="description" multiple required></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class='font-weight-bold mr-4' for="title">Image: </label>
              <input type="file" name='images[]' id="images" accept='image/*' required>
              <b>The preferred size is 1920px (Width) x 1080px (Height)</b>
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
<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('title');
    CKEDITOR.replace('description');
</script>
