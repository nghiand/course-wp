<div class="inner-own-course">
	<?php
	do_action( 'learn_press_before_own_course_title' );
	the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	do_action( 'learn_press_after_own_course_title' );

	do_action( 'learn_press_before_own_course_price' );
	printf(
		'<p class="course-price"><span class="number">%s</span></p>',
		learn_press_get_course_price( get_the_ID() , true )
	);
	do_action( 'learn_press_after_own_course_price' );

	do_action( 'learn_press_before_student_enrolled' );
	printf(
		'<p class="student-enrolled"><span class="number">%d</span> %s</p>',
		learn_press_count_students_enrolled( get_the_ID() ),
		( learn_press_count_students_enrolled( get_the_ID() ) > 1 ? __( 'students enrolled', 'thim' ) : __( 'student enrolled', 'thim' ) )
	);
	do_action( 'learn_press_after_student_enrolled' );

	do_action( 'learn_press_before_student_passed' );
	printf(
		'<p class="student-passed"><span class="number">%d</span> %s</p>',
		learn_press_count_students_passed( get_the_ID() ),
		( learn_press_count_students_passed( get_the_ID() ) > 1 ? __( 'students passed', 'thim' ) : __( 'student passed', 'thim' ) )
	);
	do_action( 'learn_press_after_student_passed' );
	?>
</div>