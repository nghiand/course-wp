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
<?php echo "= " . $email_heading . " =\n\n";?>
<?php printf( __( 'Dear %s,', 'thim' ), $user_name ); echo "\n\n"; ?>
<?php printf( __( 'Unfortunately! The course you created (%s) isn\'t ready for sale now.', 'thim' ), $course_name ); echo "\n\n";?>
<?php printf( __( 'Please login %s and update your course to meet our minimum requirements for quality and/or our policies', 'thim' ), $login_url ); echo "\n\n";?>
<?php _e( 'Best regards,', 'thim' ); echo "\n\n"; ?>
<?php _e( 'Administration', 'thim' ); echo "\n\n";?>
<?php echo $footer_text . "\n\n";?>

