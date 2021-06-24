<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
$_GET['course'] = $_GET['course'] ?? 'consulting_services';
require_once($includes . 'sections_info.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $isOrderExistQuery = $conn->prepare("select count($groupsTable) from courses_groups where $groupsTable=?");
  $isOrderExistQuery->execute([$_POST['order']]);
  if ($isOrderExistQuery->fetch()[0] == 0) {
    $stmt = $conn->prepare("insert into courses_groups (name,$groupsTable) values(?,?)");
    $isSuccess = $stmt->execute([$_POST['name'], $_POST['order']]);
  } else {
    echo '
    <script>
      alert("This order is already used");
    </script>';
  }

  if ($isSuccess) {
    echo '
	<script>
    alert("Group is added successfully");
  </script>';
  } else {
    echo '
    <script>
      alert("Failed to add group");
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
        <p class="current-link">Add Group</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <? require_once('components/select_course.php'); ?>
        <div class='form-group'>
          <label for='name'>Name</label>
          <input type='text' class='form-control' id='name' name='name' placeholder='Name' required>
        </div>
        <div class='form-group'>
          <label for='order'>Order</label>
          <input type='number' class='form-control' id='order' name='order' placeholder='Order' required>
        </div>
        <div class='form-group'>
          <input type='submit' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>
