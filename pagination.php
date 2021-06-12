<?php
require_once('header.php');
require_once('nav.php');
?>


<div class="margin-top"></div>


<p>Hello World</p>

<?php
$someVar = 1;
?>

<script type="text/javascript">
    var javaScriptVar = "<?php echo $someVar; ?>";
</script>


<script type="text/javascript">
    var MyJSStringVar = "<?php print($MyPHPStringVar); ?>";
    var MyJSNumVar = <?php print($MyPHPNumVar); ?>;
</script>


<?php
require_once('footer.php');
?>


