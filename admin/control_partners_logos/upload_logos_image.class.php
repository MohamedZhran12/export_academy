<?php
require_once('includes/config.php');

class Image
{
  const mainDirectory = 'logos/logo_images/';
  const sizeLimit = 3145728;
  private $name;
  private $extension;
  private $tmpName;
  private $size;
  private $partnerType;
  private $newPath;
  private $fullPath; //3mb

  public function __construct($image)
  {
    $this->extension = $image['extension'];
    $this->name = time() . '_' . uniqid() . '.' . $this->extension;
    $this->tmpName = $image['tmpName'];
    $this->size = $image['size'];
    $this->partnerType = $image['partner_type'];
    $this->newPath = self::mainDirectory;
    $this->fullPath = $this->newPath . $this->name;
  }

  public function startUploadingImage()
  {
    $this->checkIsImage();
    $this->checkImageSizeExceeded();
    $this->createDirectoryIfNotExist();
    $this->uploadImage();
    $this->checkIsImageStoredInDatabase();
  }

  public function checkIsImage()
  {
    try {
      $this->isImage();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  public function isImage()
  {
    if (!in_array(
      mime_content_type($this->tmpName),
      ['image/jpeg', 'image/png']
    )) {
      throw new Exception('This file isn\'t image');
    }
    return true;
  }

  public function checkImageSizeExceeded()
  {
    try {
      $this->isImageSizeExceeded();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  public function isImageSizeExceeded()
  {
    if ($this->size >= self::sizeLimit) {
      throw new Exception('The Image Size Exceeded');
    }
    return true;
  }

  public function createDirectoryIfNotExist()
  {
    if (!$this->isDirectoryExist()) {
      $this->checkIsDirectoryCreated();
    }
  }

  public function isDirectoryExist()
  {
    return file_exists($this->newPath);
  }

  public function checkIsDirectoryCreated()
  {
    try {
      $this->isDirectoryCreated();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  public function isDirectoryCreated()
  {
    if (!mkdir($this->newPath, 0755, true)) {
      throw new Exception('The directory can\'t be created');
    }
    return true;
  }

  public function uploadImage()
  {
    try {
      $this->isUploaded();
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }

  public function isUploaded()
  {
    if (!move_uploaded_file($this->tmpName, $this->fullPath)) {
      throw new Exception('Failed to upload the image');
    }
    return true;
  }

  public function checkIsImageStoredInDatabase()
  {
    if (!$this->storeImageInDatabase()) {
      exit('Failed to store image in database');
    }
    return true;
  }

  public function storeImageInDatabase()
  {
    glob
    $stmt = $conn->prepare("insert into logos_images (name,path,size,partner_type,created_at) values(?,?,?,?,?)");
    return $stmt->execute([$this->name, $this->newPath, $this->size, $this->partnerType, date('Y-m-d H:i:s')]);
  }
}
