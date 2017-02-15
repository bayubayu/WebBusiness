<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package webbusiness
 */

get_header(); ?>

<div class="inner clearfix">
   <div class="cols">
	<div id="primary-content" class="content-area col2-3">
		<div id="content" class="site-content" role="main">
			<header class="entry-header">
				<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'webbusiness' ); ?></h1>
			</header><!-- .entry-header -->

			<article class="page">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'webbusiness' ); ?></p>

				<?php get_search_form(); ?>
			</article><!-- .entry-content -->
		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php get_sidebar(); ?>
	
   </div>
</div>
	
<?php get_footer(); ?>