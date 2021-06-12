<?php
require_once('adminheader.php');
require_once('adminnav.php');

if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}

$stmt = $conn->prepare("select value from statics where name='csr page header'");
$stmt->execute();
$result = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  global $conn;
  $stmt = $conn->prepare("update statics set value= ? where name = 'csr page header'");
  $stmt->execute([$_POST['description']]);
  echo '
	<script type="text/javascript">alert("CSR page header is Successfully Updated");
	location.href="admin-main.php";
	</script>';
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
        <p class="current-link">Edit csr page header</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='description'>Description</label>
          <textarea id='description' class='form-control' name='description' placeholder='Description' required
                    rows='7'><? echo $result['value']; ?></textarea>
        </div>
        <div class='form-group'>
          <input type='submit' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>