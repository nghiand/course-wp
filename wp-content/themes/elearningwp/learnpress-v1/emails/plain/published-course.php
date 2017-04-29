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
<?php echo "=" . $email_heading . "=\n\n";?>
<?php printf( __( 'Dear %s', 'thim' ), $user_name ); echo "\n\n"; ?>
<?php printf( __( 'Congratulation! The course you created (%s) is available now.', 'thim' ), get_the_title( $course_id ) ); echo "\n\n"; ?>
<?php printf( __( 'Click %s to view your course.', 'thim' ), get_the_permalink( $course_id ) ); echo "\n\n"; ?>
<?php _e( 'Best regards,', 'thim' ); echo "\n\n"; ?>
<?php _e( 'Administration', 'thim' ); echo "\n\n"; ?>
<?php echo $footer_text;?>