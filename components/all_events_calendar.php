<?php
require_once 'calendar_functions.php';
?>

<div class="side-bar-main mt-3">
  <div class="side-topic">
    <strong>Calendar <?php echo date("Y") + $isNewYear; ?></strong>
  </div>
  <div class="side-des">
    <div class="container">
      <div class="row">
        <?php
        for ($i = 1; $i <= 12; $i++) {
          $index = $i < 10 ? '0' . $i : $i;
        ?>
          <div class="col-6 p-0">
            <a href="/courses/all_events.php?month=<? echo $index; ?>">
              <p class="calendar"><? echo DateTime::createFromFormat('!m', $index)->format('F'); ?></p>
              <span class="total-r">
                <?php
                echo sumCoursesCountForAMonth($index);
                ?>
              </span>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
