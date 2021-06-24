<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel")) {


  $topic = $_POST['topic'];


  $sql = "INSERT INTO sys_cat

	  (sys_cat_name)

	  VALUES

	  ('$topic')";


  $sql = $conn->prepare("INSERT INTO sys_cat (sys_cat_name) VALUES(?)");
  $sql->execute([$topic]);
  echo '
	<script>alert("Course Categories Successfully Uploaded!");
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
          <p class="current-link">Upload Course</p>
        </div>
        <br>


        <div class="row">
          <div class="col-10">
            <div class="margin-bottom-30">
              <div class="background-white">
                <div class="padding-topic">
                  <p class="menu-topic">Upload Course</p>
                </div>
                <hr>


                <div class="col-sm-12">
                  <div class="padding-30">
                    <div class="row">
                      <form name="frm_add_channel" method="post" enctype="multipart/form-data">
                        <div class="row">

                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-12">
                                <p class="form-text">Topic</p>
                                <p><input type="text" class="form" name="topic" placeholder="eg: Accounts" size="30" />
                                </p>
                                <br>
                              </div>


                              <div class="col-sm-12">
                                <input type="submit" class="button" value="Add Course" onclick="return checking()" />
                                <input type="hidden" name="MM_insert" value="frm_add_channel">
                      </form>
                    </div>

                    <br><br><br><br>


                    <?php
                    $sql = $conn->prepare("SELECT * FROM sys_cat");
                    $sql->execute();
                    if ($sql->rowCount() > 0) {
                      foreach ($sql->fetchAll() as $row) {
                    ?>


                        <div class="col-sm-12">
                          <?php echo $row['sys_cat_name']; ?>
                          <a class="edit" href="admin-cat-edit.php?id=<?php echo $row['sys_cat_id']; ?>" title="Edit Categories">
                            <p><i class="fas fa-edit"></i></p>
                          </a>
                        </div>
                    <?php }
                    } ?>

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
