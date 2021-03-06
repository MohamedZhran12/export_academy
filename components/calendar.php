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
          $oldUrl = "/courses/course_month.php?course=$table&month=$index";
          $newUrl = "/courses/new_courses_layout.php?course=trade_shows&month=$index";
          if ($isNewYear == 1) {
            $oldUrl .= '&year=1';
            $newUrl .= '&year=1';
          }
          $url = $isNewLayout ? $newUrl : $oldUrl;
        ?>
          <div class="col-6 p-0">
            <a href="<? echo $url; ?>">
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
