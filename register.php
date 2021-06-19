<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");

$id = $_GET['id'];
?>



<?php
$table = isset($_GET['t']) ? $_GET['t'] : 'sys_course';
if ($table == 'sys_course') {
  $sectionUrl = 'public-training.php';
  $section = 'Public Training';
} else if ($table == 'sys_seminars') {
  $sectionUrl = 'seminar-conference.php';
  $section = 'Seminar & Conferences';
} else if ($table == 'sys_professional_cert') {
  $sectionUrl = 'professional-certifications.php';
  $section = 'Professional Certification';
} else if ($table == 'sys_special_programmes') {
  $sectionUrl = 'special-programs.php';
  $section = 'Special Programmes';
} else if ($table == 'sys_trade_missions') {
  $sectionUrl = 'trade-missions.php';
  $section = 'Trade Missions';
}

$sql = $conn->prepare("SELECT * FROM $table WHERE sys_course_id = ?");
$sql->execute([$id]);
if ($sql->rowCount() > 0) {
foreach ($sql->fetchAll() as $row) {
?>

  <div class="header-in-course">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1><? echo $section; ?> Enquiry</h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php"><i class="fas fa-home"></i> Home</a></p>
            <p class="link"><a href="public-training.php"><? echo $section; ?></a></p>
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
      <div class="col-sm-4">
        <div class="border-box">
          <img src="images/courses/<?php echo $row['sys_course_image']; ?>"><br><br>
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
            } else {
              echo '<p><b>Price</b></p>';
              echo '<p class="price-before">';
              echo "RM" . $row["sys_course_price"] . "";
            }
            ?>

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

      <div class="col-sm-8">

        <p class="form-text-topic"><? echo $section; ?> Enquiry Form</p>
        <div class="border-box">
          <form action="addmore.php" method="post">

            <div class="row">
              <div class="col-sm-4">
                <p>Participant/s Details</p>
                <label class="small">* You may add more participants by clicking "Add More" button</label>
              </div>

              <table class="tablecustom" id="dynamic_field">
                <div class="col-sm-8">
                  <input type="text" name="name[]" placeholder="Enter Name" class="form-control name_list" required/>

                  <input type="text" name="participant_email[]" placeholder="Enter Email" class="form-control name_list"
                         required/>

                  <input type="number" name="mobile[]" placeholder="Enter Mobile" class="form-control name_list"
                         required/>

                  <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </div>
              </table>
            </div>


            <div class="row">
              <div class="col-sm-4">
                <p>Company Name</p>
              </div>

              <div class="col-sm-8">
                <input type="text" name="company" placeholder="Enter Company Name" class="form-control name_list"
                       required/></td>
              </div>

              <div class="col-sm-4">
                <p>Your Enquiry</p>
              </div>

              <div class="col-sm-8">
                <textarea name="enquiry" placeholder="Type your enquiry here" class="form-control name_list mb-3"
                          required/></textarea>
              </div>

              <div class="col-sm-4">
                <p>Company Address</p>
              </div>

              <div class="col-sm-8">
                <input type="text" name="address" placeholder="Enter Company Address" class="form-control name_list"
                       required/>
              </div>

              <div class="col-sm-4">
                <p>Company Tel No</p>
              </div>

              <div class="col-sm-8">
                <input type="text" name="tel" placeholder="EG: 0312345678" class="form-control name_list" required/>
              </div>


              <div class="col-sm-4">
                <p>Nature of Business</p>
              </div>

              <div class="col-sm-8">
                <input type="text" name="nature" placeholder="Enter Nature of Business" class="form-control name_list"
                       required/>
              </div>

              <div class="col-sm-4">
                <p>Contact Person</p>
              </div>

              <div class="col-sm-8">
                <input type="text" name="person" placeholder="Enter Person in Charge" class="form-control name_list"
                       required/>
              </div>


              <div class="col-sm-4">
                <p>Contact Person's Email</p>
              </div>

              <div class="col-sm-8">
                <input type="email" name="email" placeholder="Enter Person in Email" class="form-control name_list"
                       required/>
              </div>


              <div class="col-sm-4">
                <p>Contact Person's Mobile</p>
              </div>

              <div class="col-sm-8">
                <input type="number" name="personmobile" placeholder="Enter Person Mobile Number"
                       class="form-control name_list" required/>
              </div>


              <div class="col-sm-4">
                <p>HRDF Registered Company</p>
              </div>

              <div class="col-sm-8">

                <input type="radio" id="male" name="hrdf" value="Yes" required>
                <label for="male">Yes</label>

                <input type="radio" id="female" name="hrdf" value="No">
                <label for="female">No</label>
              </div>


              <div class="col-sm-4">
                <p>SME Company</p>
              </div>

              <div class="col-sm-8">
                <input type="radio" id="male" name="sme" value="Yes" required>
                <label for="male">Yes</label>

                <input type="radio" id="female" name="sme" value="No">
                <label for="female">No</label>
              </div>


              <div class="col-sm-4">
              </div>

              <?php
              if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $row) {
                  ?>
                  <input type="hidden" class="form" name="coursename" value="<?php echo $row['sys_course_topic']; ?>"/>
                  <input type="hidden" class="form" name="price" value="<?php echo $row['sys_course_price']; ?>"/>
                  <input type="hidden" class="form" name="date" value="<?php echo $row['sys_course_date']; ?>"/>
                  <input type="hidden" class="form" name="month" value="<?php echo $row['sys_course_month']; ?>"/>
                  <input type="hidden" class="form" name="year" value="<?php echo $row['sys_course_year']; ?>"/>
                <?php }
              } ?>


              <div class="col-sm-8">
                <input type='hidden' name='section' value=<? echo $sectionUrl ?>>
                <?php include('captcha.php'); ?>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" disabled/>
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


<?php
  require_once($includes . 'footer.php');
?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var postURL = "/addmore.php";
        var i = 1;


        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="row"> <div class="col-sm-4"></div> <div class="col-sm-8"><input type="text" name="name[]" placeholder="Enter Name" class="form-control name_list" required /> <input type="text" name="designation[]" placeholder="Enter Designation" class="form-control name_list" required /> <input type="number" name="mobile[]" placeholder="Enter Mobile" class="form-control name_list" required />  <button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></div></div></td>');
        });


        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });


        $('#submit').click(function () {
            $.ajax({
                url: postURL,
                method: "POST",
                data: $('#add_name').serialize(),
                type: 'json',
                success: function (data) {
                    i = 1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                    alert('Record Inserted Successfully.');
                }
            });
        });


    });
</script>
