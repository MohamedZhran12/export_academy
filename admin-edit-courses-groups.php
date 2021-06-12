<?php
require_once('adminheader.php');
require_once('adminnav.php');

if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}
global $conn;

if (isset($_GET['group_id'])) {
  $getGroupInfoToEditQuery = $conn->prepare('select * from courses_groups where ID=?');
  $getGroupInfoToEditQuery->execute([$_GET['group_id']]);
  $groupToEdit = $getGroupInfoToEditQuery->fetch();
}

$getGroupsQuery = $conn->prepare('select * from courses_groups');
$getGroupsQuery->execute();
$groups = $getGroupsQuery->fetchAll();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $conn->prepare('select count(*) from courses_groups where group_order=?');
  $stmt->execute([$_POST['order']]);
  $groupWithSameOrderCount = $stmt->fetch()[0];
  $stmt = $conn->prepare('select * from courses_groups where group_order=?');
  $stmt->execute([$_POST['order']]);
  $groupWithSameOrder = $stmt->fetch();
  if ($groupWithSameOrderCount == 0 || $groupWithSameOrder['ID'] == $_GET['group_id']) {
    $stmt = $conn->prepare('update courses_groups set name=?,group_order=? where ID=?');
    $isSuccess = $stmt->execute([$_POST['name'], $_POST['order'], $_GET['group_id']]);
  } else {
    $stmt = $conn->prepare('update courses_groups set name=? where group_order=?');
    $isSuccess = $stmt->execute([$_POST['name'], $_POST['order']]);
    $stmt = $conn->prepare('update courses_groups set name=? where group_order=?');
    $isSuccess2 = $stmt->execute([$groupWithSameOrder['name'], $_POST['old_order']]);
  }
  if ($isSuccess) {
    echo '
  <script type="text/javascript">
    alert("Group is edit successfully");
  </script>';
  } else {
    echo '
    <script type="text/javascript">
      alert("Failed to edit group");
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
        <p class="current-link">Edit Group</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='name'>Group Name</label>
          <select class='form-control group-name' required>
            <option selected value='' disabled>Select Group</option>
            <? foreach ($groups as $group) { ?>
              <option <? if ($group['ID'] == $_GET['group_id']) echo 'selected'; ?>
                  value='<? echo $group['ID']; ?>'><? echo $group['name']; ?></option>
            <? } ?>
          </select>
        </div>
        <div class='form-group'>
          <label for='name'>Name</label>
          <input type='text' class='form-control' id='name' name='name' placeholder='Name'
                 value='<? echo $groupToEdit['name']; ?>' required>
        </div>
        <div class='form-group'>
          <label for='order'>Order</label>
          <input type='number' class='form-control' id='order' name='order' placeholder='Order' required
                 value='<? echo $groupToEdit['group_order']; ?>'>
          <input type='hidden' id='old_order' name='old_order' placeholder='Order' required
                 value='<? echo $groupToEdit['group_order']; ?>'>
        </div>
        <div class='form-group'>
          <input type='submit' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    document.querySelector('.group-name').addEventListener('change', function () {
        window.location.href = `?group_id=${this.value}`;
    })
</script>