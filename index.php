<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init.php");

require_once('slider.php');


$stmt = $conn->prepare('SELECT partner_type,name,path from logos_images');
$stmt->execute();
$logosImages = $stmt->fetchAll(PDO::FETCH_GROUP);
?>


<div class="background-white">
  <div class="container">
    <div class="padding-100">

      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

          <p class="text-justify">
            Malaysian Export Academy was registered in October 2007 as a Company with the Registrar of
            Companies in
            Malaysia. Its main activities are training and education services and event management. The
            Academy has
            been certified ISO 9001:2008 standards in 2015. It is awarded the 5 Star Rating with HRDF.

            <br><br>

            The Academy has been registered with the Human Resources Development Fund, Ministry of Human
            Resources
            of Malaysia. In this respect, almost all of its training programmes are fully subsidized by the
            said Fund. The
            Academy is also registered with the Ministry of Finance of Malaysia.

            <br><br>

            The Academy has won many government tenders to conduct short courses and professional programmes
            under various schemes that include 1 Malaysia Globally Recognised Industry and Professionals
            Programme,
            Minimum Wages Training Incentive, SME Senior Managers Development Programme, SME Upskilling
            Programmes and INBASE Programmes.
          </p>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>
  </div>
</div>


<div class="background-courses">
  <div class="overlay-blue">
    <div class="container">
      <div class="padding-100">
        <div class="text-center">
          <div class="row">
            <div class="col-sm-8">
              <h2 class="topic">Our Programmes</h2>
              <hr class="topic-white">

              <div class="row">
                <div class="col-sm-4">
                  <div class="bordering">
                    <a href="public-training.php">
                      <div class="icon-width-80">
                        <i class="fas fa-building"></i>
                      </div>
                      <p>Corporate <br>Training</p>
                  </div>
                  </a>
                </div>

                <div class="col-sm-4">
                  <div class="bordering">
                    <a href="coming-soon.php">
                      <div class="icon-width-80">
                        <i class="fas fa-user-tie"></i>
                      </div>
                      <p>Professional <br>Certification</p>
                  </div>
                  </a>
                </div>

                <div class="col-sm-4">
                  <div class="bordering">
                    <a href="coming-soon.php">
                      <div class="icon-width-80">
                        <i class="fas fa-chalkboard-teacher"></i>
                      </div>
                      <p>Seminars / <br>Conferences</p>
                  </div>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="calendar-main">
                <div class="calendar-topic">
                  <h2 class="topic">Calendar <?php echo date("Y"); ?></h2>
                  <hr class="topic-white">
                  <?php
                  $table = 'sys_course';
                  require_once('sidebar.php');
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="background-white">
  <div class="container">
    <div class="padding-100">
      <div class="text-center">
        <h2 class="topic-blue">Our Services</h2>
        <hr class="topic-blue">
        <div class="row">

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="https://www.oxfordcollege.edu.my/" target="blank">
                <div class="icon-width-80">
                  <i class="fas fa-university"></i>
                </div>
                <p>Oxford Business College (JPK Centre)</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="#" target="blank">
                <div class="icon-width-80">
                  <i class="fas fa-globe-asia"></i>
                </div>
                <p>Regent College of International Trade</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="overseastrainees.php">
                <div class="icon-width-80">
                  <i class="fas fa-users"></i>
                </div>
                <p>Overseas <br>Trainees</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="csr.php">
                <div class="icon-width-80">
                  <i class="fas fa-hands-helping"></i>
                </div>
                <p>Corporate Social Responsibility (CSR)</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="achievements.php">
                <div class="icon-width-80">
                  <i class="fas fa-trophy"></i>
                </div>
                <p>Our Achievements</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="consultancy.php">
                <div class="icon-width-80">
                  <i class="fas fa-user-friends"></i>
                </div>
                <p>Consultancy</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="#">
                <div class="icon-width-80">
                  <i class="fas fa-photo-video"></i>
                </div>
                <p>Gallery</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="#">
                <div class="icon-width-80">
                  <i class="fas fa-video"></i>
                </div>
                <p>MEA TV</p>
            </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="background-white">
  <div class="container">
    <div class="padding-100">
      <div class="text-center">
        <h2 class="topic-blue">Our Activities</h2>
        <hr class="topic-blue">
        <div class="row">

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="#" target="blank">
                <div class="icon-width-80">
                  <i class="fas fa-globe-asia"></i>
                </div>
                <p>Event Gallery</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="#" target="blank">
                <div class="icon-width-80">
                  <i class="fas fa-globe-asia"></i>
                </div>
                <p>CSR</p>
            </div>
            </a>
          </div>

          <div class="col-sm-3">
            <div class="bordering-1">
              <a href="#" target="blank">
                <div class="icon-width-80">
                  <i class="fas fa-globe-asia"></i>
                </div>
                <p>Test</p>
            </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<div class="background-grey">
  <div class="container">
    <div class="padding-100">
      <div class="text-center">
        <h2 class="topic-blue">Our Latest Events</h2>
        <hr class="topic-blue">
      </div>

      <div class="row">
        <?php
        $sql = $conn->prepare("SELECT * FROM sys_course WHERE sys_course_year = YEAR(CURDATE()) AND sys_course_month = MONTH(CURDATE()) LIMIT 5");
        $sql->execute();
        if ($sql->rowCount() > 0) {
          foreach ($sql->fetchAll() as $row) {
        ?>
            <div class="col">
              <div class="margin-30">
                <div class="courses-det">
                  <a class="button-1" href="course.php?id=<?php echo $row['sys_course_id']; ?>&cat_id=<?php echo $row['cat_id']; ?>">
                    <div class="courses-image">
                      <p class="date">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo $row['sys_course_date']; ?>,
                        <?php
                        $monthNum = $row['sys_course_month'];
                        $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                        echo $monthName; // Output: May
                        ?>
                        <?php echo $row['sys_course_year']; ?>
                      </p>
                      <img alt='image' loading="lazy" loading="lazy" src="/images/courses/<?php echo $row['sys_course_image']; ?>">
                    </div>
                    <div class="courses-desc1">
                      <p class="topic-1-2"><?php echo $row['sys_course_topic']; ?></p>


                      <div class="course-set-pp">
                        <div class="courses-pricing">
                          <?php
                          $amount = $row['sys_course_price_before'];
                          if ($amount >= 1.00) {
                            echo '<span class="cutoff">';
                            echo "RM" . $row["sys_course_price_before"] . "";
                            echo '</span>';
                          } else {
                            echo '<br>';
                          }
                          ?>
                          <p>RM <?php echo $row['sys_course_price']; ?></p>
                        </div>

                        <div class="courses-more-det">
                          <p class="view"><i class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?>
                          </p>
                          <p class="<?php echo $row['sys_course_session']; ?>"></p>
                          <p class="icon-3"><i class="fas fa-certificate"></i></p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>

      <a href="public-training.php">
        <p class="view-all">View All Courses <i class="fas fa-angle-right"></i></p>
      </a>
    </div>
  </div>


  <div class="background-white">
    <div class="container">
      <div class="padding-100">
        <div class="text-center">
          <h2 class="topic-blue">Articles</h2>
          <hr class="topic-blue">
        </div>

        <div class="row">
          <?php
          $sql = $conn->prepare("SELECT * FROM sys_article WHERE sys_year = YEAR(CURDATE()) LIMIT 4");
          $sql->execute();
          if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $row) {
          ?>
              <div class="col-sm-3">
                <div class="media-main">
                  <div class="media-img">
                    <img alt='image' loading="lazy" loading="lazy" src="/images/articles/<?php echo $row['sys_image']; ?>">
                    <div class="date-time">
                      <i class="fas fa-clock"></i>
                      <?php echo $row['sys_date']; ?>,
                      <?php
                      $monthNum = $row['sys_month'];
                      $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                      echo $monthName; // Output: May
                      ?>
                      <?php echo $row['sys_year']; ?>
                    </div>
                  </div>
                  <div class="media-set">
                    <p class="topic-in">
                      <?php echo $row['sys_topic']; ?>
                    </p>
                    <div class="media-desc-text">
                      <p class="media-description">
                        <?php echo $row['sys_dec']; ?>
                      </p>
                    </div>

                    <div class="media-options">
                      <div class="row">
                        <div class="col">
                          <div class="left">
                            <a href="article.php?id=<?php echo $row['sys_id']; ?>" class="button1">Read More</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>
      </div>
    </div>
  </div>


  <div class="overlay-white">
    <div class="container">
      <div class="padding-100">


        <div class="row">

          <div class="col-sm-4">
            <div class="border-right-1">
              <div class="text-center">
                <h2 class="topic">Registered With</h2>
                <hr class="topic-white">
              </div>

              <div class="row">
                <? foreach ($logosImages['Registered_With'] as $logo) { ?>
                  <div class="col-sm-4">
                    <div class="logo-1"><img alt='image' loading="lazy" loading="lazy" src="<? echo $logo['path'] . $logo['name']; ?>"></div>
                  </div>
                <? } ?>
              </div>

            </div>
          </div>


          <div class="col-sm-4">
            <div class="border-right-1">
              <div class="text-center">
                <h2 class="topic">Accrediation</h2>
                <hr class="topic-white">
              </div>

              <div class="row">
                <? foreach ($logosImages['Our_Partners'] as $logo) { ?>
                  <div class="col-sm-4">
                    <div class="logo-1"><img alt='image' loading="lazy" loading="lazy" src="<? echo $logo['path'] . $logo['name']; ?>"></div>
                  </div>
                <? } ?>
              </div>

            </div>
          </div>


          <div class="col-sm-4">
            <div class="text-center">
              <h2 class="topic">Membership</h2>
              <hr class="topic-white">
            </div>

            <div class="row">
              <? foreach ($logosImages['Membership'] as $logo) { ?>
                <div class="col-sm-4">
                  <div class="logo-1"><img alt='image' loading="lazy" loading="lazy" src="<? echo $logo['path'] . $logo['name']; ?>"></div>
                </div>
              <? } ?>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <div class="background-grey">
    <div class="container">
      <div class="padding-100">
        <div class="text-center">
          <h2 class="topic-blue">MEXA TV</h2>
          <hr class="topic-blue">
        </div>

        <div class="youtube-carousel-wrap">
          <div class="youtube-carousel-main">
            <iframe defer id="main-youtube-video" loading="lazy" src="https://www.youtube.com/embed/SJcA0AZz_bA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="youtube-carousel-gallery" data-simplebar>
            <?php
            $stmt = $conn->prepare('select url from mexa_tv_videos');
            $stmt->execute();
            $videos = $stmt->fetchAll();
            foreach ($videos as $video) {
              preg_match('/\/\w{11}/', $video['url'], $matches);
            ?>
              <img alt='image' class="youtube-control" src="https://img.youtube.com/vi/<? echo substr($matches[0], 1, 11); ?>/0.jpg" data-source="https://www.youtube.com/embed<? echo $matches[0]; ?>">
            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </div>


  <script>
    var videos = document.getElementsByClassName("youtube-control");
    for (i = 0; i < videos.length; i++) {
      videos[i].addEventListener("click", function() {
        changeSrc(this);
      });
    }

    function changeSrc(video) {
      var source = video.getAttribute("data-source");
      var mainVideo = document.getElementById("main-youtube-video");
      mainVideo.src = source;
    }
  </script>


  <?php
  require_once($includes . 'footer.php');
  ?>
