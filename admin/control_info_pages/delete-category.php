<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");

require_once($includes . 'about_us_pages_info.php');

$stmt = $conn->prepare("select title,id from $categoryTable");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  function deleteDir($dirPath)
  {
    if (!is_dir($dirPath)) {
      throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
      $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
      if (is_dir($file)) {
        deleteDir($file);
      } else {
        unlink($file);
      }
    }
    rmdir($dirPath);
  }
  deleteDir($rootDir . "images/$mediaTable/" . $_POST['category_id']);
  $stmt = $conn->prepare("DELETE FROM $categoryTable WHERE id=?");
  $isSuccess = $stmt->execute([$_POST['category_id']]);
  if ($isSuccess) {
    echo '
	<script>alert("Category is deleted successfully");
</script>';
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes . 'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Delete <? echo $name; ?> Category</p>
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
