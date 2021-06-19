<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");




$id = $_GET['id'];


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel")) {


  $topic = $_POST['topic'];


  $sql = $conn->prepare("UPDATE sys_cat SET sys_cat_name = '$topic' WHERE sys_cat_id = '" . $_GET['id'] . "'");
  $sql->execute();
  echo '<script type="text/javascript">alert("Successfully Update Password!");location.href="admin-cat.php";</script>';
}
?>





<div class="container-fluid">
  <div class="row">
    <?php
    require_once($includes.'admin-sidebar.php');
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

                                <?php
                                $sql = $conn->prepare("SELECT * FROM sys_cat WHERE sys_cat_id=?");
                                $sql->execute([$id]);
                                if ($sql->rowCount() > 0) {
                                foreach ($sql->fetchAll() as $row) {
                                ?>
                                <p class="form-text">Topic</p>
                                <p><input type="text" class="form" name="topic"
                                          value="<?php echo $row['sys_cat_name']; ?>" size="30"/></p>
                                <br>
                              </div>
                              <?php }
                              } ?>


                              <div class="col-sm-12">
                                <input type="submit" class="button" value="Add Course" onclick="return checking()"/>
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


</div>
</div>
</div>
</div>
</div>
</div>
