<?

$body = '';
$body .= !empty($_GET['topic']) ? '<b>Main Topic: </b>' . $_GET['topic'] . '<br><br>' : '';
$body .= '<b>Sub Topic: </b>' . $_GET['sub_topic'] . '<br><br>';
$body .= isset($_GET['training_type']) ? '<b>Training type: </b>' . $_POST['training_type'] . '<br><br>' : '';
$body .= isset($_GET['training_type']) ? '<b>Training duration: </b>' . $_POST['training_duration'] . '<br><br>' : '';
$body .= '<b>Special Requirements: </b>' . $_POST['requirements'] . '<br><br>';
$body .= '<b>Name: </b>' . $_POST['username'] . '<br><br>';
$body .= '<b>Email Address: </b>' . $_POST['email'] . '<br><br>';
$body .= '<b>Mobile: </b>' . $_POST['mobile'] . '<br><br>';
