<?php
/**
 * The template for displaying the footer.
 *
 * @package webbusiness
 */
?>


<?php if (is_active_sidebar("sidebar-above-footer")) { ?>
<div id="featured-logos">
	<div class="inner">
		<?php dynamic_sidebar("sidebar-above-footer"); ?>
	</div>
</div>
<?php } ?>

</div><!-- #main -->

<footer id="footer" class="widget-area">
	<?php if (is_active_sidebar('sidebar-footer-1') || 
			is_active_sidebar('sidebar-footer-2') || 
			is_active_sidebar('sidebar-footer-3') || 
			is_active_sidebar('sidebar-footer-4') || 
			is_active_sidebar('sidebar-footer-5') 
			) { ?>
	<div class="inner">
		<div id="footer-links-no-gutter" class="ngcols clearfix">
			<div id="footer1" class="ngcol1-6">
				<?php dynamic_sidebar('sidebar-footer-1'); ?>
			</div>
			<div id="footer2" class="ngcol1-6">
				<?php dynamic_sidebar('sidebar-footer-2'); ?>
			</div>
			<div id="footer3" class="ngcol1-6">
				<?php dynamic_sidebar('sidebar-footer-3'); ?>
			</div>
			<div class="clres"></div>
			<div id="footer4" class="ngcol1-4">
				<?php dynamic_sidebar('sidebar-footer-4'); ?>				
			</div>
			<div id="footer5" class="ngcol1-4 lastcol">
				<?php dynamic_sidebar('sidebar-footer-5'); ?>				
			</div>
		</div>			
	</div>
	<?php } ?>
	<div id="copyright">
		<div class="inner clearfix">	
			<div class="copyright">					
				<?php 
					$footer_logo = get_theme_mod('footer_logo');
					$text_logo = get_theme_mod('logo_text');
					if (!$text_logo) { 
						$text_logo = get_bloginfo('name'); 
					}
				?>
				<?php if ($footer_logo) { ?>
				<div id="footer-logo">
					<img src="<?php echo $footer_logo; ?>" alt="<?php echo $text_logo; ?>"  >
				</div>
				<?php } ?>
				<?php echo get_theme_mod('copyright_textbox', '&copy; ' . date('Y') . webbusiness_get_default('footer-copyright')); ?> 
				&nbsp; 
				<?php
					if (get_theme_mod('footer_menu') && get_theme_mod('footer_menu') != "default") {
						wp_nav_menu(array('menu' => get_theme_mod('footer_menu'), 'container' => '', 'menu_class' => 'footer-menu', 'before' => '|', 'depth'=>1 )); 
					}
				?>					
			</div>
		</div>	
	</div>
</footer>

</div><!-- #page -->

<!--[if IE 6]>
<script src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG.js"></script>
<script>
  DD_belatedPNG.fix('img, a, p, li, #main-menu-container, #main-menu, input, .post, .attachment');
</script>
<![endif]-->   

<script type="text/javascript">
<?php 
	// banners
	$banner_delay = get_theme_mod('banner_delay');
	if (!$banner_delay) {
		$banner_delay = 4500;
	}
	$banner_effect = get_theme_mod('banner_effect');
	if (!$banner_effect || $banner_effect == 'default') {
		$banner_effect = 'fade';
	}
	$banner_pager = "";
	$banner_prev = "";
	$banner_next = "";
	if (get_theme_mod('hide_banners_pager') != '1' ) { $banner_pager = ",pager:'#banner-pager'"; }
	if (get_theme_mod('hide_banners_prev_next') != '1') {
		$banner_prev = ",prev:'#banner-prev'";
		$banner_next = ",next:'#banner-next'";
	}
?>
(function($) {
$(document).ready(function(){
    $('.modern #banner img').css("display","block");
    $('.slideshow').cycle({ fx: '<?php echo $banner_effect; ?>',containerResize: false,width: '100%', slideResize: false, slideExpr: "img:not(.placeholder)", timeout: <?php echo $banner_delay; ?> <?php echo $banner_pager.$banner_prev.$banner_next; ?> });
});
}(jQuery));

</script>
<?php wp_footer(); ?>
</body>
</html>