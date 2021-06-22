<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


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
      <div class="breadcrumb-main mt-5">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Upload Logos Images</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' action='upload-logos-images.php' method='post'
            enctype="multipart/form-data">
        <div class='row'>
          <div class='col-12'>
            <div class="form-group">
              <label class='font-weight-bold mr-4' for="title">Image: </label>
              <input type="file" name='images[]' id="images" accept='image/*' required>
              <b>The preferred size is 300px (Width) x 200px (Height)</b>
            </div>
            <div class='form-group'>
              <label for='category-title' class='font-weight-bold'>Select Partner Type</label>

              <select id='category-title' name='partner_type' class="custom-select" required>
                <option value="">Select Partner Type</option>
                <option value="Registered_With">Registered With</option>
                <option value="Our_Partners">Our Partners</option>
                <option value="Membership">Membership</option>
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
<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('title');
    CKEDITOR.replace('description');
</script>
