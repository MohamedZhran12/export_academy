<!DOCTYPE html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");
require_once($includes . 'sections_info.php');

$stmt = $conn->prepare("select ID, name from courses_groups");
$stmt->execute();
$groups = $stmt->fetchAll();

function addToArrayIfValueIsSet($value, &$array) {
  if (isset($value) && !empty($value)) {
    $array[] = $value;
  }
}

function insertMoreDates($start_date, $end_date) {
  global $conn;
  $last_inserted_id = $conn->lastInsertId();
  $course_type = 'special_programmes';
  $insert_dates_stmt = "insert into courses_dates(course_date_start,course_date_end,course_type,course_id) values";
  for ($i = 0; $i < count($start_date); $i++) {
    $insert_dates_stmt .= "('$start_date[$i]','$end_date[$i]','$course_type',$last_inserted_id)";
    if ($i != count($start_date) - 1) {
      $insert_dates_stmt .= ',';
    }
  }
  return $conn->prepare($insert_dates_stmt)->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_FILES['image']['tmp_name'])) {
    move_uploaded_file($_FILES['image']['tmp_name'], "images/courses/" . $_FILES['image']['name']);
  }

  if (!empty($_FILES['brochure']['tmp_name'])) {
    move_uploaded_file($_FILES['brochure']['tmp_name'], "uploads/" . $_FILES['brochure']['name']);
  }

  $start_date = is_array($_POST['start_date']) ? explode('-', $_POST['start_date'][0])[0] : $_POST['start_date'];
  $end_date = is_array($_POST['end_date']) ? explode('-', $_POST['end_date'][0])[0] : $_POST['end_date'];
  $month = is_array($_POST['start_date']) ? explode('-', $_POST['start_date'][0])[1] : $_POST['month'];
  $year = is_array($_POST['end_date']) ? explode('-', $_POST['end_date'][0])[2] : $_POST['year'];
  $venue = $_POST['cat'] == 1 ? $_POST['virtual_venue'] : $_POST['public_venue'];

  $courseAttrib = [
    $_FILES['image']['name'],
    $_POST['topic'],
    $_POST['days'],
    $start_date,
    $end_date,
    $month,
    $year,
    $_POST['time_in'],
    $_POST['time_out'],
    $venue,
    $_POST['intro'],
    $_POST['module'],
    $_POST['trainer'],
    $_POST['trainer_info'],
    $_POST['fees'],
    $_POST['fees_before'],
    $_POST['fees_in_usd'],
    $_POST['fees_before_in_usd'],
    $_POST['points'],
    0,
    $_POST['session'],
    $_POST['tax'],
    $_POST['cat'],
    $_FILES['brochure']['name']
  ];

  addToArrayIfValueIsSet($_POST['certification_name'], $courseAttrib);
  addToArrayIfValueIsSet($_POST['certification_info'], $courseAttrib);
  addToArrayIfValueIsSet($_POST['toggle_hrdf'], $courseAttrib);
  addToArrayIfValueIsSet($_POST['toggle_cpd_text'], $courseAttrib);
  addToArrayIfValueIsSet($_POST['toggle_lunch'], $courseAttrib);
  addToArrayIfValueIsSet($_POST['group_id'], $courseAttrib);

  $valuesBinding = str_repeat(',?', count($courseAttrib) - 1);
  $sql = $conn->prepare("INSERT INTO $table
  VALUES (?$valuesBinding)");
  $isCourseAdded = $sql->execute($courseAttrib);

  if ($isThereMoreDates) {
    $isDatesAdded = insertMoreDates($start_date, $end_date);
  }

  if ($isCourseAdded || (isset($isDatesAdded) && $isDatesAdded)) {
    echo '
	<script type="text/javascript">
	    alert("Course Successfully Uploaded!");
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
            <p class="current-link">Upload Special Programmes</p>
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
                      <img class='mb-3' src="/images/upload.jpg" id="imgAvatar" alt="Course Image" />
                      <label class="image-size d-block mb-4">(<strong>Width :</strong> 300px) x (<strong>Height :</strong> 600px)</label>
                      <input class='mb-3' type="file" name="image" id="image" onchange="showPreview(this)" accept="images/*" />
                      <p class="form-text mb-2">Upload Brochure</p>
                      <input type="file" name="brochure">
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-12">
                          <p class="form-text">Topic</p>
                          <input type="text" class="form mb-3" name="topic" placeholder="eg: Accounts" size="30" />

                        </div>

                        <div class="col-12 mb-3">
                          <span>Show CPD:</span>
                          <input type="radio" id="show-cpd" name="show-hide-cpd" checked /><span> Yes</span>
                          <input type="radio" id="hide-cpd" name="show-hide-cpd" /><span> No</span>
                        </div>

                        <div class="col-12 mb-3">
                          <p class="form-text">CPD Points</p>
                          <input type="number" id='cpd-points' class="form" name="points" placeholder="eg: 11" size="30" />
                        </div>

                        <?php
                        if ($isThereMoreDates) {
                          require_once('components/new_dates.php');
                        } else {
                          require_once('components/old_dates.php');
                        }
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
                      </div>
                    </div>

                    <div class="col-12 my-3">
                      <p class="form-text">Intro</p>
                      <textarea id="editor1" name="intro"></textarea>


                    </div>

                    <div class="col-12 my-3">
                      <p class="form-text">Course Module</p>
                      <textarea id="editor3" name="module"></textarea>


                    </div>

                    <div class="col-12 my-3">
                      <p class="form-text">Trainer Name</p>
                      <input type="text" class="form" name="trainer" placeholder="eg: Ali" size="30" />
                    </div>
                    <? if ($isThereMoreDates) { ?>
                      <div class="col-12 my-3">
                        <p class="form-text">Trainer Info</p>
                        <textarea id="editor2" name="trainer_info"></textarea>
                      </div>

                      <div class="col-12 my-3">
                        <p class="form-text">Certification Name</p>
                        <textarea id="editor4" name="certification_name"></textarea>
                      </div>
                    <? } ?>
                    <div class="col-12 my-3">
                      <p class="form-text">Certification Info</p>
                      <textarea id="editor5" name="certification_info"></textarea>
                    </div>

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
