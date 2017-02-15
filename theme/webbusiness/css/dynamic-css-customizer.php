<?php
/**
 *	This file is loaded for customizer preview only
 */

// load wordpress
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

header('Content-type: text/css');
header('Cache-control: must-revalidate');

// template already activated
if (function_exists("webbusiness_cache_custom_css_preview")) {
	$custom_css = webbusiness_cache_custom_css_preview();
	echo $custom_css;
} else {
	// not activated, load default style
	include "webbusiness-color.css";
}
?>
