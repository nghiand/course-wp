<?php
/*
 * Post and Page Display Settings
 */
$display->addSubSection( array(
	'name'     => __( 'Archive', 'thim' ),
	'id'       => 'display_archive',
	'position' => 2,
) );

$display->createOption( array(
	'name'    => __( 'Archive Layout', 'thim' ),
	'id'      => 'archive_cate_layout',
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
	'id'      => 'archive_cate_hide_breadcrumbs',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide Breadcrumbs",
	'default' => false,
) );

$display->createOption( array(
	'name'    => __( 'Hide Title', 'thim' ),
	'id'      => 'archive_cate_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide title",
	'default' => false,
) );

$display->createOption( array(
	'name'        => __( 'Top Image', 'thim' ),
	'id'          => 'archive_cate_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'        => __( 'Background Heading Color', 'thim' ),
	'id'          => 'archive_cate_heading_bg_color',
	'type'        => 'color-opacity',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'    => __( 'Color Heading', 'thim' ),
	'id'      => 'archive_cate_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#fff',
) );

$display->createOption( array(
	'name'    => __( 'Color Sub Heading', 'thim' ),
	'id'      => 'archive_cate_sub_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#878787',
) );

$display->createOption( array(
	'name'    => __( 'sub Title', 'thim' ),
	'id'      => 'archive_cate_sub_title',
	'type'    => 'text',
	'default' => '',
) );

$display->createOption( array(
	'name'    => __( 'Grid Column', 'thim' ),
	'id'      => 'archive_cate_grid_column',
	'type'    => 'select',
	'options' => array(
		'2' => __( '2', 'thim' ),
		'3' => __( '3', 'thim' ),
		'4' => __( '4', 'thim' )

	),
	'default' => '2',
) );

$display->createOption( array(
	'name'    => __( 'Excerpt Length', 'thim' ),
	'id'      => 'archive_excerpt_length',
	'type'    => 'number',
	"desc"    => __( 'Enter the number of words you want to cut from the content to be the excerpt of search and archive and portfolio page.', 'thim' ),
	'default' => '20',
	'max'     => '100',
	'min'     => '10',
) );


$display->createOption( array(
	'name'    => __( 'Show category', 'thim' ),
	'id'      => 'show_category',
	'type'    => 'checkbox',
	"desc"    => "show/hidden",
	'default' => false,
) );

$display->createOption( array(
	'name'    => __( 'Show Date', 'thim' ),
	'id'      => 'show_date',
	'type'    => 'checkbox',
	"desc"    => "show/hidden",
	'default' => true,
) );

$display->createOption( array(
	'name'    => __( 'Show Comment', 'thim' ),
	'id'      => 'show_comment',
	'type'    => 'checkbox',
	"desc"    => "show/hidden",
	'default' => true,
) );