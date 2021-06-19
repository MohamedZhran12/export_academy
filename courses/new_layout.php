<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");

require_once($includes . 'sections_info.php');
$course_type = str_replace('sys_', '', $table);
$course_name = str_replace('_', ' ', $course_type);

$sql = $conn->prepare("
select courses_groups.name, $table.*, courses_groups.group_order from $table
join courses_groups
on $table.group_id=courses_groups.ID
WHERE $table.sys_course_year = YEAR(CURDATE()) AND $table.sys_course_month = MONTH(CURDATE())
order by courses_groups.group_order asc
");
$sql->execute();
$courses = $sql->fetchAll(PDO::FETCH_GROUP);


$coursesWithoutGroupsSql = $conn->prepare("SELECT * FROM $table WHERE `group_id`= 0 AND sys_course_year = YEAR(CURDATE()) AND sys_course_month = MONTH(CURDATE())");
$coursesWithoutGroupsSql->execute();
$coursesWithoutGroups = $coursesWithoutGroupsSql->fetchAll();

$allCourses = array_merge($courses, $coursesWithoutGroups);


$headerAndTermsStmt = $conn->prepare("select value from statics where name='special_programs_header' or name='special_programs_terms'");
$headerAndTermsStmt->execute();
$headerAndTerms = $headerAndTermsStmt->fetchAll();
?>
<style>
  .dates {
    background: #189dd8;
    color: #fff;
    font-size: 13px;
    padding: 6px;
  }

  .dashed-border {
    border-bottom: 1px dashed #CEE1F8;
  }

  .index {
    display: inline-block;
    width: 20px;
    height: 20px;
    line-height: 20px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
    text-align: center;
    background: #189dd8;
    color: #fff;
    font-size: 12px;
    margin-right: 20px;
  }

  .group-name {
    padding: 1em;
    transition: all .1s linear;
  }

  .group-name:hover {
    padding-left: 2em;
    background-color: #e8f3f8;
  }

  .group-shadow {
    box-shadow: 0 0.125rem 1rem 3px rgb(0 0 0 / 8%);
  }
</style>


<div class="container">
  <div class="row">
    <div class="col-md-3 mb-3 mb-md-0 ">
      <?php
      require_once($rootDir . 'sidebar.php');
      ?>
    </div>

    <div class="col-md-9">
      <div class="row">
        <div class='col-12 my-4'>
          <h2 class='text-capitalize mb-3'><?php echo $course_name; ?></h2>
          <?php echo $headerAndTerms[0]['value']; ?>
        </div>
        <div class="col-12 mb-3">
          <h2 class="font-weight-bold">
            <?php
            echo date("F", strtotime('m'));
            echo date("Y");
            echo ' ' . $section; ?>
          </h2>
        </div>
        <div class="col-12">
          <div class="row">
            <?php
            if ($sql->rowCount() > 0) {
              foreach ($allCourses as $groupName => $courses) {
                if (!is_numeric($groupName)) {
            ?>
                  <div class="col-12 mb-1 dashed-border rounded group-shadow group-name" data-group-name='<?php echo $groupName; ?>'>
                    <span class='index'><?php echo $courses[0]['group_order']; ?></span>
                    <span><?php echo $groupName; ?></span>
                  </div>
                <?php
                }
                $coursesContainer = !is_numeric($groupName) ? $courses : [$allCourses[$groupName]];
                foreach ($coursesContainer as $courseInfo) {
                  $courseDetailsUrl = "course.php?id={$courseInfo['sys_course_id']}&cat_id={$courseInfo['cat_id']}&t=$table&section=" . urlencode($section);
                ?>
                  <div class="course col-12 mb-3 ml-1 p-3 shadow bg-white rounded <?php echo !is_numeric($groupName) ? $groupName . ' d-none' : ''; ?> " data-course-details="<?php echo $courseDetailsUrl; ?>">
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="courses-image">
                          <img src="images/courses/<?php echo $courseInfo['sys_course_image']; ?>" alt='course image'>
                        </div>
                        <?php
                        $datesSql = $conn->prepare("select course_date_start,course_date_end from courses_dates where course_type=? and course_id=?");
                        $datesSql->execute([$course_type, $courseInfo['sys_course_id']]);
                        $dates = $datesSql->fetchAll();
                        foreach ($dates as $date) { ?>
                          <div class='dates mb-3'>
                            <span class="d-block">From: <?php echo date('d - M - Y', strtotime($date['course_date_start'])); ?></span>
                            <span class="d-block ">To: <?php echo date('d - M - Y', strtotime($date['course_date_end'])); ?></span>
                          </div>
                        <?php } ?>
                        <p class="mb-3">
                          <?php echo ($courseInfo['cat_id'] == 1) ? 'Virtual Programme - ' : 'Public Programme - ';
                          echo $courseInfo['sys_course_venue']; ?> <i class="fas fa-map-marker-alt"></i>
                        </p>
                      </div>

                      <div class="col-12 col-md-9">
                        <div class="row">
                          <div class="details col-12 col-md-7">
                            <p class="mb-3 font-weight-bold"><?php echo $courseInfo['sys_course_topic']; ?></p>
                            <p class="mb-4">
                              Trainer(s)/Speaker(s)/Consultant(s): <?php echo $courseInfo['sys_course_trainer']; ?></p>
                          </div>

                          <div class='col-12 col-md-5'>
                            <div>
                              <a class="btn btn-info" href="<?php echo $courseDetailsUrl; ?>">More
                                Details</a>
                            </div>
                            <div class='mt-3'>
                              <a class="btn btn-success" href="register.php?id=<?php echo $courseInfo['sys_course_id']; ?>&t=<?php echo $table; ?>">Register/Enquire
                                Now</a>
                            </div>
                          </div>

                          <div class="col-12 mb-4"><?php echo $courseInfo['sys_course_intro']; ?></div>
                          <div class="col-12">
                            <?php require_once('common_component/price.php'); ?>
                          </div>
                          <div class='col-2 ml-auto'>
                            <p class='mb-3'><i class="fas fa-eye"> <?php echo $courseInfo['sys_course_view']; ?> </i>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            <?php
                }
              }
            }
            ?>
          </div>
        </div>
        <div class='col-12 my-4'>
          <?php echo $headerAndTerms[1]['value']; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.group-name').forEach(item => {
    item.addEventListener('click', function() {
      var groupName = this.getAttribute('data-group-name');
      document.querySelectorAll(`.${groupName}`).forEach(item => {
        item.classList.toggle('d-none');
      });
    })
  });

  document.querySelectorAll('.myr_currency').forEach(function(item) {
    item.addEventListener('click', function() {
      const dataCourseID = this.getAttribute('data-course-id');
      document.querySelector(`.myr-${dataCourseID}`).classList.remove('d-none');
      document.querySelector(`.usd-${dataCourseID}`).classList.add('d-none');
    })
  });

  document.querySelectorAll('.usd_currency').forEach(function(item) {
    item.addEventListener('click', function() {
      const dataCourseID = this.getAttribute('data-course-id');
      document.querySelector(`.myr-${dataCourseID}`).classList.add('d-none');
      document.querySelector(`.usd-${dataCourseID}`).classList.remove('d-none');
    })
  });
</script>
<?php
require_once($includes . 'footer.php');
?>
