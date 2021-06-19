<div class="col-sm-3">
  <div class="sticky">
    <div class="border-box">

      <?php
      if ($coursesCount > 0) {
        foreach ($courseDetails as $row) {
          $amount = $row['sys_course_price_before'];

          if ($amount <= 1.00) {
            echo "<p><b>Price</b></p> ";
          } else {
            echo "<p><b>Early Bird</b></p>";
          }
      ?>
          <div>
            <label>Currency :</label>
            <?php if ($row['sys_course_price'] >= 1.00) { ?>
              <label for='rm_currency'>MYR</label>
              <input type='radio' id='myr_currency' checked name='currency'>
            <?php } ?>
            <?php if ($row['sys_course_price_usd'] >= 1.00) { ?>
              <label for='usd_currency'>USD</label>
              <input type='radio' id='usd_currency' name='currency'>
            <?php } ?>
          </div>
          <?

          $amount = $row['sys_course_price'];
          if ($amount >= 1.00) {
          ?>
            <div id='myr_price'>
              <p class="price-before">MYR <?php echo $row['sys_course_price']; ?></p>
              <p class="norm-price">
                <?
                echo 'Normal Price ';
                echo '<span class="dashed">';
                echo "MYR" . $row["sys_course_price_before"] . "";
                echo '</span>';
                ?>

              </p>
            </div>

            <?php
            $amount = $row['sys_course_price_usd'];
            if ($amount >= 1.00) {
            ?>
              <div id='usd_price' style='display:none'>
                <p class="price-before">USD <?php echo $row['sys_course_price_usd']; ?></p>
                <p class="norm-price">
          <?
              echo 'Normal Price ';
              echo '<span class="dashed">';
              echo "USD" . $row["sys_course_price_before_usd"] . "";
              echo '</span>';
            }
          }
        }
      }
          ?>

                </p>
              </div>
              <div>


                <?php
                if ($coursesCount > 0) {
                  foreach ($courseDetails as $row) {
                ?>
                    <p><?php if (!empty($row['sys_sst']) && $row['sys_sst'][0] != 0) echo $row['sys_sst']; ?></p>
                <?php }
                } ?>


                <?php
                if ($coursesCount > 0) {
                  foreach ($courseDetails as $row) {
                ?>
                    <div class="width-full">
                      <div class="left-align">
                        <p class="view"><i class="fas fa-eye"></i> <?php echo $row['sys_course_view']; ?></p>
                      </div>
                      <div class="right-align">
                        <p class="<?php echo $row['sys_course_session']; ?>"></p>
                        <p class="icon-3"><i class="fas fa-certificate"></i></p>
                      </div>
                    </div>

                    <div class="more-det-group">

                      <div class="more-det-main">
                        <div class="more-det-icon">
                          <p class="more-det"><i class="far fa-clock"></i></p>
                        </div>
                        <div class="more-det-text">
                          <p class="more-det"><?php echo $row['sys_course_days']; ?> Day/s</p>
                        </div>
                        <div class='more-det-text'>
                          <? if ($row['sys_cpd_points'][0] != 0) { ?>
                            <p class="more-det"><?php echo $row['sys_cpd_points'] . ' CPD Points'; ?></p>
                          <? } ?>
                        </div>
                      </div>

                      <?php
                      $sql = $conn->prepare("SELECT $table.is_lunch,$table.is_cpd_text,$table.is_hrdf
                                                        FROM  $table
                                                        where $table.sys_course_id=?");
                      $sql->execute([$id]);
                      if ($sql->rowCount() > 0) {
                        foreach ($sql->fetchAll() as $row) {

                      ?>
                          <div class="more-det-main">

                            <div class="more-det-icon">
                              <p class="more-det"><i class="fas fa-check"></i></p>
                            </div>
                            <? if ($row['is_cpd_text']) { ?>
                              <div class="more-det-text">
                                <p class="more-det">Certificate of Attendance Will be Provided</p>
                              </div>
                            <? } ?>
                            <? if ($row['is_hrdf']) { ?>
                              <div class="more-det-text">
                                <p class="more-det">HRDF SBL Claimable</p>
                              </div>
                            <? } ?>
                            <? if ($row['is_lunch']) { ?>
                              <div class="more-det-text">
                                <p class="more-det">Lunch & Refreshment Provided</p>
                              </div>
                            <? } ?>
                          </div>
                      <?php }
                      } ?>

                    </div>
              </div>


              <?php

                    if ($coursesCount > 0) {
                      foreach ($courseDetails as $row) {
              ?>
                  <div class="text-center">
                    <a href="uploads/<?php echo $row['pdf']; ?>" class="button" download>Download Brochure</a>
                    <a href="register.php?id=<?php echo $row['sys_course_id']; ?>&t=<?php echo $table; ?>" class="button2">Enquire
                      Now</a>
                  </div>
    </div>
  </div>
</div>
</div>
<?php }
                    } ?>

</div>
<?php }
                } ?>
