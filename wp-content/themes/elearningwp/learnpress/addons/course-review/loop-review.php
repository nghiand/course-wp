<li>
	<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', $review->ID ), 90 ); ?></span>

	<div class="review-right">
		<div class="user-name">
			<?php do_action( 'learn_press_before_review_username' ); ?>
			<i class="fa fa-user"></i><?php echo esc_attr($review->display_name ); ?>
			<?php do_action( 'learn_press_after_review_username' ); ?>
			<?php learn_press_get_template( 'addons/course-review/rating-stars.php', array( 'rated' => $review->rate ) ); ?>
		</div>
 		<div class="review-content">
			<?php do_action( 'learn_press_before_review_title' ); ?>
			<?php echo '<h6>' . $review->title . '</h6>' ?>
			<?php do_action( 'learn_press_after_review_title' ); ?>
			<?php do_action( 'learn_press_before_review_content' ); ?>
			<?php echo esc_attr($review->content) ?>
			<?php do_action( 'learn_press_after_review_content' ); ?>
		</div>
	</div>

</li>