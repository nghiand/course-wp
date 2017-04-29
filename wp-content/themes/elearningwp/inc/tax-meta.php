<?php
//require_once get_template_directory() . '/framework/libs/tax-meta-class/Tax-meta-class.php';
//
//if ( is_admin() ) {
//    /*
//       * prefix of meta keys, optional
//       */
//    $prefix = 'thim_';
//    /*
//       * configure your meta box
//       */
//    $config  = array(
//        'id'             => 'demo_meta_box', // meta box id, unique per meta box
//        'title'          => 'Demo Meta Box', // meta box title
//        'pages'          => array( 'category' ), // taxonomy name, accept categories, post_tag and custom taxonomies
//        'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
//        'fields'         => array(), // list of meta fields (can be added by field arrays)
//        'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
//        'use_with_theme' => false //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
//    );
//    $config1 = array(
//        'id'             => 'demo_meta_box', // meta box id, unique per meta box
//        'title'          => 'Demo Meta Box', // meta box title
//        'pages'          => array( 'product_cat' ), // taxonomy name, accept categories, post_tag and custom taxonomies
//        'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
//        'fields'         => array(), // list of meta fields (can be added by field arrays)
//        'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
//        'use_with_theme' => false //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
//    );
//    $config_portfolio = array(
//        'id'             => 'demo_meta_box', // meta box id, unique per meta box
//        'title'          => 'Demo Meta Box', // meta box title
//        'pages'          => array( 'portfolio_category' ), // taxonomy name, accept categories, post_tag and custom taxonomies
//        'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
//        'fields'         => array(), // list of meta fields (can be added by field arrays)
//        'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
//        'use_with_theme' => false //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
//    );
//
//    /*
//       * Initiate your meta box
//       */
//    $my_meta  = new Tax_Meta_Class( $config );
//    $my_meta1 = new Tax_Meta_Class( $config1 );
//    $my_meta_portfolio = new Tax_Meta_Class( $config_portfolio );
//
//    /*
//       * Add fields to your meta box
//       */
//
//    /* blog */
//    $my_meta = new Tax_Meta_Class( $config );
//    $my_meta->addSelect( $prefix . 'layout', array( '' => 'Using in Theme Option',
//                                                    'no-sidebar' => 'No Sidebar',
//                                                    'left-sidebar' => 'Left Sidebar',
//                                                    'right-sidebar' => 'Right Sidebar',
//                                                    'lcr-sidebar' => 'Sidebar + Content + Sidebar',
//                                                    'lrc-sidebar' => 'Sidebar + Sidebar + Content',
//                                                    'clr-sidebar' => 'Content + Sidebar + Sidebar' ),
//                                                    array( 'name' => __( 'Custom Layout ', 'thim' ), 'std' => array( '' ) ) );
//    $my_meta->addSelect( $prefix . 'style_archive', array( '' => 'Using in Theme Option',
//                                                        'basic' => 'Basic',
//                                                        'grid' => 'Grid',
//                                                        // 'masonry' => 'Masonry',
//                                                        ),
//                                                    array( 'name' => __( 'Custom Style ', 'thim' ), 'std' => array( '' ) ) );
//
//    $my_meta->addSelect( $prefix . 'style_archive_columns', array( '' => 'Using in Theme Option',
//                                                        'col-2' => '2 Columns',
//                                                        'col-3' => '3 Columns',
//                                                        'col-4' => '4 Columns',
//                                                        ),
//                                                    array( 'name' => __( 'Custom Columns ', 'thim' ), 'std' => array( '' ) ) );
//
//    $my_meta->addSelect( $prefix . 'paging_style', array( '' => 'Using in Theme Option',
//                                                        'paging' => 'Paging',
//                                                        'btn_load_more' => 'Button Load More',
//                                                        'scroll' => 'Infinite Scroll',
//                                                        ),
//                                                    array( 'name' => __( 'Custom Paging ', 'thim' ), 'std' => array( '' ) ) );
//
//
//    $my_meta->addCheckbox($prefix . 'custom_cat_bg_color',array('name'=> __('Custom Content Background Color ', 'thim') ) );
//    $my_meta->addColor($prefix . 'cat_bg_color', array('name' => __('Background Color Content ', 'thim') ) );
//
//    $my_meta1->addImage( $prefix . 'product_image_field_id', array( 'name' => __( 'Feature Image ', 'thim' ) ) );
//
//    $my_meta1->addSelect( $prefix . 'cate_product_heading_bg', array( 'default' => 'Using in Theme Option',
//                                                                        'bg_color' => 'Background Color',
//                                                                        'bg_img' => 'Background Image' ),
//                                                                array( 'name' => 'Custom Background Heading ', 'std' => array( 'default' ) ) );
//    $my_meta1->addColor($prefix . 'bg_color_product', array('name' => __('Background Color ', 'thim')));
//    $my_meta1->addImage( $prefix . 'bg_img_product', array( 'name' => __( 'Background Image ', 'thim' ) ) );
//
//    $my_meta1->addSelect( $prefix . 'custom_cate_layout', array( 'default' => 'Using in Theme Option',
//                                                                        'left_sidebar' => 'Left Sidebar',
//                                                                        'right_sidebar' => 'Right Sidebar',
//                                                                        'fullwidth' => 'No Sidebar' ),
//                                                                    array( 'name' => 'Custom Layout ', 'std' => array( 'left_sidebar' ) ) );
//
//    /* portfolio */
//    $my_meta_portfolio->addText( $prefix . 'icon_single', array( 'name' => 'Icon for Single Portfolio','desc'=>'enter name icon fontawesome ex: fa-home') );
//    $my_meta_portfolio->addImage( $prefix . 'icon_images_single', array( 'name' => __( 'Or Upload Icon', 'thim' ) ) );
//
//    $my_meta->Finish();
//}

require_once get_template_directory() . '/framework/libs/tax-meta-class/Tax-meta-class.php';

if ( is_admin() ) {
	/*
	   * prefix of meta keys, optional
	   */
	$prefix = 'thim_';

	/*
	   * configure your meta box
	   */
	$config = array(
		'id'             => 'category_meta_box',
		// meta box id, unique per meta box
		'title'          => 'Category Meta Box',
		// meta box title
		'pages'          => array( 'category', 'product_cat' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$config_product_cat = array(
		'id'             => 'product_cat_meta_box',
		// meta box id, unique per meta box
		'title'          => 'Category Meta Box',
		// meta box title
		'pages'          => array( 'product_cat' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$config_courses_cat = array(
		'id'             => 'product_cat_meta_box',
		// meta box id, unique per meta box
		'title'          => 'Course Meta Box',
		// meta box title
		'pages'          => array( 'course_category' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);
	/*
	   * Initiate your meta box
	   */
	$my_meta            = new Tax_Meta_Class( $config );
	$product_cat_meta   = new Tax_Meta_Class( $config_product_cat );
	$config_courses_cat = new Tax_Meta_Class( $config_courses_cat );

	/*
   * Add fields to your meta box
   */
	/* blog */

	$my_meta->addSelect( $prefix . 'layout', array(
		''              => 'Using in Theme Option',
		'full-content'  => 'No Sidebar',
		'sidebar-left'  => 'Left Sidebar',
		'sidebar-right' => 'Right Sidebar'
	), array( 'name' => __( 'Custom Layout ', 'thim' ), 'std' => array( '' ) ) );

	$my_meta->addSelect( $prefix . 'custom_heading', array(
		''       => 'Using in Theme Option',
		'custom' => 'Custom',
	), array( 'name' => __( 'Custom Heading ', 'thim' ), 'std' => array( '' ) ) );

	$my_meta->addImage( $prefix . 'archive_top_image', array( 'name' => __( 'Background images Heading', 'thim' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_heading_bg_color', array( 'name' => __( 'Background Color Heading', 'thim' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_heading_text_color', array( 'name' => __( 'Text Color Heading', 'thim' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_sub_heading_text_color', array( 'name' => __( 'Color Description Category', 'thim' ) ) );
	$my_meta->addCheckbox( $prefix . 'archive_cate_hide_title', array( 'name' => __( 'Hide Title', 'thim' ) ) );
	$my_meta->addCheckbox( $prefix . 'archive_cate_hide_breadcrumbs', array( 'name' => __( 'Hide Breadcrumbs', 'thim' ) ) );
	$my_meta->Finish();

	// option woocommerce
	$product_cat_meta->addSelect( $prefix . 'layout', array(
		''              => 'Using in Theme Option',
		'full-content'  => 'No Sidebar',
		'sidebar-left'  => 'Left Sidebar',
		'sidebar-right' => 'Right Sidebar'
	), array( 'name' => __( 'Custom Layout ', 'thim' ), 'std' => array( '' ) ) );

	$product_cat_meta->addSelect( $prefix . 'custom_heading', array(
		''       => 'Using in Theme Option',
		'custom' => 'Custom',
	), array( 'name' => __( 'Custom Heading ', 'thim' ), 'std' => array( '' ) ) );

	$product_cat_meta->addImage( $prefix . 'woo_top_image', array( 'name' => __( 'Background images Heading', 'thim' ) ) );
	$product_cat_meta->addColor( $prefix . 'woo_cate_heading_bg_color', array( 'name' => __( 'Background Color Heading', 'thim' ) ) );
	$product_cat_meta->addColor( $prefix . 'woo_cate_heading_text_color', array( 'name' => __( 'Text Color Heading', 'thim' ) ) );
	$product_cat_meta->addColor( $prefix . 'woo_cate_sub_heading_text_color', array( 'name' => __( 'Color Description Category', 'thim' ) ) );
	$product_cat_meta->addCheckbox( $prefix . 'woo_cate_hide_title', array( 'name' => __( 'Hide Title', 'thim' ) ) );
	$product_cat_meta->addCheckbox( $prefix . 'woo_cate_hide_breadcrumbs', array( 'name' => __( 'Hide Breadcrumbs', 'thim' ) ) );
	$product_cat_meta->Finish();

	// option courses
	$config_courses_cat->addSelect( $prefix . 'layout', array(
		''              => 'Using in Theme Option',
		'full-content'  => 'No Sidebar',
		'sidebar-left'  => 'Left Sidebar',
		'sidebar-right' => 'Right Sidebar'
	), array( 'name' => __( 'Custom Layout ', 'thim' ), 'std' => array( '' ) ) );

	$config_courses_cat->addSelect( $prefix . 'custom_heading', array(
		''       => 'Using in Theme Option',
		'custom' => 'Custom',
	), array( 'name' => __( 'Custom Heading ', 'thim' ), 'std' => array( '' ) ) );

	$config_courses_cat->addImage( $prefix . 'learnpress_top_image', array( 'name' => __( 'Background images Heading', 'thim' ) ) );
	$config_courses_cat->addColor( $prefix . 'learnpress_cate_heading_bg_color', array( 'name' => __( 'Background Color Heading', 'thim' ) ) );
	$config_courses_cat->addColor( $prefix . 'learnpress_cate_heading_text_color', array( 'name' => __( 'Text Color Heading', 'thim' ) ) );
	$config_courses_cat->addColor( $prefix . 'learnpress_cate_sub_heading_text_color', array( 'name' => __( 'Color Description Category', 'thim' ) ) );
	$config_courses_cat->addCheckbox( $prefix . 'learnpress_cate_hide_title', array( 'name' => __( 'Hide Title', 'thim' ) ) );
	$config_courses_cat->addCheckbox( $prefix . 'learnpress_cate_hide_breadcrumbs', array( 'name' => __( 'Hide Breadcrumbs', 'thim' ) ) );
	$config_courses_cat->Finish();
}
