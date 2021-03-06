<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
require_once($includes . 'sections_info.php');

$courseTypeHeader = str_replace('sys_', '', $table) . '_header';
$courseTypeTerms = str_replace('sys_', '', $table) . '_terms';

$stmt = $conn->prepare("select value from statics where name=? or name=?");
$stmt->execute([$courseTypeHeader, $courseTypeTerms]);
$texts = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $conn->prepare("update statics set value= ? where name = ?");
  $isSuccess = $stmt->execute([$_POST['header'], $courseTypeHeader]);
  $stmt = $conn->prepare("update statics set value= ? where name = ?");
  $isSuccess2 = $stmt->execute([$_POST['terms'], $courseTypeTerms]);
  if ($isSuccess && $isSuccess2) {
    echo '
	<script>alert("Text is Successfully Updated");
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
        <p class="current-link">Edit Header And Terms</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='header'>Header</label>
          <textarea id='header' class='form-control' name='header' placeholder='Header' required rows='7'><? echo $texts[0]['value']; ?></textarea>
        </div>
        <div class='form-group'>
          <label for='terms'>Terms</label>
          <textarea id='terms' class='form-control' name='terms' placeholder='Terms' required rows='7'><? echo $texts[1]['value']; ?></textarea>
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
  CKEDITOR.replace('header');
  CKEDITOR.replace('terms');
</script>
