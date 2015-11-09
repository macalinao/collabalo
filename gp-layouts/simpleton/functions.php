<?php
/**
 * Theme name: Simpleton Theme
 * Author: Ian Macalinao
 * Author URI: http://www.simplyian.com/
 * Copyright: 2010 Ian Macalinao
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }
function make_widget($title, $content) {
	$widget = "";
	$widget .= $title;
	$widget .= "<br />";
	$widget .= $content;
	$widget .= "<br />";
}
?>