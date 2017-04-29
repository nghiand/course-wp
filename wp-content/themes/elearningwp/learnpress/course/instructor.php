<?php
/**
 * Template for displaying the instructor of a course
 */

learn_press_prevent_access_directly();
do_action( 'learn_press_before_course_instructor' );
$itemprop = '';
if( is_single() ) {
	$itemprop = 'itemprop="creator"';
}
?>
	<div class="author" aria-hidden="true" <?php echo ent2ncr($itemprop); ?> >
		<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', get_the_ID() ), 32 ); ?></span>
		<?php echo apply_filters( 'before_instructor_link', __( 'Teacher: ', 'thim' ) );  ?>
		<a href="<?php echo apply_filters( 'learn_press_instructor_profile_link', '#', $user_id = null, get_the_ID() ); ?>" itemprop="url"><?php echo get_the_author(); ?></a>
	</div>
<?php
do_action( 'learn_press_after_course_instructor' );
