<?php
$courses->addSubSection( array(
	'name'     => __( 'LearnPress Archive', 'thim' ),
	'id'       => 'display_learnpress',
	'position' => 2,
) );

$courses->createOption( array(
	'name'    => __( 'Layout', 'thim' ),
	'id'      => 'learnpress_cate_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'sidebar-right'
) );

$courses->createOption( array(
	'name'    => __('Hide Breadcrumbs?','thim'),
	'id'      => 'learnpress_cate_hide_breadcrumbs',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide Breadcrumbs",
	'default' => false,
) );

$courses->createOption( array(
	'name'    => __('Hide Title','thim'),
	'id'      => 'learnpress_cate_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide title",
	'default' => false,
) );

$courses->createOption( array(
	'name'        => __('Top Image','thim'),
	'id'          => 'learnpress_cate_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$courses->createOption( array(
	'name'        => __('Background Heading Color','thim'),
	'id'          => 'learnpress_cate_heading_bg_color',
	'type'        => 'color-opacity',
	'livepreview' => ''
) );

$courses->createOption( array(
	'name'    => __('Color Heading','thim'),
	'id'      => 'learnpress_cate_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#fff',
) );

$courses->createOption( array(
	'name'    => __('Color Sub Heading','thim'),
	'id'      => 'learnpress_cate_sub_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#878787',
) );

$courses->createOption( array(
	'name'    => __('sub Title','thim'),
	'id'      => 'learnpress_cate_sub_title',
	'type'    => 'text',
	'default' => '',
) );

$courses->createOption( array(
	'name'    => __( 'Grid Column', 'thim' ),
	'id'      => 'learnpress_cate_grid_column',
	'type'    => 'select',
	'options' => array(
		'2' => __( '2', 'thim' ),
		'3' => __( '3', 'thim' ),
		'4' => __( '4', 'thim' )
	),
	'default' => '3',
) );

