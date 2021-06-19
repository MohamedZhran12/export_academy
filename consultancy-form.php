<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");


$result = "";
if (isset($_POST['submit'])) {
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Username = 'exportersclub31@gmail.com';


  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addaddress('exportersclub31@gmail.com');
  $mail->addReplyTo($_POST['email'], $_POST['name']);

  $mail->isHTML(true);
  $mail->Subject = '' . $_POST['subject'];
  $mail->Body =
    '<p>
	                <b>Apply for Consultant:
	                <br>
	                <b>Consultant Name:</b></br> ' . $_POST['consultant'] . '
	                <br>
	                <b>Areas of Expertise:</b></br> ' . $_POST['expertise'] . '
	                <br>
	                <hr>
	                <b>Name:</b></br> ' . $_POST['name'] . '
	                <br>
	                <b>Email:</b> ' . $_POST['email'] . '
	                <br>
	                <b>Mobile:</b> ' . $_POST['phone'] . '
                    <br>
	                <b>Company Name:</b> ' . $_POST['company'] . '
                    <br>
	                <b>Message:</b> ' . $_POST['msg'] . '
                </p>';
  if (!$mail->send()) {
    echo "Message could not sent!";
  } else {
    echo "<script>
             alert('We received your message! We will reply to your message as soon as possible.');
             window.history.go(-1);
     </script>";
  }
}
?>




  <div class="header-in-about">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1>Enquiry on Consultancy</h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php">HOME</a></p>
            <p class="link-at">Enquiry on Consultancy</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="background-white">
    <div class="container">
      <div class="padding-100">

        <div class="row">
          <div class="col-sm-6">
            <div class="back-cons">
              <div class="overlay-white">
                <div class="form-package-det">
                  <h3 class="topic-secondary-c">Consultant:<br>
                    <?php $consultant = $_GET['consultant'];
                    echo $consultant; ?></h3>
                  <br>
                  <p><b>Area of Expertise:</b><br>
                    <?php $expertise = $_GET['expertise'];
                    echo $expertise; ?></p>
                </div>
              </div>
            </div>
          </div>


          <div class="col-sm-6">
            <p><b>We love to serve you. Please fill out the form and we'll get back to you as soonest.</b></p>
            <hr class="topic">
            <br>

            <form action="" method="post" id="form-box">
              <input name="subject" type="hidden" value="Enquiry Form for Consultation">
              <input name="consultant" class="form-1" type="hidden" value="<?php $consultant = $_GET['consultant'];
              echo $consultant; ?>">
              <input name="expertise" class="form-1" type="hidden" value="<?php $expertise = $_GET['expertise'];
              echo $expertise; ?>">
              <input name="name" class="form-1" placeholder="Your Name" required>
              <input name="email" class="form-1" placeholder="Email Address" required>
              <input name="phone" class="form-1" placeholder="Mobile" required>
              <input name="company" class="form-1" placeholder="Company Name" required>

              <!--
              <div class="form-pading">
              <div class="row">
              <div class="col-sm-6">
                <input type="radio" id="male" name="term" value="Long Term">
                <label for="male">Long Term</label><br>
              </div>

              <div class="col-sm-6">
                <input type="radio" id="female" name="term" value="Short Term">
                <label for="female">Short Term</label><br>
              </div>
              </div>
              </div>
              -->

              <textarea name="msg" class="form-1"
                        placeholder="Please state your date, time & duration - hourly / long term (Optional)">
</textarea>

              <!--<button type="submit" form="nameform" value="Submit" class="button1 right1" data-text="Hover" value="Submit">REQUEST QUOTE</button>-->
              <div class="g-recaptcha" data-sitekey="6LehlekZAAAAAATkbl5lKz156LPq_2b5MjGVVrp1"></div>
              <br>
              <input type="submit" name="submit" id="submit" value="SEND ENQUIRY" class="button">

            </form>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>


  </div>
  </div>
  </div>


<?php
  require_once($includes . 'footer.php');
?>
