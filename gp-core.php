<?php
/** ------------+
 * Grupo Content Management System
 * By Ian M
 * ian@simplyian.com
 */

//We have included core
define("IN_GRUPO", 1);

//Load the $dbconfig array
require_once "gp-config.php";

//Gets the base directory
$folder_level = "";
while (!file_exists($folder_level."grupo.php")) { $folder_level .= "../"; }
define("GPBASE", $folder_level);

//Multi-site Stuff
if (!isset($_GET['s'])) {
	$site_id = 1;
} else {
	$site_id = intval($_GET['s']);
}

//Definitions: Server Constants
define("GP_SELF", cleanurl($_SERVER['PHP_SELF']));
define("GP_URI", cleanurl($_SERVER['REQUEST_URI']));

//Definitions: Files and Directories
define("GPINC", GPBASE."gp-includes/");
define("GPLAYOUTS", GPBASE."gp-layouts/");
define("LAYOUT_DIR", GPLAYOUTS.get_option("layout"));

require_once GPINC."gpdb.php"; //Database Class $gpdb
require_once GPINC."gpusr.php"; //User-related Class: $gpusr
require_once GPINC."widgets.php"; //Widget Class $gpwidget

require_once GPINC."theme.php"; //Theme-related Functions

require_once LAYOUT_DIR."/layout.php"; //Layout Settings

/**
 * Password encryptor (one-way)
 */

function pwenc($pass) {
	$salt = get_option("salt");
	return sha1($salt.sha1($salt.$pass.$salt).$salt);
}

/**
 * Page url handlers
 * Type 1 = function
 * Type 2 = PHP File
 */
function makepage($url, $page, $type=1) {
	if ($_GET['makepage'] == $url) {
		if ($type == 1) {
			eval($page."();");
		} elseif ($type == 2) {
			include $page;
		}
	}
}
/*
 * Sanitization
 */
// Strip Input Function, prevents HTML in unwanted places\
// "Borrowed" from PHP-Fusion
function stripinput($text) {
	if (ini_get('magic_quotes_gpc')) $text = stripslashes($text);
	$search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
	$replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
	$text = str_replace($search, $replace, $text);
	return $text;
}

function cleanurl($url) {
	$bad_entities = array("&", "\"", "'", '\"', "\'", "<", ">", "(", ")", "*");
	$safe_entities = array("&amp;", "", "", "", "", "", "", "", "", "");
	$url = str_replace($bad_entities, $safe_entities, $url);
	return $url;
}

/**
 * Other functions
 */

function get_option($option) {
	global $site_id;
	global $gpdb;
	$value = $gpdb->get_var("SELECT option_value FROM ".$gpdb->prefix."options WHERE option_name='".$option."' AND option_site='".$site_id."'");
	return $value;
}
/**
 * Theme stuffs
 */

//Get current page data
if (isset($_GET['p'])) {
	$page_id = intval($_GET['p']);
} else {
	$page_id = 1;
}
$page_result = $gpdb->query("SELECT * FROM ".$gpdb->prefix."pages WHERE page_id='".$page_id."' LIMIT 1");
$page_data = $gpdb->makearray($page_result);

/**
 * Navigation
 */
function get_nav_array(){
	global $gpdb;
	return $gpdb->results("SELECT * FROM ".$gpdb->prefix."nav");
}

function make_nav($separator="&nbsp;&raquo;&nbsp;") {
	$items = get_nav_array();
	$menu = "";
	foreach ($items as $item) {
		if ($item['nav_page'] == 0) {
			$link = $item['nav_link'];
		} else {
			$link = GPBASE."?p=".$item['nav_link'];
		}
		$menu .= "<a href='".$link."'>".$item['nav_title']."</a>";
		$menu .= $separator;	
	}
	echo $menu;
}

/**
 * Initialization
 */


?>