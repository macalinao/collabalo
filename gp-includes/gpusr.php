<?php
/** ------------+
 * Grupo Content Management System
 * By Ian M
 * ian@simplyian.com
 */

if (!defined("IN_GRUPO")) { die("Access denied."); }

class gpusr {
	public function validate($user, $pass) {
		global $gpdb;
		$user_id = $gpdb->get_var("SELECT user_id FROM ".$gpdb->prefix."users WHERE user_name='".$user."' AND user_pass='".pwenc($pass)."'");
		if ($user_id == 0||!isset($user_id)) {
			return false;	
		} else {
			return true;	
		}
	}
	
	public function login($user, $pass, $remember) {
		if (!isset($remember)) {
			setcookie(get_option("cookie_prefix")."user", $user.".".$pass); //expire on browser exit
		} else {
			setcookie(get_option("cookie_prefix")."user", $user.".".$pass, time() + 2592000); //expire in 30 days (remember me)
		}
	}
	
	public function logout() {
		if (LOGGED_IN) {
			setcookie(get_option("cookie_prefix")."user", "", time() - 3600); //cookie deletion
		} else {
			die("Error: You are not logged in to do this!");
		}
	}
}

$gpusr = new gpusr();

//Check if user is logged in
if (isset($_COOKIE[get_option("cookie_prefix")."user"])) {
	$sanicookie = stripinput($_COOKIE[get_option("cookie_prefix").'user']);
	$cookie_data = explode(".", $sanicookie);
	if ($gpusr->validate($cookie_data[0], $cookie_data[1]) == true) {
		$user_is_logged_in = true;
	} else {
		$user_is_logged_in = false;
	}
} else {
	$user_is_logged_in = false;
}

//Logout script
if (isset($_GET['logout'])) {
	$gpusr->logout();
}
	
//Login form script
if (isset($_POST['login_form'])) {
	$username = stripinput($_POST['login_username']);
	$password = stripinput($_POST['login_password']);
	if ($_POST['remember_me'] == "remember_me") {
		$remember = true;
	} else {
		$remember = false;
	}
	if ($gpusr->validate($username, $password) === true) {
		$gpusr->login($username, $password, $remember);
	} else {
		$login_error = "Error: You are not logged in to do this!";
	}
}
?>