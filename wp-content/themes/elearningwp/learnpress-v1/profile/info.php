<?php
/**
 * User Information
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
global $wp_query;

$tabs         = learn_press_user_profile_tabs( $user );
$current      = learn_press_get_current_profile_tab();
$profile_link = learn_press_get_page_link( 'profile' );
if ( !empty( $tabs ) && !empty( $tabs[$current] ) ) : ?>
	<div class="user-info" id="learn-press-user-info">
		<span class="user-avatar"><?php echo get_avatar( $user->ID, 270 ); ?></span>
		<div class="user-information">
			<h3><?php echo $user->user_nicename; ?></h3>
			<p><?php echo get_user_meta( $user->ID, 'description', true ); ?></p>
			<?php
			$user_social = get_the_author_meta( 'lp_info', $user->ID );
			echo '<a href="' . ( isset( $user_social['facebook'] ) ? $user_social['facebook'] : '#' ) . '"><i class="fa fa-facebook"></i></a>';
			echo '<a href="' . ( isset( $user_social['twitter'] ) ? $user_social['twitter'] : '#' ) . '"><i class="fa fa-twitter"></i></a>';
			echo '<a href="' . ( isset( $user_social['youtube'] ) ? $user_social['youtube'] : '#' ) . '"><i class="fa fa-youtube-play"></i></a>';
			echo '<a href="' . ( isset( $user_social['google'] ) ? $user_social['google'] : '#' ) . '"><i class="fa fa-google-plus"></i></a>';
			echo '<a href="' . ( isset( $user_social['linkedin'] ) ? $user_social['linkedin'] : '#' ) . '"><i class="fa fa-linkedin"></i></a>';
			?>
		</div>
	</div>
<?php endif; ?>
