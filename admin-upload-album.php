<?php
require_once('admin/adminheader.php');
require_once('admin/adminnav.php');

//check if session
if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}


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

  global $conn;
  $sql = $conn->prepare("INSERT INTO sys_album
(sys_album_image, sys_album_name,
sys_album_place, sys_album_owner,
sys_album_view, sys_album_type,cat_id)
VALUES(?, ?, ?, ?, 0, ?, ?)");
  $sql->execute([$path, $name, $place, $owner, 0, $type, $cat]);
  echo '
	<script type="text/javascript">alert("Successfully Update Album!");
	</script>';
}
?>


<!-- image upload -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script language="Javascript">
    function showPreview(ele) {
        $('#imgAvatar').attr('src', ele.value); // for IE
        if (ele.files && ele.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgAvatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(ele.files[0]);
        }
    }
</script>


<div class="margin-top"></div>


<div class="container-fluid">
  <div class="row">
    <?php
    require_once('admin-sidebar.php');
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
                        <img src="https://testersdock.com/wp-content/uploads/2017/09/file-upload-1280x640.png"
                             id="imgAvatar" alt="Course Image"/>
                        <br><br>
                        <p><input type="file" name="image" id="image" onChange="showPreview(this)"
                                  accept="images/album"/></p>


                        <p class="form-text">Property Name</p>
                        <p><input type="text" class="form" name="name" placeholder="eg: Twin Tower" size="30"/></p>
                        <input name='price' type="hidden" value"" />

                        <p class="form-text">Place</p
                        <p><input type="text" class="form" name="place" placeholder="eg: Petaling Jaya" size="30"/></p>

                        <p class="form-text">Type</p>
                        <p>

                          <select name="cat" class="form">
                            <?php
                            $sql = $conn->prepare("SELECT * FROM sys_cat");
                            $sql->execute();
                            foreach ($sql->fetchAll() as $row) {
                              ?>
                              <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                            <?php } ?>
                          </select>

                        </p>
                        <input type="submit" value="Add Album" onclick="return checking()"/>
                        <input type="hidden" name="MM_insert" value="frm_add_channel">
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


  <?php
  require_once('footer.php');
  ?>
