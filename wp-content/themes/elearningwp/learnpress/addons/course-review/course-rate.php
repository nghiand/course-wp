<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course_id   = get_the_ID();
$course_rate = learn_press_get_course_rate( $course_id );
$total       = learn_press_get_course_rate_total( $course_id );
?>
<div class="course-rate">
	<div class="review-stars-rated">
		<div class="review-stars thim-review">
			<span style="width:<?php echo esc_attr($course_rate) * 20; ?>%;"></span>
		</div>
	</div>
	<?php
	$text = ' ratings';
	if ( $total <= 1 ) {
		$text = ' rating';
	}
	?>
	<p class="review-number"><?php echo ent2ncr($total . $text); ?></p>
</div>