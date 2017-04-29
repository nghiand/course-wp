<?php
/**
 * Template for displaying content of learning course
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'learn_press_before_content_learning' );?>

<div id="course-learning" class="course-learning-summary course-content">

	<div id="learn-press-course-lesson">
		<?php do_action( 'learn_press_course_content_lesson' ); ?>
		<?php do_action( 'learn_press_content_learning_summary' ); ?>
	</div>

</div>

<?php do_action( 'learn_press_after_content_learning' );?>
