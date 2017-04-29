<?php

$custom_css = $titan->createThemeCustomizerSection( array(
	'name'     => __( 'Custom CSS', 'thim' ),
	'position' => 201,
) );

/*
 * Archive Display Settings
 */
$custom_css->createOption( array(
	'name'    => __( 'Custom CSS', 'thim' ),
	'id'      => 'custom_css',
	'type'    => 'textarea',
	'desc'    => __( 'Put your additional CSS rules here', 'thim' ),
	'is_code' => true,
) );