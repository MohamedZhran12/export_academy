<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");



?>

<?php
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function post_captcha($user_response)
  {
    $fields_string = '';
    $fields = array(
      'secret' => '6LehlekZAAAAAFhOhpF8bD3ZiCS0CGdtR-9SPWnR',
      'response' => $user_response
    );
    foreach ($fields as $key => $value)
      $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
  }

  // Call the function post_captcha
  $res = post_captcha($_POST['g-recaptcha-response']);

  if (!$res['success']) {
    // What happens when the CAPTCHA wasn't checked
    echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
  } else {
    // If CAPTCHA is successfully completed...

    $result = "";
    if (isset($_POST['submit'])) {
      require 'phpmailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;

      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Username = 'shafarook06@gmail.com';


      $mail->setFrom($_POST['email'], $_POST['name']);
      $mail->addaddress('shafarook06@gmail.com');
      $mail->addReplyTo($_POST['email'], $_POST['name']);

      $mail->isHTML(true);
      $mail->Subject = '' . $_POST['subject'];
      $mail->Body =
        '<p>
	                <b>Name:</b></br> ' . $_POST['name'] . '
	                <br>
	                <b>Email:</b> ' . $_POST['email'] . '
	                <br>
	                <b>Mobile:</b> ' . $_POST['phone'] . '
                    <br>
	                <b>Room:</b> ' . $_POST['room'] . '
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
  }
} else { ?>

  <!-- FORM GOES HERE -->
  <form></form>

<?php } ?>




  <div class="header-in-room">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1>Enquiry on Consultancy</h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php">HOME</a></p>
            <p class="link-at">Enquiry on Room Rent</p>
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


            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/rooms/bgrs.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Big Room</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="images/rooms/srs.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Small Room</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="images/rooms/brs.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Board Room</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="images/rooms/cl.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Computer Lab</h5>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>


          <div class="col-sm-6">
            <p><b>We love to serve you. Please fill up the form and we'll get back to you as soon as possible.</b></p>
            <hr class="topic">
            <br>

            <form action="" method="post" id="form-box">
              <input name="subject" type="hidden" value="Room Booking Form">
              <input name="name" class="form-1" placeholder="Your Name" required>
              <input name="email" class="form-1" placeholder="Email Address" required>
              <input name="phone" class="form-1" placeholder="Mobile" required>

              <select id="cars" name="room">
                <option value="Big Room">Big Room</option>
                <option value="Small Room">Small Room</option>
                <option value="Board Room">Board Room</option>
                <option value="Computer Lab">Computer Lab</option>
              </select>

              <textarea name="msg" class="form-1" placeholder="Message (Optional)">
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
