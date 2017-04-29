<?php

$footer->addSubSection( array(
	'name'     =>  __( 'Footer', 'thim' ),
	'id'       => 'display_footer',
	'position' => 2,
) );
$footer->createOption( array(
	'name'        => __('Footer Title Font','thim'),
	'id'          => 'footer_title_font_color',
	'type'        => 'color-opacity',
	'default'     => '#fff',
 ) );
$footer->createOption( array(
	'name'        => __('Footer Text Font','thim'),
	'id'          => 'footer_text_font_color',
	'type'        => 'color-opacity',
	'default'     => '#999',
 ) );

$footer->createOption( array(
	'name'        =>__( 'Background Color', 'thim' ),
	'id'          => 'footer_bg_color',
	'type'        => 'color-opacity',
	'default'     => '#2D3339',
	'livepreview' => '$(".site-footer").css("backgroundColor", value);'
) );

$footer->createOption( array(
	'name' => __( 'Background Image', 'thim' ),
	'id'   => 'footer_background_img',
	'type' => 'upload',
) );

$footer->createOption( array(
	'name'    => __( 'Background Position', 'thim' ),
	'id'      => 'footer_bg_position',
	'type'    => 'select',
	'options' => array(
		'left top'      => 'Left Top',
		'left center'   => 'Left Center',
		'left bottom'   => 'Left Bottom',
		'right top'     => 'Right Top',
		'right center'  => 'Right Center',
		'right bottom'  => 'Right Bottom',
		'center top'    => 'Center Top',
		'center center' => 'Center Center',
		'center bottom' => 'Center Bottom'
	),
	'default' => 'center center'
) );