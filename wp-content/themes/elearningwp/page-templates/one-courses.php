<?php
/**
 * Template Name: One Courses
 *
 **/
get_header(); ?>
	<div id="main-content" class="home-content home-page container" role="main">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			the_content();
			$course_id = get_post_meta( get_the_ID(), 'thim_id_course', true );
		endwhile;
		?>

	</div><!-- #main-content -->
<?php
// show single courses
$rated = learn_press_get_course_rate( $course_id );
$price = learn_press_get_course_price( $course_id, true );
$curriculum = learn_press_get_course_curriculum( $course_id );
$reviews    = learn_press_get_course_review( $course_id );
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

					<div class="review-stars-rated">
						<div class="review-stars thim-review">
							<span style="width:<?php echo esc_attr( $rated ) * 20; ?>%;"></span>
						</div>
					</div>
				</div>
				<div class="row-item">
					<label><?php _e( 'Pricing course', 'thim' ) ?></label>

					<div class="courses-price"><?php echo ent2ncr( $price ); ?> </div>
				</div>
				<div class="row-item">
					<label><?php _e( 'Number of students', 'thim' ) ?></label>

					<div class="number-students">
						<?php if ( $count = learn_press_count_students_enrolled( $course_id ) ): ?>
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

					</div>
				</div>

			</div>
		</div>
	</div>
	<div id="course-landing" class="one-courses-page">
		<div class="course-curriculum" id="landing-curriculum">
			<div class="container">
				<h3 class="course-curriculum-title"><?php _e( 'Course Curriculum', 'thim' ) ?></h3>
				<?php if ( $curriculum ): ?>
					<ul class="curriculum-sections">
						<?php foreach ( $curriculum as $course_part ) : ?>
							<?php learn_press_get_template( 'course/loop-curriculum.php', array( 'curriculum_course' => $course_part ) ); ?>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<?php _e( 'Curriculum is empty', 'thim' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php

get_footer();

