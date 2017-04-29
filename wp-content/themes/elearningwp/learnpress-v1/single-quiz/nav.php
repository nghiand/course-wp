<?php
/**
 * Template for displaying the questions navigation
 *
 * @author  ThimPress
 * @package LearnPress
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$quiz = LP()->quiz;

if ( !$quiz || !$quiz->has( 'questions' ) ) {
	return;
}

$status = LP()->user->get_quiz_status( $quiz->id );

?>

<?php if ( $status != 'completed' ) { ?>

	<div class="quiz-question-nav-buttons">

		<button type="button" data-nav="prev" class="prev-question btn hide-if-js">
			<?php echo apply_filters( 'learn_press_button_back_question_text', __( 'Back', 'thim' ) ); ?>
		</button>

		<button type="button" data-nav="next" class="next-question btn hide-if-js">
			<?php echo apply_filters( 'learn_press_quiz_question_nav_button_next_text', __( 'Next', 'thim' ) ); ?>
		</button>

		<?php if ( $quiz->show_hint == 'yes' ): ?>
			<button type="button" data-nav="hint" class="hint-question btn hide-if-js">
				<?php echo apply_filters( 'learn_press_button_hint_question_text', __( 'Hint', 'thim' ) ); ?>
			</button>
		<?php endif; ?>

		<?php if ( $quiz->show_explanation == 'yes' ): ?>
			<button type="button" data-nav="explanation" class="explain-question btn hide-if-js">
				<?php echo apply_filters( 'learn_press_button_explain_question_text', __( 'Explain', 'thim' ) ); ?>
			</button>
		<?php endif; ?>

		<?php if ( $quiz->show_check_answer == 'yes' ): ?>
			<button type="button" data-nav="check" class="check-question btn hide-if-js">
				<?php echo apply_filters( 'learn_press_button_check_question_text', __( 'Check', 'thim' ) ); ?>
			</button>
		<?php endif; ?>

	</div>

<?php } ?>