<div class="side-bar-main">
  <div class="side-topic">
    <strong>Calendar <?php echo date("Y"); ?></strong>
  </div>
  <div class="side-des">
    <div class="container">
      <div class="row">
        <?php
        for ($i = 1; $i <= 12; $i++) {
          $index = $i < 10 ? '0' . $i : $i;
        ?>
          <div class="col-6 p-0">
            <a href="/courses/course_month.php?course=<? echo $table; ?>&month=<? echo $index; ?>">
              <p class="calendar"><? echo DateTime::createFromFormat('!m', $index)->format('F'); ?></p>
              <span class="total-r">
                <?php
                $result = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= ?");
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
