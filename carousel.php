<?php
require_once('header.php');
require_once('nav.php');

$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

global $conn;
$sql = $conn->prepare("UPDATE sys_course SET sys_course_view = sys_course_view + 1 WHERE sys_course_id =?");
$sql->execute([$id]);
?>

<!-- Style -->
<link rel="stylesheet" href="assets/style-team.css">

<div class="margin-top"></div>

<div class="header-in">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1>Management Team</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php">HOME</a></p>
          <p class="link-at">Management Team</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="padding-100">
  <div class="container">


    <ol class="organizational-chart">
      <li>
        <div>
          <div class="org-img">
            <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
            <p>Board of Directors</p>
          </div>
        </div>
      </li>


      <li>
        <div>
          <div class="org-img">
            <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
            <p>Chairman / CEO</p>
          </div>
        </div>


        <div>
          <div class="org-img">
            <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
            <p>Chairman / CEO</p>
          </div>
        </div>


      <li>
        <div>
          <div class="org-img">
            <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
            <p>Chairman / CEO</p>
          </div>
        </div>


        <ol>
          <li>
            <div>
              <div class="org-img">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                <p>Chairman / CEO</p>
              </div>
            </div>
            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
                <!--
            <ol>
              <li>
                <div>
                  <h4>Quaternary</h4>
                </div>
              </li>
              <li>
                <div>
                  <h4>Quaternary</h4>
                </div>
                <ol>
                  <li>
                    <div>
                      <h5>Quinary</h5>
                    </div>
                  </li>
                  <li>
                    <div>
                      <h5>Quinary</h5>
                    </div>
                    <ol>
                      <li>
                        <div>
                          <h6>Senary</h6>
                        </div>
                      </li>
                    </ol>
                  </li>
                </ol>
              </li>
              <li>
                <div>
                  <h4>Quaternary</h4>
                </div>
              </li>
            </ol>
            -->
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
            </ol>
          </li>


          <li>
            <div>
              <div class="org-img">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                <p>Chairman / CEO</p>
              </div>
            </div>
            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
            </ol>
          </li>


          <li>
            <div>
              <div class="org-img">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                <p>Chairman / CEO</p>
              </div>
            </div>
            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    <p>Chairman / CEO</p>
                  </div>
                </div>
              </li>
            </ol>
          </li>
        </ol>
      </li>
    </ol>
  </div>
</div>


<?php
require_once('footer.php');
?>
