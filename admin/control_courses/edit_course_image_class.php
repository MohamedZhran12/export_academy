<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php');

abstract class Image {
  const sizeLimit = 3145728;
  public $name;
  public $extension;
  public $tmpName;
  public $size;
  public $fullPath;
  public $mainDirectory;
  public $table;
  public $courseID;

  public function __construct($image) {
    $this->extension = $image['extension'];
    $this->name = time() . '_' . uniqid() . '.' . $this->extension;
    $this->tmpName = $image['tmpName'];
    $this->size = $image['size'];
    $this->table = $image['table'];
    $this->mainDirectory = $image['mainDirectory'];
    $this->fullPath = $this->mainDirectory . $this->name;
    $this->courseID = $image['courseID'];
  }

  public function startUploadingImage() {
    $this->checkIsImage();
    $this->checkImageSizeExceeded();
    $this->createDirectoryIfNotExist();
    $this->uploadImage();
    $this->checkIsImageStoredInDatabase();
  }

  protected function checkIsImage() {
    try {
      $this->isImage();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  protected function isImage() {
    if (!in_array(
      mime_content_type($this->tmpName),
      ['image/jpeg', 'image/png', 'image/jpg']
    )) {
      throw new Exception('This file isn\'t image');
    }
    return true;
  }

  protected function checkImageSizeExceeded() {
    try {
      $this->isImageSizeExceeded();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  protected function isImageSizeExceeded() {
    if ($this->size >= self::sizeLimit) {
      throw new Exception('The Image Size Exceeded');
    }
    return true;
  }

  protected function createDirectoryIfNotExist() {
    if (!$this->isDirectoryExist()) {
      $this->checkIsDirectoryCreated();
    }
  }

  protected function isDirectoryExist() {
    return file_exists($this->mainDirectory);
  }

  protected function checkIsDirectoryCreated() {
    try {
      $this->isDirectoryCreated();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  protected function isDirectoryCreated() {
    if (!mkdir($this->mainDirectory, 0755, true)) {
      throw new Exception('The directory can\'t be created');
    }
    return true;
  }

  protected function uploadImage() {
    try {
      $this->isUploaded();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  protected function isUploaded() {
    if (!move_uploaded_file($this->tmpName, $this->fullPath)) {
      throw new Exception('Failed to upload the image');
    }
    return true;
  }

  protected function checkIsImageStoredInDatabase() {
    if (!$this->storeImageInDatabase()) {
      exit('Failed to store image in database');
    }
    return true;
  }

  abstract protected function storeImageInDatabase();
}
