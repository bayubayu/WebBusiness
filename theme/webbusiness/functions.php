<?php

/**
 * webbusiness functions and definitions
 *
 * @package webbusiness
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width))
	$content_width = 640; /* pixels */

/**
 * Default value for theme.
 */
$webbusiness_default_vars = array(
	'marketing_title1' => __('Marketing title 1', 'webbusiness'),
	'marketing_description1' => __('This is a default marketing description, default marketing description', 'webbusiness'),
	'marketing_button_text1' => __('Button 1', 'webbusiness'),
	'marketing_button_link1' => __('#', 'webbusiness'),
	'marketing_button_link_title1' => __('Link title', 'webbusiness'),
	'marketing_action_text1' => __('Starting from <span class="pri">$9.99</span>/mo', 'webbusiness'),
	'marketing_icon1' => '',
	'marketing_title2' => __('Marketing title 1', 'webbusiness'),
	'marketing_description2' => __('This is a default marketing description, default marketing description', 'webbusiness'),
	'marketing_button_text2' => __('Button 1', 'webbusiness'),
	'marketing_button_link2' => __('#', 'webbusiness'),
	'marketing_button_link_title2' => __('Link title', 'webbusiness'),
	'marketing_action_text2' => __('Starting from <span class="pri">$9.99</span>/mo', 'webbusiness'),
	'marketing_icon2' => '',
	'marketing_title3' => __('Marketing title 1', 'webbusiness'),
	'marketing_description3' => __('This is a default marketing description, default marketing description', 'webbusiness'),
	'marketing_button_text3' => __('Button 1', 'webbusiness'),
	'marketing_button_link3' => __('#', 'webbusiness'),
	'marketing_button_link_title3' => __('Link title', 'webbusiness'),
	'marketing_action_text3' => __('Starting from <span class="pri">$9.99</span>/mo', 'webbusiness'),
	'marketing_icon3' => '',
	'banner1' => '',
	'banner2' => '',
	'banner3' => '',
	'footer-copyright' => ' No copyright information has been saved yet.',
);

/**
 * Get default variables
 */
function webbusiness_get_default($default_vars) {
	global $webbusiness_default_vars;
	if (isset($webbusiness_default_vars[$default_vars])) {
		return $webbusiness_default_vars[$default_vars];
	}
}

/**
 * Social Media.
 */
function webbusiness_get_social_medias() {
	$social_medias = array(
		"facebook" => "Facebook",
		"twitter" => "Twitter",
		"gplus" => "Google Plus",
		"youtube" => "Youtube",
		"vimeo" => "Vimeo",
		"linkedin" => "LinkedIn",
	);
	return $social_medias;
}	

/**
 * Get theme mod with default value.
 */
function webbusiness_get_theme_mod($theme_mod_value) {
	return get_theme_mod($theme_mod_value, webbusiness_get_default($theme_mod_value));
}

if (!function_exists('webbusiness_setup')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 */
	function webbusiness_setup() {

		/**
		 * Make theme available for translation
		 */
		load_theme_textdomain('webbusiness', get_template_directory() . '/languages');

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'webbusiness'),
		));

		/**
		 * Enable support for Post Formats
		 */
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
		
		/**
		 * Add full width
		 */
		add_theme_support('post-thumbnails');   
		add_image_size('full-width', 940, 9999, FALSE);
	}

endif; // webbusiness_setup
add_action('after_setup_theme', 'webbusiness_setup');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function webbusiness_widgets_init() {
	/**
	 * Sidebar
	 */
	register_sidebar(array(
		'name' => __('Sidebar', 'webbusiness'),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Footer column 1
	 */
	register_sidebar(array(
		'name' => __('Footer Sidebar Column 1', 'webbusiness'),
		'id' => 'sidebar-footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Footer column 2
	 */
	register_sidebar(array(
		'name' => __('Footer Sidebar Column 2', 'webbusiness'),
		'id' => 'sidebar-footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Footer column 3
	 */
	register_sidebar(array(
		'name' => __('Footer Sidebar Column 3', 'webbusiness'),
		'id' => 'sidebar-footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Footer column 4
	 */
	register_sidebar(array(
		'name' => __('Footer Sidebar Column 4', 'webbusiness'),
		'id' => 'sidebar-footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Footer column 5
	 */
	register_sidebar(array(
		'name' => __('Footer Sidebar Column 5', 'webbusiness'),
		'id' => 'sidebar-footer-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Tertiary content at homepage
	 */
	register_sidebar(array(
		'name' => __('Homepage Sidebar', 'webbusiness'),
		'id' => 'sidebar-homepage',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Content bottom at homepage
	 */
	register_sidebar(array(
		'name' => __('Homepage Bottom', 'webbusiness'),
		'id' => 'sidebar-homepage-bottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Content above main content
	 */
	register_sidebar(array(
		'name' => __('Above Content', 'webbusiness'),
		'id' => 'sidebar-above-content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	/**
	 * Content above footer
	 */
	register_sidebar(array(
		'name' => __('Above Footer', 'webbusiness'),
		'id' => 'sidebar-above-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'webbusiness_widgets_init');


/* 
 * Generate custom css based on template. 
 */
function webbusiness_load_custom_css() {
	$css_file = file_get_contents(get_template_directory() . '/css/webbusiness-color.css');

	$css_result = "";
	$custom_css = webbusiness_get_colors();
	$css_file_filtered = $css_file;
	foreach ($custom_css as $key) {
		$value = get_theme_mod($key);
		if ($value) {
			$pattern = "/(\/\*@)" . $key . "(\*\/)(.*);/";
			$replacement = $value . ";";
			$css_file_filtered = preg_replace($pattern, $replacement, $css_file_filtered);
		}
	}

	$css_file_filtered .= "/*";
	foreach ($custom_css as $key) {
		$css_file_filtered .= "\n\"" . $key . "\" => \"" . get_theme_mod($key) . "\",";
	}
	$css_file_filtered .= "*/";
	$css_result .= $css_file_filtered;
	return $css_result;
}

/* 
 * Save custom CSS to file at uploads folder. 
 */
function webbusiness_save_css() {
	$save_custom_css = get_theme_mod('save-custom-css');
	if (get_theme_mod('save-custom-css') != "" && get_theme_mod('save-custom-css') < time()) {
		$data = webbusiness_load_custom_css();
		remove_theme_mod('save-custom-css');
		
		// write to file
		$uploads = wp_upload_dir();
		$uploads_dir = trailingslashit($uploads["basedir"]);
		$img_path = get_template_directory_uri();
		$data = str_replace("../img/", $img_path . "/img/", $data);
		
		file_put_contents($uploads_dir . "webbusiness.css", $data);
		delete_transient('webbusiness_custom_css');
	}
}

/* 
 * Cache custom CSS at transient. 
 */
function webbusiness_cache_custom_css() {
	$data = get_transient("webbusiness_custom_css");
	if ($data === false || (get_theme_mod('save-custom-css') != "" && get_theme_mod('save-custom-css') < time())) {
		$data = webbusiness_load_custom_css();
		set_transient('webbusiness_custom_css', $data, 3600 * 24);
	}
	return $data;
}

/* 
 * Cache custom CSS at transient for customize preview. 
 */
function webbusiness_cache_custom_css_preview() {
	$data = get_transient("webbusiness_custom_css_preview");
	if ($data === false) {
		$data = webbusiness_load_custom_css();
		set_transient('webbusiness_custom_css_preview', $data, 3600 * 24);
	}
	return $data;
}

/* 
 * Reset custom css at transient. 
 */
function webbusiness_reset_cache_custom_css() {
	delete_transient('webbusiness_custom_css_preview');
	webbusiness_cache_custom_css_preview();
}

add_action('customize_preview_init', 'webbusiness_reset_cache_custom_css');

/* 
 * Save action, prepare to update custom css cache file. 
 */
function webbusiness_save_custom_css() {
	delete_transient('webbusiness_custom_css');
	webbusiness_cache_custom_css();
	set_theme_mod('save-custom-css', time() + 3);
}

add_action('customize_save', 'webbusiness_save_custom_css');


/**
 * Enqueue scripts and styles.
 */
function webbusiness_scripts() {
	wp_enqueue_style('webbusiness-style', get_stylesheet_uri());
	wp_enqueue_style('webbusiness-framework', get_template_directory_uri() . '/css/framework.css');
	$style = get_theme_mod("style");
	if (!$style || $style == "default") {
		$style = "dark";
	}
	$wp_customize = "";
	if (isset($_POST["wp_customize"])) $wp_customize = $_POST["wp_customize"];
	if ($wp_customize == "on") {
		wp_enqueue_style('webbusiness-color-dynamic', get_template_directory_uri() . '/css/dynamic-css-customizer.php');
	} else {
		webbusiness_save_css();
		$uploads = wp_upload_dir();
		$uploads_dir = trailingslashit($uploads["basedir"]);
		$uploads_path = trailingslashit($uploads["baseurl"]);
		if (file_exists($uploads_dir . "webbusiness.css") /* && !$save_custom_css */) {
			wp_enqueue_style('webbusiness-color-dynamic', $uploads_path . "webbusiness.css");
		} else {
			wp_enqueue_style('webbusiness-color-dynamic', get_template_directory_uri() . '/css/dynamic-css.php');
		}
	}

	wp_enqueue_style('webbusiness-layout', get_template_directory_uri() . '/css/webbusiness.css');
	
	if (!get_theme_mod("googlefonts_link")) {
		wp_enqueue_style('webbusiness-googlefonts', "http://fonts.googleapis.com/css?family=Ubuntu");
	}
	
	wp_enqueue_script('webbusiness-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

	wp_enqueue_script('webbusiness-jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array(), '20120206', true);
	wp_enqueue_script('webbusiness-superfish', get_template_directory_uri() . '/js/superfish.js', array(), '20120206', true);
	wp_enqueue_script('webbusiness-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array(), '20120206', true);
	wp_enqueue_script('webbusiness-script', get_template_directory_uri() . '/js/script.js', array(), '20120206', true);
	wp_enqueue_script('webbusiness-retina', get_template_directory_uri() . '/js/retina-1.1.0.min.js', array(), '20120206', true);
	wp_enqueue_script('webbusiness-modernizr', get_template_directory_uri() . '/js/modernizr-2.0.6.min.js', array(), '20120206', false);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('webbusiness-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20120202');
	}
}

add_action('wp_enqueue_scripts', 'webbusiness_scripts');


function webbusiness_init() {
	if (!is_admin()) { 
		wp_enqueue_script('jquery');
	}	
}
add_action('init','webbusiness_init');
/**
 * Google Fonts.
 */
function webbusiness_googlefonts_style() {
	if (get_theme_mod("googlefonts_link")) {
		$googlefonts_link = get_theme_mod("googlefonts_link");
		echo $googlefonts_link;
	}

	if (get_theme_mod("googlefonts_code")) {
		$googlefonts_font_family = get_theme_mod("googlefonts_code");
		?>
			<style type="text/css" media="all">
			h1, h2, h3, h4, h5, h6,
			#main-menu, 
			#top-contact {
		<?php echo $googlefonts_font_family; ?>
			}
				
			</style>
		<?php
	}
}

add_action('wp_head', 'webbusiness_googlefonts_style');


/**
 * Choose custom image size.
 */
function custom_image_sizes_choose($sizes) {
	$custom_sizes = array(
		'full-width' => 'Full Width'
	);
	return array_merge($sizes, $custom_sizes);
}
add_filter('image_size_names_choose', 'custom_image_sizes_choose');

/**
 * Sidebar positions.
 */
function sidebar_position_class($classes) {
	$sidebar_position = get_theme_mod("sidebar_position");
	if ($sidebar_position == "right") {
		$classes[] = 'right-sidebar';
	}
	return $classes;
}

add_filter('body_class', 'sidebar_position_class');

/**
 * Menu id.
 */
function add_menuid($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass = $matches[1];
	$toreplace = array('<div class="' . $divclass . '">', '</div>');
	$new_markup = str_replace($toreplace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul id="' . $divclass . '" class="inner">', $new_markup);
	return $new_markup;
}

/**
 * Page menu.
 */
function webbusiness_page_menu() {
	add_filter('wp_page_menu', 'add_menuid');
	echo "<div id=\"main-menu-container\">";
	wp_page_menu(array('menu_class' => 'main-menu'));
	echo "</div>";
}

/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
require( get_template_directory() . '/inc/extras.php' );

/**
 * Customizer additions.
 */
require( get_template_directory() . '/inc/customizer.php' );


/**
 * Custom widgets for this theme.
 */
require( get_template_directory() . '/inc/widgets.php' );

/**
 * Color sets.
 */
require( get_template_directory() . '/inc/colors.php' );
