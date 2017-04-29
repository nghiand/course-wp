<?php
/*
 * Post and Page Display Settings
 */
$display->addSubSection( array(
	'name'     =>  __( 'Post & Page', 'thim' ),
	'id'       => 'display_postpage',
	'position' => 3,
) );

$display->createOption( array(
	'name'    => __( 'Single & Page Layout', 'thim' ),
	'id'      => 'archive_single_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'sidebar-left'
) );

$display->createOption( array(
	'name'    => __( 'Hide Breadcrumbs?', 'thim' ),
	'id'      => 'archive_single_hide_breadcrumbs',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide Breadcrumbs",
	'default' => false,
) );

$display->createOption( array(
	'name'    => __( 'Hide Title', 'thim' ),
	'id'      => 'archive_single_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide title",
	'default' => false,
) );

$display->createOption( array(
	'name'        => __( 'Top Image', 'thim' ),
	'id'          => 'archive_single_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'        => __( 'Background Heading Color', 'thim' ),
	'id'          => 'archive_single_heading_bg_color',
	'type'        => 'color-opacity',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'    => __( 'Color Heading', 'thim' ),
	'id'      => 'archive_single_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#fff',
) );

$display->createOption( array(
	'name'    => __( 'Color Sub Heading', 'thim' ),
	'id'      => 'archive_single_sub_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#878787',
) );

$display->createOption( array(
	'name'    => __( 'sub Title', 'thim' ),
	'id'      => 'archive_single_sub_title',
	'type'    => 'text',
	'default' => '',
) );