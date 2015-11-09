<?php
/**
 * Theme name: Simpleton Theme
 * Author: Ian Macalinao
 * Author URI: http://www.simplyian.com/
 * Copyright: 2010 Ian Macalinao
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }
require_once GPLAYOUTS."simpleton/header.php";
?>
<div id="container">
<div id="content">
<?php gp_content(); ?>
</div>
<div id="widget_right">
<?php $gpwidget->sb(1); ?>
</div>
<div id="ender">
</div>
</div>
require_once GPLAYOUTS."simpleton/footer.php";
?>