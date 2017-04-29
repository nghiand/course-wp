<?php
/**
 * User Courses enrolled
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$course_item   = LP_Course::get_course( $post->ID );
$is_required   = $course_item->is_required_enroll();
$count_student = $course_item->count_users_enrolled( 'append' ) ? $course_item->count_users_enrolled( 'append' ) : 0;
$course_rate   = learn_press_get_course_rate( $post->ID );
$total         = learn_press_get_course_rate_total( $post->ID );

?>

<div class="inner-course">
	<div class="profile-course-thumbnail">
		<?php
		if ( has_post_thumbnail( $post->ID ) ) {
			echo '<a href="' . get_the_permalink( $post->ID ) . '">';
			echo get_the_post_thumbnail( $post->ID, 'medium' );
			echo '</a>';
		} ?>
	</div>
	<div class="profile-course-content">
		<div class="course-title">
			<div class="author">
				<span class="avatar"><?php echo get_avatar( $post->post_author, 32 ); ?></span>
				<?php echo __( 'Teacher:', 'thim' ); ?>
				<a href="<?php echo esc_url( learn_press_user_profile_link( $post->post_author ) ); ?>">
					<?php the_author(); ?>
				</a>
			</div>
			<div class="course-rate">
				<?php
				learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) );
				$text = sprintf( _n( '%s rating', '%s ratings', $total, 'thim' ), $total );
				?>
			</div>
			<h2 class="entry-title">
				<a href="<?php echo get_the_permalink( $post->ID ); ?>">
					<?php echo get_the_title( $post->ID ); ?>
				</a>
			</h2>
		</div>
	</div>

</div>