<?php
require_once('header.php');
require_once('nav.php');

$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

global $conn;
$sql = $conn->prepare("UPDATE sys_course SET sys_course_view = sys_course_view + 1 WHERE sys_course_id = ?");
$sql->execute([$id]);
?>

<!-- Style -->
<link rel="stylesheet" href="assets/style-team.css">

<div class="margin-top"></div>

<div class="header-in-team">
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
            <p>Chairman</p>
          </div>
        </div>
      </li>

      <li>

        <div>
        </div>


        <div>
          <div class="org-img">
            <div class="team-imge">
              <img
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
            </div>
            <div class="team-desc">
              <p>Business Development</p><br>
              <p class="small">Executive 2</p>
            </div>
          </div>
        </div>


      <li>


        <ol>
          <li>
            <div>
              <div class="org-img">
                <div class="team-imge">
                  <img
                      src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                </div>
                <div class="team-desc">
                  <p>Executive Director</p>
                  <p class="small">Event & Conference</p>
                </div>
              </div>
            </div>
            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Business Development</p><br>
                      <p class="small">Manager</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Business Development</p><br>
                      <p class="small">Executive 1</p>
                    </div>
                  </div>
                </div>

              </li>

              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Business Development</p><br>
                      <p class="small">Executive 2</p>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Business Development</p><br>
                      <p class="small">Executive 3</p>
                    </div>
                  </div>
                </div>
              </li>
            </ol>
          </li>


          <li>
            <div>
              <div class="org-img">
                <div class="team-imge">
                  <img
                      src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                </div>
                <div class="team-desc">
                  <p>Executive Director</p>
                  <p class="small">Finance Controller</p>
                </div>
              </div>
            </div>

            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Account</p><br>
                      <p class="small">Executive 1</p>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Account</p><br>
                      <p class="small">Executive 2</p>
                    </div>
                  </div>
                </div>
              </li>
            </ol>
          </li>


          <li>
            <div>
              <div class="org-img">
                <div class="team-imge">
                  <img
                      src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                </div>
                <div class="team-desc">
                  <p>General Manager</p>
                  <p class="small">Admin & Tecnical</p>
                </div>
              </div>
            </div>
            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>IT & Technical</p><br>
                      <p class="small">Senior Executive</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Web Developer</p><br>
                      <p class="small">Junior Executive</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Receptionist</p><br>
                      <p class="small">Executive 2</p>
                    </div>
                  </div>
                </div>
              </li>
            </ol>
          </li>


          <li>
            <div>
              <div class="org-img">
                <div class="team-imge">
                  <img
                      src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                </div>
                <div class="team-desc">
                  <p>Genaral Manager</p><br>
                  <p class="small">Sales & Marketing</p>
                </div>
              </div>
            </div>
            <ol>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Sales Marketing</p><br>
                      <p class="small">Senior Manager</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Sales Marketing</p><br>
                      <p class="small">Executive 1</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Sales Marketing</p><br>
                      <p class="small">Executive 2</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Sales Marketing</p><br>
                      <p class="small">Executive 3</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Sales Marketing</p><br>
                      <p class="small">Executive 4</p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div>
                  <div class="org-img">
                    <div class="team-imge">
                      <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                    </div>
                    <div class="team-desc">
                      <p>Sales Marketing</p><br>
                      <p class="small">Executive 5</p>
                    </div>
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
