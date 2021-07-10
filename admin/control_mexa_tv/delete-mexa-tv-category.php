<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


$table = 'mexa_tv_categories';
$sectionName = 'MEXA TV';

$stmt = $conn->prepare("select title,id from $table");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  global $conn;
  $stmt = $conn->prepare("DELETE FROM $table WHERE id=?");
  $stmt->execute([$_POST['category_id']]);

  echo '
	<script>alert("Category is deleted successfully");</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes . '/admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Delete <? echo $sectionName; ?> Category</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='category-title' class='font-weight-bold'>Category</label>
          <select id='category-title' name='category_id' class="custom-select" required>
            <option value="">Select Category</option>
            <? foreach ($result as $row) { ?>
              <option value="<? echo $row['id'] ?>">
                <? echo $row['title'] ?>
              </option>
            <? } ?>
          </select>
        </div>
        <div class='form-group'>
          <input type='submit' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>
