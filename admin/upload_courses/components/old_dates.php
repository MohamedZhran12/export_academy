<div class="col-sm-3">
  <p class="form-text">Start Date</p>
  <select class="form" name="start_date" required>
    <option value="" disabled selected>None</option>
    <?php for ($i = 1; $i <= 31; $i++) { ?>
      <option value="<? echo $i; ?>"><? echo $i; ?></option>
    <? } ?>
  </select>
</div>


<div class="col-sm-3">
  <p class="form-text">End Date</p>
  <select class="form" name="end_date" required>
    <option value="" disabled selected>None</option>
    <?php for ($i = 1; $i <= 31; $i++) { ?>
      <option value="<? echo $i; ?>"><? echo $i; ?></option>
    <? } ?>
  </select>
</div>

<div class="col-sm-3">
  <p class="form-text">Month</p>
  <select class="form" name="month" required>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
</div>

<div class="col-sm-3 mb-4">
  <p class="form-text">Year</p>
  <input type="number" class="form" value="<? echo date("Y"); ?>" name="year" required>
</div>
