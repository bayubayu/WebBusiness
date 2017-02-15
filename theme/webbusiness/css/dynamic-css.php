<?php
/**
 * 	This file is for generating custom css
 */
// load wordpress
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

header('Content-type: text/css');
header('Cache-control: must-revalidate');
// calc an offset of 24 hours
$offset = 3600 * 24;
// calc the string in GMT not localtime and add the offset
$expire = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
//output the HTTP header
Header($expire);
?>
<?php

$custom_css = webbusiness_cache_custom_css();
echo $custom_css;
?>
