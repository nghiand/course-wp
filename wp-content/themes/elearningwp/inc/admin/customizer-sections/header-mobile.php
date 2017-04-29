<?php

// main menu

$header->addSubSection( array(
	'name'     => __( 'Mobile Menu', 'thim' ),
	'id'       => 'display_mobile_menu',
	'position' => 15,
) );


$header->createOption( array(
	"name"    => __( "Background color", "thim" ),
	"desc"    => "Pick a background color for main menu",
	"id"      => "bg_mobile_menu_color",
	"default" => "#fff",
	"type"    => "color-opacity"
) );


$header->createOption( array(
	"name"    => __( "Text color", "thim" ),
	"desc"    => __( "Pick a text color for main menu", "thim" ),
	"id"      => "mobile_menu_text_color",
	"default" => "#0e2a36",
	"type"    => "color-opacity"
) );
$header->createOption( array(
	"name"    => __( "Text Hover color", "thim" ),
	"desc"    => __( "Pick a text hover color for main menu", "thim" ),
	"id"      => "mobile_menu_text_hover_color",
	"default" => "#01b888",
	"type"    => "color-opacity"
) );

$header->createOption( array(
	'name'    => __( 'Config Logo', 'thim' ),
	'desc'    => '',
	'id'      => 'config_logo_mobile',
	'options' => array( 'default_logo' => 'Default',
						'custom_logo'  => 'Custom'
	),
	'type'    => 'select',
	'default' => 'default_logo'
) );


$header->createOption( array(
	'name'    => __( 'Logo', 'thim' ),
	'id'      => 'logo_mobile',
	'type'    => 'upload',
	'desc'    => __( 'Upload your logo', 'thim' ),
	'default' => get_template_directory_uri( 'template_directory' ) . "/images/logo.png",
) );

$header->createOption( array(
	'name'    => __( 'Sticky Logo', 'thim' ),
	'id'      => 'sticky_logo_mobile',
	'type'    => 'upload',
	'desc'    => __( 'Upload your sticky logo', 'thim' ),
	'default' => get_template_directory_uri( 'template_directory' ) . "/images/sticky-logo.png",
) );