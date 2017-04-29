<?php
$styling->addSubSection( array(
    'name'     => __('Support','thim'),
	'id'       => 'styling_rtl',
	'position' => 15,
) );

$styling->createOption( array(
	'name'    => __('RTL Support','thim'),
	'id'      => 'rtl_support',
	'type'    => 'checkbox',
	"desc"    => "Enable/Disable",
	'default' => false,
) );

$styling->createOption( array(
	'name'    => __('Preload','thim'),
    'id'      => 'preload',
    'type'    => 'checkbox',
	"desc"    => "Enable/Disable",
    'default' => false,
) );
