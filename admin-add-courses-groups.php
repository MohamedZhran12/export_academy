<?php
require_once('adminheader.php');
require_once('adminnav.php');

if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  global $conn;
  $isOrderExistQuery = $conn->prepare('select count(group_order) from courses_groups where group_order=?');
  $isOrderExistQuery->execute([$_POST['order']]);
  if ($isOrderExistQuery->fetch()[0] == 0) {
    $stmt = $conn->prepare('insert into courses_groups (name,group_order) values(?,?)');
    $isSuccess = $stmt->execute([$_POST['name'], $_POST['order']]);
  } else {
    echo '
    <script type="text/javascript">
      alert("This order is already used");
    </script>';
  }

  if ($isSuccess) {
    echo '
	<script type="text/javascript">
    alert("Group is added successfully");
  </script>';
  } else {
    echo '
    <script type="text/javascript">
      alert("Failed to add group");
    </script>';
  }
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
        <p class="current-link">Add Group</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
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