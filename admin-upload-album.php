<?php
require_once('admin/adminheader.php');
require_once('admin/adminnav.php');





if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel") && isset($_FILES['image']['tmp_name'])) {
  $file = $_FILES['image']['tmp_name'];
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name = addslashes($_FILES['image']['name']);

  move_uploaded_file($_FILES['image']['tmp_name'], "../images/album/" . $_FILES['image']['name']);

  $name = $_POST['name'];
  $place = $_POST['place'];
  $owner = $_POST['owner'];
  $type = $_POST['type'];
  $cat = $_POST['cat'];
  $path = $_FILES['image']['name'];


  $sql = $conn->prepare("INSERT INTO sys_album
(sys_album_image, sys_album_name,
sys_album_place, sys_album_owner,
sys_album_view, sys_album_type,cat_id)
VALUES(?, ?, ?, ?, 0, ?, ?)");
  $sql->execute([$path, $name, $place, $owner, 0, $type, $cat]);
  echo '
	<script>alert("Successfully Update Album!");
	</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <?php
    require_once($includes . 'admin-sidebar.php');
    ?>

    <div class="col-10">
      <div class="padding-30-15">
        <div class="breadcrumb-main">
          <p class="current-link">Admin Dashboard</p>
          <i class="fas fa-chevron-right"></i>
          <p class="current-link">Upload Galleries</p>
        </div>
        <br>


        <div class="row">
          <div class="col-10">
            <div class="margin-bottom-30">
              <div class="background-white">
                <div class="padding-topic">
                  <p class="menu-topic">Upload Galleries</p>
                </div>
                <hr>


                <div class="col-sm-12">
                  <div class="padding-30">
                    <div class="row">


                      <form name="frm_add_channel" method="post" enctype="multipart/form-data">
                        <img src="https://testersdock.com/wp-content/uploads/2017/09/file-upload-1280x640.png" id="imgAvatar" alt="Course Image" />
                        <br><br>
                        <p><input type="file" name="image" id="image" onchange="showPreview(this)" accept="/images/album" /></p>


                        <p class="form-text">Property Name</p>
                        <p><input type="text" class="form" name="name" placeholder="eg: Twin Tower" size="30" /></p>
                        <input name='price' type="hidden" value"" />

                        <p class="form-text">Place</p> <input type="text" class="form" name="place" placeholder="eg: Petaling Jaya" size="30" />

                        <p class="form-text">Type</p>

                        <select name="cat" class="form">
                          <?php
                          $sql = $conn->prepare("SELECT * FROM sys_cat");
                          $sql->execute();
                          foreach ($sql->fetchAll() as $row) {
                          ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                          <?php } ?>
                        </select>

                        <input type="submit" value="Add Album" />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<? echo $js; ?>jquery.min.js"></script>
<script language="Javascript">
  function showPreview(ele) {
    $('#imgAvatar').attr('src', ele.value); // for IE
    if (ele.files && ele.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imgAvatar').attr('src', e.target.result);
      }
      reader.readAsDataURL(ele.files[0]);
    }
  }
</script>
<?php
require_once($includes . 'footer.php');
?>
