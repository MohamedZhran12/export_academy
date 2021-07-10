<?
$body = '';
for ($i = 0; $i < count($_POST['name']); $i++) {
  $body .= '<b>Participant Name #' . ($i + 1) . ': </b>' . $_POST['name'][$i] . '<br><br>';
  $body .= '<b>Participant Email #' . ($i + 1) . ': </b>' . $_POST['participant_email'][$i] . '<br><br>';
  $body .= '<b>Participant Mobile #' . ($i + 1) . ': </b>' . $_POST['mobile'][$i] . '<br><br>';
}

$body .= '<b>Company Name: </b>' . $_POST['company'] . '<br><br>';
$body .= '<b>Company Address: </b>' . $_POST['address'] . '<br><br>';
$body .= '<b>Company Tel No: </b>' . $_POST['tel'] . '<br><br>';
$body .= '<b>Nature of Business: </b>' . $_POST['nature'] . '<br><br>';
$body .= '<b>Contact Person: </b>' . $_POST['person'] . '<br><br>';
$body .= '<b>Contact Person\'s Email: </b>' . $_POST['email'] . '<br><br>';
$body .= '<b>Contact Person\'s Mobile: </b>' . $_POST['personmobile'] . '<br><br>';
$body .= '<b>HRDF Registered Company: </b>' . $_POST['hrdf'] . '<br><br>';
$body .= '<b>SME Company: </b>' . $_POST['sme'] . '<br><br>';

$body .= '<b>Course Name: </b>' . $_POST['coursename'] . '<br><br>';
$body .= '<b>Course Price: </b>' . $_POST['price'] . '<br><br>';
$body .= '<b>Date: </b>' . $_POST['date'] . ' (Day) ' . $_POST['month'] . ' (Month) ' . $_POST['year'] . ' (Year) ' . '<br><br>';
