<?php
// All enrolled courses
do_action( 'learn_press_before_all_courses' );
echo '<div class="user-courses-content">';
echo '<div class="learning-courses">';
echo '<h3 class="profile-heading">' . __( 'Learning courses', 'thim' ) . '</h3>';
do_action( 'learn_press_before_enrolled_course' );
$my_query = learn_press_get_enrolled_courses( $user->ID );
if ( $my_query->have_posts() ) :
	while ( $my_query->have_posts() ) : $my_query->the_post();
		learn_press_get_template( 'profile/user-courses/enrolled-course.php' );
	endwhile;
else :
	do_action( 'learn_press_before_no_enrolled_course' );
	echo '<p>' . __( 'You have not taken any courses yet!', 'thim' ) . '</p>';
	do_action( 'learn_press_after_no_enrolled_course' );
endif;
do_action( 'learn_press_after_enrolled_course' );
wp_reset_postdata();
echo '</div>';
echo '<hr>';

// All passed courses
echo '<div class="finished-courses">';
echo '<h3 class="profile-heading">' . __( 'Finished courses', 'thim' ) . '</h3>';

do_action( 'learn_press_before_passed_course' );
$my_query = learn_press_get_passed_courses( $user->ID );
echo '<div class="finished-courses-wrapper">';
if ( $my_query->have_posts() ) :
	while ( $my_query->have_posts() ) : $my_query->the_post();
		learn_press_get_template( 'profile/user-courses/passed-course.php' );
	endwhile;
else :
	do_action( 'learn_press_before_no_passed_course' );
	echo '<p>' . __( 'You have not finished any courses yet!', 'thim' ) . '</p>';
	do_action( 'learn_press_after_no_passed_course' );
endif;
echo '</div>';

do_action( 'learn_press_after_passed_course' );
wp_reset_postdata();
echo '</div>';
echo '<hr>';
// All own courses

if ( user_can( $user->ID, 'edit_lpr_courses' ) ) {
	echo '<div class="own-courses">';
	echo '<h3 class="profile-heading">' . __( 'Own courses', 'thim' ) . '</h3>';
	do_action( 'learn_press_before_own_course' );
	echo '<div class="own-courses-wrapper">';
	$my_query = learn_press_get_own_courses( $user->ID );
	if ( $my_query->have_posts() ) :
		while ( $my_query->have_posts() ) : $my_query->the_post();
			learn_press_get_template( 'profile/user-courses/own-course.php' );
		endwhile;
	else :
		do_action( 'learn_press_before_no_own_course' );
		echo '<p>' . __( 'You don\'t have got any published courses yet!', 'thim' ) . '</p>';
		do_action( 'learn_press_after_no_own_course' );
	endif;
	echo '</div>';
	do_action( 'learn_press_after_own_course' );
	wp_reset_postdata();
	echo '</div>';

};
echo '</div>';
do_action( 'learn_press_after_all_courses' );
