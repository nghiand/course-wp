<?php
/**
 * Template Name: One Courses LP1.x
 *
 **/
get_header(); ?>
	<div id="main-content" class="home-content home-page container" role="main">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			the_content();
			$course_id = get_post_meta( get_the_ID(), 'thim_id_course_v1', true );
		endwhile;
		?>

	</div><!-- #main-content -->
<?php
// show single courses

$course_rate = learn_press_get_course_rate( $course_id );
$total       = learn_press_get_course_rate_total( $course_id );

$course_item   = LP_Course::get_course( $course_id );
$is_required   = $course_item->is_required_enroll();
$count_student = $course_item->count_users_enrolled( 'append' ) ? $course_item->count_users_enrolled( 'append' ) : 0;

$course = $course_item;
LP()->set_object('course', $course, true);



$curriculum = $course_item->get_curriculum();

?>

	<div class="one-courses-page-content container">
		<div class="row">
			<div class="wrapper-course-thumbnail col-sm-4">
				<a class="course-thumbnail" href="<?php echo get_the_permalink( $course_id ) ?>" aria-hidden="true">
					<?php echo get_the_post_thumbnail( $course_id, 'large' ); ?>
				</a>
			</div>
			<div class="col-sm-8">
				<div class="row-item">
					<label><?php _e( 'Rating this course', 'thim' ) ?></label>

					<div class="course-rating">
						<div class="course-rate">
							<?php
							learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) );
							$text = sprintf( _n( '%s rating', '%s ratings', $total, 'thim' ), $total );
							?>
						</div>
					</div>
				</div>
				<div class="row-item">
					<label><?php _e( 'Pricing course', 'thim' ) ?></label>

					<div class="course-price">
						<?php if ( $course_item->is_free() || ! $is_required ) : ?>
							<?php esc_html_e( 'Free', 'thim' ); ?>
						<?php else: $price = learn_press_format_price( $course_item->get_price(), true ); ?>
							<?php echo esc_html( $price ); ?>
						<?php endif; ?>
						<meta itemprop="priceCurrency" content="<?php echo learn_press_get_currency_symbol(); ?>" />
					</div>
				</div>
				<div class="row-item">
					<label><?php _e( 'Number of students', 'thim' ) ?></label>

					<div class="number-students">
						<?php
						if ( $count_student > 1 ) {
							echo $count_student . ' ' . __( 'students', 'thim' );
						} else {
							echo $count_student . ' ' . __( 'student', 'thim' );
						};
						?>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="course-landing" class="one-courses-page">

			<div class="container">
				<div id="learn-press-course-lesson">
					<div class="course-curriculum" id="learn-press-course-curriculum">
						<h3 class="course-curriculum-title"><?php _e( 'Course Curriculum', 'thim' ) ?></h3>
						<?php if ( $curriculum ): ?>
							<ul class="curriculum-sections">

								<?php foreach ( $curriculum as $section ) : ?>

									<?php learn_press_get_template( 'single-course/loop-section.php', array( 'section' => $section ) ); ?>

								<?php endforeach; ?>
							</ul>

						<?php else: ?>
							<?php _e( 'Curriculum is empty', 'thim' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>

	</div>

<?php

get_footer();
