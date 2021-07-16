<div class="col-12">
  <div class="sticky">
    <div class="border-box">
      <strong class="mb-4">Price</strong>
      <?php
      if ($coursesCount > 0) {
        $courseInfo = $courseDetails[0];
        require_once 'price.php';
      }
      ?>

    </div>
    <div>
      <p class='sst'>
        <? if (!empty($courseDetails[0]['sys_sst']) && $courseDetails[0]['sys_sst'][0] !== '0') {
          echo $courseDetails[0]['sys_sst'];
        } ?>
      </p>

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
                <? if (isset($row['sys_cpd_points'][0]) &&  $row['sys_cpd_points'][0] !== '0') { ?>
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
  </div>
</div>


<?php }
      } ?>
