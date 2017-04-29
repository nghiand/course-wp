<?php
learn_press_prevent_access_directly();
?>
<?php do_action( 'learn_press_content_quiz_before_title_element' ); ?>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<div class="quiz-top-meta">
	<div class="course-instructor">
		<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', get_the_ID() ), 32 ); ?></span>
		<?php echo __( 'Teacher:', 'thim' ); ?>
		<a href="<?php echo apply_filters( 'learn_press_instructor_profile_link', '#', $user_id = null, get_the_ID() ); ?>">
			<span><?php the_author(); ?></span>
		</a>
	</div>
	<div class="forum-link">
		<a href="#">
			<?php echo __( 'Discuss in forum','thim' ); ?>
			<i class="fa fa-angle-double-right"></i>
		</a>
	</div>
</div>
<?php do_action( 'learn_press_content_quiz_after_title_element' ); ?>
