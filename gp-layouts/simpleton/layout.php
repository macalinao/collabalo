<?php
/**
 * Theme name: Simpleton Theme
 * Author: Ian Macalinao
 * Author URI: http://www.simplyian.com/
 * Copyright: 2010 Ian Macalinao
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }
$layout_data = array(
"name" => "Simpleton",
"description" => "The simplest layout ever based on that of SimplyIan.com."
);
$gpwidget->register_sidebar(array("id" => 1, "name" => "right", "before_widget" => "<div class='widget'>", "after_widget" => "</div>", "before_title" => "<div class='widget_title'>§&nbsp;", "after_title" => "</div>"))
?>