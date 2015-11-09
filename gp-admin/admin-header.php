<?php if (!defined("IN_GRUPO")) { die("Access denied."); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" href="admin-style.css" />
<title><?php echo get_option("site_title")." Administration ".$admin_page; ?></title>
</head>
<body>
<div id="admin_header">
<div id="admin_title">
<?php echo get_option("site_title")." Administration"; ?>
</div>
</div>