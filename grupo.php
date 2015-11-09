<?php
/** ------------+
 * Grupo Content Management System
 * By Ian M
 * ian@simplyian.com
 */

require_once "gp-core.php";

//Initialize layout...
if (!function_exists('layout_override')) {
	require_once GPLAYOUTS.get_option("layout")."/index.php";
} else {
	layout_override();
}
if ($user_is_logged_in == true){
	echo "true";
} else {
	echo "false";
}
?>