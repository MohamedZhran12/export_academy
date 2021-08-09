<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");

$sql = $conn->prepare("DELETE FROM sys_article WHERE sys_id = ?");
$isSuccess = $sql->execute([$_GET['id']]);
if ($isSuccess) {
  echo '
	<script>alert("Delete Album Successfully!");
  location.href="/admin/admin-all-articles.php";
	</script>';
}
