<?php
/** 
 * The template for displaying banners 
 * 
 * @package webbusiness
 */
?>			
<?php if (get_theme_mod('hide_banners') != '1' && is_front_page()) { ?>
	<div id="banner">
		<div class="inner">
			<div class="slideshow">
				<?php
				$banners = array();
				
				$banner_count = 6;
				$valid_banner_count = 0;
				for ($i = 1; $i<=$banner_count; $i++) {
					$banner = array(
						'img' => get_theme_mod('banner'.$i),
						'link' => get_theme_mod('banner'.$i.'_link'),
						'description' => get_theme_mod('banner'.$i.'_description'),						
					);
					if ($banner['img']) {
						$valid_banner_count++;
					}
					array_push($banners, $banner);
				}
				
				foreach($banners as $key=>$value) {
					//echo 'image = '.$value['img'];
					$placeholder = '';
					$link_title = '';
					$img_alt = '';
					if ($value['img']) {
						$link_open = '';
						$link_close = '';
						if ($value['link']) { 
							if ($value['description']){
								$link_title = 'title="'.$value['description'].'"';
								$img_alt = ' alt="'.$value['description'].'"';
							}
							$link_open = '<a href="'.$value['link'].'" '.$link_title.'>';
							$link_close = '</a>';
						} 
							if ($key == 0 && $valid_banner_count > 1) {
								$placeholder = '<img src="'.$value['img'].'" class="placeholder" />';
							}
						echo $placeholder.$link_open.'<img src="'.$value['img'].'" '.$img_alt.'/>'.$link_close;
						
					}
				}
				
				?>
			</div>
			<?php if (get_theme_mod('hide_banners_pager') != '1' && $valid_banner_count > 1 ) { ?>
			<div id="banner-pager" class="bullets"></div>
			<?php } ?>
			<?php if (get_theme_mod('hide_banners_prev_next') != '1' && $valid_banner_count > 1 ) { ?>
			<div id="banner-prev"><a href="#">&nbsp;</a></div>
			<div id="banner-next"><a href="#">&nbsp;</a></div>
			<?php } ?>
		</div>
	</div>
<?php } // end if ?>
