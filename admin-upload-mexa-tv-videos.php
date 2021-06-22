<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");



$categoryTable = 'mexa_tv_categories';
$videosTable = 'mexa_tv_videos';
$sectionName = 'MEXA TV';

$stmt = $conn->prepare("select title,id from $categoryTable order by id desc");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $stmt = $conn->prepare("insert into $videosTable (category,url,created_at) values(?,?,?)");

  if ($stmt->execute([$_POST['category_id'], $_POST['video'], date('Y-m-d H:i:s')])) {
    echo '
	<script type="text/javascript">alert("Video is Successfully Added");
	location.href="' . str_replace('/', '', $_SERVER['SCRIPT_NAME']) . '"' .
      '</script>';

  }
}
?>


<div class="container-fluid">
  <div class="row">
    <? require_once($includes.'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main mt-5">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Add <? echo $sectionName; ?> Videos</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='row'>
          <div class='col-6'>

            <div class='form-group'>
              <label for='category-title' class='font-weight-bold'>Select MEXA TV Event</label>
              <select id='category-title' name='category_id' class="custom-select" required>
                <option value="">Select Event</option>
                <? foreach ($result as $row) { ?>
                  <option value="<? echo $row['id'] ?>">
                    <? echo $row['title'] ?>
                  </option>
                <? } ?>
              </select>
            </div>

            <div class="form-group">
              <label class='font-weight-bold mr-3' for="video">Enter Youtube video Embed link below: </label>
              <input class='form-control' type="text" name='video' id="video" required>
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
