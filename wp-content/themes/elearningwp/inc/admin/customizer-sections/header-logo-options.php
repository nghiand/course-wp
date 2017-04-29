<?php
// main menu
$header->addSubSection( array(
	'name'     => __( 'Header Options', 'thim' ),
	'id'       => 'display_logo_options',
	'position' => 5,
) );

$header->createOption( array(
	'name'    => __( 'Margin Top Header', 'thim' ),
	'id'      => 'margin_top_header',
	'type'    => 'number',
	'default' => '0',
	'max'     => '100',
	'min'     => '0',
	'step'    => '1',
	'desc'    => __( 'margin top header (px)', 'thim' )
) );

$header->createOption( array(
	'name'    => __( 'Margin Top Logo', 'thim' ),
	'id'      => 'margin_top_logo',
	'type'    => 'number',
	'default' => '0',
	'max'     => '50',
	'min'     => '-50',
	'step'    => '1',
	'desc'    => __( 'margin top logo (px)', 'thim' )
) );

$header->createOption( array(
	'name'    => __( 'Margin Bottom Logo', 'thim' ),
	'id'      => 'margin_bottom_logo',
	'type'    => 'number',
	'default' => '0',
	'max'     => '50',
	'min'     => '-50',
	'step'    => '1',
	'desc'    => __( 'margin bottom logo (px)', 'thim' )
) );