<?php

require_once('edit_course_image_class.php');

class CourseImage extends Image
{
  protected function storeImageInDatabase()
  {
    global $conn;
    $stmt = $conn->prepare("update $this->table set sys_course_image = ? where sys_course_id=?");
    return $stmt->execute([$this->name, $this->courseID]);
  }
}

$old_image = $_POST['old_image'];
$image = $_FILES['course_image'];

$imageDetails = [
  'extension' => pathinfo($image['name'], PATHINFO_EXTENSION),
  'tmpName' => $image['tmp_name'],
  'size' => $image['size'],
  'table' => $table,
  'mainDirectory' => 'images/courses/',
  'courseID' => intval($id)
];


$image = new CourseImage($imageDetails);
unlink("images/courses/$old_image");
$image->startUploadingImage();
