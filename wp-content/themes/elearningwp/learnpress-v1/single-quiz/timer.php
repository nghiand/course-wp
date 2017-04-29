<?php
/**
 * Template for displaying the countdown timer
 *
 * @author  ThimPress
 * @package LearnPress
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$quiz = LP()->quiz;
$user = LP()->user;
if ( ! $quiz ) {
	return;
}
$remaining_time = $user->get_quiz_status() != 'started' ? $quiz->duration : $user->get_quiz_time_remaining( $quiz->id );
?>
<div class="quiz-clock">
	<div class="quiz-countdown quiz-timer <?php echo ! $user->get_quiz_status( $quiz->id ) ? ' ' : ''; ?> ">
		<p class="quiz-countdown-text">
			<span class="quiz-time-remaining-text"><?php esc_html_e( 'Time remaining', 'thim' ); ?></span>
		</p>

		<div id="quiz-countdown-value">
			<?php echo $remaining_time > 59 ? date( 'G:i:s', $remaining_time ) : date( 'i:s', $remaining_time ); ?>
		</div>
		<p class="quiz-countdown-label quiz-countdown-text">
			<?php
			echo apply_filters(
				'learn_press_quiz_time_label',
				$remaining_time > 59 ? sprintf( '<span class="quiz-time-remaining-label">%s/%s/%s</span>', __( 'hours', 'thim' ), __( 'mins', 'thim' ), __( 'secs', 'thim' ) ) : sprintf( '%s/%s', __( 'mins', 'thim' ), __( 'secs', 'thim' ) )
			);
			?>
		</p>
	</div>
</div>
