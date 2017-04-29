<?php do_action( 'learn_press_quiz_questions_begin_questions_loop' ); ?>
<li class="qq sibdebar-quiz-question-<?php echo esc_attr( $question_id ); ?><?php echo esc_attr( $current ) ? ' current' : ''; ?>">
	<?php do_action( 'learn_press_quiz_questions_before_question_title_element' ); ?>
	<?php
	$class = 'unanswered';
	$icon  = 'fa fa-square-o';
	if ( lpr_check_is_question_answered( get_the_id(), $question_id ) ) {
		$class = 'answered';
		$icon  = 'fa fa-check-square-o';
	}
	?>
	<h5 class="list-quiz-question <?php echo esc_attr( $class ); ?>" question-id="<?php echo esc_attr( $question_id ); ?>" question-index="<?php echo esc_attr( $index ); ?>">
		<i class="<?php echo esc_attr( $icon ); ?>"></i>
		<?php do_action( 'learn_press_quiz_questions_begin_questions_title_element' ); ?>
		<?php echo esc_attr( $question_title ); ?>
		<hr>
		<?php do_action( 'learn_press_quiz_questions_end_questions_title_element' ); ?>
	</h5>
	<?php do_action( 'learn_press_quiz_questions_after_question_title_element', $question_id ); ?>
</li>
<?php do_action( 'learn_press_quiz_questions_end_questions_loop' ); ?>
