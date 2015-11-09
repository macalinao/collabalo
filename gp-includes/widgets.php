<?php
/** ------------+
 * Grupo Content Management System
 * By Ian M
 * ian@simplyian.com
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }
class gpwidget {
	var $registered;
	var $sidebar;
	var $before_widget;
	var $after_widget;
	var $before_title;
	var $after_title;
	
	function gpwidget() {
		$this->__construct();
	}
	function __construct() {
		$this->registered = array();
		$this->before_widget = "<li>";
		$this->after_widget = "</li>";
		$this->before_title = "<div class='widget_title'>";
		$this->after_title = "</div>";
		$this->sidebar_count = 0;
	}
	
	public function register($widget_name) {
		$this->registered[] = $widget_name;
	}
	
	public function register_sidebar($params) {
		if (isset($params['id'])) {
			$this->sidebar[$params['id']] = $params;
		} else {
			$this->sidebar[] = $params;
		}
	}
	
	public function sb($id) {
		if (is_int($id)){
			if (isset($this->sidebar[$id]['before_widget'])) { $this->before_widget = $this->sidebar[$id]['before_widget']; }
			if (isset($this->sidebar[$id]['after_widget'])) { $this->after_widget = $this->sidebar[$id]['after_widget']; }
			if (isset($this->sidebar[$id]['before_title'])) { $this->before_title = $this->sidebar[$id]['before_title']; }
			if (isset($this->sidebar[$id]['after_title'])) { $this->after_title = $this->sidebar[$id]['after_title']; }
			$list = $this->get_list($id);
			foreach ($list as $widget) {
				eval($widget."::".$widget."_make();");
			}
			$this->before_widget = "<li>";
			$this->after_widget = "</li>";
			$this->before_title = "<div class='widget_title'>";
			$this->after_title = "</div>";
		} else {
			
		}
	}
	
	public function get_list($id) {
		$widgets = get_option("widgets");
		$sidebars = explode(";", $widgets);
		foreach ($sidebars as $sidebar) {
			$thesb = explode(":", $sidebar);
			$sid = $thesb[0];
			if ($sid == $id) {
				return explode(",", $thesb[1]);
			} else {
				continue;
			}
		}
	}
}

class LoginWidget extends gpwidget {
	function LoginWidget_make() {
		global $gpusr;
		echo $this->before_widget;
		echo $this->before_title."Login".$this->after_title;
		if ($user_is_logged_in == true) {
		?>
		Welcome, dude.<br />
		- <a href="<?php echo ((strstr(GP_URI, "?")) ? GP_URI."&" : GP_URI."?"); ?>logout=yes">Logout</a> -
		<?php
		} else {
		?>
		<form name="login" method="post" align="center" action="<?php echo GP_URI; ?>">
		<?php if (isset($login_error)) { echo $login_error."<br />"; } ?>
		<label for="login_username" class="login_title">Username</label><br />
		<input name="login_username" type="text" size="10" id="login_username" /><br />
		<label for="login_password" class="login_title">Password</label><br />
		<input name="login_password" type="password" size="10" id="login_password" /><br />
		<input type="checkbox" name="remember_me" value="remember_me" title="Remember Me" />
		<input type="submit" value="Login" name="login_form" class="button" />
		</form>
		<?php
		}
		echo $this->after_widget;
	}
}

class TestWidget extends gpwidget {
	function TestWidget_make() {
		echo $this->before_widget;
		echo $this->before_title."Test Widget".$this->after_title;
		echo "Hello, World!";
		echo $this->after_widget;
	}
}
class TestWidget2 extends gpwidget {
	function TestWidget2_make() {
		echo $this->before_widget;
		echo $this->before_title."Test Widget 2".$this->after_title;
		echo "Hello, World!";
		echo $this->after_widget;
	}
}

$gpwidget = new gpwidget();

$gpwidget->register("TestWidget");
?>