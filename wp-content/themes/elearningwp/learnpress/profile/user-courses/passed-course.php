<div class="wrapper-finish-course">
	<div class="inner-course">
		<div class="wrapper-course-thumbnail">
			<?php do_action( 'thim_inner_course_thumbnail' ); ?>
		</div>

		<div class="item-list-center">
			<div class="course-title">
				<?php
				do_action( 'learn_press_before_passed_course_title' );
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				do_action( 'learn_press_after_passed_course_title' );
				?>
			</div>
		</div>
	</div>
</div>