<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
require_once($includes . 'sections_info.php');

if ($isThereGroups) {
  $stmt = $conn->prepare("select ID, name from $groupsTable");
  $stmt->execute();
  $groups = $stmt->fetchAll();
}

function addToInsertQueryIfValueIsSet($tableAttributes, &$names, &$values)
{
  foreach ($tableAttributes as $key => $value) {
    if (isset($value)) {
      $names[] = $key;
      $values[] = $value;
    }
  }
}

function insertMoreDates($start_date, $end_date, $table)
{
  global $conn;
  $last_inserted_id = $conn->lastInsertId();
  $insert_dates_stmt = "insert into courses_dates(course_date_start,course_date_end,course_type,course_id) values";
  for ($i = 0; $i < count($start_date); $i++) {
    $insert_dates_stmt .= "('$start_date[$i]','$end_date[$i]','$table',$last_inserted_id)";
    if ($i != count($start_date) - 1) {
      $insert_dates_stmt .= ',';
    }
  }
  return $conn->prepare($insert_dates_stmt)->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_FILES['image']['tmp_name'])) {
    move_uploaded_file($_FILES['image']['tmp_name'], $rootDir . "/images/courses/" . $_FILES['image']['name']);
  }

  if (!empty($_FILES['brochure']['tmp_name'])) {
    move_uploaded_file($_FILES['brochure']['tmp_name'], $rootDir . "uploads/" . $_FILES['brochure']['name']);
  }

  $start_date = is_array($_POST['start_date']) ? explode('-', $_POST['start_date'][0])[0] : $_POST['start_date'];
  $end_date = is_array($_POST['end_date']) ? explode('-', $_POST['end_date'][0])[0] : $_POST['end_date'];
  $month = is_array($_POST['start_date']) ? explode('-', $_POST['start_date'][0])[1] : $_POST['month'];
  $year = is_array($_POST['end_date']) ? explode('-', $_POST['end_date'][0])[2] : $_POST['year'];
  $venue = $_POST['cat'] == 1 ? $_POST['virtual_venue'] : $_POST['public_venue'];
  $session = $_POST['cat'] == 1 ? 'webinar' : 'class';

  $tableAttributes = [
    'sys_course_image' => $_FILES['image']['name'],
    'sys_course_topic' => $_POST['topic'],
    'sys_course_days' => $_POST['days'],
    'sys_course_date ' => $start_date,
    'sys_course_dateend ' => $end_date,
    'sys_course_month' => $month,
    'sys_course_year' => $year,
    'sys_course_time' => $_POST['time_in'],
    'sys_course_timeout' => $_POST['time_out'],
    'sys_course_venue' => $venue,
    'sys_course_intro' => $_POST['intro'],
    'sys_course_module' => $_POST['module'],
    'sys_course_trainer' => $_POST['trainer'],
    'sys_course_trainer_info' => $_POST['trainer_info'],
    'sys_course_price' => $_POST['fees'],
    'sys_course_price_before' => $_POST['fees_before'],
    'sys_cpd_points' => $_POST['points'],
    'sys_course_view' => 0,
    'sys_course_session' => $session,
    'sys_sst' => $_POST['tax'],
    'cat_id' => $_POST['cat'],
    'pdf' => $_FILES['brochure']['name'],
    'sys_course_price_usd' => $_POST['fees_in_usd'],
    'sys_course_price_before_usd' => $_POST['fees_before_in_usd'],
    'certification_name' => $_POST['certification_name'],
    'certification_info' => '',
    'is_hrdf' => $_POST['toggle_hrdf'],
    'is_cpd_text' => $_POST['toggle_cpd_text'],
    'is_lunch' => $_POST['toggle_lunch'],
    'group_id' => $_POST['group_id']
  ];

  $courseAttributesNames = [];

  $courseAttributesValues = [];

  addToInsertQueryIfValueIsSet($tableAttributes, $courseAttributesNames, $courseAttributesValues);

  $courseAttributesNamesString = implode(',', $courseAttributesNames);

  $valuesBinding = str_repeat(',?', count($courseAttributesValues) - 1);
  $sql = $conn->prepare("INSERT INTO $table ($courseAttributesNamesString)
  VALUES (?$valuesBinding)");
  $isCourseAdded = $sql->execute($courseAttributesValues);

  if ($isThereMoreDates) {
    $isDatesAdded = insertMoreDates($_POST['start_date'], $_POST['end_date'], $table);
  }

  if ($isCourseAdded) {
    echo '
	<script>
	    alert("Course Successfully Uploaded!");
	</script>';
  } else {
    echo '
    <script>
        alert("Failed To Upload Course");
    </script>';
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <?php
    require_once($includes . 'admin-sidebar.php');
    ?>

    <div class="col-9">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-main">
            <p class="current-link">Admin Dashboard</p>
            <i class="fas fa-chevron-right"></i>
            <p class="current-link">Upload <? echo $sectionName; ?></p>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <form class="col-12" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-6">
                      <p class="form-text">Course Image</p>
                      <img class='mb-3' src="/images/statics/upload.jpg" id="imgAvatar" alt="Course Image" />
                      <label class="image-size d-block mb-4">(<strong>Width :</strong> 300px) x (<strong>Height :</strong> 600px)</label>
                      <input class='mb-3' type="file" name="image" id="image" onchange="showPreview(this)" accept="/images/*" />
                      <p class="form-text mb-2">Upload Brochure</p>
                      <input type="file" name="brochure">
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-12">
                          <p class="form-text">Topic</p>
                          <input type="text" class="form mb-3" name="topic" placeholder="eg: Accounts" size="30" />
                        </div>
                        <? if ($isThereRightMenu) { ?>
                          <div class="col-12 mb-3">
                            <p class="form-text">CPD Points</p>
                            <input type="number" id='cpd-points' class="form" name="points" placeholder="eg: 11" size="30" />
                          </div>
                        <? } ?>
                        <?php
                        if ($isThereMoreDates && $isThereCalendar) {
                          require_once('../components/new_dates.php');
                        } elseif ($isThereCalendar) {
                          require_once('../components/old_dates.php');
                        }
                        if ($isThereMoreDates) {
                        ?>
                          <div class="col-4 mb-4">
                            <p class="form-text">Days</p>
                            <input type="number" class="form" value="1" name="days">
                          </div>

                          <div class="col-4">
                            <p class="form-text">Start Time</p>
                            <input type="time" class="form" name="time_in">
                          </div>

                          <div class="col-4">
                            <p class="form-text">End Time</p>
                            <input type="time" class="form" name="time_out">
                          </div>
                        <? } ?>
                        <? if ($isThereGroups) { ?>
                          <div class="col-12 mb-3">
                            <select id='group-title' name='group_id' class="custom-select">
                              <option value="" disabled selected>Select Group</option>
                              <? foreach ($groups as $group) { ?>
                                <option value="<? echo $group['ID'] ?>">
                                  <? echo $group['name'] ?>
                                </option>
                              <? } ?>
                            </select>
                          </div>
                        <? } ?>

                        <? if ($isThereTaxes) { ?>
                          <div class="col-12 mb-3">
                            <span>Show Tax:</span>
                            <input type="radio" id="show-tax" name="show-hide-tax" checked /><span> Yes</span>
                            <input type="radio" id="hide-tax" name="show-hide-tax" /><span> No</span>
                          </div>
                          <div class="col-12">
                            <p class="form-text">6% SST</p>
                            <div class="row">
                              <div class="col-6 mb-3">
                                Inclusive <input type="radio" name="tax" checked value="Inclusive of 6% SST" />
                              </div>

                              <div class="col-6">
                                Subjected <input type="radio" name="tax" value="Subjected to 6% SST" />
                              </div>

                            </div>
                            <p class="form-text">GST</p>
                            <div class="row">
                              <div class="col-6">
                                Inclusive <input type="radio" name="tax" value="Inclusive of 6% GST" />
                              </div>

                              <div class="col-6 mb-3">
                                Subjected <input type="radio" name="tax" value="Subjected to 6% GST" />
                              </div>
                            </div>
                          </div>
                        <? } ?>
                        <? if ($isThereVenue) { ?>
                          <div class="col-12 mt-3">
                            <p class="form-text">Mode of Program</p>
                            <div class="row">
                              <div class="col-6">
                                Virtual Programme
                                <input type="radio" id='virtual-class' name="cat" value="1" />

                              </div>
                              <div class="col-6">
                                Public Programme
                                <input type="radio" id='public-class' name="cat" value="2" />
                              </div>
                            </div>
                            <input style="display:none;" class="form" type="text" name="virtual_venue" value="Platform Name" id="virtualAnswer" />
                            <input style="display:none;" class="form" type="text" name="public_venue" value="Venue Name" id="publicAnswer" />
                          </div>
                        <? } ?>
                      </div>
                    </div>

                    <div class="col-12 my-3">
                      <p class="form-text"><? echo ($table == 'in_house' || $table == 'export_coaching' || $table == 'sys_trade_missions' || $table == 'trade_shows' || $table == 'products' || $table == 'consulting_services' || $table == 'global_network') ? 'Details' : 'Intro';
                                            ?></p>
                      <textarea id="editor1" name="intro"></textarea>
                    </div>

                    <? if ($table != 'in_house' && $table != 'export_coaching' && $table != 'products' && $table != 'consulting_services') { ?>
                      <div class="col-12 my-3">
                        <p class="form-text">
                          <? if ($table == 'sys_trade_missions') echo 'Tentative Program';
                          else if ($table == 'trade_shows')
                            echo 'Packages';
                          else if ($table == 'global_network')
                            echo 'Services';
                          else
                            echo 'Course Module'; ?>
                        </p>
                        <textarea id="editor3" name="module"></textarea>
                      </div>
                    <? } ?>
                    <? if ($table != 'in_house' && $table != 'export_coaching' && $table != 'sys_trade_missions' && $table != 'trade_shows' && $table != 'products' && $table != 'consulting_services' && $table != 'global_network') { ?>
                      <? if ($coursesWithTrainer) { ?>
                        <div class="col-12 my-3">
                          <p class="form-text">Trainer Name</p>
                          <input type="text" class="form" name="trainer" placeholder="eg: Ali" size="30" />
                        </div>
                      <? } ?>

                      <div class="col-12 my-3">
                        <p class="form-text">Trainer Info</p>
                        <textarea id="editor2" name="trainer_info"></textarea>
                      </div>
                    <? } ?>
                    <? if ($isThereMoreDates && $table != 'trade_shows') { ?>
                      <div class="col-12 my-3">
                        <p class="form-text"><? if ($table == 'sys_trade_missions') echo 'Packages';
                                              else if ($table == 'sys_seminars') echo 'Sponsor/s';
                                              else echo 'Certification Name'; ?></p>
                        <textarea id="editor4" name="certification_name"></textarea>
                      </div>
                    <? }
                    if ($isTherePrices) { ?>
                      <div class="col-6 my-3">
                        <p class="form-text">Current Price in MYR</p>
                        <input type="number" min="0.00" step="0.00" value="0.00" class="form" name="fees" size="30" />
                      </div>

                      <div class="col-6 my-3">
                        <p class="form-text">Normal Price in MYR</p>
                        <input type="number" min="0.00" step="0.00" value="0.00" class="form" name="fees_before" size="30" />
                      </div>

                      <div class="col-6 my-3">
                        <p class="form-text">Current Price in USD</p>
                        <input type="number" min="0.00" step="0.00" value="0.00" class="form" name="fees_in_usd" size="30" />
                      </div>

                      <div class="col-6 my-3">
                        <p class="form-text">Normal Price in USD</p>
                        <input type="number" min="0.00" step="0.00" value="0.00" class="form" name="fees_before_in_usd" size="30" />
                      </div>
                    <? } ?>
                    <? if ($isThereRightMenu) { ?>
                      <div class="col-12 mb-3">
                        <span>Show CPD:</span>
                        <input type="radio" id="show-cpd" name="show-hide-cpd" checked /><span> Yes</span>
                        <input type="radio" id="hide-cpd" name="show-hide-cpd" /><span> No</span>
                      </div>
                      <div class="col-12 mb-3">
                        <span>Show HRDF:</span>
                        <input type="radio" name="toggle_hrdf" value='1' checked /><span> Yes</span>
                        <input type="radio" name="toggle_hrdf" value="0" /><span> No</span>
                      </div>
                      <div class="col-12 mb-3">
                        <span>Show Lunch:</span>
                        <input type="radio" name="toggle_lunch" value='1' checked /><span> Yes</span>
                        <input type="radio" name="toggle_lunch" value="0" /><span> No</span>
                      </div>
                      <div class="col-12 mb-3">
                        <span>Show Certificate of Attendance:</span>
                        <input type="radio" name="toggle_cpd_text" value='1' checked /><span> Yes</span>
                        <input type="radio" name="toggle_cpd_text" value="0" /><span> No</span>
                      </div>
                    <? } ?>
                    <div class="col-12 mb-3">
                      <input type="submit" class="button" value="Add Course" />
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<? echo $js; ?>jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script src='<? echo $js; ?>bootstrap-datepicker.min.js'></script>
<script>
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

  if (document.getElementById('show-cpd')) {
    document.getElementById('show-cpd').addEventListener('click', function() {
      var cpdValue = document.getElementById('cpd-points');
      if (cpdValue.value[0] == 0) {
        cpdValue.value = cpdValue.value.replace('0', '');
      }
    })
    document.getElementById('hide-cpd').addEventListener('click', function() {
      var cpdValue = document.getElementById('cpd-points');
      cpdValue.value = 0 + cpdValue.value;
    })

    document.getElementById('show-tax').addEventListener('click', function() {
      var cpdValue = document.querySelector('input[name=tax]:checked');
      if (cpdValue.value[0] == 0) {
        cpdValue.value = cpdValue.value.replace('0', '');
      }
    })
    document.getElementById('hide-tax').addEventListener('click', function() {
      var cpdValue = document.querySelector('input[name=tax]:checked');
      cpdValue.value = 0 + cpdValue.value;
    })
  }

  function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }

  CKEDITOR.replace('editor1');
  CKEDITOR.replace('editor2');
  CKEDITOR.replace('editor3');
  CKEDITOR.replace('editor4');
  CKEDITOR.replace('editor5');

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
