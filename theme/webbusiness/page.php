<?php
/**
 * The template for displaying all pages.
 *
 * @package webbusiness
 */
get_header();
?>
<?php /*get_template_part('banners');*/ ?>

<div class="inner clearfix">
	<?php /*get_template_part('marketing');*/ ?>
	<?php get_template_part('above-content'); ?>
	<div class="cols">
		<div id="primary-content" class="content-area col2-3">
			<div id="content" class="site-content" role="main">
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('content', 'page'); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if (comments_open() || '0' != get_comments_number())
						comments_template();
					?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>	   

</div>
<?php get_footer(); ?>
