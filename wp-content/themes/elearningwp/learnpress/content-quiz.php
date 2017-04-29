<?php
/**
 * Template for displaying the content of single quiz
 */
?>

<?php do_action( 'learn_press_before_single_quiz' );?>

<div itemscope id="quiz-<?php the_ID(); ?>" <?php learn_press_quiz_class("row"); ?>>
    <?php do_action( 'learn_press_before_single_quiz_summary' );?>
    <div class="quiz-summary col-md-9" itemprop="description">
     <?php do_action( 'learn_press_single_quiz_summary' ); ?>
    </div>
    <?php do_action( 'learn_press_after_single_quiz_summary' );?>
</div>

<?php do_action( 'learn_press_after_single_quiz' );?>