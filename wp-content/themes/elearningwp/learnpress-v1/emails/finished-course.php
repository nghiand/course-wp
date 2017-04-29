<?php
/**
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */
?>
<?php do_action( 'learn_press_email_header', $email_heading ); ?>

<p><?php printf( __( 'You have been finished course <a href="%s">%s</a>.', 'thim' ), get_the_permalink( $course_id ), get_the_title( $course_id ) ); ?>
<p><?php printf( __( 'Please <a href="%s">login</a> and view your course results.', 'thim' ), $login_url ); ?></p>
<p><?php printf( __( 'Best regards,', 'thim' ) ); ?></p>
<p><?php printf( __( 'Administration', 'thim' ) ); ?></p>

<?php do_action( 'learn_press_email_footer', $footer_text ); ?>