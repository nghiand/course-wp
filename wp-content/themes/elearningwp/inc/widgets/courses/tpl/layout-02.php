<?php
$kind      = $instance['kind'];
$limit     = $instance['limit'];
$arr_query = array(
	'post_type'      => 'lpr_course',
	'post_status'    => 'publish',
	'posts_per_page' => $limit
);
if ( $kind == 'popular' ) {
	global $wpdb;
	$courses   = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT p.ID, pm.meta_value FROM $wpdb->posts AS p
			INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
			WHERE pm.meta_key = %s",
			'_lpr_course_user'
		)
	);
	$course_in = array();
	if ( $courses ) {
		foreach ( $courses as $course ) {
			$course_in[$course->ID] = count( unserialize( $course->meta_value ) );
		}
		arsort( $course_in );
	}
	$arr_query['post__in'] = array_keys( $course_in );
}

if ( $kind == 'latest' ) {
	$arr_query['orderby'] = 'post_date';
	$arr_query['order']   = 'DESC';
}
$courses = new WP_Query( $arr_query );
?>
<?php
$css = $desc_css = '';
// css header
$css .= ( $instance['heading_group']['textcolor'] ) ? 'color:' . $instance['heading_group']['textcolor'] . ';' : '';
if ( $instance['heading_group']['font_heading'] == 'custom' ) {
	$css .= ( $instance['heading_group']['custom_font_heading']['custom_font_size'] ) ? 'font-size:' . $instance['heading_group']['custom_font_heading']['custom_font_size'] . 'px;line-height:' . $instance['heading_group']['custom_font_heading']['custom_font_size'] . 'px;' : '';
	$css .= ( $instance['heading_group']['custom_font_heading']['custom_font_weight'] ) ? 'font-weight:' . $instance['heading_group']['custom_font_heading']['custom_font_weight'] . 'px' : '';
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
	echo '<div class="widget-box-title layout-02">';
	echo '<' . $instance['heading_group']['size'] . ' ' . $css . ' class="title">' . $instance['heading_group']['title'] . '</' . $instance['heading_group']['size'] . '>';
	if ( $instance['desc_group']['des'] ) {
		echo '<p ' . $desc_css . '>' . $instance['desc_group']['des'] . '</p>';
	}
	echo '</div>';
}
?>
<?php if ( $courses->have_posts() ) :
	echo '<ul class="courses-layout-02">';
	while ( $courses->have_posts() ) : $courses->the_post();
		?>
		<li>
			<div class="course-thumbnail">
				<?php
				if ( has_post_thumbnail() ) {
					echo '<a href="' . get_the_permalink( get_the_ID() ) . '"> ';
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$data            = @getimagesize( $large_image_url[0] );
					$width_data      = $data[0];
					$height_data     = $data[1];
					if ( !( $width_data > 60 ) && !( $height_data > 50 ) ) {
						echo '<img src="' . $large_image_url[0] . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
					} else {
						$crop       = ( $height_data < 50 ) ? false : true;
						$image_crop = aq_resize( $large_image_url[0], 60, 50, $crop );
						echo '<img src="' . $image_crop . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
					}
					echo '</a>';
				} ?>
			</div>
			<div class="inner-course">
				<h2 class="course-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>

				<div class="course-instructor">
					<?php echo __( 'Teacher:', 'thim' ); ?>
					<a href="<?php echo apply_filters( 'learn_press_instructor_profile_link', '#', $user_id = null, get_the_ID() ); ?>">
						<span><?php the_author(); ?></span>
					</a>
				</div>
				<div class="course-price">
					<?php echo learn_press_get_course_price( get_the_ID(), true ); ?><?php //echo __( '/per week', 'thim' ); ?>
				</div>
			</div>
		</li>
	<?php
	endwhile;
	echo '</ul><!--end-->';
endif;
wp_reset_query();
?>
