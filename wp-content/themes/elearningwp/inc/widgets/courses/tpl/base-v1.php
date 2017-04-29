<?php

$column         = 'col-sm-4';
$data_column    = $class = '';
$kind           = $instance['kind'];
$limit          = $instance['limit'];
$columns        = $instance['columns'];
$courses_slider = $instance['slider-options']['courses_slider'];
$row            = $instance['slider-options']['row'];
$page_nav       = $instance['slider-options']['show_page_nav'];
$nav            = $instance['slider-options']['show_navigation'];
if ( $courses_slider == 'yes' ) {
	$column = "col-sm-12";
	$class  = " courses-slider";
	if ( $columns ) {
		$data_column = ' data-column ="' . $columns . '"';
	}
} else {
	if ( $columns ) {
		$column = 'col-sm-' . ( 12 / $columns );
	}
}

if ( $page_nav ) {
	$data_column .= ' data-show-page-nav ="' . $page_nav . '"';

}

if ( $nav ) {
	$data_column .= ' data-show-nav = "' . $nav . '"';
}

$arr_query = array(
	'post_type'      => 'lp_course',
	'post_status'    => 'publish',
	'posts_per_page' => $limit,
);

if ( $kind == 'latest' ) {
	$arr_query['orderby'] = 'date';
	$arr_query['order']   = 'DESC';
}


if ( $kind == 'popular' ) {
	global $wpdb;

	$the_query = $wpdb->get_col(
			$wpdb->prepare( "
			SELECT p.ID, if(pm.meta_value, pm.meta_value, 0) + (select count(course_id) from {$wpdb->prefix}learnpress_user_courses where course_id=p.ID) as students
			FROM {$wpdb->posts} p
			LEFT JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id  AND pm.meta_key = %s
			LEFT JOIN {$wpdb->prefix}learnpress_user_courses AS uc ON p.ID = uc.course_id
			WHERE p.post_type = %s and p.post_status='publish'
			ORDER BY students DESC
		", '_lp_students', 'lp_course' )
	);

	$arr_query['post__in'] = $the_query;
	$arr_query['orderby']  = 'post__in';

}

//var_dump($arr_query);

$courses = new WP_Query( $arr_query );
?>
<?php
$css = $desc_css = '';
// css header
$css .= ( $instance['heading_group']['textcolor'] ) ? 'color:' . $instance['heading_group']['textcolor'] . ';' : '';
if ( $instance['heading_group']['font_heading'] == 'custom' ) {
	$css .= ( $instance['heading_group']['custom_font_heading']['custom_font_size'] ) ? 'font-size:' . $instance['heading_group']['custom_font_heading']['custom_font_size'] . 'px;line-height:' . $instance['heading_group']['custom_font_heading']['custom_font_size'] . 'px;' : '';
	$css .= ( $instance['heading_group']['custom_font_heading']['custom_font_weight'] ) ? 'font-weight:' . $instance['heading_group']['custom_font_heading']['custom_font_weight'] : '';
}
$css = ( $css ) ? 'style="' . $css . '"' : '';
//end css header
// css desc
$desc_css .= ( $instance['desc_group']['des_color'] != '' ) ? 'color: ' . $instance['desc_group']['des_color'] . ';' : '';
$desc_css .= ( $instance['desc_group']['des_font_size'] != '' ) ? 'font-size: ' . $instance['desc_group']['des_font_size'] . 'px;' : '';
$desc_css .= ( $instance['desc_group']['des_font_weight'] != '' ) ? 'font-weight: ' . $instance['desc_group']['des_font_weight'] . ';' : '';
$desc_css = ( $desc_css ) ? 'style="' . $desc_css . '"' : '';
//end css desc
if ( $instance['heading_group']['title'] ) {
	echo '<div class="widget-box-title">';
	echo '<' . $instance['heading_group']['size'] . ' ' . $css . ' class="title">' . $instance['heading_group']['title'] . '</' . $instance['heading_group']['size'] . '>';
	if ( $instance['desc_group']['des'] ) {
		echo '<p ' . $desc_css . '>' . $instance['desc_group']['des'] . '</p>';
	}
	if ( $instance['link_all_courses'] == '1' ) {
		echo '<a href="' . get_post_type_archive_link( 'lpr_course' ) . '" class="browse-all-courses">' . __( "Browse All Courses", "thim" ) . '<i class="fa fa-angle-double-right"></i></a>';
	}
	echo '</div>';
}
?>
<?php if ( $courses->have_posts() ) :
	echo '<div class="wrapper-item row' . $class . '"' . $data_column . 'itemscope itemtype="http://schema.org/CreativeWork">';
	$i             = 1;
	$courses_count = $courses->found_posts;
	if ( $courses_count > $limit ) {
		$courses_count = $limit;
	}
	while ( $courses->have_posts() ) : $courses->the_post();
		if ( $courses_slider == 'yes' && $row == '2' ) {
			if ( ( $i == 1 ) || ( ( $i + 1 ) % 2 == 0 ) ) {
				echo '<div class="show-case">';
			}
		}

		$course      = LP_Course::get_course( get_the_ID() );
		$is_required = $course->is_required_enroll();

		?>
		<div class="<?php echo esc_attr( $column ); ?>">

			<div class="inner-course">
				<div class="course-thumbnail">
					<?php
					if ( has_post_thumbnail() ) {
						echo '<a itemprop="url" href="' . get_the_permalink( get_the_ID() ) . '"> ';
						$attr = array(
							'itemprop' => 'image'
						);
						the_post_thumbnail( 'medium', $attr );
						echo '</a>';
					} ?>

					<div class="course-date">
						<span class="course-month"><?php the_time( 'M' ); ?></span>
						<span class="course-day"><?php the_time( 'd' ); ?></span>
						<span class="course-year"><?php the_time( 'Y' ); ?></span>
					</div>
				</div>
				<div class="course-title" itemprop="name">
					<h2>
						<a href="<?php the_permalink(); ?>" itemprop="url">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>

				<div class="course-instructor" itemprop="creator">
					<?php echo __( 'Teacher:', 'thim' ); ?>
					<a href="<?php echo esc_url( learn_press_user_profile_link( $course->post->post_author ) ); ?>">
						<span><?php the_author(); ?></span>
						<span class="avatar"><?php echo get_avatar( get_post_field( 'post_author', get_the_ID() ), 32 ); ?></span>
					</a>
				</div>

				<div class="course-price">
					<?php if ( $course->is_free() || ! $is_required ) : ?>
						<?php esc_html_e( 'Free', 'thim' ); ?>
					<?php else: $price = learn_press_format_price( $course->get_price(), true ); ?>
						<?php echo esc_html( $price ); ?>
					<?php endif; ?>
					<meta itemprop="priceCurrency" content="<?php echo learn_press_get_currency_symbol(); ?>" />
				</div>
				<div class="course-student">
					<span>
						<i class="dashicons dashicons-groups"></i>
						<?php learn_press_course_students(); ?>
					</span>
					<span class="course-rating">
						<?php thim_course_ratings_count(); ?>
					</span>
				</div>
			</div>
		</div>
		<?php
		if ( $courses_slider == 'yes' && $row == '2' ) {
			if ( $i % 2 == 0 || ( ( $i == $courses_count ) && ( $i % 2 == 1 ) ) ) {
				echo '</div>';
			}
		}
		$i ++;
	endwhile;
	echo '</div><!--end-->';
endif;
wp_reset_query(); ?>
