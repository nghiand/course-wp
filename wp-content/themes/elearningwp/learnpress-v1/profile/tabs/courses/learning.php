<?php
/**
 * User Courses enrolled
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

?>
<h3 class="profile-courses-heading profile-heading"><?php echo esc_html__( 'Learning Courses', 'thim' ); ?></h3>
<?php if ( $courses ) : ?>

	<div class="profile-courses">


		<?php foreach( $courses as $post ){ setup_postdata( $post );?>

			<?php learn_press_get_template( 'profile/tabs/courses/loop.php', array( 'subtab' => 'learning' ) ); ?>

		<?php } ?>
	</div>

<?php else: ?>

	<?php learn_press_display_message( __( 'You haven\'t got any learning courses!', 'thim' ), 'notice' ); ?>

<?php endif ?>

<?php wp_reset_postdata(); // do not forget to call this function here! ?>
