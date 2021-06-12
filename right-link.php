<div class="right">
  <div class="righ-main-link">
    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_webinar.php") { ?>  class="active"   <?php } ?>><a
          href="course_webinar.php?month=<?php echo $month; ?>"><p class="list-option-active">Webinar</p></a></li>
  </div>

  <div class="righ-main-list">
    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_webinar_date.php") { ?>  class="active"   <?php } ?>><a
          href="course_webinar_date.php?month=<?php echo $month; ?>"><p class="list-option-active"><i
              class="far fa-clock"></i></p></a></li>
    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_webinar_price_down.php") { ?>  class="active"   <?php } ?>><a
          href="course_webinar_price_down.php?month=<?php echo $month; ?>"><p class="list-option"><i
              class="fas fa-dollar-sign"></i> <i class="fas fa-sort-down"></i></p></a></li>

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_webinar_price_up.php") { ?>  class="active"   <?php } ?>><a
          href="course_webinar_price_up.php?month=<?php echo $month; ?>"><p class="list-option"><i
              class="fas fa-dollar-sign"></i> <i class="fas fa-sort-up"></i></p></a></li>
  </div>

  <div class="righ-main-link">
    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_class.php") { ?>  class="active"   <?php } ?>><a
          href="course_class.php?month=<?php echo $month; ?>"><p class="list-option-active">F2F Class</p></a></li>
  </div>

  <div class="righ-main-list">
    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_class_date.php") { ?>  class="active"   <?php } ?>><a
          href="course_class_date.php?month=<?php echo $month; ?>"><p class="list-option-active"><i
              class="far fa-clock"></i></p></a></li>

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_class_price_down.php") { ?>  class="active"   <?php } ?>><a
          href="course_class_price_down.php?month=<?php echo $month; ?>"><p class="list-option"><i
              class="fas fa-dollar-sign"></i> <i class="fas fa-sort-down"></i></p></a></li>

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/course_class_price_up.php") { ?>  class="active"   <?php } ?>><a
          href="course_class_price_up.php?month=<?php echo $month; ?>"><p class="list-option"><i
              class="fas fa-dollar-sign"></i> <i class="fas fa-sort-up"></i></p></a></li>

  </div>
</div>