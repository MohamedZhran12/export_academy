<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");





if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel") && isset($_FILES['image']['tmp_name'])) {
  $file = $_FILES['image']['tmp_name'];
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name = addslashes($_FILES['image']['name']);

  move_uploaded_file($_FILES['image']['tmp_name'], "images/courses/" . $_FILES['image']['name']);

  $topic = $_POST['topic'];
  $days = $_POST['days'];
  $date = $_POST['date'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $timein = $_POST['timein'];
  $timeout = $_POST['timeout'];
  $venue = $_POST['venue'];
  $intro = $_POST['intro'];
  $module = $_POST['module'];
  $trainer = $_POST['trainer'];
  $trainerinfo = $_POST['trainerinfo'];
  $fees = $_POST['fees'];
  $cat = $_POST['cat'];
  $feesbefore = $_POST['feesbefore'];
  $session = $_POST['session'];
  $path = $_FILES['image']['name'];


  $sql = $conn->prepare("INSERT INTO sys_course

(sys_course_image, sys_course_topic,sys_course_days, sys_course_date , sys_course_month, sys_course_year, sys_course_time,sys_course_timeout,sys_course_venue,sys_course_intro,sys_course_module,sys_course_trainer,sys_course_trainer_info, sys_course_price,sys_course_price_before,sys_course_view,sys_course_session,cat_id)

VALUES

(?, ?,?, ?, ?, ?,?,?,?,?,?,?,?,?,?,0,?,?)");
  $sql->execute([$path, $topic, $days, $date, $month, $year, $timein, $timeout, $venue, $intro, $module, $trainer, $trainerinfo, $fees, $feesbefore, 0, $session, $cat]);

  echo '
	<script type="text/javascript">alert("Course Categories Successfully Uploaded!");
	</script>';
}
?>

<div class="padding-100">

  <div class="container">

    <div class="row">
      <div class="col-sm-3">

      </div>

      <div class="col-sm-9">
        <h2>Course Upload</h2>
        <hr>
        <br>
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6">
              <p class="form-text">Course Image</p>
              <img alt='image' src="https://testersdock.com/wp-content/uploads/2017/09/file-upload-1280x640.png" id="imgAvatar" alt="Course Image" />
              <span class="image-size">(<b>Width :</b> 200px) x (<b>Height :</b> 100px)</span>
              <br><br>
              <p><input type="file" name="image" id="image" onchange="showPreview(this)" accept="images/course" /></p>
              <br>
            </div>

            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <p class="form-text">Topic</p>
                  <p><input type="text" class="form" name="topic" placeholder="eg: Accounts" size="30" /></p>
                  <br>
                </div>

                <div class="col-sm-4">
                  <p class="form-text">Date</p>
                  <p>
                    <select id="form" class="form" name="date">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                  </p>
                  <br>
                </div>


                <div class="col-sm-4">
                  <p class="form-text">Month</p>
                  <p>
                    <select class="form" name="month">
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </p>
                  <br>
                </div>

                <div class="col-sm-4">
                  <p class="form-text">Year</p>
                  <p>
                    <input type="number" placeholder="2020" class="form" name="year">
                  </p>
                  <br>
                </div>

                <div class="col-sm-4">
                  <p class="form-text">Days</p>
                  <p><input type="number" class="form" placeholder="3" name="days"></p>
                  <br>
                </div>

                <div class="col-sm-4">
                  <p class="form-text">Start Time</p>
                  <p><input type="time" class="form" name="timein"></p>
                  <br>
                </div>

                <div class="col-sm-4">
                  <p class="form-text">End Time</p>
                  <p><input type="time" class="form" name="timeout"></p>
                  <br>
                </div>

                <div class="col-sm-12">
                  <p class="form-text">Venue</p>
                  <p class="side-by-side">Virtual Classroom
                    <input type="radio" name="cat" value="1" />
                    VC<input type="radio" name="session" value="webinar" />
                    PC<input type="radio" name="session" value="class" />
                  </p>
                  <p class="side-by-side">Public Class
                    <input type="radio" name="cat" value="2" />
                  </p><br><br>
                  <input style="display:none;" class="form" type="text" name="venue" id="otherAnswer" />
                  <br>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <p class="form-text">Intro</p>
              <textarea id="editor1" name="intro"></textarea>
              <br>
            </div>

            <div class="col-sm-12">
              <p class="form-text">Course Module</p>
              <textarea id="editor3" name="module"></textarea>
              <br>
            </div>

            <div class="col-sm-12">
              <p class="form-text">Trainer Name</p>
              <p><input type="text" class="form" name="trainer" placeholder="eg: Ali" size="30" /></p>
              <br>
            </div>

            <div class="col-sm-12">
              <p class="form-text">Trainer Info</p>
              <textarea id="editor2" name="trainerinfo"></textarea>
              <br>
            </div>

            <div class="col-sm-4">
              <p class="form-text">Current Price</p>
              <p><input type="number" min="0.01" step="0.01" value="25.67" class="form" name="fees" size="30" /></p>
              <br>
            </div>

            <div class="col-sm-4">
              <p class="form-text">Normal Price</p>
              <p><input type="number" min="0.01" step="0.01" value="25.67" class="form" name="feesbefore" size="30" />
              </p>
              <br>
            </div>

            <div class="col-sm-12">
              <input type="submit" class="button" value="Add Course" />
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script src="<? echo $js; ?>jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    $("input[type='radio']").change(function() {
      if ($(this).val() == "2") {
        $("#otherAnswer").show();
      } else {
        $("#otherAnswer").hide();
      }
    });
  });

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
  CKEDITOR.replace('editor1');
  CKEDITOR.replace('editor3');
  CKEDITOR.replace('editor2');
</script>

<?php
require_once($includes . 'footer.php');
?>
