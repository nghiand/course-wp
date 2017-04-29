<?php
$woocommerce->addSubSection( array(
	'name'     => __('Category Products','thim'),
	'id'       => 'woo_archive',
	'position' => 1,
) );

$woocommerce->createOption( array(
	'name'    => __( 'Archive Layout','thim'),
	'id'      => 'woo_cate_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'sidebar-left'
) );

$woocommerce->createOption( array(
	'name'    => __('Hide Breadcrumbs?','thim'),
	'id'      => 'woo_cate_hide_breadcrumbs',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide Breadcrumbs",
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'    => __('Hide Title','thim'),
	'id'      => 'woo_cate_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide title",
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'        => __('Top Image','thim'),
	'id'          => 'woo_cate_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$woocommerce->createOption( array(
	'name'        => __('Background Heading Color','thim'),
	'id'          => 'woo_cate_heading_bg_color',
	'type'        => 'color-opacity',
	'livepreview' => ''
) );

$woocommerce->createOption( array(
	'name'    => __('Color Heading','thim'),
	'id'      => 'woo_cate_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#fff',
) );

$woocommerce->createOption( array(
	'name'    => __('Color Sub Heading','thim'),
	'id'      => 'woo_cate_sub_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#878787',
) );


$woocommerce->createOption( array(
	'name'    => __('sub Title','thim'),
	'id'      => 'woo_cate_sub_title',
	'type'    => 'text',
	'default' => '',
) );