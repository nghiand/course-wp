<?php
/**
 * @author  ThimPress
 * @package LearnPress/Tempates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$current_user = wp_get_current_user();
?>
<?php do_action( 'learn_press_email_header', $email_heading ); ?>

	<p><?php printf( __( 'Dear <strong>%s</strong>', 'thim' ), $user_name ); ?></p>
	<p><?php printf( __( 'Unfortunately! The course you created (%s) isn\'t ready for sale now.', 'thim' ), $course_name ); ?></p>
	<p><?php printf( __( 'Please <a href="%s">login</a> and update your course to meet our minimum requirements for quality and/or our policies', 'thim' ), $login_url ); ?></p>
	<p><?php _e( 'Best regards,', 'thim' ); ?></p>
	<p><?php _e( '<em>Administration</em>', 'thim' ); ?></p>

<?php do_action( 'learn_press_email_footer', $footer_text ); ?>