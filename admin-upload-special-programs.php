<?php

require_once('adminheader.php');
require_once('adminnav.php');

//check if session
if ($_SESSION['user']['level_id'] != 1) {
  echo '<script type="text/javascript">alert("Only MEA staffs are allowed to access this page.\n\nThank you.");location.href="login.php";</script>';
}

global $conn;
$stmt = $conn->prepare("select ID, name from courses_groups");
$stmt->execute();
$groups = $stmt->fetchAll();

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
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $first_start_date = explode('-', $start_date[0])[0];
    $first_end_date = explode('-', $end_date[0])[0];
    $month = explode('-', $start_date[0])[1];
    $year = explode('-', $start_date[0])[2];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $cat = $_POST['cat'];
    $venue = ($cat == 1) ? $_POST['virtual_venue'] : $_POST['public_venue'];
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
    $cert_name = $_POST['certification_name'];
    $cert_info = $_POST['certification_info'];
    $is_lunch = $_POST['toggle_lunch'];
    $is_hrdf = $_POST['toggle_hrdf'];
    $is_cpd_text = $_POST['toggle_cpd_text'];
    $group_id = $_POST['group_id'];

    $table = 'sys_special_programmes';

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
	  sys_course_price_before_usd,
	  certification_name,
	  certification_info,
    is_hrdf,
    is_cpd_text,
    is_lunch,
    group_id)

	  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?,?,?,?,?,?,?,?,?,?,?,?)");

    $sql->execute([
      $path,
      $topic,
      $days,
      $first_start_date,
      $first_end_date,
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
      $feesbefore_in_usd,
      $cert_name,
      $cert_info,
      $is_hrdf,
      $is_cpd_text,
      $is_lunch,
      $group_id
    ]);

    $last_inserted_id = $conn->lastInsertId();
    $date_table = 'courses_dates';
    $course_type = 'special_programmes';
    $insert_dates_stmt = "insert into $date_table(course_date_start,course_date_end,course_type,course_id) values";
    for ($i = 0; $i < count($start_date); $i++) {
      $insert_dates_stmt .= "('$start_date[$i]','$end_date[$i]','$course_type',$last_inserted_id)";
      if ($i != count($start_date) - 1) {
        $insert_dates_stmt .= ',';
      }
    }
    $isSuccess2 = $conn->prepare($insert_dates_stmt)->execute();
    if ($isSuccess && $isSuccess2) {
      echo '
	<script type="text/javascript">
	    alert("Course Successfully Uploaded!");
	</script>';
    }
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
                <p class="current-link">Upload Special Programmes</p>
              </div>
              <br>

              <div class="row">
                <div class="col-12">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic">Upload Special Programmes</p>
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
                                      <span>Show CPD:</span>
                                      <input type="radio" id="show-cpd" name="show-hide-cpd" checked/><span> Yes</span>
                                      <input type="radio" id="hide-cpd" name="show-hide-cpd"/><span> No</span>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">CPD Points</p>
                                      <p><input type="number" id='cpd-points' class="form" name="points"
                                                placeholder="eg: 11" size="30"/></p>
                                      <br>
                                    </div>

                                    <div class='col-12 date-picker mb-3'>
                                      <div class='row'>
                                        <div class='col-5'>
                                          <div class="input-group date">
                                            <input type="text" class="form-control" autocomplete='off'
                                                   placeholder='Start Date' name='start_date[]' required><span
                                                class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                          </div>
                                        </div>
                                        To
                                        <div class='col-6'>
                                          <div class="input-group date">
                                            <input type="text" class="form-control" autocomplete='off'
                                                   placeholder='End Date' name='end_date[]' required><span
                                                class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class='col-12 mb-3'>
                                      <button id='add-more-date' class='btn btn-success'>Add More Dates</button>
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

                                    <div class="col-12">
                                      <select id='group-title' name='group_id' class="custom-select">
                                        <option value="" disabled selected>Select Group</option>
                                        <? foreach ($groups as $group) { ?>
                                          <option value="<? echo $group['ID'] ?>">
                                            <? echo $group['name'] ?>
                                          </option>
                                        <? } ?>
                                      </select>
                                    </div>
                                    <div class="col-sm-12">
                                      <span>Show Tax:</span>
                                      <input type="radio" id="show-tax" name="show-hide-tax" checked/><span> Yes</span>
                                      <input type="radio" id="hide-tax" name="show-hide-tax"/><span> No</span>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">6% SST</p>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <p class="side-by-side">Inclusive <input type="radio" name="tax" checked
                                                                                   value="Inclusive of 6% SST"/>
                                          </p>
                                        </div>

                                        <div class="col-sm-6">
                                          <p class="side-by-side">Subjected <input type="radio" name="tax"
                                                                                   value="Subjected to 6% SST"/>
                                          </p>
                                          <br>
                                        </div>
                                      </div>
                                      <p class="form-text">GST</p>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <p class="side-by-side">Inclusive <input type="radio" name="tax"
                                                                                   value="Inclusive of 6% GST"/>
                                          </p>
                                        </div>

                                        <div class="col-sm-6">
                                          <p class="side-by-side">Subjected <input type="radio" name="tax"
                                                                                   value="Subjected to 6% GST"/>
                                          </p>
                                          <br>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">Mode of Program</p>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <p class="side-by-side">Virtual Programme
                                            <input type="radio" id='virtual-class' name="cat" value="1" required/>
                                          </p>
                                        </div>
                                        <div class="col-sm-6">
                                          <p class="side-by-side">Public Programme
                                            <input type="radio" id='public-class' name="cat" value="2" required/>
                                          </p><br>
                                        </div>
                                      </div>
                                      <input style="display:none;" class="form" type="text" name="virtual_venue"
                                             value="Platform Name" id="virtualAnswer"/>
                                      <input style="display:none;" class="form" type="text" name="public_venue"
                                             value="Venue Name" id="publicAnswer"/>
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
                                  <p><input type="text" class="form" name="trainer" placeholder="eg: Ali" size="30"/>
                                  </p>
                                  <br>
                                </div>

                                <div class="col-sm-12">
                                  <p class="form-text">Trainer Info</p>
                                  <textarea id="editor2" name="trainerinfo"></textarea>

                                  <br>
                                </div>

                                <div class="col-sm-12">
                                  <p class="form-text">Certification Name</p>
                                  <textarea id="editor4" name="certification_name"></textarea>

                                  <br>
                                </div>

                                <div class="col-sm-12">
                                  <p class="form-text">Certification Info</p>
                                  <textarea id="editor5" name="certification_info"></textarea>

                                  <br>
                                </div>

                                <div class="col-sm-6">
                                  <p class="form-text">Current Price in MYR</p>
                                  <p><input type="number" min="0.00" step="0.00" value="0.00" class="form" name="fees"
                                            size="30"/></p>
                                  <br>
                                </div>

                                <div class="col-sm-6">
                                  <p class="form-text">Normal Price in MYR</p>
                                  <p><input type="number" min="0.00" step="0.00" value="0.00" class="form"
                                            name="feesbefore" size="30"/></p>
                                  <br>
                                </div>

                                <div class="col-sm-6">
                                  <p class="form-text">Current Price in USD</p>
                                  <p><input type="number" min="0.00" step="0.00" value="0.00" class="form"
                                            name="fees_in_usd" size="30"/></p>
                                  <br>
                                </div>

                                <div class="col-sm-6">
                                  <p class="form-text">Normal Price in USD</p>
                                  <p><input type="number" min="0.00" step="0.00" value="0.00" class="form"
                                            name="feesbefore_in_usd" size="30"/></p>
                                  <br>
                                </div>

                                <div class="col-sm-12">
                                  <span>Show HRDF:</span>
                                  <input type="radio" name="toggle_hrdf" value='1' checked/><span> Yes</span>
                                  <input type="radio" name="toggle_hrdf" value="0"/><span> No</span>
                                </div>
                                <div class="col-sm-12">
                                  <span>Show Lunch:</span>
                                  <input type="radio" name="toggle_lunch" value='1' checked/><span> Yes</span>
                                  <input type="radio" name="toggle_lunch" value="0"/><span> No</span>
                                </div>
                                <div class="col-sm-12">
                                  <span>Show Certificate of Attendance:</span>
                                  <input type="radio" name="toggle_cpd_text" value='1' checked/><span> Yes</span>
                                  <input type="radio" name="toggle_cpd_text" value="0"/><span> No</span>
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
                                $("#publicAnswer").show();
                                $("#virtualAnswer").hide();
                            } else if ($(this).val() == "1") {
                                $("#publicAnswer").hide();
                                $("#virtualAnswer").show();
                            }
                        });
                    });
                </script>

                <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
                <script>
                    document.getElementById('show-cpd').addEventListener('click', function () {
                        var cpdValue = document.getElementById('cpd-points');
                        if (cpdValue.value[0] == 0) {
                            cpdValue.value = cpdValue.value.replace('0', '');
                        }
                    })

                    document.getElementById('hide-cpd').addEventListener('click', function () {
                        var cpdValue = document.getElementById('cpd-points');
                        cpdValue.value = 0 + cpdValue.value;
                    })

                    document.getElementById('show-tax').addEventListener('click', function () {
                        var cpdValue = document.querySelector('input[name=tax]:checked');
                        if (cpdValue.value[0] == 0) {
                            cpdValue.value = cpdValue.value.replace('0', '');
                        }
                    })

                    document.getElementById('hide-tax').addEventListener('click', function () {
                        var cpdValue = document.querySelector('input[name=tax]:checked');
                        cpdValue.value = 0 + cpdValue.value;
                    })
                </script>

                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src='assets/bootstrap-datepicker.min.js'></script>
                <script>
                    function insertAfter(newNode, referenceNode) {
                        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
                    }

                    CKEDITOR.replace('editor1');
                    CKEDITOR.replace('editor2');
                    CKEDITOR.replace('editor3');
                    CKEDITOR.replace('editor4');
                    CKEDITOR.replace('editor5');
                    document.getElementById('add-more-date').addEventListener('click', function (e) {
                        e.preventDefault();
                        insertAfter(document.getElementsByClassName('date-picker')[0].cloneNode(true), document.getElementsByClassName('date-picker')[0]);
                        $('.input-group.date').datepicker({
                            format: "dd-mm-yyyy"
                        });
                    })
                    $('.input-group.date').datepicker({
                        format: "dd-mm-yyyy"
                    });
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
