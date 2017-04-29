<?php
// logo

function thim_hex2rgb( $hex ) {
	$hex = str_replace( "#", "", $hex );
	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );

	return $rgb; // returns an array with the rgb values
}

function thim_getExtraClass( $el_class ) {
	$output = '';
	if ( $el_class != '' ) {
		$output = " " . str_replace( ".", "", $el_class );
	}

	return $output;
}

function thim_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		wp_enqueue_script( 'thim-waypoints' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
	}

	return $output;
}

function thim_excerpt( $limit ) {
	$content = get_the_excerpt();
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = explode( ' ', $content, $limit );
	array_pop( $content );
	$content = implode( " ", $content );

	return $content;
}

function thim_breadcrumbs() {
	// Settings
	$id         = 'breadcrumbs';
	$home_title = __( 'Home', 'thim' );
	$separator  = '<li class="separator"><i class="fa fa-long-arrow-right"></i></li>';
	// Get the query & post information
	global $post;
	// Build the breadcrums
	$start  = '';
	$middle = '';
	$end    = '';
	if ( !is_front_page() ) {
		$start .= '<ul id="' . $id . '" itemscope itemtype="http://schema.org/BreadcrumbList">';
		$start .= '<li class="item-home"><a itemprop="itemListElement" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		$start .= $separator;
		if ( is_home() ) {
			$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current" title="' . __( 'Blog', 'thim' ) . '">' . __( 'Blog', 'thim' ) . '</strong></li>';
		}
		if ( is_single() ) {
			// Single post (Only display the first category)
			$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
		} else {
			if ( is_category() ) {
				// Category page
				$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current">' . single_cat_title( '', false ) . '</strong></li>';
			} else {
				if ( is_page() ) {
					// Standard page
					if ( $post->post_parent ) {
						// If child page, get parents
						$anc = get_post_ancestors( $post->ID );

						// Get parents in the right order
						$anc = array_reverse( $anc );

						// Parent page loop
						foreach ( $anc as $ancestor ) {
							$middle = '<li class="item-parent" itemprop="itemListElement"><a class="bread-parent" href="' . get_permalink( $ancestor ) . '" title="' . get_the_title( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
							$middle .= $separator;
						}

						// Current page
						$end = '<li class="item-current" itemprop="itemListElement"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

					} else {

						// Just display current page if not parents
						$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current"> ' . get_the_title() . '</strong></li>';

					}

				} else {
					if ( is_tag() ) {

						// Tag page

						// Get tag information
						$term_id  = get_query_var( 'tag_id' );
						$taxonomy = 'post_tag';
						$args     = 'include=' . $term_id;
						$terms    = get_terms( $taxonomy, $args );

						// Display the tag name
						$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current">' . $terms[0]->name . '</strong></li>';

					} elseif ( is_day() ) {

						// Day archive

						// Year link
						$middle = '<li class="item-year" itemprop="itemListElement"><a class="bread-year" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' ' . __( 'Archives', 'thim' ) . '</a></li>';
						$middle .= $separator;

						// Month link
						$middle .= '<li class="item-month" itemprop="itemListElement"><a class="bread-month" href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' ' . __( 'Archives', 'thim' ) . '</a></li>';
						$middle .= $separator;

						// Day display
						$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current"> ' . get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' ' . __( 'Archives', 'thim' ) . '</strong></li>';

					} else {
						if ( is_month() ) {

							// Month Archive

							// Year link
							$middle = '<li class="item-year" itemprop="itemListElement"><a class="bread-year" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' ' . __( 'Archives', 'thim' ) . '</a></li>';
							$middle .= $separator;

							// Month display
							$end = '<li class="item-month" itemprop="itemListElement"><strong class="bread-month" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' ' . __( 'Archives', 'thim' ) . '</strong></li>';

						} else {
							if ( is_year() ) {

								// Display year archive
								$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' ' . __( 'Archives', 'thim' ) . '</strong></li>';

							} else {
								if ( is_author() ) {

									// Auhor archive

									// Get the author information
									global $author;
									$userdata = get_userdata( $author );

									// Display author name
									$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current" title="' . $userdata->display_name . '">' . __( 'Author:', 'thim' ) . ' ' . $userdata->display_name . '</strong></li>';

								} else {
									if ( get_query_var( 'paged' ) ) {

										// Paginated archives
										$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current title="Page ' . get_query_var( 'paged' ) . '">' . __( 'Page', 'thim' ) . ' ' . get_query_var( 'paged' ) . '</strong></li>';

									} else {
										if ( is_search() ) {

											// Search results page
											$end = '<li class="item-current" itemprop="itemListElement"><strong class="bread-current title="Search results for: ' . get_search_query() . '">' . __( 'Search results for:', 'thim' ) . ' ' . get_search_query() . '</strong></li>';

										} elseif ( is_404() ) {
											// 404 page
											$end = '<li itemprop="itemListElement">' . __( 'Error 404', 'thim' ) . '</li>';
										}
									}
								}
							}
						}
					}
				}
			}
		}

	}
	$breadcrumb = apply_filters( 'thim_get_breadcrumb', $start . $middle . $end . '</ul>', $start, $middle, $end, $separator );
	echo ent2ncr( $breadcrumb );

}

// related
function thim_get_related_posts( $post_id, $number_posts = - 1 ) {
	$query = new WP_Query();
	$args  = '';
	if ( $number_posts == 0 ) {
		return $query;
	}
	$args  = wp_parse_args( $args, array(
		'posts_per_page'      => $number_posts,
		'post__not_in'        => array( $post_id ),
		'ignore_sticky_posts' => 0,
		'meta_key'            => '_thumbnail_id',
		'category__in'        => wp_get_post_categories( $post_id )
	) );
	$query = new WP_Query( $args );

	return $query;
}

/********************************************************************
 * Get image attach
 ********************************************************************/
function feature_images( $width, $height ) {
	global $post;
	if ( has_post_thumbnail() ) {
		$get_thumbnail = simplexml_load_string( get_the_post_thumbnail( $post->ID, 'full' ) );
		$thumbnail_src = $get_thumbnail->attributes()->src;
		$img_url       = $thumbnail_src;
		$data          = @getimagesize( $img_url );
		//var_dump($img_url);
		$width_data    = $data[0];
		$height_data   = $data[1];
		//if ( !( $width_data > $width ) && !( $height_data > $height ) ) {
		//	return '<img src="' . $img_url[0] . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
		//} else {
		//	$crop       = ( $height_data < $height ) ? false : true;
			$image_crop = aq_resize( $img_url[0], $width, $height, true );

			return '<img src="' . $image_crop . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
		//}
	}
}

// bbPress
function use_bbpress() {
	if ( function_exists( 'is_bbpress' ) ) {
		return is_bbpress();
	} else {
		return false;
	}
}

// BuddyPress
function use_buddypress() {
	if ( function_exists( 'bp_current_component' ) ) {
		if ( bp_current_component() ) {
			return bp_current_component();
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function is_buddypress_use_page() {
	if ( function_exists( 'bp_is_user' ) ) {
		if ( bp_is_user() ) {
			return bp_is_user();
		} else {
			return false;
		}
	} else {
		return false;
	}
}


/************ List Comment ***************/
if ( !function_exists( 'thim_comment' ) ) {
	function thim_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		//extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo ent2ncr( $tag ) ?><?php comment_class( 'description_comment' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="wrapper-comment">
			<?php
			if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, $args['avatar_size'] );
			}
			?>
			<div class="comment-right">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'thim' ) ?></em>
				<?php endif; ?>

				<div class="comment-extra-info">
					<div class="author"><?php printf( __( '<span class="author-name"><i class="fa fa-user"></i> %s</span>', 'thim' ), get_comment_author_link() ) ?></div>
					<div class="date" itemprop="commentTime">
						<i class="fa fa-calendar"></i> <?php printf( get_comment_date(), get_comment_time() ) ?></div>
					<?php edit_comment_link( __( 'Edit', 'thim' ), '', '' ); ?>

					<?php comment_reply_link( array_merge( $args, array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
					) ) ) ?>
				</div>

				<div class="content-comment">
					<?php comment_text() ?>
				</div>
			</div>
		</div>
		<?php
	}
}



//****************************************
// To change Display Setting options, you can use follow code in file function.php in your theme directory
//****************************************

// dislay setting layout
require TP_THEME_DIR . 'inc/wrapper-before-after.php';

add_filter( 'thim_mtb_setting_after_created', 'thim_mtb_setting_after_created', 10, 2 );
function thim_mtb_setting_after_created( $mtb_setting ) {
	$mtb_setting->removeOption( array( 11 ) );
	$option_name_space = $mtb_setting->owner->optionNamespace;

	$settings   = array(
		'name'      => __( 'Color Sub Title', 'thim' ),
		'id'        => 'mtb_color_sub_title',
		'type'      => 'color-opacity',
		'desc'      => ' ',
		'row_class' => 'child_of_' . $option_name_space . '_mtb_using_custom_heading thim_sub_option',
	);
	$settings_1 = array(
		'name' => __( 'No Padding Content', 'thim' ),
		'id'   => 'mtb_no_padding',
		'type' => 'checkbox',
		'desc' => ' ',
	);

	$mtb_setting->insertOptionBefore( $settings, 11 );
	$mtb_setting->insertOptionBefore( $settings_1, 16 );

	return $mtb_setting;
}

//
function thim_excerpt_length() {
	global $theme_options_data;
	if ( isset( $theme_options_data['thim_archive_excerpt_length'] ) ) {
		$length = $theme_options_data['thim_archive_excerpt_length'];
	} else {
		$length = '50';
	}

	return $length;
}

add_filter( 'excerpt_length', 'thim_excerpt_length', 999 );
function thim_wp_new_excerpt( $text ) {
	if ( $text == '' ) {
		$text           = get_the_content( '' );
		$text           = strip_shortcodes( $text );
		$text           = apply_filters( 'the_content', $text );
		$text           = str_replace( ']]>', ']]>', $text );
		$text           = strip_tags( $text );
		$text           = nl2br( $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$words          = explode( ' ', $text, $excerpt_length + 1 );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			array_push( $words, '' );
			$text = implode( ' ', $words );
		}
	}

	return $text;
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'thim_wp_new_excerpt' );


add_action( 'personal_options_update', 'save_thim_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_thim_extra_user_profile_fields' );

function save_thim_extra_user_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	update_user_meta( $user_id, 'lp_info', $_POST['lp_info'] );
}

// fix before load
function thim_row_style_attributes( $attributes, $args ) {
	//var_dump($args['row_stretch']);
	if ( !empty( $args['row_stretch'] ) && $args['row_stretch'] == 'full-stretched' ) {
		array_push( $attributes['class'], 'thim-fix-stretched' );
	}
	return $attributes;
}

add_filter( 'siteorigin_panels_row_style_attributes', 'thim_row_style_attributes', 10, 2 );

//Required function to upgrade LP 1.x
if ( thim_plugin_active( 'learnpress/learnpress.php' ) ) {
	//filter learnpress hooks
	if ( thim_is_new_learnpress( '2.0' ) ) {

		function thim_new_learnpress_template_path() {
			return 'learnpress-v2/';
		}

		add_filter( 'learn_press_template_path', 'thim_new_learnpress_template_path', 999 );
		require_once TP_THEME_DIR . 'inc/learnpress-v2-functions.php';

	} else if( thim_is_new_learnpress( '1.0' ) ){

		function thim_new_learnpress_template_path() {
			return 'learnpress-v1/';
		}

		add_filter( 'learn_press_template_path', 'thim_new_learnpress_template_path', 999 );
		require_once TP_THEME_DIR . 'inc/learnpress-v1-functions.php';

	} else{
		require_once TP_THEME_DIR . 'inc/learnpress-functions.php';
	}

}

/**
 * Check new version of LearnPress
 *
 * @return mixed
 */
function thim_is_new_learnpress($version) {
	return version_compare( get_option( 'learnpress_version' ), $version, '>=' );
}


add_filter('admin_body_class', 'admin_adcustom_body_class');

function admin_adcustom_body_class($class) {
	$class = '';
	$user_ID = get_current_user_id();
	$user_info = get_userdata($user_ID);
	if( in_array('subscriber', $user_info->roles) ){
		$class = 'admin-custom';
	}
	return $class;
}

/* Function which remove Plugin Update Notices – LearnPress */
//function thim_disable_plugin_learnpress_updates( $value ) {
//	if( !empty( $value->response['learnpress/learnpress.php'] )  ) {
//		unset( $value->response['learnpress/learnpress.php'] );
//	}
//	return $value;
//}
//add_filter( 'site_transient_update_plugins', 'thim_disable_plugin_learnpress_updates' );

/**
 * Display feature image
 *
 * @param $attachment_id
 * @param $size_type
 * @param $width
 * @param $height
 * @param $alt
 * @param $title
 *
 * @return string
 */
function thim_get_feature_image( $attachment_id, $size_type = null, $width = null, $height = null, $alt = null, $title = null ) {

	if ( !$size_type ) {
		$size_type = 'full';
	}
	$src   = wp_get_attachment_image_src( $attachment_id, $size_type );
	$style = '';
	if ( !$src ) {
		// Get demo image
		global $wpdb;
		$attachment_id = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT p.ID FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
				WHERE 	pm.meta_key = %s
				AND 	pm.meta_value LIKE %s",
				'_wp_attached_file',
				'%demo_image.jpg'
			)
		);

		if ( empty( $attachment_id[0] ) ) {
			return;
		}

		$attachment_id = $attachment_id[0];
		$src           = wp_get_attachment_image_src( $attachment_id, 'full' );

	}

	if ( $width && $height ) {

		if ( $src[1] >= $width || $src[2] >= $height ) {

			$crop = ( $src[1] >= $width && $src[2] >= $height ) ? true : false;

			if ( $new_link = aq_resize( $src[0], $width, $height, $crop ) ) {

				$src[0] = $new_link;

			}

		}
		$style = ' width="' . $width . '" height="' . $height . '"';
	} else {
		if ( !empty( $src[1] ) && !empty( $src[2] ) ) {
			$style = ' width="' . $src[1] . '" height="' . $src[2] . '"';
		}
	}

	if ( !$alt ) {
		$alt = get_the_title( $attachment_id );
	}

	if ( !$title ) {
		$title = get_the_title( $attachment_id );
	}

	return '<img src="' . esc_url( $src[0] ) . '" alt="' . esc_attr( $alt ) . '" title="' . esc_attr( $title ) . '" ' . $style . '>';

}