<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


$sql = $conn->prepare('select * from toggle_hide_pages');
$sql->execute();
$allPages = $sql->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $conn->prepare("
  update toggle_hide_pages set is_hidden = ?  where name = ?;
  update toggle_hide_pages set is_hidden = ?  where name = ?;
  update toggle_hide_pages set is_hidden = ?  where name = ?;");

  $isSuccess = $stmt->execute([
    $_POST['trade_shows'], 'trade_shows',
    $_POST['products'], 'products',
    $_POST['global_network'], 'global_network'
  ]);
  
  if ($isSuccess) {
    echo '
	<script>
    alert("Successfully Updated");
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
        <p class="current-link">Hide/Show Page</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class="form-group">
          <label>Trade Shows</label>
          <input type='radio' name='trade_shows' value='1' <? echo ($allPages[0]['is_hidden']) ? 'checked' : ''; ?>>Yes
          <input type='radio' name='trade_shows' value='0' <? echo (!$allPages[0]['is_hidden']) ? 'checked' : ''; ?>> No
        </div>
        <div class="form-group">
          <label>Listing of Products</label>
          <input type='radio' name='products' value='1' <? echo ($allPages[1]['is_hidden']) ? 'checked' : ''; ?>> Yes
          <input type='radio' name='products' value='0' <? echo (!$allPages[1]['is_hidden']) ? 'checked' : ''; ?>> No
        </div>
        <div class="form-group">
          <label>Global Network</label>
          <input type='radio' name='global_network' value='1' <? echo ($allPages[2]['is_hidden']) ? 'checked' : ''; ?>> Yes
          <input type='radio' name='global_network' value='0' <? echo (!$allPages[2]['is_hidden']) ? 'checked' : ''; ?>> No
        </div>
        <div class='form-group'>
          <input type='submit' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>
