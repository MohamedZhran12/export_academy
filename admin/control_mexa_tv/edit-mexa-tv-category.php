<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


$table = 'mexa_tv_categories';
$sectionName = 'MEXA TV';

$stmt = $conn->prepare("select title,id from $table");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $stmt = $conn->prepare("update $table set title = ? , description= ? where id = ?");
  $stmt->execute([$_POST['title'], $_POST['description'], $_POST['category_id']]);
  echo '
	<script>alert("Event is Successfully Updated");
	location.href="' . str_replace('/', '', $_SERVER['SCRIPT_NAME']) . '"' .
    '</script>';
}

if (isset($_GET['event_id'])) {
  $stmt = $conn->prepare("select title,description from $table where id=?");
  $stmt->execute([$_GET['event_id']]);
  $eventDetails = $stmt->fetch();
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes.'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Edit <? echo $sectionName; ?> Event</p>
      </div>
      <form class='mt-5 shadow-sm p-4 mb-5 bg-white rounded' method='post'>
        <div class='form-group'>
          <label for='category-title' class='font-weight-bold'>Select <? echo $sectionName; ?> Event</label>
          <select id='category-title' name='category_id' class="custom-select" required>
            <option value="">Select <? echo $sectionName; ?> Event</option>
            <? foreach ($result as $row) { ?>
              <option <? if ($_GET['event_id'] == $row['id']) {
                echo 'selected';
              } ?> value="<? echo $row['id'] ?>">
                <? echo $row['title'] ?>
              </option>
            <? } ?>
          </select>
        </div>
        <div class='form-group'>
          <label for='title'>Title</label>
          <input type='text' class='form-control' id='title' name='title' placeholder='Title' required
                 value="<? echo isset($eventDetails['title']) ? $eventDetails['title'] : ''; ?>">
        </div>
        <div class='form-group'>
          <label for='description'>Description</label>
          <textarea id='description' class='form-control' name='description' placeholder='Description'
                    required><? echo isset($eventDetails['description']) ? $eventDetails['description'] : ''; ?></textarea>
        </div>
        <div class='form-group'>
          <input type='submit' value='Update' class='btn btn-primary'>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

    document.getElementById('category-title').addEventListener('change', function () {
        location.href = 'admin-edit-csr-category.php?event_id=' + document.getElementById('category-title').value + '';
    })
</script>
