<?php
/**
 * Template Name: No footer template
 *
 **/
get_header();?>
	<div id="main-content" class="home-content home-page container" role="main">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
		?>
	</div><!-- #main-content -->
 <?php wp_footer(); ?>
