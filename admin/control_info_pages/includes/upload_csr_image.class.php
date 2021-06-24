<?php
class Image extends ImageBase {
  public function storeImageInDatabase() {
    global $conn;
    $stmt = $conn->prepare("insert into $this->table values(null,?,?,?,?,?)");
    return $stmt->execute([$this->categoryID, $this->newPath, $this->name, $this->size, date('Y-m-d H:i:s')]);
  }
}
