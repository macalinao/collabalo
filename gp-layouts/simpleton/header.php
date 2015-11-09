<?php
/**
 * Theme name: Simpleton Theme
 * Author: Ian Macalinao
 * Author URI: http://www.simplyian.com/
 * Copyright: 2010 Ian Macalinao
 */
if (!defined("IN_GRUPO")) { die("Access denied."); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" href="<?php echo GPLAYOUTS.get_option('layout'); ?>/style.css" />
<?php hook_header(); ?>
<title><?php echo get_option('site_title'); ?></title>
</head>
<body>
<div id="bgtop">
<br clear="all" />
</div>

<div id="wrapper">
<div id="header_area">

<div id="header">
<div id="site_title">
<a href="<?php echo get_option('site_url'); ?>"><?php echo get_option('site_title'); ?></a>
</div>
<div id="site_tagline">
<?php echo get_option('site_tagline'); ?>
</div>

</div>
<div id="nav">
<div id="inner_nav">
<?php make_nav(); ?>
</div>
</div>
</div>