<?php
/** 
 * The template for displaying the above content widget area
 * 
 * @package webbusiness
 */
?>			
<?php 
	if (is_active_sidebar( 'sidebar-above-content' )) { 
		echo "<div id=\"above-content\" class=\"widget-area\">";
		dynamic_sidebar( 'sidebar-above-content' ); 			
		echo "</div>";
	} 
?>
