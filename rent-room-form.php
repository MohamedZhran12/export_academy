<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $success_msg = 'Your Enquiry Form is submitted successfully.<br>
  Our team will get back to you as soon as possible.';

  $body = '';
  $body = 'Rent Room Enquiry' . '<br><br>';
  $body .= '<b>Name: </b>' . $_POST['name'] . '<br><br>';
  $body .= '<b>Email: </b>' . $_POST['email'] . '<br><br>';
  $body .= '<b>Mobile: </b>' . $_POST['mobile'] . '<br><br>';
  $body .= '<b>Board Room: </b>' . $_POST['room'] . '<br><br>';
  $body .= '<b>Message: </b>' . $_POST['message'] . '<br><br>';

  require_once($rootDir . 'courses/registration_success.php');
  require_once($rootDir . 'courses/registrationMail.php');
}

?>
<? if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>

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
                  <img alt='image' src="/images/rooms/bgrs.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Big Room</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img alt='image' src="/images/rooms/srs.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Small Room</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img alt='image' src="/images/rooms/brs.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="slide">Board Room</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img alt='image' src="/images/rooms/cl.jpg" class="d-block w-100" alt="...">
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

            <form method="post" id="form-box">
              <input name="subject" type="hidden" value="Room Booking Form">
              <input name="name" class="form-1" placeholder="Your Name" required>
              <input name="email" class="form-1" placeholder="Email Address" required>
              <input name="mobile" class="form-1" placeholder="Mobile" required>

              <select id="cars" name="room">
                <option value="Big Room">Big Room</option>
                <option value="Small Room">Small Room</option>
                <option value="Board Room">Board Room</option>
                <option value="Computer Lab">Computer Lab</option>
              </select>

              <textarea name="message" class="form-1" placeholder="Message (Optional)">
</textarea>

              <br>
              <?php include($rootDir . '/components/captcha.php'); ?>
              <input type="submit" name="submit" id="submit" class="btn btn-info" value="Send Enquiry" disabled />

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>



<?php
}
require_once($includes . 'footer.php');
?>
