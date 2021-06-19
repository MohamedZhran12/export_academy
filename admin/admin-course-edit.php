<!DOCTYPE html>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");

$id = $_GET['id'];
$table = isset($_GET['t']) ? $_GET['t'] : 'sys_course';
require_once($includes . 'sections_info.php');


$sqlStmt = "select course_date_start,course_date_end,id from courses_dates where course_type=? and course_id=?";
$datesSql = $conn->prepare($sqlStmt);
$datesSql->execute([$course_type, $id]);
$dates = $datesSql->fetchAll();

$stmt = $conn->prepare("select ID, name from courses_groups");
$stmt->execute();
$groups = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_FILES['course_image']['name'])) {
    require_once('update_course_image.php');
  }
  if (!empty($_FILES['pdf']['name'])) {
    require_once('edit_brochure.php');
  }
  $topic = $_POST['topic'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $days = $_POST['days'];
  $date = isset($_POST['date']) ? $_POST['date'] : explode('-', $start_date[0])[0];
  $month = isset($_POST['month']) ? $_POST['month'] : explode('-', $start_date[0])[1];
  $year = $_POST['year'];
  $timein = $_POST['timein'];
  $timeout = $_POST['timeout'];
  $intro = $_POST['intro'];
  $module = $_POST['module'];
  $trainer = $_POST['trainer'];
  $trainerinfo = $_POST['trainerinfo'];
  $fees = $_POST['fees'];
  $feesbefore = $_POST['feesbefore'];
  $fees_usd = $_POST['fees_usd'];
  $feesbefore_usd = $_POST['feesbefore_usd'];
  $points = $_POST['points'];
  $session = $_POST['session'];
  $sst = $_POST['tax'];
  $cat = $_POST['cat'];
  $venue = ($cat == 1) ? $_POST['virtual_venue'] : $_POST['public_venue'];
  $is_lunch = $_POST['toggle_lunch'];
  $is_hrdf = $_POST['toggle_hrdf'];
  $is_cpd_text = $_POST['toggle_cpd_text'];
  $group_id = $_POST['group_id'];

  $sql = "UPDATE $table SET
    sys_course_topic =?,
    sys_course_days =?,
    sys_course_date =?,
    sys_course_month =?,
    sys_course_year =?,
    sys_course_time =?,
    sys_course_timeout =?,
    sys_course_intro =?,
    sys_course_module =?,
    sys_course_date =?,
    sys_course_trainer =?,
    sys_course_trainer_info =?,
    sys_course_date =?,
    sys_course_price =?,
    sys_course_price_before =?,
    sys_course_price_usd =?,
    sys_course_price_before_usd =?,
    sys_cpd_points =?,
    sys_sst =?,
    sys_course_session=?,
    sys_course_venue=?,
    cat_id=?,
    is_hrdf=?,
    is_cpd_text=?,
    is_lunch=?,
    group_id=?
    WHERE sys_course_id =?";

  $result = $conn->prepare($sql)->execute([
    $topic, $days, $date, $month, $year, $timein, $timeout, $intro,
    $module, $date, $trainer, $trainerinfo, $date, $fees, $feesbefore, $fees_usd, $feesbefore_usd, $points,
    $sst, $session, $venue, $cat, $is_hrdf, $is_cpd_text, $is_lunch, $group_id, $id
  ]);


  $isUpdated = $conn->prepare("delete from courses_dates where course_id=?")->execute([$id]);

  $insert_dates_stmt = "insert into courses_dates(course_date_start,course_date_end,course_type,course_id) values";
  for ($i = 0; $i < count($start_date); $i++) {
    $insert_dates_stmt .= "('$start_date[$i]','$end_date[$i]','$course_type',$id)";
    if ($i != count($start_date) - 1) {
      $insert_dates_stmt .= ',';
    }
  }
  $isDatesUpdated = $conn->prepare($insert_dates_stmt)->execute();
  if ($isUpdated && $isDatesUpdated) {
    echo '<script type="text/javascript">alert("Course Successfully Updated!");</script>';
  }
}
?>



<div class="background-gradient">
  <div class="container-fluid">
    <div class="row">
      <?php
      require_once($includes . 'admin-sidebar.php');
      ?>

      <div class="col-9">
        <div class="row">
          <div class="background-white-in">
            <div class="padding-30-15">
              <div class="breadcrumb-main">
                <p class="current-link">Admin Dashboard</p>
                <i class="fas fa-chevron-right"></i>
                <p class="current-link">Edit <? echo $section; ?></p>
              </div>
              <br>

              <div class="row">
                <div class="col-12">
                  <div class="margin-bottom-30">
                    <div class="background-white">
                      <div class="padding-topic">
                        <p class="menu-topic">Edit <? echo $section; ?></p>
                      </div>
                      <hr>

                      <?php
                      $sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id= ?");
                      $sql->execute([$id]);
                      $course = $sql->fetchAll();
                      if ($sql->rowCount() > 0) {
                        foreach ($course

                          as $row) {
                      ?>

                          <div class="col-sm-12">
                            <div class="padding-30">
                              <div class="row">
                                <form method="post" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <p class="form-text">Course Image</p>
                                      <img alt='image' src="images/courses/<?php echo $row['sys_course_image']; ?>" id="course_image" alt='image'>
                                      <br>
                                      <label for="course_image">Image</label>
                                      <input type="file" name="course_image" accept="image/*" onchange="readURL(this)" />
                                      <br>
                                      <label for="brochure">Brochure</label>
                                      <input type="file" name="pdf" id="brochure">
                                      <br>
                                    </div>

                                    <div class="col-sm-6">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <p class="form-text">Topic</p>
                                          <p><input type="text" class="form" name="topic" placeholder="eg: Accounts" size="30" value="<?php echo $row['sys_course_topic']; ?>" /></p>
                                          <br>
                                        </div>

                                        <div class="col-sm-12">
                                          <p class="form-text">CPD Points</p>
                                          <p><input type="number" class="form" name="points" placeholder="eg: 11" value="<?php echo $row['sys_cpd_points']; ?>" size="30" /></p>
                                          <br>
                                        </div>


                                        <? if ($table == 'sys_professional_cert' || $table == 'sys_special_programmes') { ?>
                                          <? foreach ($dates as $date) { ?>
                                            <div class='col-12 date-picker mb-3'>
                                              <div class='row'>
                                                <div class='col-5'>
                                                  <div class="input-group date">
                                                    <input type="text" value='<? echo $date['course_date_start'] ?>' class="form-control" autocomplete='off' placeholder='Start Date' name='start_date[]'><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                  </div>
                                                </div>
                                                To
                                                <div class='col-6'>
                                                  <div class="input-group date">
                                                    <input type="text" value='<? echo $date['course_date_end'] ?>' class="form-control" autocomplete='off' placeholder='End Date' name='end_date[]'><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <? } ?>
                                          <div class='col-12 mb-3'>
                                            <button id='add-more-date' class='btn btn-success'>Add More Dates</button>
                                          </div>
                                        <? } else { ?>

                                          <div class="col-sm-4">
                                            <p class="form-text">Date</p>
                                            <p>
                                              <select class="form" name="date">
                                                <option value="<?php echo $row['sys_course_date']; ?>"><?php echo $row['sys_course_date']; ?></option>
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
                                                <option value="<?php echo $row['sys_course_month']; ?>"><?php echo $row['sys_course_month']; ?></option>
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
                                              <input type="number" class="form" name="year" value="<?php echo $row['sys_course_year']; ?>">
                                            </p>
                                            <br>
                                          </div>

                                        <? } ?>

                                        <div class="col-sm-4">
                                          <p class="form-text">Days</p>
                                          <p><input type="number" class="form" placeholder="3" name="days" value="<?php echo $row['sys_course_days']; ?>"></p>
                                          <br>
                                        </div>


                                        <div class="col-sm-4">
                                          <p class="form-text">Start Time</p>
                                          <p><input type="time" class="form" name="timein" value="<?php echo $row['sys_course_time']; ?>"></p>
                                          <br>
                                        </div>


                                        <div class="col-sm-4">
                                          <p class="form-text">End Time</p>
                                          <p><input type="time" class="form" name="timeout" value="<?php echo $row['sys_course_timeout']; ?>"></p>
                                          <br>
                                        </div>
                                        <? if ($table == 'sys_special_programmes') { ?>
                                          <div class="col-12 mb-4">
                                            <label for='group-title'>Group</label>
                                            <select id='group-title' name='group_id' class="custom-select">
                                              <option value="" disabled selected>Select Group</option>
                                              <option value="0">Without Group</option>
                                              <? foreach ($groups as $group) { ?>
                                                <option <? if ($group['ID'] == $row['group_id']) echo 'selected' ?> value="<? echo $group['ID'] ?>">
                                                  <? echo $group['name'] ?>
                                                </option>
                                              <? } ?>
                                            </select>
                                          </div>
                                        <? } ?>
                                        <div class="col-sm-12">
                                          <p class="form-text">6% SST</p>
                                          <div class="row">
                                            <div class="col-sm-6">
                                              <p class="side-by-side">Inclusive
                                                <input <?php if ($row['sys_sst'] == 'Inclusive of 6% SST') echo 'checked' ?> type="radio" name="tax" checked value="Inclusive of 6% SST" />
                                              </p>
                                            </div>

                                            <div class="col-sm-6">
                                              <p class="side-by-side">Subjected
                                                <input <?php if ($row['sys_sst'] == 'Inclusive of 6% SST') echo 'checked' ?> type="radio" name="tax" value="Subjected to 6% SST" />
                                              </p>
                                              <br>
                                            </div>
                                          </div>
                                          <p class="form-text">GST</p>
                                          <div class="row">
                                            <div class="col-sm-6">
                                              <p class="side-by-side">Inclusive
                                                <input <?php if ($row['sys_sst'] == 'Inclusive of 6% GST') echo 'checked' ?> type="radio" name="tax" value="Inclusive of 6% GST" />
                                              </p>
                                            </div>

                                            <div class="col-sm-6">
                                              <p class="side-by-side">Subjected
                                                <input <?php if ($row['sys_sst'] == 'Subjected to 6% GST') echo 'checked' ?> type="radio" name="tax" value="Subjected to 6% GST" />
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
                                                <input type="radio" <?php if ($row['cat_id'] == 1) echo 'checked' ?> name="cat" value="1" id='virtualClass' />
                                              </p>
                                            </div>

                                            <div class="col-sm-6">
                                              <p class="side-by-side">Public Programme
                                                <input type="radio" <?php if ($row['cat_id'] == 2) echo 'checked' ?> name="cat" value="2" id='publicClass' />
                                              </p><br>
                                            </div>
                                          </div>
                                          <input <?php if ($row['cat_id'] != 1) echo 'style="display:none;"' ?> class="form" type="text" name="virtual_venue" value="<?php if ($row['cat_id'] == 1) echo $row['sys_course_venue']; ?>" id="virtualAnswer" />
                                          <input <?php if ($row['cat_id'] != 2) echo 'style="display:none;"' ?> class="form" type="text" name="public_venue" value="<?php if ($row['cat_id'] == 2) echo $row['sys_course_venue']; ?>" id="publicAnswer" />
                                          <br>
                                        </div>


                                      </div>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">Intro</p>
                                      <textarea id="editor1" name="intro"><?php echo $row['sys_course_intro']; ?></textarea>

                                      <br>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">Course Module</p>
                                      <textarea id="editor3" name="module"><?php echo $row['sys_course_module']; ?></textarea>

                                      <br>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">Trainer Name</p>
                                      <p><input type="text" class="form" name="trainer" placeholder="eg: Ali" size="30" value="<?php echo $row['sys_course_trainer']; ?>" /></p>
                                      <br>
                                    </div>

                                    <div class="col-sm-12">
                                      <p class="form-text">Trainer Info</p>
                                      <textarea id="editor2" name="trainerinfo"><?php echo $row['sys_course_trainer_info']; ?></textarea>

                                      <br>
                                    </div>

                                    <div class="col-sm-6">
                                      <p class="form-text">Current Price in MYR</p>
                                      <p><input type="number" step="0.01" value="<?php echo $row['sys_course_price']; ?>" class="form" name="fees" size="30" /></p>
                                      <br>
                                    </div>

                                    <div class="col-sm-6">
                                      <p class="form-text">Normal Price in MYR</p>
                                      <p><input type="number" step="0.01" value="<?php echo $row['sys_course_price_before']; ?>" class="form" name="feesbefore" size="30" /></p>
                                      <br>
                                    </div>

                                    <div class="col-sm-6">
                                      <p class="form-text">Current Price USD</p>
                                      <p><input type="number" step="0.01" value="<?php echo $row['sys_course_price_usd']; ?>" class="form" name="fees_usd" size="30" /></p>
                                      <br>
                                    </div>

                                    <div class="col-sm-6">
                                      <p class="form-text">Normal Price USD</p>
                                      <p><input type="number" step="0.01" value="<?php echo $row['sys_course_price_before_usd']; ?>" class="form" name="feesbefore_usd" size="30" /></p>
                                      <br>
                                    </div>
                                    <? if ($table == 'sys_special_programmes') { ?>
                                      <div class="col-sm-12">
                                        <span>Show HRDF:</span>
                                        <input type="radio" name="toggle_hrdf" value='1' <? if ($row['is_hrdf'] == 1) echo 'checked'; ?> /><span> Yes</span>
                                        <input type="radio" name="toggle_hrdf" value='0' <? if ($row['is_hrdf'] == 0) echo 'checked'; ?> /><span> No</span>
                                      </div>
                                      <div class="col-sm-12">
                                        <span>Show Lunch:</span>
                                        <input type="radio" name="toggle_lunch" value='1' <? if ($row['is_lunch'] == 1) echo 'checked'; ?> /><span> Yes</span>
                                        <input type="radio" name="toggle_lunch" value='0' <? if ($row['is_lunch'] == 0) echo 'checked'; ?> /><span> No</span>
                                      </div>
                                      <div class="col-sm-12">
                                        <span>Show Certificate of Attendance:</span>
                                        <input type="radio" name="toggle_cpd_text" value='1' <? if ($row['is_cpd_text'] == 1) echo 'checked'; ?> /><span> Yes</span>
                                        <input type="radio" name="toggle_cpd_text" value='0' <? if ($row['is_cpd_text'] == 0) echo 'checked'; ?> /><span> No</span>
                                      </div>

                                    <? } ?>

                                    <div class="col-sm-12">
                                      <input type="submit" class="button" value="Update Course" onclick="return checking()" />
                                      <input type='hidden' name='old_image' value='<?php echo $row['sys_course_image']; ?>' ?>
                                      <input type='hidden' name='old_pdf' value='<?php echo $row['pdf']; ?>' ?>
                                </form>
                              </div>

                            </div>
                          </div>
                    </div>

                  </div>
              <?php }
                      } ?>
                </div>

                <script src="<? echo $js; ?>jquery.min.js"></script>
                <script>
                  $(document).ready(function() {
                    $("input[type='radio']").change(function() {
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
                <script src='assets/bootstrap-datepicker.min.js'></script>
                <script>
                  function insertAfter(newNode, referenceNode) {
                    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
                  }

                  CKEDITOR.replace('editor1');
                  CKEDITOR.replace('editor2');
                  CKEDITOR.replace('editor3');
                  document.getElementById('add-more-date').addEventListener('click', function(e) {
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

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        document.getElementById('course_image').setAttribute('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
