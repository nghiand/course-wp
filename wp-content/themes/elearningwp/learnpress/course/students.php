<?php
/**
 * Template for displaying the students of a course
 */
learn_press_prevent_access_directly();
?>
<?php do_action( 'learn_press_before_course_students' ); ?>
<span class="course-students">
    <?php do_action( 'learn_press_begin_course_students' ); ?>
	<span>
    <?php if ( $count = learn_press_count_students_enrolled() ): ?>
	    <?php if ( strtolower( learn_press_get_user_course_status() ) == 'completed' ): ?>
		    <?php if ( $count == 1 ): ?>
			    <?php _e( '0 student', 'thim' ); ?>
		    <?php else: ?>
			    <?php printf( _nx( '1 student', '%1$s students', intval( $count - 1 ), '', 'thim' ), $count - 1 ); ?>
		    <?php endif; ?>
	    <?php else: ?>
		    <?php printf( _nx( '1 student', '%1$s students', $count, '', 'thim' ), $count ); ?>
	    <?php endif; ?>
    <?php else: ?>
	    <?php _e( '0 student', 'thim' ); ?>
    <?php endif; ?>
	</span>
	<?php do_action( 'learn_press_end_course_students' ); ?>
</span>
<?php do_action( 'learn_press_after_course_students' ); ?>
