<?php
/**
 * @author        ThimPress
 * @package       LearnPress/Templates
 * @version       1.0
 */

defined( 'ABSPATH' ) || exit();
global $post;
$result = $user->get_quiz_results( $post->ID );

//var_dump($result);
?>
<div class="learn-press-quiz-result quiz-result <?php echo sanitize_title($result->status);?>">
	<div class="quiz-title">
	<a href="<?php echo get_permalink( $post->ID ) ?>" class="quiz-title"><?php echo get_the_title( $post->ID ); ?></a>
	</div>
	<div class="quiz-result-mark">
		<span class="quiz-mark"><?php printf( '%d/%d', $result->results['mark'], count($result->results['questions']) ); ?></span>
		<small><?php esc_html_e('points', 'thim'); ?></small>
	</div>

	<div class="quiz-result-summary">
		<div class="quiz-result-field correct">
			<label><?php esc_html_e('Correct', 'thim'); ?></label>
			<?php echo esc_html( $result->results['correct'] ); ?>
		</div>
		<div class="quiz-result-field wrong">
			<label><?php esc_html_e('Wrong', 'thim'); ?></label>
			<?php echo esc_html( $result->results['wrong'] ); ?>
		</div>
		<div class="quiz-result-field empty">
			<label><?php esc_html_e('Empty', 'thim'); ?></label>
			<?php echo esc_html( $result->results['empty'] ); ?>
		</div>
		<div class="quiz-result-field time">
			<label><?php esc_html_e('Time', 'thim'); ?></label>
			<?php echo learn_press_seconds_to_time( $result->results['user_time'] ); ?>
		</div>
	</div>
</div>
