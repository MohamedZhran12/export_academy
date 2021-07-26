<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin");

$id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM sys_article WHERE sys_id = '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$result = mysql_query($sql);
echo '
	<script type="text/javascript">alert("Delete Album Successfully!");
	</script>';

$conn->close();
