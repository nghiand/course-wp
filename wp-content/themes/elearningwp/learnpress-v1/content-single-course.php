<?php
/**
 * The template for display the content of single course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $course;

$is_required = $course->is_required_enroll();
$user        = LP()->user;
$is_enrolled = $user->has( 'enrolled-course', $course->id );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">

	<?php do_action( 'learn_press_before_single_course_summary' ); ?>
	<div class="col-md-9">
		<header class="entry-header">
			<?php learn_press_course_title();	?>
			<?php learn_press_course_instructor(); ?>
		</header>

		<div class="entry-content course-summary">

			<?php if ( $is_enrolled || !$is_required ) { ?>

				<?php learn_press_get_template( 'single-course/content-learning.php' ); ?>

			<?php } else { ?>

				<?php learn_press_get_template( 'single-course/content-landing.php' ); ?>

			<?php } ?>

		</div>
	</div>

	<?php do_action( 'learn_press_after_single_course_summary' ); ?>

	<?php
	if ( $is_enrolled || !$is_required ) {
		echo '<div id="learning-curriculum" class="curriculum-sidebar col-md-3">';
		do_action( 'learn_press_course_learning_curriculum' );
		echo '</div>';
	} else {
		get_sidebar( 'courses' );
	}
	?>
	<?php do_action( 'learn_press_before_course_footer' ); ?>

</article><!-- #post-## -->

