<?php
/**
 * User Courses own
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !user_can( $user->ID, 'edit_lp_courses' ) ){
	return;
}
global $post;

?>
	<h3 class="profile-courses-heading profile-heading"><?php echo esc_html__( 'Own Courses', 'thim' ); ?></h3>
<?php if ( $courses ) : ?>

	<div class="profile-courses">


		<?php foreach( $courses as $post ): ?>

			<?php learn_press_get_template( 'profile/tabs/courses/loop.php', array( 'subtab' => 'own' ) ); ?>

		<?php endforeach; ?>

	</div>

<?php else: ?>

	<?php learn_press_display_message( __( 'You haven\'t got any published courses yet!', 'thim' ) ); ?>

<?php endif ?>

<?php wp_reset_postdata(); // do not forget to call this function here! ?>