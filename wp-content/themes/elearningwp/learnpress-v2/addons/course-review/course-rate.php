<?php 
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$course_id       = get_the_ID();
$course_rate_res = learn_press_get_course_rate( $course_id, false );
$course_rate     = $course_rate_res['rated'];
$total           = $course_rate_res['total'];

?>

<div class="course-rate">
    <?php
    learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) );
    $text = sprintf( _n('%s rating', '%s ratings', $total, 'thim'), $total);
    ?>
    <p class="review-number">
        <?php do_action( 'learn_press_before_total_review_number' );?>
        <?php echo $text ; ?>
        <?php do_action( 'learn_press_after_total_review_number' );?>
    </p>
</div>