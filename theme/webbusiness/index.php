<?php
/**
 * The main template file.
 *
 * @package webbusiness
 */

get_header(); ?>

<div class="inner clearfix">
	<?php get_template_part('above-content'); ?>
   <div class="cols">
	<div id="primary-content" class="content-area col2-3">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php webbusiness_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
   </div>
</div>
<?php get_footer(); ?>