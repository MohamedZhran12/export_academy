<?php
if ($courseInfo['sys_course_price'] > 0) { ?>
  <div class="courses-pricing-rm col-sm-12 mb-3 myr-<? echo $courseInfo['sys_course_id']; ?>">
    <? if ($courseInfo['sys_course_price_before'] > 0) { ?>
      <span class="cutoff">MYR <? echo $courseInfo["sys_course_price_before"]; ?></span>
    <? } ?>
    <p>MYR <? echo $courseInfo['sys_course_price']; ?></p>
  </div>
<? }
?>
<?php
if ($courseInfo['sys_course_price_usd'] > 0) { ?>
  <div class="courses-pricing-usd col-sm-12 mb-3 <? if ($courseInfo['sys_course_price'] != 0) echo 'd-none'; ?> usd-<? echo $courseInfo['sys_course_id']; ?> ">
    <? if ($courseInfo['sys_course_price_before_usd'] > 0) { ?>
      <span class="cutoff">USD <? echo $courseInfo["sys_course_price_before_usd"]; ?></span>
    <? } ?>
    <p>USD <? echo $courseInfo['sys_course_price_usd']; ?></p>
  </div>
<? }
?>

<?php if ($courseInfo['sys_course_price'] > 0 && $courseInfo['sys_course_price_usd'] > 0) { ?>
  <div>
    <label>Currency :</label>
    <?php if ($courseInfo['sys_course_price'] > 0) { ?>
      <label for='rm_currency'>MYR</label>
      <input type='radio' class='myr_currency' checked name='currency-<?php echo $courseInfo['sys_course_id']; ?>' data-course-id='<? echo $courseInfo['sys_course_id']; ?>'>
    <?php } ?>
    <?php if ($courseInfo['sys_course_price_usd'] > 0) { ?>
      <label for='usd_currency'>USD</label>
      <input type='radio' class='usd_currency' name='currency-<?php echo $courseInfo['sys_course_id']; ?>' data-course-id='<? echo $courseInfo['sys_course_id']; ?>'>
    <?php } ?>
  </div>
<? } ?>
<script src='/courses/common_component/js/price_switch.js'></script>
