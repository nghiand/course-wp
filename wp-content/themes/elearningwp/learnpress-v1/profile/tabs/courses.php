<?php
/**
 * User Courses tab
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$subtabs = array(
	'learning'  => __( 'Learning', 'thim' ),
	'purchased' => __( 'Purchased', 'thim' ),
	'finished'  => __( 'Finished', 'thim' ),
	'own'       => __( 'Own', 'thim' )
);
$subtabs = apply_filters( 'learn_press_profile_tab_courses_subtabs', $subtabs );
if ( ! $subtabs ) {
	return;
}
?>
<?php foreach ( $subtabs as $subid => $subtitle ) { ?>
	<div class="user-courses-content">
		<?php do_action( 'learn_press_profile_tab_courses_' . $subid, $user, $subid ); ?>
	</div>
<?php } ?>