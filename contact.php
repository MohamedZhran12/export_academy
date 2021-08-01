<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $success_msg = 'Your Enquiry Form is submitted successfully.<br>
  Our team will get back to you as soon as possible.';

  $body = '';
  $body .= '<b>Name: </b>' . $_POST['name'] . '<br><br>';
  $body .= '<b>Mobile: </b>' . $_POST['mobile'] . '<br><br>';
  $body .= '<b>Email: </b>' . $_POST['email'] . '<br><br>';
  $body .= '<b>Company Name: </b>' . $_POST['company_name'] . '<br><br>';
  $body .= '<b>Message: </b>' . $_POST['message'] . '<br><br>';

  require_once($rootDir . 'courses/registration_success.php');
  require_once($rootDir . 'courses/registrationMail.php');
}
?>


<? if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
  <div class="header-in-contact">
    <div class="overlay-white">
      <div class="container">
        <div class="header-in-topic">
          <h1>Contact</h1>
          <div class="breadcrumb-in">
            <p class="link"><a href="index.php">HOME</a></p>
            <p class="link-at">Contact</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="background-white">
    <div class="container">
      <div class="padding-100">

        <div class="text-center">
          <h2 class="topic-blue">Get in touch with us</h2>
          <hr class="topic-blue">
        </div>

        <div class="row">
          <div class="col-sm-4">
            <div class="row">
              <div class="border-right">
                <div class="padding-40">
                  <div class="text-center">
                    <div class="width-100">
                      <i class="fas fa-phone-alt"></i>
                      <br><br>
                      <p><b>Telephone</p></b>
                      <p>Tel: +603 8066 3107<br>
                        Fax: +603 8066 6152
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="row">
              <div class="border-right">
                <div class="padding-40">
                  <div class="text-center">
                    <div class="width-100">
                      <i class="fas fa-map-marker-alt"></i>
                      <br><br>
                      <p><b>Address</p></b>
                      <p>No. 86, Jalan BP 7/8, BP New Town,
                        Bandar Bukit Puchong, 47120 Puchong,
                        Selangor Darul Ehsan, MALAYSIA.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="row">
              <div class="padding-40">
                <div class="text-center">
                  <div class="width-100">
                    <i class="fas fa-envelope"></i>
                    <br><br>
                    <p><b>Email</p></b>
                    <p>info@exportacademy.net
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="background-grey">
    <div class="padding-100">
      <div class="container">

        <div class="text-center">
          <p><b>IF YOU HAVE ANY QUESTIONS <br>PLEASE DO NOT HESITATE TO SEND US A MESSAGE</b></p>
          <br><br>
        </div>
        <form method="post">
          <div class="row">
            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">
              <div class="margin-30">
                <input type="text" name='name' placeholder="Name" class="form">
              </div>

              <div class="margin-30">
                <input type="number" name='mobile' placeholder="Mobile" class="form">
              </div>

              <div class="margin-30">
                <input type="text" name='email' placeholder="Email" class="form">
              </div>

              <div class="margin-30">
                <input type="text" name='company_name' placeholder="Company Name" class="form">
              </div>

              <div class="margin-30">
                <textarea class="form" name='message' placeholder='Message'></textarea>
              </div>
              <br>
              <div class="col-sm-8">
                <?php include($rootDir . '/components/captcha.php'); ?>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Send Message" disabled/>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="padding-100">
    <div class="container">

      <div class="text-center">
        <h2 class="topic-blue">Connect with us</h2>
        <hr class="topic-blue">
      </div>

      <div class="text-center">
        <a href="https://www.facebook.com/mexportacademy" target="blank">
          <h4 class="contact-social"><i class="fab fa-facebook-f"></i></h4>
        </a>
        <a href="https://www.instagram.com/malaysianexportacademy/?hl=en">
          <h4 class="contact-social" target="blank"><i class="fab fa-instagram"></i></h4>
        </a>
        <a href="#">
          <h4 class="contact-social" target="blank"><i class="fab fa-twitter"></i></h4>
        </a>
        <a href="#">
          <h4 class="contact-social" target="blank"><i class="fab fa-linkedin-in"></i></h4>
        </a>
      </div>

    </div>
  </div>


  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.4006382150897!2d101.61760031470423!3d2.986186897825189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb479dcb0590b%3A0xea766405ebdc02eb!2sMalaysian%20Export%20Academy!5e0!3m2!1sen!2smy!4v1599571077309!5m2!1sen!2smy" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


<?php
  require_once($includes . 'footer.php');
}
?>
