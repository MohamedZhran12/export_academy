<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");



$table = 'courses_groups';
$sectionName = 'Courses Group';

$stmt = $conn->prepare("select ID, name from $table");
$stmt->execute();
$groups = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $stmt = $conn->prepare("DELETE FROM $table WHERE id=?");
  $isSuccess = $stmt->execute([$_POST['group_id']]);

  if ($isSuccess)
    echo '
	<script type="text/javascript">alert("Group is deleted successfully");
	</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes.'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main mt-5">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Delete <? echo $sectionName; ?> Group</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='group-title' class='font-weight-bold'>Group</label>
          <select id='group-title' name='group_id' class="custom-select" required>
            <option value="" disabled selected>Select Group</option>
            <? foreach ($groups as $group) { ?>
              <option value="<? echo $group['ID'] ?>">
                <? echo $group['name'] ?>
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
