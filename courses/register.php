<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");
require_once($includes . 'sections_info.php');
$id = $_GET['id'];
$sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
$sql->execute([$id]);
if ($sql->rowCount() > 0) {
  foreach ($sql->fetchAll() as $row) {
?>

    <div class="header-in-course">
      <div class="overlay-white">
        <div class="container">
          <div class="header-in-topic">
            <h1><? echo $sectionName; ?> Registration</h1>
            <div class="breadcrumb-in">
              <p class="link"><a href="index.php"><i class="fas fa-home"></i> Home</a></p>
              <p class="link"><a href="public-training.php"><? echo $sectionName; ?></a></p>
              <p class="link"><?php echo $row['sys_course_topic']; ?></p>
              <p class="link-at">Registration</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="padding-100">


      <div class="container">


        <div class="row">
          <? if ($isTherePrices) { ?>
            <div class="col-sm-4">
              <div class="border-box">
                <img alt='image' src="/images/courses/<?php echo $row['sys_course_image']; ?>"><br><br>
                <p><b><?php echo $row['sys_course_topic']; ?></b></p><br>

                <div class="courses-pricing">
                  <?php
                  $amount = $row['sys_course_price_before'];
                  if ($amount >= 1.00) {
                    echo '<p><b>Early Bird</b></p>';
                    echo '<p class="price-before">';
                    echo "RM" . $row["sys_course_price"] . "";
                    echo '<p class="norm-price">';
                    echo '<b>Normal Price ';
                    echo '<span class="dashed">';
                    echo "RM" . $row["sys_course_price_before"] . "";
                    echo '</span>';
                    echo '</b>';
                    echo '</p>';
                    echo '</p>';
                  } else {
                    echo '<p><b>Price</b></p>';
                    echo '<p class="price-before">';
                    echo "RM" . $row["sys_course_price"] . "";
                    echo '</p>';
                  }
                  ?>
                  <p class='sst'>
                    <? if (!empty($row['sys_sst']) && $row['sys_sst'][0] !== '0') {
                      echo $row['sys_sst'];
                    } ?>
                  </p>
                </div>

                <div class="more-det-group">
                  <div class="more-det-main">
                    <div class="more-det-icon">
                      <p class="more-det"><i class="far fa-clock"></i></p>
                    </div>
                    <div class="more-det-text">
                      <p class="more-det"><?php echo $row['sys_course_session']; ?> </p>
                    </div>
                  </div>


                </div>
              </div>
          <?php }
        } ?>
            </div>
          <? } ?>

          <div class="col">

            <p class="form-text-topic"><? echo $sectionName; ?> Registration</p>
            <div class="border-box">
              <form action="/addmore.php" method="post">

                <div class="row">
                  <div class="col-sm-4">
                    <p>Participant/s Details</p>
                    <label class="small">* You may add more participants by clicking "Add More" button</label>
                  </div>

                  <div id="dynamic-field" class="col-sm-8">
                    <input type="text" name="name[]" placeholder="Enter Name" class="form-control name_list" required />

                    <input type="text" name="participant_email[]" placeholder="Enter Email" class="form-control name_list" required />

                    <input type="number" name="mobile[]" placeholder="Enter Mobile" class="form-control name_list" required />

                    <button type="button" id="add" class="btn btn-success">Add More</button>
                  </div>

                  <div class="col-sm-4">
                    <p>Company Name</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="text" name="company" placeholder="Enter Company Name" class="form-control name_list" required />
                  </div>

                  <div class="col-sm-4">
                    <p>Company Address</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="text" name="address" placeholder="Enter Company Address" class="form-control name_list" required />
                  </div>

                  <div class="col-sm-4">
                    <p>Company Tel No</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="text" name="tel" placeholder="EG: 0312345678" class="form-control name_list" required />
                  </div>


                  <div class="col-sm-4">
                    <p>Nature of Business</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="text" name="nature" placeholder="Enter Nature of Business" class="form-control name_list" required />
                  </div>

                  <div class="col-sm-4">
                    <p>Contact Person</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="text" name="person" placeholder="Enter Person in Charge" class="form-control name_list" required />
                  </div>


                  <div class="col-sm-4">
                    <p>Contact Person's Email</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="email" name="email" placeholder="Enter Person in Email" class="form-control name_list" required />
                  </div>


                  <div class="col-sm-4">
                    <p>Contact Person's Mobile</p>
                  </div>

                  <div class="col-sm-8">
                    <input type="number" name="personmobile" placeholder="Enter Person Mobile Number" class="form-control name_list" required />
                  </div>

                  <? if ($table != 'sys_trade_missions') { ?>
                    <div class="col-sm-4">
                      <p>HRDF Registered Company</p>
                    </div>

                    <div class="col-sm-8">

                      <input type="radio" name="hrdf" value="Yes" required>
                      <label>Yes</label>

                      <input type="radio" id="female" name="hrdf" value="No">
                      <label>No</label>
                    </div>


                    <div class="col-sm-4">
                      <p>SME Company</p>
                    </div>

                    <div class="col-sm-8">
                      <input type="radio" name="sme" value="Yes" required>
                      <label>Yes</label>

                      <input type="radio" name="sme" value="No">
                      <label>No</label>
                    </div>
                  <? } ?>

                  <div class="col-sm-4">
                  </div>

                  <?php
                  if ($sql->rowCount() > 0) {
                    foreach ($sql->fetchAll() as $row) {
                  ?>
                      <input type="hidden" class="form" name="coursename" value="<?php echo $row['sys_course_topic']; ?>" />
                      <input type="hidden" class="form" name="price" value="<?php echo $row['sys_course_price']; ?>" />
                      <input type="hidden" class="form" name="date" value="<?php echo $row['sys_course_date']; ?>" />
                      <input type="hidden" class="form" name="month" value="<?php echo $row['sys_course_month']; ?>" />
                      <input type="hidden" class="form" name="year" value="<?php echo $row['sys_course_year']; ?>" />
                  <?php }
                  } ?>


                  <div class="col-sm-8">
                    <input type='hidden' name='section' value='<? echo $sectionNameUrl ?>'>
                    <?php include($rootDir . '/components/captcha.php'); ?>
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" disabled />
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    require_once($includes . 'footer.php');
    ?>


    <script src="<? echo $js; ?>jquery.min.js"></script>

    <script>
      $(document).ready(function() {
        var postURL = "/addmore.php";
        var i = 1;

        $('#add').on('click', function() {
          i++;
          $('#dynamic-field').append(`
              <div id="participant-${i}" class="col-sm-12 dynamic-added">
                <input type="text" name="name[]" placeholder="Enter Name" class="form-control name_list" required />
                <input type="text" name="designation[]" placeholder="Enter Designation" class="form-control name_list" required />
                <input type="number" name="mobile[]" placeholder="Enter Mobile" class="form-control name_list" required />
                <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">X</button>
              </div>`);
        });


        $(document).on('click', '.btn_remove', function() {
          var button_id = $(this).attr("id");
          $('#participant-' + button_id).remove();
        });

        // if it doesn't make difference i will remove it

        // $('#submit').on('click', function() {
        //   $.ajax({
        //     url: postURL,
        //     method: "POST",
        //     data: $('#add_name').serialize(),
        //     type: 'json',
        //     success: function(data) {
        //       i = 1;
        //       $('.dynamic-added').remove();
        //       $('#add_name')[0].reset();
        //       alert('Record Inserted Successfully.');
        //     }
        //   });
        // });
      });
    </script>
