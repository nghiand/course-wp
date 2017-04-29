<div class="inner-course">

	<div class="wrapper-course-thumbnail">
		<?php do_action( 'thim_inner_course_thumbnail' ); ?>
		<div class="course-time">
			<span class="course-month"><?php the_time( 'M' ); ?></span>
			<span class="course-day"><?php the_time( 'd' ); ?></span>
			<span class="course-year"><?php the_time( 'Y' ); ?></span>
		</div>
	</div>

	<div class="item-list-center">
		<div class="course-title">
			<?php
			do_action( 'learn_press_before_enrolled_course_title' );
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			do_action( 'learn_press_after_enrolled_course_title' );
			?>
		</div>
		<div class="course-excerpt">
			<?php
			do_action( 'learn_press_before_enrolled_course_content' );
			echo '<h6>' . __( 'Introduce about course:', 'thim' ) . '</h6>';
			the_excerpt();
			do_action( 'learn_press_after_enrolled_course_content' );
			?>
		</div>
	</div>
</div>