<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");


$table = 'mexa_tv_videos';
$sectionName = 'MEXA TV';
$stmt = $conn->prepare("select id,url from $table");
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SESSION['user']['level_id'] == 1 && $_GET['delete'] == 'video') {

  $stmt = $conn->prepare("DELETE FROM $table WHERE id=?");
  $stmt->execute([$_GET['video_id']]);
  echo '
	<script>alert("Video is Successfully Deleted");
	location.href="' . str_replace('/', '', $_SERVER['SCRIPT_NAME']) . '"' .
    '</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <? require_once($includes.'admin-sidebar.php'); ?>
    <div class="col-9 .bg-white">
      <div class="breadcrumb-main">
        <p class="current-link">Admin Dashboard</p>
        <i class="fas fa-chevron-right"></i>
        <p class="current-link">Delete <? echo $sectionName; ?> Videos</p>
      </div>
      <div class='row'>
        <? foreach ($result as $row) { ?>
          <div class='col-3'>
            <a class='delete-video' data-id='<? echo $row['id']; ?>' href='#'><img alt='image' class='mt-3'
                                                                                   src='https://img.youtube.com/vi/<? echo substr($row['url'], strpos($row['url'], 'embed') + 6, 11); ?>/0.jpg'
                                                                                   alt='image'></a>
          </div>
        <? } ?>
      </div>
    </div>

    <script>
        var elements = document.querySelectorAll('.delete-video');
        elements.forEach(ele => {
            ele.addEventListener('click', function (e) {
                var isConfirmed = confirm('are you sure to delete this video?');
                var id = ele.getAttribute('data-id');
                var fullPath = ele.getAttribute('data-url');
                if (isConfirmed) {
                    window.location.href = `admin-delete-mexa-tv-videos.php?delete=video&video_id=${id}`;
                }
            })
        })
    </script>
