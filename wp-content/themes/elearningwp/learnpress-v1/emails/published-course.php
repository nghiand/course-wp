<?php
/**
 * @author  ThimPress
 * @package LearnPress/Classes
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php do_action( 'learn_press_email_header', $email_heading ); ?>

<p><?php printf( __( 'Dear <strong>%s</strong>', 'thim' ), $user_name );?></p>
<p><?php printf( __( 'Congratulation! The course you created (< a href="%s">%s</a>) is available now.', 'thim' ), get_the_permalink( $course_id ), get_the_title( $course_id ) );?></p>
<p><?php _e( 'Best regards,', 'thim' );?></p>
<p><?php _e( '<em>Administration</em>', 'thim' );?></p>

<?php do_action( 'learn_press_email_footer', $footer_text ); ?>