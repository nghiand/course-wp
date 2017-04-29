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
			'post_type'           => 'lp_course',
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
	if ( get_post_type() === 'lp_course' ) {
		if ( is_archive() ) {
			$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current">' . __( 'Courses', 'thim' ) . '</strong></li>';
		}
		if ( is_single() ) {
			$middle = '<li class="item-courses" itemprop="itemListElement"><a class="bread-courses" href="' . get_post_type_archive_link( 'lp_course' ) . '">' . __( 'Courses', 'thim' ) . '</a></li>';
			$middle .= $separator;
		}
	}
	$breadcrumb = $start . $middle . $end . '</ul>';

	return $breadcrumb;
}

add_filter( 'thim_get_breadcrumb', 'thim_breadcrumb_for_learn_press', 10, 5 );


if ( ! function_exists( 'learnpress_page_title' ) ) {
	function learnpress_page_title() {
		if ( get_post_type() == "lp_course" ) {
			if ( is_tax() ) {
				echo single_term_title( "", false );
			} else {
				echo __( 'Courses', 'thim' );
			}
		}
		if ( get_post_type() == "lp_quiz" ) {
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
	if ( $wp_query->is_main_query() && is_search() && ! empty( $_REQUEST['ref'] ) && ( $_REQUEST['ref'] == 'course' ) ) {
		global $wpdb;
		//$where .= " AND {$wpdb->posts}.post_type='lp_course' AND {$wpdb->posts}.post_type NOT IN ('post', 'page')";
		$where = preg_replace( '!IN \(.*\)!', ' = \'lp_course\'', $where );
		//echo "11111{$where}";

	}

	return $where;
}

add_filter( 'posts_where', 'thim_filter_courses' );

function thim_redirect_search_to_archive( $template ) {

	if ( is_search() && ! empty( $_REQUEST['ref'] ) && ( $_REQUEST['ref'] == 'course' ) ) {
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
		remove_meta_box( 'mymetabox_revslider_0', 'lp_course', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'lp_lesson', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'lp_quiz', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'lp_question', 'normal' );
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
		<?php if ( in_array( 'lp_teacher', $user->roles ) || in_array( 'administrator', $user->roles ) ) : ?>
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


if ( ! function_exists( 'thim_course_ratings_count' ) ) {
	function thim_course_ratings_count( $course_id = null ) {
		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! class_exists( 'LP_Addon_Course_Review' ) ) {
			return;
		}

		learn_press_course_review_template( 'course-rate.php' );
	}
}


/**
 * Update template hook, remove hook to reorder html structure
 * @return none
 */
if ( ! function_exists( 'thim_update_template_hook' ) ) {
	function thim_update_template_hook() {
		remove_action( 'learn_press_after_courses_loop_item', 'learn_press_courses_loop_item_thumbnail', 10 );
		add_action( 'learn_press_before_courses_loop_item', 'learn_press_courses_loop_item_thumbnail', 10 );


		remove_action( 'learn_press_after_courses_loop_item', 'learn_press_courses_loop_item_students', 20 );
		remove_action( 'learn_press_after_courses_loop_item', 'learn_press_courses_loop_item_instructor', 25 );
		remove_action( 'learn_press_after_courses_loop_item', 'learn_press_courses_loop_item_introduce', 30 );
		add_action( 'learn_press_after_courses_loop_item', 'learn_press_courses_loop_item_instructor', 5 );

		remove_action( 'learn_press_before_main_content', 'learn_press_breadcrumb' );


		//Landing course
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_thumbnail', 5 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_title', 10 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_meta_start_wrapper', 15 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_price', 25 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_students', 30 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_meta_end_wrapper', 35 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_single_course_content_lesson', 40 );
		remove_action( 'learn_press_content_landing_summary', 'learn_press_course_enroll_button', 45 );

		if ( thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) && class_exists( 'LP_Addon_Course_Review' ) ) {
			$addon_review = LP_Addon_Course_Review::instance();

			remove_action( 'learn_press_content_landing_summary', array( $addon_review, 'print_rate' ), 10, 1 );
			remove_action( 'learn_press_content_learning_summary', array( $addon_review, 'print_rate' ), 10, 1 );
			remove_action( 'learn_press_content_learning_summary', array( $addon_review, 'add_review_button' ), 5 );

			add_action( 'learn_press_course_learning_curriculum', array( $addon_review, 'add_review_button' ), 10 );
		}


		add_action( 'learn_press_menu_course_landing', 'learn_press_course_enroll_button', 15 );
		add_action( 'learn_press_menu_course_landing', 'learn_press_course_price', 20 );

		if ( function_exists( 'learn_press_course_wishlist_button' ) ) {
			remove_action( 'learn_press_entry_footer_archive', 'learn_press_course_wishlist_button', 10 );
			remove_action( 'learn_press_course_landing_content', 'learn_press_course_wishlist_button', 10 );
			remove_action( 'learn_press_course_learning_content', 'learn_press_course_wishlist_button', 10 );
			add_action( 'learn_press_menu_course_landing', 'learn_press_course_wishlist_button', 5 );

		}


		//Learning course
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_thumbnail', 5 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_meta_start_wrapper', 10 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_status', 15 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_instructor', 20 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_students', 25 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_meta_end_wrapper', 30 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_single_course_content_lesson', 40 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_progress', 45 );
		//remove_action( 'learn_press_content_learning_summary', 'learn_press_course_finish_button', 50 );
		remove_action( 'learn_press_content_learning_summary', 'learn_press_course_curriculum', 55 );

		add_action( 'learn_press_course_learning_curriculum', 'learn_press_course_curriculum', 5 );

		if ( function_exists( "learn_press_forum_link" ) ) {
			add_action( 'learn_press_course_learning_curriculum', 'learn_press_forum_link' );
		}


		//Single Quiz
		remove_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_left_start_wrap', 15 );
		remove_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_history', 35 );
		remove_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_questions', 30 );
		remove_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_left_end_wrap', 40 );
		remove_action( 'learn_press_single_quiz_summary', 'learn_press_single_quiz_sidebar', 45 );
		remove_action( 'learn_press_single_quiz_sidebar', 'learn_press_single_quiz_information', 5 );
		remove_action( 'learn_press_single_quiz_sidebar', 'learn_press_single_quiz_buttons', 15 );

		add_action( 'learn_press_after_single_quiz_summary', 'learn_press_single_quiz_sidebar' );

		//Add to sidebar single quiz
		add_action( 'learn_press_single_quiz_sidebar', 'learn_press_single_quiz_buttons', 2 );
		add_action( 'learn_press_single_quiz_sidebar', 'learn_press_single_quiz_questions', 30 );


		//Profile Page
		remove_action( 'learn_press_user_profile_summary', 'learn_press_output_user_profile_info', 5, 3 );
//		remove_action( 'learn_press_user_profile_summary', 'learn_press_output_user_profile_tabs', 10, 3 );
//		remove_action( 'learn_press_user_profile_summary', 'learn_press_output_user_profile_order', 15, 3 );
		remove_action( 'learn_press_profile_tab_courses_all', 'learn_press_profile_tab_courses_all', 5 );
//		remove_action( 'learn_press_profile_tab_courses_learning', 'learn_press_profile_tab_courses_learning', 5 );
//		remove_action( 'learn_press_profile_tab_courses_purchased', 'learn_press_profile_tab_courses_purchased', 5 );
//		remove_action( 'learn_press_profile_tab_courses_finished', 'learn_press_profile_tab_courses_finished', 5 );
//		remove_action( 'learn_press_profile_tab_courses_own', 'learn_press_profile_tab_courses_own', 5 );
//		remove_action( 'learn_press_after_profile_tab_all_loop_course', 'learn_press_after_profile_tab_loop_course', 5 );
//		remove_action( 'learn_press_after_profile_tab_own_loop_course', 'learn_press_after_profile_tab_loop_course', 5 );

	}
}

add_action( 'init', 'thim_update_template_hook' );

function thim_learnpress_scripts() {
	wp_dequeue_style( 'course-review' );
	wp_enqueue_script( 'single-course' );
}

add_action( 'wp_enqueue_scripts', 'thim_learnpress_scripts', 1001 );

function thim_get_related_courses( $limit ) {
	if ( ! $limit ) {
		$limit = 3;
	}
	$course_id = get_the_ID();
	$tag_ids   = array();
	$tags      = get_the_terms( $course_id, 'course_tag' );
	if ( $tags ) {
		foreach ( $tags as $individual_tag ) {
			$tag_ids[] = $individual_tag->slug;
		}
	}

	$args = array(
		'posts_per_page'      => $limit,
		'paged'               => 1,
		'ignore_sticky_posts' => 1,
		'post__not_in'        => array( $course_id ),
		'post_type'           => 'lp_course'
	);

	if ( $tag_ids ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'course_tag',
				'field'    => 'slug',
				'terms'    => $tag_ids
			)
		);
	}
	$related = array();
	if ( $posts = new WP_Query( $args ) ) {
		global $post;
		while ( $posts->have_posts() ) {
			$posts->the_post();
			$related[] = $post;
		}
	}
	wp_reset_query();

	return $related;
}

if ( ! function_exists( 'thim_learn_press_related_courses' ) ) {
	function thim_learn_press_related_courses() {
		$courses = thim_get_related_courses( null, array( 'posts_per_page' => 4 ) );
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

				$course_related = LP_Course::get_course( $post_id );
				$is_required    = $course_related->is_required_enroll();
				$count_student  = $course_related->count_users_enrolled( 'append' ) ? $course_related->count_users_enrolled( 'append' ) : 0;
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
							<a href="<?php echo esc_url( learn_press_user_profile_link( $course->post_author ) ); ?>">
								<span><?php the_author(); ?></span>
								<span class="avatar"><?php echo get_avatar( $course->post_author, 32 ); ?></span>
							</a>
						</div>
						<div class="course-price">
							<?php if ( $course_related->is_free() || ! $is_required ) : ?>
								<?php esc_html_e( 'Free', 'thim' ); ?>
							<?php else: $price = learn_press_format_price( $course_related->get_price(), true ); ?>
								<?php echo esc_html( $price ); ?>
							<?php endif; ?>
							<meta itemprop="priceCurrency" content="<?php echo learn_press_get_currency_symbol(); ?>" />
						</div>
						<div class="course-student">
							<span>
								<i class="dashicons dashicons-groups"></i>
								<?php
								if ( $count_student > 1 ) {
									echo $count_student . ' ' . __( 'students', 'thim' );
								} else {
									echo $count_student . ' ' . __( 'student', 'thim' );
								};
								?>
							</span>
							<?php thim_get_course_rating($post_id); ?>
						</div>
					</div>
				</div>
				<?php
			}
			echo '</div><!--end-->';
			echo '</div>';
		endif;
	}
}
add_action( 'learn_press_after_content_landing', 'thim_learn_press_related_courses', 100 );

function thim_get_course_rating( $post_id ) {
	if( !thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
		return;
	}
	$course_rate    = learn_press_get_course_rate( $post_id );
	$total          = learn_press_get_course_rate_total( $post_id );
?>

	<span class="course-rating">
		<div class="course-rate">
			<?php
			learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) );
			$text = sprintf( _n( '%s rating', '%s ratings', $total, 'thim' ), $total );
			?>
			<p class="review-number">
				<?php do_action( 'learn_press_before_total_review_number' ); ?>
				<?php echo $text; ?>
				<?php do_action( 'learn_press_after_total_review_number' ); ?>
			</p>
		</div>
	</span>
<?php
}