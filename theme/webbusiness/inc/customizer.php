<?php
/**
 * webbusiness Theme Customizer
 *
 * @package webbusiness
 */

/**
 * Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function webbusiness_customize_register($wp_customize) {
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	/**
	 * Adds textarea support to the theme customizer
	 */
	class Customize_Textarea_Control extends WP_Customize_Control {

		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
			</label>
			<?php
		}

	}

	/**
	 * Adds separator support to the theme customizer
	 */
	class Example_Customize_Separator_Control extends WP_Customize_Control {

		public $type = 'separator';

		public function render_content() {
			?>
			<div style="text-transform: uppercase; border-bottom: solid 1px #000000; background: #dedede; padding:7px;"><?php echo esc_html($this->label); ?></div>
			<?php
		}

	}

	/**
	 * Add custom js
	 */
	class WebBusiness_Color_Js extends WP_Customize_Control {

		//public $type = 'separator';

		public function render_content() {
			?>
			<div>Select color presets</div>
			<script type="text/javascript">
			<?php
			$color_sets_js = "";
			$color_sets = webbusiness_get_color_sets();
			$color_sets_js = json_encode($color_sets);
			?>
				var colorSets = <?php echo $color_sets_js; ?>;
				jQuery(document).ready(function() {
					jQuery('#customize-control-color_presets select').change(function() {
						var selectedColorSet = colorSets[jQuery(this).val()];
						for (var i in selectedColorSet) {
							if (selectedColorSet[i] != "") {
								console.log(i, selectedColorSet[i]);
								jQuery('#customize-control-' + i + ' .wp-color-picker').val(selectedColorSet[i]).change();
							}
						}
					});
				});
				//alert(colorSets);
			</script>
			<?php
		}

	}

	function webbusiness_sanitize_text($input) {
		return wp_kses_post(force_balance_tags($input));
	}

	function webbusiness_sanitize_link($input) {
		return wp_kses_post(force_balance_tags($input));
	}

	function webbusiness_sanitize_checkbox($input) {
		if ($input == 1) {
			return 1;
		} else {
			return '';
		}
	}

	function get_menu_choices() {
		$menu_choices = array();
		$menu_choices[""] = "none";
		$menus = wp_get_nav_menus(/* $args */);
		if ($menus) {
			foreach ($menus as $menu) {
				$menu_choices[$menu->name] = $menu->name;
			}
		}
		return $menu_choices;
	}

	$wp_customize->remove_section('title_tagline');
	$priority_counter = 0;
	// -------------------------------------------------- footer section ------ //
	// add footer section
	$wp_customize->add_section(
			'webbusiness_section_footer', array(
		'title' => __('Footer', 'webbusiness'),
		'description' => __('Footer Section.', 'webbusiness'),
		'priority' => 35,
			)
	);

	// footer copyright
	$wp_customize->add_setting(
			'copyright_textbox', array(
		'default' => __('Default copyright text', 'webbusiness'),
		'sanitize_callback' => 'webbusiness_sanitize_text',
			)
	);


	$wp_customize->add_control(
			'copyright_textbox', array(
		'label' => __('Copyright text', 'webbusiness'),
		'section' => 'webbusiness_section_footer',
		'type' => 'text',
			)
	);

	// footer menu
	$wp_customize->add_setting(
			'footer_menu', array('default' => 'default')
	);
	$wp_customize->add_control(
			'footer_menu', array(
		'type' => 'select',
		'label' => __('Footer Menu', 'webbusiness'),
		'section' => 'webbusiness_section_footer',
		'priority' => $priority_counter++,
		'choices' => get_menu_choices(),
			)
	);


	$wp_customize->add_setting('footer_logo');

	$wp_customize->add_control(
			new WP_Customize_Image_Control(
			$wp_customize, 'footer_logo', array(
		'label' => __('Footer Logo', 'webbusiness'),
		'section' => 'webbusiness_section_footer',
		'settings' => 'footer_logo'
			)
			)
	);

	$wp_customize->add_setting('footer_logo_retina');

	$wp_customize->add_control(
			new WP_Customize_Image_Control(
			$wp_customize, 'footer_logo_retina', array(
		'label' => __('Retina Footer Logo, see documentation', 'webbusiness'),
		'section' => 'webbusiness_section_footer',
		'settings' => 'footer_logo_retina'
			)
			)
	);


	// -------------------------------------------------- homepage marketing section ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_marketing', array(
		'title' => __('Homepage Marketing', 'webbusiness'),
		'description' => __('Homepage Marketing', 'webbusiness'),
		'priority' => 36,
			)
	);

	// display marketing section checkbox
	$wp_customize->add_setting(
			'hide_marketing', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_marketing', array(
		'type' => 'checkbox',
		'label' => __('Hide marketing section', 'webbusiness'),
		'section' => 'webbusiness_section_marketing',
		'priority' => $priority_counter++,
			)
	);

	for ($i = 1; $i <= 3; $i++) {
		// -------------------------marketing ----------------------- //
		// marketing 3 title
		$wp_customize->add_setting('marketing_title' . $i, array('default' => webbusiness_get_default('marketing_title' . $i),
			'sanitize_callback' => 'webbusiness_sanitize_text',
		));
		$wp_customize->add_control('marketing_title' . $i, array('label' => __('Marketing Title ' . $i, 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'type' => 'text',
			'priority' => $priority_counter++,
		));

		// marketing description
		$wp_customize->add_setting('marketing_description' . $i, array('default' => webbusiness_get_default('marketing_description' . $i)));
		$wp_customize->add_control(
				new Customize_Textarea_Control($wp_customize, 'marketing_description' . $i, array('label' => __('Marketing Description ' . $i, 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'settings' => 'marketing_description' . $i,
			'priority' => $priority_counter++,
		)));

		// marketing action button text
		$wp_customize->add_setting('marketing_button_text' . $i, array('default' => webbusiness_get_default('marketing_button_text' . $i),
			'sanitize_callback' => 'webbusiness_sanitize_text',
		));
		$wp_customize->add_control('marketing_button_text' . $i, array('label' => __('Marketing Button ' . $i . ' Text', 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'type' => 'text',
			'priority' => $priority_counter++,
		));

		// marketing action button link
		$wp_customize->add_setting('marketing_button_link' . $i, array('default' => webbusiness_get_default('marketing_button_link' . $i),
			'sanitize_callback' => 'webbusiness_sanitize_link',
		));
		$wp_customize->add_control('marketing_button_link' . $i, array('label' => __('Marketing Button ' . $i . ' Link', 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'type' => 'text',
			'priority' => $priority_counter++,
		));

		// marketing action button link Title
		$wp_customize->add_setting('marketing_button_link_title' . $i, array('default' => webbusiness_get_default('marketing_button_link_title' . $i),
			'sanitize_callback' => 'webbusiness_sanitize_link',
		));
		$wp_customize->add_control('marketing_button_link_title' . $i, array('label' => __('Marketing Button ' . $i . ' Link Title', 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'type' => 'text',
			'priority' => $priority_counter++,
		));

		// marketing action text
		$wp_customize->add_setting('marketing_action_text' . $i, array('default' => webbusiness_get_default('marketing_action_text' . $i),
			'sanitize_callback' => 'webbusiness_sanitize_text',
		));
		$wp_customize->add_control('marketing_action_text' . $i, array('label' => __('Marketing Action ' . $i . ' Text', 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'type' => 'text',
			'priority' => $priority_counter++,
		));

		// marketing icon
		$wp_customize->add_setting('marketing_icon' . $i, array('default' => webbusiness_get_default('marketing_icon' . $i)));
		$wp_customize->add_control(
				new WP_Customize_Image_Control($wp_customize, 'marketing_icon' . $i, array('label' => __('Marketing Icon ' . $i, 'webbusiness'),
			'section' => 'webbusiness_section_marketing',
			'settings' => 'marketing_icon' . $i,
			'priority' => $priority_counter++,
		)));
	}


	// -------------------------------------------------- homepage banners ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_banners', array(
		'title' => __('Banners', 'webbusiness'),
		'description' => __('Banners', 'webbusiness'),
		'priority' => $priority_counter++,
			)
	);

	// display banner section checkbox
	$wp_customize->add_setting(
			'hide_banners', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_banners', array(
		'type' => 'checkbox',
		'label' => __('Hide banners section', 'webbusiness'),
		'section' => 'webbusiness_section_banners',
		'priority' => $priority_counter++,
			)
	);



	// hide pager
	$wp_customize->add_setting(
			'hide_banners_pager', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_banners_pager', array(
		'type' => 'checkbox',
		'label' => __('Hide banner pager', 'webbusiness'),
		'section' => 'webbusiness_section_banners',
		'priority' => $priority_counter++,
			)
	);
	// hide prev next
	$wp_customize->add_setting(
			'hide_banners_prev_next', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_banners_prev_next', array(
		'type' => 'checkbox',
		'label' => __('Hide banner prev &amp; next', 'webbusiness'),
		'section' => 'webbusiness_section_banners',
		'priority' => $priority_counter++,
			)
	);

	// banner delay
	$wp_customize->add_setting('banner_delay', array('default' => webbusiness_get_default('banner_delay')
	));
	$wp_customize->add_control('banner_delay', array('label' => __('Banner Delay (miliseconds)', 'webbusiness'),
		'section' => 'webbusiness_section_banners',
		'type' => 'text',
		'priority' => $priority_counter++,
	));

	// banner effects
	$wp_customize->add_setting(
			'banner_effect', array('default' => 'default')
	);
	$wp_customize->add_control(
			'banner_effect', array(
		'type' => 'select',
		'label' => __('Banner Effects', 'webbusiness'),
		'section' => 'webbusiness_section_banners',
		'priority' => $priority_counter++,
		'choices' => array(
			'default' => 'default',
			'fade' => 'fade',
			'zoom' => 'zoom',
			'shuffle' => 'shuffle',
			'zoom' => 'zoom',
			'turnUp' => 'turn up',
			'turnDown' => 'turn down',
			'turnLeft' => 'turn left',
			'turnRight' => 'turn right',
			'curtainX' => 'curtain x',
			'curtainY' => 'curtain y',
			'scrollRight' => 'scroll right',
			'scrollLeft' => 'scroll left',
			'scrollUp' => 'scroll up',
			'scrollDown' => 'scroll down',
			'scrollHorz' => 'scroll horizontal',
			'scrollVert' => 'scroll vertical',
			'slideX' => 'slide x',
			'slideY' => 'slide y',
			'toss' => 'toss',
			'uncover' => 'uncover',
			'wipe' => 'wipe',
			'growX' => 'grow x',
			'growY' => 'grow y',
			'cover' => 'cover',
			'blindX' => 'blind x',
			'blindY' => 'blind y',
			'blindZ' => 'blind z'
		),
			)
	);
	for ($i = 1; $i <= 6; $i++) {
		// banner
		$wp_customize->add_setting('banner' . $i, array('default' => webbusiness_get_default('banner' . $i)));
		$wp_customize->add_control(
				new WP_Customize_Image_Control($wp_customize, 'banner' . $i, array('label' => __('Banner ' . $i, 'webbusiness'),
			'section' => 'webbusiness_section_banners',
			'settings' => 'banner' . $i,
			'priority' => $priority_counter++,
		)));
		// banner link
		$wp_customize->add_setting('banner' . $i . '_link', array('default' => webbusiness_get_default('banner' . $i . '_link')
		));
		$wp_customize->add_control('banner' . $i . '_link', array('label' => __('Banner ' . $i . ' Link', 'webbusiness'),
			'section' => 'webbusiness_section_banners',
			'type' => 'text',
			'priority' => $priority_counter++,
		));
		// banner description
		$wp_customize->add_setting('banner' . $i . '_description', array('default' => webbusiness_get_default('banner' . $i . '_description')
		));
		$wp_customize->add_control('banner' . $i . '_description', array('label' => __('Banner ' . $i . ' Description', 'webbusiness'),
			'section' => 'webbusiness_section_banners',
			'type' => 'text',
			'priority' => $priority_counter++,
		));
	}

	// -------------------------------------------------- logo ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_logo', array(
		'title' => __('Logo', 'webbusiness'),
		'description' => __('Logo', 'webbusiness'),
		'priority' => $priority_counter++,
			)
	);

	// logo image
	$wp_customize->add_setting('logo', array('default' => webbusiness_get_default('logo')));
	$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'logo', array('label' => __('Logo', 'webbusiness'),
		'section' => 'webbusiness_section_logo',
		'settings' => 'logo',
		'priority' => $priority_counter++,
	)));

	// logo image retina
	$wp_customize->add_setting('logo_retina', array('default' => webbusiness_get_default('logo')));
	$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'logo_retina', array('label' => __('Retina logo, see documentation', 'webbusiness'),
		'section' => 'webbusiness_section_logo',
		'settings' => 'logo_retina',
		'priority' => $priority_counter++,
	)));


	// logo text
	$wp_customize->add_setting('logo_text', array('default' => webbusiness_get_default('logo_text')
	));
	$wp_customize->add_control('logo_text', array('label' => __('Logo Text', 'webbusiness'),
		'section' => 'webbusiness_section_logo',
		'type' => 'text',
		'priority' => $priority_counter++,
	));

	// favicon
	$wp_customize->add_setting('favicon', array('default' => webbusiness_get_default('favicon')));
	$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'favicon', array('label' => __('Favicon', 'webbusiness'),
		'section' => 'webbusiness_section_logo',
		'settings' => 'favicon',
		'priority' => $priority_counter++,
	)));


	// -------------------------------------------------- typography ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_typography', array(
		'title' => __('Typography', 'webbusiness'),
		'description' => __('Typography', 'webbusiness'),
		'priority' => $priority_counter++,
			)
	);

	// google fonts link
	$wp_customize->add_setting('googlefonts_link', array('default' => webbusiness_get_default('googlefonts_link')
	));
	$wp_customize->add_control('googlefonts_link', array('label' => __('Google Fonts Link (starting with <link href=...)', 'webbusiness'),
		'section' => 'webbusiness_section_typography',
		'type' => 'text',
		'priority' => $priority_counter++,
	));

	// google fonts code
	$wp_customize->add_setting('googlefonts_code', array('default' => webbusiness_get_default('googlefonts_code')
	));
	$wp_customize->add_control('googlefonts_code', array('label' => __('Google Fonts Code (starting with font-family:...)', 'webbusiness'),
		'section' => 'webbusiness_section_typography',
		'type' => 'text',
		'priority' => $priority_counter++,
	));


	// -------------------------------------------------- sidebar section ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_sidebar', array(
		'title' => __('Sidebar', 'webbusiness'),
		'description' => __('Sidebar', 'webbusiness'),
		'priority' => $priority_counter++,
			)
	);

	$priority_counter = 0;

	// display marketing section checkbox
	$wp_customize->add_setting(
			'sidebar_position', array('default' => 'default')
	);
	$wp_customize->add_control(
			'sidebar_position', array(
		'type' => 'select',
		'label' => __('Sidebar position', 'webbusiness'),
		'section' => 'webbusiness_section_sidebar',
		'priority' => $priority_counter++,
		'choices' => array(
			'left' => 'left (default)',
			'right' => 'right',
		),
			)
	);



	// -------------------------------------------------- social media ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_socialmedia', array(
		'title' => __('Social Media', 'webbusiness'),
		'description' => __('Social Media', 'webbusiness'),
		'priority' => $priority_counter++,
			)
	);

	foreach (webbusiness_get_social_medias() as $key => $value) {
		// social media url
		$wp_customize->add_setting('socialmedia_' . $key . '_url', array('default' => webbusiness_get_default('socialmedia_' . $key . '_url')));
		$wp_customize->add_control('socialmedia_' . $key . '_url', array('label' => __($value . ' URL', 'webbusiness'),
			'section' => 'webbusiness_section_socialmedia',
			'type' => 'text',
			'priority' => $priority_counter++,
		));
		// social media label
		$wp_customize->add_setting('socialmedia_' . $key . '_label', array('default' => webbusiness_get_default('socialmedia_' . $key . '_label')));
		$wp_customize->add_control('socialmedia_' . $key . '_label', array('label' => __($value . ' label', 'webbusiness'),
			'section' => 'webbusiness_section_socialmedia',
			'type' => 'text',
			'priority' => $priority_counter++,
		));
	}

	// -------------------------------------------------- top menu ------ //
	// add section
	$wp_customize->add_section(
			'webbusiness_section_topmenu', array(
		'title' => __('Top Menu', 'webbusiness'),
		'description' => __('Top Menu', 'webbusiness'),
		'priority' => $priority_counter++,
			)
	);
	// phone number
	$wp_customize->add_setting('topmenu_phone', array('default' => webbusiness_get_default('topmenu_phone')));
	$wp_customize->add_control('topmenu_phone', array('label' => __('Phone number', 'webbusiness'),
		'section' => 'webbusiness_section_topmenu',
		'type' => 'text',
		'priority' => $priority_counter++,
	));

	// top menu 
	$wp_customize->add_setting(
			'topmenu_menu', array('default' => 'default')
	);
	$wp_customize->add_control(
			'topmenu_menu', array(
		'type' => 'select',
		'label' => __('Menu', 'webbusiness'),
		'section' => 'webbusiness_section_topmenu',
		'priority' => $priority_counter++,
		'choices' => get_menu_choices(),
			)
	);

	// display social media checkbox
	$wp_customize->add_setting(
			'hide_socialmedia', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_socialmedia', array(
		'type' => 'checkbox',
		'label' => __('Hide social media', 'webbusiness'),
		'section' => 'webbusiness_section_topmenu',
		'priority' => $priority_counter++,
			)
	);
	// display rss checkbox
	$wp_customize->add_setting(
			'hide_rss', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_rss', array(
		'type' => 'checkbox',
		'label' => __('Hide RSS', 'webbusiness'),
		'section' => 'webbusiness_section_topmenu',
		'priority' => $priority_counter++,
			)
	);
	// hide search top
	$wp_customize->add_setting(
			'hide_search_top', array('sanitize_callback' => 'webbusiness_sanitize_checkbox')
	);
	$wp_customize->add_control(
			'hide_search_top', array(
		'type' => 'checkbox',
		'label' => __('Hide search top', 'webbusiness'),
		'section' => 'webbusiness_section_topmenu',
		'priority' => $priority_counter++,
			)
	);



	// colors
	$wp_customize->add_setting(
			'tcx_link_color', array(
		'default' => '#000000'
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize, 'link_color', array(
		'label' => __('Link Color', 'tcx'),
		'section' => 'colors',
		'settings' => 'tcx_link_color'
			)
			)
	);

	function webbusiness_customizer_color($name, $label, $default_value, $priority_counter) {
		global $wp_customize;
		$wp_customize->add_setting(
				$name, array(
			'default' => $default_value
				)
		);
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
				$wp_customize, $name, array(
			'label' => __($label, 'tcx'),
			'section' => 'colors',
			'settings' => $name,
			'priority' => $priority_counter,
				)
				)
		);
	}

	$wp_customize->add_setting('jscolor');

	$wp_customize->add_control(
			new WebBusiness_Color_Js(
			$wp_customize, 'jscolor', array(
		'label' => 'Testing',
		'section' => 'colors',
		'settings' => 'jscolor',
			)
			)
	);

	// display color presets
	$wp_customize->add_setting(
			'color_presets', array('default' => 'dark')
	);
	$wp_customize->add_control(
			'color_presets', array(
		'type' => 'select',
		'label' => __('Select color', 'webbusiness'),
		'section' => 'colors',
		'priority' => $priority_counter++,
		'choices' => array(
			'dark' => 'Dark (default)',
			'brown' => 'Brown',
			'green' => 'Green',
			'red' => 'Red',
			'monochrome' => 'Monochrome',
			'cyan' => 'Cyan',
		),
			)
	);




	$webbusiness_colors = webbusiness_get_colors();
	foreach ($webbusiness_colors as $color) {
//webbusiness_customizer_color("TopMenuBg", "Top Menu Bg", "");
		webbusiness_customizer_color($color, $color, "", $priority_counter);
		$priority_counter++;
	}
	$wp_customize->remove_control("link_color");
	$wp_customize->remove_control("background_color");
}

add_action('customize_register', 'webbusiness_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function webbusiness_customize_preview_js() {
	wp_enqueue_script('webbusiness_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130304', true);
}

add_action('customize_preview_init', 'webbusiness_customize_preview_js');
