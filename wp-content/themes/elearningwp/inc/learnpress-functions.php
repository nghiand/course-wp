<?php

/**
 * Create ajax handle for courses searching
 */
function courses_searching_callback() {
	ob_start();
	$keyword = $_REQUEST['keyword'];
	if ( $keyword ) {
		$keyword   = strtoupper( $keyword );
		$arr_query = array(
			'post_type'           => 'lpr_course',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			's'                   => $keyword
		);
		$search    = new WP_Query( $arr_query );

		$newdata = array();
		foreach ( $search->posts as $post ) {
			$newdata[] = array(
				'id'    => $post->ID,
				'title' => $post->post_title,
				'guid'  => get_permalink( $post->ID ),
			);
		}

		ob_end_clean();
		if ( count( $search->posts ) ) {
			echo json_encode( $newdata );
		} else {
			$newdata[] = array(
				'id'    => '',
				'title' => __( 'No course found', 'thim' ),
				'guid'  => '#',
			);
			echo json_encode( $newdata );
		}
	}
	die();
}

add_action( 'wp_ajax_nopriv_courses_searching', 'courses_searching_callback' );
add_action( 'wp_ajax_courses_searching', 'courses_searching_callback' );

function thim_breadcrumb_for_learn_press( $breadcrumb, $start, $middle, $end, $separator ) {
	if ( get_post_type() === 'lpr_course' ) {
		if ( is_archive() ) {
			$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current">' . __( 'Courses', 'thim' ) . '</strong></li>';
		}
		if ( is_single() ) {
			$middle = '<li class="item-courses" itemprop="itemListElement"><a class="bread-courses" href="' . get_post_type_archive_link( 'lpr_course' ) . '">' . __( 'Courses', 'thim' ) . '</a></li>';
			$middle .= $separator;
		}
	}
	$breadcrumb = $start . $middle . $end . '</ul>';

	return $breadcrumb;
}

add_filter( 'thim_get_breadcrumb', 'thim_breadcrumb_for_learn_press', 10, 5 );


if ( !function_exists( 'learnpress_page_title' ) ) {
	function learnpress_page_title() {
		if ( get_post_type() == "lpr_course" ) {
			if ( is_tax() ) {
				echo single_term_title( "", false );
			} else {
				echo __( 'Courses', 'thim' );
			}
		}
		if ( get_post_type() == "lpr_quiz" ) {
			if ( is_tax() ) {
				echo single_term_title( "", false );
			} else {
				echo __( 'Quiz', 'thim' );
			}
		}
	}
}
function thim_filter_courses( $where ) {
	global $wp_query;
	if ( $wp_query->is_main_query() && is_search() && !empty( $_REQUEST['ref'] ) && ( $_REQUEST['ref'] == 'course' ) ) {
		global $wpdb;
		//$where .= " AND {$wpdb->posts}.post_type='lpr_course' AND {$wpdb->posts}.post_type NOT IN ('post', 'page')";
		$where = preg_replace( '!IN \(.*\)!', ' = \'lp_course\'', $where );
		//echo "11111{$where}";

	}

	return $where;
}
add_filter( 'posts_where', 'thim_filter_courses' );


function thim_redirect_search_to_archive( $template ) {

	if ( is_search() && !empty( $_REQUEST['ref'] ) && ( $_REQUEST['ref'] == 'course' ) ) {
		$template = learn_press_locate_template( 'archive-course.php' );
	}

	return $template;
}

add_filter( 'template_include', 'thim_redirect_search_to_archive' );

/**
 * Remove Rev Slider Metabox
 */
if ( is_admin() ) {
	function remove_revolution_slider_meta_boxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'lpr_course', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'lpr_lesson', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'lpr_quiz', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'lpr_question', 'normal' );
	}

	add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes' );
}

/**
 * LearnPress Profile in WordPress user profile
 *
 * @author: Ken
 */

add_action( 'show_user_profile', 'thim_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'thim_extra_user_profile_fields' );

function thim_extra_user_profile_fields( $user ) {
	$user_info = get_the_author_meta( 'lp_info', $user->ID );
	?>
	<h3><?php _e( 'LearnPress Profile', 'thim' ); ?></h3>

	<table class="form-table">
		<tbody>
		<?php if ( in_array( 'lpr_teacher', $user->roles ) || in_array( 'administrator', $user->roles ) ) : ?>
			<tr>
				<th>
					<label for="lp_major"><?php _e( 'Major', 'thim' ); ?></label>
				</th>
				<td>
					<input id="lp_major" class="regular-text" type="text" value="<?php echo isset( $user_info['major'] ) ? $user_info['major'] : ''; ?>" name="lp_info[major]">
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th>
				<label for="lp_facebook"><?php _e( 'Facebook Account', 'thim' ); ?></label>
			</th>
			<td>
				<input id="lp_facebook" class="regular-text" type="text" value="<?php echo isset( $user_info['facebook'] ) ? $user_info['facebook'] : ''; ?>" name="lp_info[facebook]">
			</td>
		</tr>
		<tr>
			<th>
				<label for="lp_twitter"><?php _e( 'Twitter Account', 'thim' ); ?></label>
			</th>
			<td>
				<input id="lp_twitter" class="regular-text" type="text" value="<?php echo isset( $user_info['twitter'] ) ? $user_info['twitter'] : ''; ?>" name="lp_info[twitter]">
			</td>
		</tr>
		<tr>
			<th>
				<label for="lp_google"><?php _e( 'Google Plus Account', 'thim' ); ?></label>
			</th>
			<td>
				<input id="lp_google" class="regular-text" type="text" value="<?php echo isset( $user_info['google'] ) ? $user_info['google'] : ''; ?>" name="lp_info[google]">
			</td>
		</tr>
		<tr>
			<th>
				<label for="lp_linkedin"><?php _e( 'LinkedIn Plus Account', 'thim' ); ?></label>
			</th>
			<td>
				<input id="lp_linkedin" class="regular-text" type="text" value="<?php echo isset( $user_info['linkedin'] ) ? $user_info['linkedin'] : ''; ?>" name="lp_info[linkedin]">
			</td>
		</tr>
		<tr>
			<th>
				<label for="lp_youtube"><?php _e( 'Youtube Account', 'thim' ); ?></label>
			</th>
			<td>
				<input id="lp_youtube" class="regular-text" type="text" value="<?php echo isset( $user_info['youtube'] ) ? $user_info['youtube'] : ''; ?>" name="lp_info[youtube]">
			</td>
		</tr>
		</tbody>
	</table>
<?php }


/**
 * Update template hook, remove hook to reorder html structure
 * @return none
 */
function update_template_hook() {
	remove_action( 'learn_press_after_the_title', 'learn_press_course_thumbnail' );
	add_action( 'learn_press_before_the_title', 'learn_press_course_thumbnail', 10 );

	remove_action( 'learn_press_entry_footer_archive', 'learn_press_course_instructor', 30 );
	remove_action( 'learn_press_entry_footer_archive', 'learn_press_course_categories', 40 );
	remove_action( 'learn_press_entry_footer_archive', 'learn_press_course_tags', 50 );
	remove_action( 'learn_press_after_the_title', 'learn_press_print_rate', 10, 1 );
	remove_action( 'learn_press_course_learning_content', 'learn_press_add_review_button', 5 );
	remove_action( 'learn_press_course_learning_content', 'learn_press_course_students' );

	add_action( 'learn_press_entry_footer_archive', 'learn_press_course_instructor', 5 );

	// single course
	remove_action( 'learn_press_course_landing_content', 'learn_press_course_instructor', 20 );
	remove_action( 'learn_press_course_landing_content', 'learn_press_course_price', 30 );
	remove_action( 'learn_press_course_landing_content', 'learn_press_course_students', 40 );
	remove_action( 'learn_press_course_learning_content', 'learn_press_course_instructor', 10 );
	remove_action( 'learn_press_course_learning_content', 'learn_press_course_curriculum', 20 );
	remove_action( 'learn_press_course_learning_content', 'learn_press_forum_link', 30 );

	add_action( 'learn_press_course_landing_price', 'learn_press_course_price' );
	add_action( 'learn_press_course_landing_student', 'learn_press_course_students' );

	add_action( 'learn_press_course_learning_curriculum', 'learn_press_course_curriculum' );

	if ( function_exists( "learn_press_add_review_button" ) ) {
		add_action( 'learn_press_end_course_students', 'learn_press_print_rate', 10 );
		add_action( 'learn_press_course_learning_curriculum', 'learn_press_add_review_button' );
	}

	if ( function_exists( "learn_press_forum_link" ) ) {
		add_action( 'learn_press_course_learning_curriculum', 'learn_press_forum_link' );
	}
	add_action( 'learn_press_after_single_the_title', 'learn_press_course_instructor', 20 );

	remove_action( 'learn_press_course_landing_content', 'learn_press_course_payment_form', 40 );
	remove_action( 'learn_press_course_landing_content', 'learn_press_course_enroll_button', 50 );

//
//	add_action( 'learn_press_after_course_landing_content', 'learn_press_course_payment_form', 5 );
//	add_action( 'learn_press_after_course_landing_content', 'learn_press_course_enroll_button', 10 );

	add_action( 'learn_press_menu_course_landing', 'learn_press_course_payment_form', 10 );
	add_action( 'learn_press_menu_course_landing', 'learn_press_course_enroll_button', 15 );
	add_action( 'learn_press_menu_course_landing', 'learn_press_course_price', 20 );

	if ( function_exists( 'learn_press_course_wishlist_button' ) ) {
		remove_action( 'learn_press_entry_footer_archive', 'learn_press_course_wishlist_button', 10 );
		remove_action( 'learn_press_course_landing_content', 'learn_press_course_wishlist_button', 10 );
		remove_action( 'learn_press_course_learning_content', 'learn_press_course_wishlist_button', 10 );
		//	add_action( 'learn_press_after_course_landing_content', 'learn_press_course_wishlist_button', 15 );
		add_action( 'learn_press_menu_course_landing', 'learn_press_course_wishlist_button', 5 );

	}
	/*
	 * Profile
	 */
	add_action( 'thim_inner_course_thumbnail', 'learn_press_course_thumbnail' );
	// Enrolled courses
	add_action( 'learn_press_after_enrolled_course_title', 'learn_press_course_instructor' );
	// Passed courses
	add_action( 'learn_press_before_passed_course_title', 'learn_press_course_instructor' );
	if ( function_exists( 'learn_press_print_rate' ) ) {
		add_action( 'learn_press_before_passed_course_title', 'learn_press_print_rate' );
	}
}

add_action( 'init', 'update_template_hook' );

function edit_learn_press_profile( $tabs ) {
	unset( $tabs[10] );

	return $tabs;
}

add_filter( 'learn_press_profile_tabs', 'edit_learn_press_profile' );

function thim_profile( $user ) {
	echo apply_filters( 'learn_press_user_info_tab_content', '', $user );
}
add_action( 'learn_press_after_profile_content', 'thim_profile' );

// Course in buddypress
function thim_update_buddypress_courses_template() {
	remove_action( 'bp_template_title', 'learn_press_bp_courses_all_title' );
	remove_action( 'bp_template_title', 'learn_press_bp_courses_wishlist_title' );
	remove_action( 'bp_template_title', 'learn_press_bp_courses_quiz_results_title' );
}

add_action( 'wp_head', 'thim_update_buddypress_courses_template' );


function learn_press_related_courses() {
	$courses = learn_press_get_related_courses( 4 );
	wp_enqueue_script( 'thim-owl-carousel' );

	$column  = "col-sm-12";
	$class   = " courses-slider";
	$columns = 3;
	if ( $columns ) {
		$data_column = ' data-column ="' . $columns . '"';
	}
	if ( $courses ) :
		echo '<div class="related-courses">';
		echo '<div class="widget-box-title">';
		echo '<h3 class="title">' . __( 'Related Courses', 'thim' ) . '</h3>';
		echo '</div>';
		echo '<div class="wrapper-item row' . $class . '"' . $data_column . '>';
		$i = 0;
		foreach ( $courses as $course ) {
			if ( $course->ID == get_the_id() ) {
				continue;
			}
			$post_id = $course->ID;
			$i ++;
			if ( $i > 4 ) {
				break;
			}
			?>
			<div class="<?php echo esc_attr( $column ); ?>">
				<div class="inner-course">
					<div class="course-thumbnail">
						<?php
						if ( has_post_thumbnail( $post_id ) ) {
							echo '<a href="' . get_the_permalink( $post_id ) . '">';
							echo get_the_post_thumbnail( $post_id, 'medium' );
							echo '</a>';
						} ?>

						<div class="course-date">
							<span class="course-month"><?php the_time( 'M' ); ?></span>
							<span class="course-day"><?php the_time( 'd' ); ?></span>
							<span class="course-year"><?php the_time( 'Y' ); ?></span>
						</div>
					</div>
					<div class="course-title">
						<h2>
							<a href="<?php echo get_the_permalink( $post_id ); ?>">
								<?php echo get_the_title( $post_id ); ?>
							</a>
						</h2>
					</div>
					<div class="course-instructor">
						<?php echo __( 'Teacher:', 'thim' ); ?>
						<a href="<?php echo apply_filters( 'learn_press_instructor_profile_link', '#', $user_id = null, $post_id ); ?>">
							<span><?php echo get_the_author_meta( 'display_name', get_post_field( 'post_author', $post_id ) ); ?></span>
							<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', $post_id ), 32 ); ?></span>
						</a>
					</div>
					<div class="course-price">
						<?php echo learn_press_get_course_price( $post_id, true ); ?><?php //echo __( '/per week', 'thim' ); ?>
					</div>
					<div class="course-student">
					<span>
						<i class="dashicons dashicons-groups"></i>
						<?php
						echo learn_press_count_students_enrolled( $post_id );
						if ( learn_press_count_students_enrolled( $post_id ) > 1 ) {
							echo ' ' . __( 'students', 'thim' );
						} else {
							echo ' ' . __( 'student', 'thim' );
						}
						?>
					</span>
						<?php if ( function_exists( 'learn_press_print_rate' ) ) : ?>
							<span class="course-rating">
							<?php learn_press_print_rate( $post_id ); ?>
						</span>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
		}
		echo '</div><!--end-->';
		echo '</div>';
	endif;
}

add_action( 'learn_press_after_course_landing_content', 'learn_press_related_courses', 100 );


function learn_press_remove_action() {
	//Remove unused hook in LearnPress

	remove_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_load_question' );
	remove_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_result' );
	remove_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_percentage' );
	remove_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_sidebar' );

	remove_action( 'learn_press_quiz_question_nav', 'learn_press_quiz_question_nav' );
	remove_action( 'learn_press_quiz_question_nav', 'learn_press_quiz_question_nav_buttons' );

	remove_action( 'learn_press_before_main_quiz_content', 'learn_press_before_main_quiz_content' );
	remove_action( 'learn_press_after_main_quiz_content', 'learn_press_after_main_quiz_content', 1000 );

	remove_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_questions' );
	remove_action( 'learn_press_after_single_quiz_summary', 'learn_press_display_course_link' );

	remove_action( 'learn_press_quiz_questions_after_question_title_element', 'learn_press_quiz_hint' );

	remove_action( 'learn_press_content_quiz_sidebar', 'learn_press_single_quiz_time_counter' );
	remove_action( 'learn_press_content_quiz_sidebar', 'learn_press_single_quiz_buttons' );

	// Hook back and change order
	add_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_result' );
	add_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_load_question' );

	add_action( 'learn_press_content_quiz_sidebar', 'learn_press_single_quiz_buttons' );
	add_action( 'learn_press_content_quiz_sidebar', 'learn_press_single_quiz_time_counter' );

	add_action( 'learn_press_quiz_question_nav', 'learn_press_quiz_question_nav' );
	add_action( 'learn_press_quiz_question_nav', 'learn_press_quiz_question_nav_buttons' );
	add_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_sidebar' );
	add_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_percentage' );

	add_action( 'learn_press_before_main_quiz_content', 'learn_press_before_main_quiz_content' );
	add_action( 'learn_press_after_main_quiz_content', 'learn_press_after_main_quiz_content', 1000 );

	add_action( 'learn_press_content_quiz_sidebar', 'learn_press_single_quiz_questions' );
	add_action( 'learn_press_after_single_quiz_summary', 'learn_press_display_course_link' );

	add_action( 'learn_press_quiz_questions_after_question_title_element', 'learn_press_quiz_hint' );


}

add_action( 'after_setup_theme', 'learn_press_remove_action' );