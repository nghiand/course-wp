<?php
global $theme_options_data;
$column_product = 3;
if ( isset( $theme_options_data['thim_learnpress_cate_grid_column'] ) && $theme_options_data['thim_learnpress_cate_grid_column'] <> '' ) {
	$column_product = 12 / $theme_options_data['thim_learnpress_cate_grid_column'];
}

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$classes   = array();
$classes[] = 'col-md-' . $column_product . ' col-sm-6 col-xs-6 lpr-course';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?> itemprop="itemListElement">

	<div class="inner-course">
		<?php do_action( 'learn_press_before_course_header' ); ?>

		<div class="wrapper-course-thumbnail">
			<?php do_action( 'learn_press_before_courses_loop_item' ); ?>
			<div class="course-time">
				<span class="course-month"><?php the_time( 'M' ); ?></span>
				<span class="course-day"><?php the_time( 'd' ); ?></span>
				<span class="course-year"><?php the_time( 'Y' ); ?></span>
			</div>
		</div>
		<div class="item-list-center">
			<div class="course-title">
				<?php
				do_action( 'learn_press_courses_loop_item_title' );
				?>
			</div>
			<?php do_action( 'learn_press_after_courses_loop_item' ); ?>
			<div class="course-students">
				<span>
					<?php learn_press_courses_loop_item_students(); ?>
				</span>
				<div class="course-rating">
					<?php thim_course_ratings_count(); ?>
				</div>
			</div>
		</div>

		<div class="course-excerpt" itemprop="description">
			<?php
			echo '<h6>' . __( 'Introduce about course:', 'thim' ) . '</h6>';
			the_excerpt();
			?>
		</div>
		<!-- .entry-content -->
	</div>
</article>