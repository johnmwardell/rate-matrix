<?php
// Connect to DB
include ("data/db.php");

// Routes to window elements
$page = "window/page/";
$frame = "window/frame/";
$dialog = "window/dialog/";
$script = "window/script/";
$style = "window/style/";
$image = "window/image/";

// Switches to active Modals
$modalSm = false;
$modalReg = false;
$modalLg = false;
?>
<script>
var page = "<?php echo $page; ?>";
var frame = "<?php echo $frame; ?>";
var dialog = "<?php echo $dialog; ?>";
var script = "<?php echo $script; ?>";
var style = "<?php echo $style; ?>";
var image = "<?php echo $image; ?>";
</script>
