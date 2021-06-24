<div class="form-group">
  <label for='name'>Course Type</label>
  <select id='course_type' class='form-control'>
    <option <? if ($_GET['course'] == 'consulting_services') echo 'selected'; ?> value="consulting_services">Consulting Services</option>
    <option <? if ($_GET['course'] == 'export_coaching') echo 'selected'; ?> value="export_coaching">Export Coaching</option>
    <option <? if ($_GET['course'] == 'in_house') echo 'selected'; ?> value="in_house">In House</option>
    <option <? if ($_GET['course'] == 'products') echo 'selected'; ?> value="products">Products</option>
    <option <? if ($_GET['course'] == 'global_network') echo 'selected'; ?> value="global_network">Global Network</option>
    <option <? if ($_GET['course'] == 'trade_shows') echo 'selected'; ?> value="trade_shows">Trade Shows</option>
  </select>
</div>

<script>
  document.getElementById('course_type').addEventListener('change', function() {
    window.location.href = `?course=${this.value}`;
  });
</script>
