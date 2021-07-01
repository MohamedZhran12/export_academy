<?php
require_once('adminheader.php');
require_once('adminnav.php');

if($_SESSION['user']['level_id'] != 1) {
echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}

$table='mexa_tv_categories';
$sectionName='MEXA TV';

$stmt = $conn->prepare("select title,id from $table");
$stmt->execute();
$result = $stmt->fetchAll();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  global $conn;
  $stmt=$conn->prepare("DELETE FROM $table WHERE id=?");
  $stmt->execute([$_POST['category_id']]);

    echo '
	<script type="text/javascript">alert("Category is deleted successfully");
	location.href="'.str_replace('/','',$_SERVER['SCRIPT_NAME']).'"'.
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
        <p class="current-link">Delete <? echo $sectionName; ?> Category</p>
      </div>
        <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
            <div class='form-group'>
              <label for='category-title' class='font-weight-bold'>Category</label>
              <select id='category-title' name='category_id' class="custom-select" required>
                  <option value="">Select Category</option>
                <? foreach($result as $row) {?>
                <option value="<? echo $row['id']?>">
                  <? echo $row['title']?>
                </option>
                <?}?>
              </select>
            </div>
            <div class='form-group'>
                <input type='submit' class='btn btn-primary'>
            </div>
        </form>
    </div>
</div>
</div>