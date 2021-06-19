<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");




if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MAXZ staffs are allowed to access this page.\n\nThank you.");location.href="login.php"</script>';
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel")) {

  $cat = $_POST['cat'];
  $path = $_FILES['image']['name'];


  $sql = $conn->prepare("INSERT INTO sys_course_cat

(sys_course_image, sys_course_name)

VALUES

(?,?)");
  $sql->execute([$path, $cat]);


  echo '
	<script type="text/javascript">alert("Course Categories Successfully Uploaded!");

	</script>';
}
?>

<br><br><br><br>

<form name="frm_add_channel" method="post" enctype="multipart/form-data">
  <p class="form-text">Date</p
  <p><input type="text" class="form" name="cat" placeholder="eg: Petaling Jaya" size="30"/></p>
  <input type="submit" value="Add Album" onclick="return checking()"/>
  <input type="hidden" name="MM_insert" value="frm_add_channel">
</form>


<?php
  require_once($includes . 'footer.php');
?>
