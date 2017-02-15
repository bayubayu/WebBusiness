<?php
/**
 * The Header for webbusiness.
 *
 * @package webbusiness
 */
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 ie67 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 ie67 oldie gtie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie gtie6" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="modern no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php 
		$favicon = get_theme_mod('favicon');
		if (!$favicon) {
			$favicon = get_template_directory_uri()."/img/favicon.ico";
		}
	
	?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action('before'); ?>
		<header id="header" class="site-header" role="banner">

			<div class="inner">
				<h1 id="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<?php 
							$logo = get_theme_mod('logo');
							$text_logo = get_theme_mod('logo_text');
							if (!$text_logo) { 
								$text_logo = get_bloginfo('name'); 
							}
						?>
						<?php 
							if ($logo) {
						?>
						<img src="<?php echo $logo; ?>" alt="<?php echo $text_logo; ?>" />
						<?php 
							} else {
							echo $text_logo;
						?>
						<?php } ?>
					</a>
				</h1>
				<h2 id="site-description">
					<?php bloginfo('description'); ?>
				</h2>
			</div>

			<nav id="nav" role="navigation">
				<div class="skip-link visuallyhidden focusable">
					<a title="Skip to content" href="#content">Skip to content</a>
				</div>

				<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'main-menu', 'menu_class' => 'inner', 'container' => 'div', 'container_id' => 'main-menu-container', 'items_wrap' => '<h3 class="visuallyhidden">Main Menu</h3><ul id="%1$s" class="%2$s">%3$s</ul>', 'fallback_cb'=>'webbusiness_page_menu')); ?>
				<div id="top-menu-container">
					<h3 class="visuallyhidden">Top Menu</h3>
					<div class="inner">&nbsp;
						<?php
							if (get_theme_mod('topmenu_menu') && get_theme_mod('topmenu_menu') != "default") {
								wp_nav_menu(array('menu' => get_theme_mod('topmenu_menu'), 'container' => '', 'menu_class' => 'top-menu')); 
							}
						?>
						
							<?php 
							$text_output = "";
							if (get_theme_mod('topmenu_phone')) {
								$text_output .= "<li class=\"tel\">".get_theme_mod('topmenu_phone')."</li>";
							}
							if (get_theme_mod('hide_socialmedia') != '1') {
								foreach (webbusiness_get_social_medias() as $key => $value) {
									if (get_theme_mod( 'socialmedia_'.$key.'_url')) {
										$socialmedia_label = get_theme_mod( 'socialmedia_'.$key.'_label'); 
										if (!$socialmedia_label) {
											$socialmedia_label = $value;
										}
										$text_output .= "<li class=\"".$key."\"><a href=\"" . get_theme_mod('socialmedia_'.$key.'_url') . "\"><img src=\"" . get_template_directory_uri() . "/img/".$key.".png\" alt=\"" . $socialmedia_label . "\" />" . "</a></li>";
									}
								}
							}
							if (get_theme_mod('hide_rss') != '1') {
							if (get_theme_mod('socialmedia_facebook_url')) {
								$text_output .= "<li class=\"rss\"><a href=\"" . get_bloginfo("rss2_url") . "\"><img src=\"" . get_template_directory_uri() . "/img/rss.png\" alt=\"rss\" />" . "</a></li>";
							}
							}
							if ($text_output) {
								echo "<ul id=\"top-contact\">".$text_output."</ul>";
							}
							?>
						
					</div>

				</div>
				<?php if (get_theme_mod('hide_search_top') != '1') { ?>
				<div id="search-top">
					<h3 class="visuallyhidden">Top Menu</h3>
					<div class="inner">
						<?php get_search_form(); ?>
					</div>
				</div>	
				<?php } ?>
			</nav><!-- #nav -->
		</header><!-- #masthead -->
		<div id="main" class="site-main">
