<?php
/** ------------+
 * Grupo Content Management System
 * By Ian M
 * ian@simplyian.com
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }

//For those who don't understand the awesome power of Hydrogen...
class gpdb {
	
	var $prefix;
	
	function gpdb() {
		$this->__construct();
	}

	function __construct($db_host, $db_user, $db_pass, $db_name) {
		global $db_prefix;
		$link = mysql_connect($db_host, $db_user, $db_pass);
		$db = mysql_select_db($db_name);
		$this->prefix = $db_prefix;
		return $link;
	}
	public function query($query) {
		$result = @mysql_query($query);
		if (!$result) {
			echo mysql_error();
			return false;
		} else {
			return $result;
		}
	}
	
	public function count($field,$table,$conditions="") {
		$cond = ($conditions ? " WHERE ".$conditions : "");
		$result = @mysql_query("SELECT Count".$field." FROM ".DB_PREFIX.$table.$cond);
		if (!$result) {
			echo mysql_error();
			return false;
		} else {
			$rows = mysql_result($result, 0);
			return $rows;
		}
	}
	
	public function result($query, $row) {
		$result = @mysql_result($query, $row);
		if (!$result) {
			echo mysql_error();
			return false;
		} else {
			return $result;
		}
	}
	
	public function rows($query) {
		$result = @mysql_num_rows($query);
		return $result;
	}
	
	public function makearray($query) {
		$result = @mysql_fetch_assoc($query);
		if (!$result) {
			echo mysql_error();
			return false;
		} else {
			return $result;
		}
	}
	
	public function get_row($query) {
		return $this->makearray($this->query($query));
	}
	
	public function results($query) {
		$result = $this->query($query);
		$i = 0;
		while ($row = $this->makearray($result)) {
			$results[$i] = $row;
			$i++;
		}
		return $results;
	}
	
	public function get_var($query) {
		$result = $this->query($query);
		$ass = $this->arraynum($result);
		$return = $ass[0];
		if (!$result || !$ass || !$return) {
			echo mysql_error();
			return false;
		} else {
			return $return;
		}
	}
	
	public function arraynum($query) {
		$result = @mysql_fetch_row($query);
		if (!$result) {
			echo mysql_error();
			return false;
		} else {
			return $result;
		}
	}
}

$gpdb = new gpdb($db_host, $db_user, $db_pass, $db_name);

//Hydrogen Stuff
require_once GPBASE."gp-includes/hydrogen/hydrogen.inc.php";

?>