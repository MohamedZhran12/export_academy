<?php
require_once('adminheader.php');
require_once('adminnav.php');

//check if session
if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm_add_channel") && isset($_FILES['image']['tmp_name'])) {
  $file = $_FILES['image']['tmp_name'];
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name = addslashes($_FILES['image']['name']);

  move_uploaded_file($_FILES['image']['tmp_name'], "images/courses/" . $_FILES['image']['name']);


  if (isset($_FILES['file']['tmp_name'])) {
    $file = $_FILES['file']['tmp_name'];
    $file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $file_name = addslashes($_FILES['file']['name']);

    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $_FILES['file']['name']);


    $topic = $_POST['topic'];
    $days = $_POST['days'];
    $date = $_POST['date'];
    $dateend = $_POST['dateend'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $cat = $_POST['cat'];
    $venue = ($cat == 1) ? $cat : $_POST['venue'];
    $intro = $_POST['intro'];
    $module = $_POST['module'];
    $trainer = $_POST['trainer'];
    $trainerinfo = $_POST['trainerinfo'];
    $fees = $_POST['fees'];

    $feesbefore = $_POST['feesbefore'];
    $points = $_POST['points'];
    $session = $_POST['session'];
    $sst = $_POST['sst'];
    $fees_in_usd = $_POST['fees_in_usd'];
    $feesbefore_in_usd = $_POST['feesbefore_in_usd'];

    $path = $_FILES['image']['name'];
    $pathin = $_FILES['file']['name'];

    $table = 'sys_seminars';

    global $conn;
    $sql = $conn->prepare("INSERT INTO $table
(
sys_course_image,
sys_course_topic,
sys_course_days,
sys_course_date ,
sys_course_dateend ,
sys_course_month,
sys_course_year,
sys_course_time,
sys_course_timeout,
sys_course_venue,
sys_course_intro,
sys_course_module,
sys_course_trainer,
sys_course_trainer_info,
sys_course_price,
sys_course_price_before,
sys_cpd_points,
sys_course_view,
sys_course_session,
sys_sst,
cat_id,
pdf,
sys_course_price_usd,
sys_course_price_before_usd
)

VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?,?,?,?,?,?)");
    $sql->execute([
      $path,
      $topic,
      $days,
      $date,
      $dateend,
      $month,
      $year,
      $timein,
      $timeout,
      $venue,
      $intro,
      $module,
      $trainer,
      $trainerinfo,
      $fees,
      $feesbefore,
      $points, 0,
      $session,
      $sst,
      $cat,
      $pathin,
      $fees_in_usd,
      $feesbefore_in_usd
    ]);

    echo '
	<script type="text/javascript">alert("Course Successfully Uploaded!");
	</script>';
  }
}

?>


<div class="margin-top"></div>

<div class="background-gradient">
  <div class="container-fluid">
    <div class="row">
      <?php
      require_once('admin-sidebar.php');
      ?>

      <div class="col-9">
        <div class="row">
          <div class="background-white-in">
            <div class="padding-30-15">
              <div class="breadcrumb-main">
                <p class="current-link">Admin Dashboard</p>
                <i class="fas fa-chevron-right"></i>
                <p class="current-link">Upload Seminar & Conferences</p>
              </div>
              <br>


              <div class="row">
                <div class="col-12">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic">Upload Seminar & Conferences</p>
                      </div>
                      <hr>


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


                      <div class="col-sm-12">
                        <div class="padding-30">
                          <div class="row">
                            <form name="frm_add_channel" method="post" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-sm-6">
                                  <p class="form-text">Course Image</p>
                                  <img src="../images/upload.jpg" id="imgAvatar" alt="Course Image"/>
                                  <br><br>
                                  <span class="image-size">(<b>Width :</b> 300px) x (<b>Height :</b> 600px)</span>
                                  <br><br>
                                  <p><input type="file" name="image" id="image" onChange="showPreview(this)"
                                            accept="images/course"/></p>
                                  <br>


                                  <p class="form-text">Upload Brochure</p>
                                  <input type="file" name="file">
                                </div>


                                <div class="col-sm-6">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <p class="form-text">Topic</p>
                                      <p><input type="text" class="form" name="topic" placeholder="eg: Accounts"
                                                size="30"/></p>
                                      <br>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">CPD Points</p>
                                      <p><input type="number" class="form" name="points" placeholder="eg: 11"
                                                size="30"/></p>
                                      <br>
                                    </div>

                                    <div class="col-sm-3">
                                      <p class="form-text">Start Date</p>
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


                                    <div class="col-sm-3">
                                      <p class="form-text">Date End</p>
                                      <p>
                                        <select id="form" class="form" name="dateend">
                                          <option value="">None</option>
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


                                    <div class="col-sm-3">
                                      <p class="form-text">Month</p>
                                      <p>
                                        <select id="form" class="form" name="month" value"<?php echo date("Y"); ?>">
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


                                    <div class="col-sm-3">
                                      <p class="form-text">Year</p>
                                      <p>
                                        <input type="number" value="<?php echo date("Y"); ?>" class="form" name="year">
                                      </p>
                                      <br>
                                    </div>


                                    <div class="col-sm-4">
                                      <p class="form-text">Days</p>
                                      <p><input type="number" class="form" value="1" name="days"></p>
                                      <br>
                                    </div>


                                    <div class="col-sm-4">
                                      <p class="form-text">Start Time</p>
                                      <p><input type="time" class="form" id="appt" name="timein"></p>
                                      <br>
                                    </div>


                                    <div class="col-sm-4">
                                      <p class="form-text">End Time</p>
                                      <p><input type="time" class="form" id="appt" name="timeout"></p>
                                      <br>
                                    </div>


                                    <div class="col-sm-12">
                                      <p class="form-text">6% SST</p>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <p class="side-by-side">Inclusive <input type="radio" name="sst"
                                                                                   value="Inclusive of 6% SST"/>
                                          </p>
                                        </div>

                                        <div class="col-sm-6">
                                          <p class="side-by-side">Subjected <input type="radio" name="sst"
                                                                                   value="Subjected to 6% SST"/>
                                          </p>
                                          <br>
                                        </div>
                                      </div>
                                    </div>


                                    <!--<div class="col-sm-12">	-->
                                    <!--        <p class="form-text">Course Type</p>-->
                                    <!--<div class="row">-->
                                    <!--        <div class="col-sm-6">-->
                                    <!--        <p class="side-by-side">Webinar <input type="radio" name="session" value="webinar"/>-->
                                    <!--        </p>-->
                                    <!--        </div>-->

                                    <!--        <div class="col-sm-6">-->
                                    <!--        <p class="side-by-side">Classroom <input type="radio" name="session" value="class"/>-->
                                    <!--        </p>-->
                                    <!--	    <br>-->
                                    <!--        </div>-->
                                    <!--</div>-->
                                    <!--</div>-->


                                    <div class="col-sm-12">
                                      <p class="form-text">Mode of Program</p>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <p class="side-by-side">Virtual Classroom
                                            <input type="radio" name="cat" value="1"/>
                                          </p>
                                        </div>

                                        <div class="col-sm-6">
                                          <p class="side-by-side">Public Class
                                            <input type="radio" name="cat" value="2"/>
                                          </p><br>
                                        </div>
                                      </div>
                                      <input style="display:none;" class="form" type="text" name="venue" value="Webinar"
                                             id="otherAnswer"/>
                                      <!--<p><input type="text" class="form" name="venue" placeholder="eg: Petaling Jaya" size="30" /></p>-->
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
                                  <p class="form-text">Tentative Programme</p>
                                  <textarea id="editor3" name="module"></textarea>

                                  <br>
                                </div>


                                <div class="col-sm-12">
                                  <p class="form-text">Speaker Name</p>
                                  <p><input type="text" class="form" name="trainer" placeholder="eg: Ali" size="30"/>
                                  </p>
                                  <br>
                                </div>


                                <div class="col-sm-12">
                                  <p class="form-text">Speaker Info</p>
                                  <textarea id="editor2" name="trainerinfo"></textarea>

                                  <br>
                                </div>


                                <div class="col-sm-6">
                                  <p class="form-text">Current Price in MYR</p>
                                  <p><input type="number" min="0.00" step="0.00" max="10000" value="0.00" class="form"
                                            name="fees" size="30"/></p>
                                  <br>
                                </div>


                                <div class="col-sm-6">
                                  <p class="form-text">Normal Price in MYR</p>
                                  <p><input type="number" min="0.00" step="0.00" max="10000" value="0.00" class="form"
                                            name="feesbefore" size="30"/></p>
                                  <br>
                                </div>

                                <div class="col-sm-6">
                                  <p class="form-text">Current Price in USD</p>
                                  <p><input type="number" min="0.00" step="0.00" max="10000" value="0.00" class="form"
                                            name="fees_in_usd" size="30"/></p>
                                  <br>
                                </div>


                                <div class="col-sm-6">
                                  <p class="form-text">Normal Price in USD</p>
                                  <p><input type="number" min="0.00" step="0.00" max="10000" value="0.00" class="form"
                                            name="feesbefore_in_usd" size="30"/></p>
                                  <br>
                                </div>


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


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("input[type='radio']").change(function () {
                            if ($(this).val() == "2") {
                                $("#otherAnswer").show();
                            } else {
                                $("#otherAnswer").hide();
                            }
                        });
                    });
                </script>


                <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

                <script>
                    CKEDITOR.replace('editor1');
                </script>


                <script>
                    CKEDITOR.replace('editor2');
                </script>

                <script>
                    CKEDITOR.replace('editor3');
                </script>


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
