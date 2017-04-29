<?php
/**
 * Template for displaying course content within the loop
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $course;
//var_dump($course);
?>

<div class="author" itemprop="creator">
	<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', $course->post->ID ), 32 ); ?></span>
	<?php echo __( 'Teacher:', 'thim' ); ?>
	<a href="<?php echo esc_url( learn_press_user_profile_link( $course->post->post_author ) ); ?>">
		<span><?php the_author(); ?></span>
	</a>
</div>