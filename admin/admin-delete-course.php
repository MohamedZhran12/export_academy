<?php
require_once($_SERVER['DOCUMENT_ROOT'] . 'includes/init_admin.php');
require_once($includes . 'sections_info.php');

$sql = $conn->prepare("DELETE FROM $table WHERE sys_course_id = ?");
$sql->execute([$_GET['id']]);

echo "
	<script type='text/javascript'>alert('Delete Course Successfully!');
	</script>";
