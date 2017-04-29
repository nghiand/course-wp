<?php
/**
 * Template for displaying the instructor of a course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $course;

?>
<div class="author" itemprop="creator">
	<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', get_the_ID() ), 32 ); ?></span>
	<?php echo __( 'Teacher:', 'thim' ); ?>
	<a href="<?php echo esc_url( learn_press_user_profile_link( $course->post->post_author ) ); ?>">
		<span><?php the_author(); ?></span>
	</a>
</div>