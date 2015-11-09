<?php
/** ------------+
 * Grupo Content Management System
 * By Ian M
 * ian@simplyian.com
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }

function gp_content(){
	global $gp_content;
	if (!empty($gp_content)) {
		eval(stripinput($gp_content)."();");
	} else {
		include LAYOUT_DIR."content.php";
	}
}
/*
 * Hooks
 * Will make themes modifiable.
 */
function hook_header() {
	global $hook_header;
	echo $hook_header;
}
function hook_before_html() {
	global $hook_before_html;
	echo $hook_before_html;
}
function hook_after_html() {
	global $hook_after_html;
	echo $hook_after_html;
}
function hook_footer() {
	global $hook_footer;
	echo $hook_footer;
}

//Theme Basic Functions

function page_title() {
	global $page_data;
	echo $page_data['page_title'];	
}

function page_content() {
	global $page_data;
	echo $page_data['page_content'];	
}

?>