<?php


// sql to delete a record

$sql = $conn->prepare("DELETE FROM $table WHERE sys_course_id = ?");
$sql->execute([$id]);

echo "
	<script type='text/javascript'>alert('Delete Course Successfully!');
	</script>";
