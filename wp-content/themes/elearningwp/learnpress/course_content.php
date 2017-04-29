<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
	<?php do_action( 'learn_press_before_course_header' ); ?>
	<div class="col-md-9">
		<header class="entry-header">
			<?php
			do_action( 'learn_press_before_single_the_title' );
			the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' );
			do_action( 'learn_press_after_single_the_title' );
			?>
		</header>
		<!-- .entry-header -->
		<?php do_action( 'learn_press_before_course_content' ); ?>
		<div class="entry-content">
			<?php
			do_action( 'learn_press_before_the_content' );
			if ( learn_press_is_enrolled_course() ) {
				learn_press_get_template_part( 'course_content', 'learning_page' );
			} else {
				learn_press_get_template_part( 'course_content', 'landing_page' );
			}
			do_action( 'learn_press_after_the_content' );
			?>
		</div>
		<!-- .entry-content -->
		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
	</div>
	<?php
	if ( learn_press_is_enrolled_course() ) {
		echo '<div id="learning-curriculum" class="col-md-3">';
		do_action( 'learn_press_course_learning_curriculum' );
		echo '</div>';
	} else {
		get_sidebar( 'courses' );
	}

	do_action( 'learn_press_before_course_footer' );
	?>
</article>
