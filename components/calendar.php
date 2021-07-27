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
            <a href="/courses/course_month.php?course=<? echo $table; ?>&month=<? echo $index;
                                                                                echo ($isNewYear == 1) ? '&year=1' : ''; ?>">
              <p class="calendar"><? echo DateTime::createFromFormat('!m', $index)->format('F'); ?></p>
              <span class="total-r">
                <?php
                $result = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= ? AND sys_course_year = YEAR(CURDATE()) + $isNewYear");
                $result->execute([$index]);
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
              </span>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
