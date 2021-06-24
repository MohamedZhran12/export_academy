<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $success_msg = 'Your Enquiry Form is submitted successfully.<br>
        Our team will get back to you as soon as possible.';
  require_once('in_house_mail_body.php');
  require_once('registration_success.php');
  require_once('registrationMail.php');
}
?>
<div class='margin-top'></div>
<div class='container'>
  <div class='row'>
    <div class='col-12 border mb-5 p-5'>
      <h5 class='my-4' style='color:#00a7ff;'><u>Enquiry Form</u></h1>
        <? if (!is_numeric($_GET['topic'])) { ?>
          <h2 class='d-inline-block'><u>Main Topic</u>: </h2>
          <h2 class='mb-4 font-weight-normal d-inline-block'><? echo htmlspecialchars($_GET['topic']) ?></h2>
        <? } ?>
        <br>
        <h4 class='d-inline-block'><u>Sub Topic</u>: </h6>
          <h4 class='mb-4 font-weight-normal d-inline-block'><? echo htmlspecialchars($_GET['sub_topic']) ?></h4>
          <form action='' method='post'>
            <div class='form-group'>
              <div class='mb-3 font-weight-bold'>
                <u>Training type</u>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="training_type" id="training_type1" value="Face to Face In  house" checked>
                <label class="form-check-label" for="training_type1">
                  Face to Face In house
                </label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="training_type" id="training_type2" value="Virtual In house">
                <label class="form-check-label" for="training_type2">
                  Virtual In house
                </label>
              </div>
            </div>
            <div class='form-group'>
              <div class='mb-3 font-weight-bold'>
                <u>Duration of Training</u>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="training_duration" id="training_duration1" value="One day" checked>
                <label class="form-check-label" for="training_duration1">
                  One day
                </label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="training_duration" id="training_duration2" value="Two days">
                <label class="form-check-label" for="training_duration2">
                  Two days
                </label>
              </div>
            </div>
            <div class='form-group'>
              <textarea class="form-control" rows="3" placeholder='Please state any special requirements' name='requirements'></textarea>
            </div>
            <div class='form-group'>
              <input type="text" class="form-control" placeholder="Your Name" name='username'>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email Address" name='email'>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" placeholder="Mobile" name='mobile'>
            </div>
            <?php include($rootDir . '/components/captcha.php'); ?>
            <div class='mt-3'></div>
            <div class='form-group'>
              <input type="submit" class="btn btn-primary" value='Submit' disabled>
            </div>
          </form>
    </div>
  </div>
</div>
<?
require_once($includes . 'footer.php');
?>
