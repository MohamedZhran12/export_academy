<?php

unlink('uploads/' . $_POST['old_pdf']);
move_uploaded_file($_FILES['pdf']['tmp_name'], 'uploads/' . $_FILES['pdf']['name']);

$sql = $conn->prepare("update $table set pdf=? where sys_course_id=?");
$sql->execute([$_FILES['pdf']['name'], $id]);