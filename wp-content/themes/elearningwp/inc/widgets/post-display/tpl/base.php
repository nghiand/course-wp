<?php
global $theme_options_data;
$columns       = 'col-md-12 col-sm-6 col-xs-6';
$css_animation = $instance['css_animation'];
$columns       = $instance['columns'];
$columns       = 'col-md-' . ( 12 / $columns ) . ' col-sm-6 col-xs-6';
$css_animation = thim_getCSSAnimation( $css_animation );
$time_format   = get_option( 'date_format' );
// query
$query_args = array(
	'posts_per_page' => $instance['number_posts'],
	'order'          => $instance['order'] == 'asc' ? 'asc' : 'desc',
);

switch ( $instance['orderby'] ) {
	case 'date' :
		$query_args['orderby'] = 'post_date';
		break;
	case 'title' :
		$query_args['orderby'] = 'post_title';
		break;
	case 'comment' :
		$query_args['orderby'] = 'comment_count';
		break;
	default : //random
		$query_args['orderby'] = 'rand';
}
$posts_display = new WP_Query( $query_args );

// style
$css = $title_css = $meta_css = '';
// css header
$css .= ( $instance['heading_group']['textcolor'] ) ? 'color:' . $instance['heading_group']['textcolor'] . ';' : '';
if ( $instance['heading_group']['font_heading'] == 'custom' ) {
	$css .= ( $instance['heading_group']['custom_font_heading']['custom_font_size'] ) ? 'font-size:' . $instance['heading_group']['custom_font_heading']['custom_font_size'] . 'px;line-height:' . $instance['heading_group']['custom_font_heading']['custom_font_size'] . 'px;' : '';
	$css .= ( $instance['heading_group']['custom_font_heading']['custom_font_weight'] ) ? 'font-weight:' . $instance['heading_group']['custom_font_heading']['custom_font_weight'] : '';
}
$css = ( $css ) ? 'style="' . $css . '"' : '';
//end css header
$title_css .= ( $instance['t_config']['title_color'] ) ? 'style="color:' . $instance['t_config']['title_color'] . '"' : '';
$meta_css .= ( $instance['t_config']['meta_color'] ) ? 'style="color:' . $instance['t_config']['meta_color'] . '"' : '';
//end style
if ( $instance['heading_group']['title'] ) {
	echo '<div class="widget-box-title">';
	echo '<' . $instance['heading_group']['size'] . ' ' . $css . ' class="title">' . $instance['heading_group']['title'] . '</' . $instance['heading_group']['size'] . '>';
	echo '</div>';
}

if ( $posts_display->have_posts() ) {
	echo '<div class="posts-display row' . $css_animation . '">';

	while ( $posts_display->have_posts() ) {
		$posts_display->the_post();
		echo '<article class="' . $columns . '">';

		if ( has_post_thumbnail() ) {
			echo '<div class="entry-thumbnail">';
			echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . feature_images( 120, 80 ) . '</a>';
			echo '</div>';
		}
		echo '<div class="entry-container">';
		echo '<h3><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" ' . $title_css . '>' . get_the_title() . '</a></h3>';

		echo '<div class="entry-meta" ' . $meta_css . '>';

		printf( '<a class="author" href="%1$s">%2$s</a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);

		echo '<span class="time">' . get_the_time( $time_format ) . '</span>';

		if ( comments_open() || get_comments_number() ) {
			comments_popup_link( __( '0 comment', 'thim' ), __( '1 comment', 'thim' ), __( '% comments', 'thim' ), "comments-link" );
		}

		echo '</div>';//end entry-meta
		echo '</div>';//end entry-container
		echo '</article>';
	}
	wp_reset_postdata();
	echo '</div>';
}
	
