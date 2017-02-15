<?php
/** 
 * The template for displaying marketing boxes widget area 
 * 
 * @package webbusiness
 */
?>			

			<?php if( get_theme_mod( 'hide_marketing' ) != '1' && is_front_page()) { ?>
			<style type="text/css">
				<?php if (get_theme_mod('marketing_icon1')) { ?>
				#featured-services .marketing1 p.description { background-image:url(<?php echo get_theme_mod( 'marketing_icon1'); ?>); }
				<?php } ?>
				<?php if (get_theme_mod('marketing_icon2')) { ?>
				#featured-services .marketing2 p.description { background-image:url(<?php echo get_theme_mod( 'marketing_icon2'); ?>); }
				<?php } ?>
				<?php if (get_theme_mod('marketing_icon3')) { ?>
				#featured-services .marketing3 p.description { background-image:url(<?php echo get_theme_mod( 'marketing_icon3'); ?>); }
				<?php } ?>
			</style>
			<div id="featured-services">
			<ul class="cols">
				<li class="col1-3 marketing1">
						<h3><?php echo webbusiness_get_theme_mod( 'marketing_title1'); ?></h3>
						<p class="description">
							<?php echo webbusiness_get_theme_mod( 'marketing_description1'); ?>
						</p>
						<p class="act">
							<?php echo webbusiness_get_theme_mod( 'marketing_action_text1'); ?>
							<a title="<?php echo webbusiness_get_theme_mod( 'marketing_button_link_title1'); ?>" href="<?php echo webbusiness_get_theme_mod( 'marketing_button_link1'); ?>"><?php echo webbusiness_get_theme_mod( 'marketing_button_text1'); ?></a>
						</p>
					
				</li>
				<li class="col1-3 marketing2">
						<h3><?php echo webbusiness_get_theme_mod( 'marketing_title2'); ?></h3>
						<p class="description">
							<?php echo webbusiness_get_theme_mod( 'marketing_description2'); ?>
						</p>
						<p class="act">
							<?php echo webbusiness_get_theme_mod( 'marketing_action_text2'); ?>
							<a title="<?php echo webbusiness_get_theme_mod( 'marketing_button_link_title2'); ?>" href="<?php echo webbusiness_get_theme_mod( 'marketing_button_link2'); ?>"><?php echo webbusiness_get_theme_mod( 'marketing_button_text2'); ?></a>
						</p>
					
				</li>
				<li class="col1-3 marketing3">
						<h3><?php echo webbusiness_get_theme_mod( 'marketing_title3'); ?></h3>
						<p class="description">
							<?php echo webbusiness_get_theme_mod( 'marketing_description3'); ?>
						</p>
						<p class="act">
							<?php echo webbusiness_get_theme_mod( 'marketing_action_text3'); ?>
							<a title="<?php echo webbusiness_get_theme_mod( 'marketing_button_link_title3'); ?>" href="<?php echo webbusiness_get_theme_mod( 'marketing_button_link3'); ?>"><?php echo webbusiness_get_theme_mod( 'marketing_button_text3'); ?></a>
						</p>
					
				</li>
			</ul>
			</div>
			<?php } // end if ?>
