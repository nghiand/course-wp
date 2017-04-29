<?php
/*
 * Front page displays settings: Posts page
 */
$display->addSubSection( array(
	'name'     =>  __( 'Frontpage', 'thim' ),
	'id'       => 'display_frontpage',
	'position' => 1,
) );

$display->createOption( array(
	'name'    => __('Front Page Layout','thim'),
	'id'      => 'front_page_cate_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'sidebar-left'
) );

$display->createOption( array(
	'name'    => __('Hide Breadcrumbs?','thim'),
	'id'      => 'front_page_hide_breadcrumbs',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide Breadcrumbs",
	'default' => false,
) );

$display->createOption( array(
	'name'    => __('Hide Title','thim'),
	'id'      => 'front_page_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide title",
	'default' => false,
) );

$display->createOption( array(
	'name'        => __('Top Image','thim'),
	'id'          => 'front_page_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'        => __('Background Heading Color','thim'),
	'id'          => 'front_page_heading_bg_color',
	'type'        => 'color-opacity',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'    => __('Color Heading','thim'),
	'id'      => 'front_page_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#fff',
) );

$display->createOption( array(
	'name'    => __('Color Sub Heading','thim'),
	'id'      => 'front_page_sub_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#878787',
) );

$display->createOption( array(
	'name'    => 'Custom Title',
	'id'      => 'front_page_custom_title',
	'type'    => 'text',
	'default' => '',
) );

$display->createOption( array(
	'name'    => 'Sub Title',
	'id'      => 'front_page_sub_title',
	'type'    => 'text',
	'default' => '',
) );
