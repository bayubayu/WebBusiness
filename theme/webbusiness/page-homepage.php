<?php
/**
 * The template for displaying homepage.
 *
 * @package webbusiness
 * 
 * Template Name: Homepage
 */
get_header();
?>
<?php get_template_part('banners'); ?>

<div class="inner clearfix">
	<?php get_template_part('marketing'); ?>
	<?php get_template_part('above-content'); ?>
	<div class="cols">
		<div id="primary-content" class="content-area col2-3">
			<div class="ngcols clearfix">
				<div class=" ngcol1-2">
			<div id="content" class="site-content block-left" role="main">
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('content', 'page'); ?>


				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
				</div>
			<div class="ngcol1-2">
				<div class="block-right widget-area">
				<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
			</div>
			</div>
			</div>
			<div class="widget-area clearfix">
				<?php dynamic_sidebar( 'sidebar-homepage-bottom' ); ?>
			</div>	
			
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>	   

</div>

<?php get_footer(); ?>
