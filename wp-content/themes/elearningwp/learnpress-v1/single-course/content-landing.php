<?php
/**
 * Template for displaying content of landing course
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'learn_press_before_content_landing' ); ?>

<div id="course-landing" class="course-landing-summary">

	<div class="row">
		<div class="col-md-8">
			<?php learn_press_course_price(); ?>
		</div>
		<div class="col-md-4">
			<div class="course-students">
				<span>
					<?php learn_press_course_students(); ?>
				</span>
				<div class="course-rating">
					<?php thim_course_ratings_count(); ?>
				</div>
			</div>
		</div>
	</div>
	<hr>

	<div id="learn-press-course-lesson">
		<?php //do_action( 'learn_press_course_content_lesson' ); ?>
		<?php do_action( 'learn_press_content_landing_summary' ); ?>
	</div>

</div>

<?php do_action( 'learn_press_after_content_landing' ); ?>

<div class="menu-scoll-landing">
	<div class="container">
		<div class="row">
			<ul class="tab-btns col-md-6 col-sm-12">
				<li>
					<a class="tab-btn" href="#landing-desc"><?php echo __( 'Description', 'thim' ) ?></a>
				</li>
				<li>
					<a class="tab-btn" href="#landing-curriculum"><?php echo __( 'Curriculum', 'thim' ) ?></a>
				</li>
			</ul>
			<div class="col-md-6">
				<?php do_action( 'learn_press_menu_course_landing' ); ?>
			</div>
		</div>
	</div>
</div>
