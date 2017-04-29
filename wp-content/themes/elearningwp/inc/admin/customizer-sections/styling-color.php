<?php
$styling->addSubSection( array(
	'name'     => 'Color',
	'id'       => 'styling_color',
	'position' => 13,
) );


$styling->createOption( array(
	'name'        => 'Body Background Color',
	'id'          => 'body_bg_color',
	'type'        => 'color-opacity',
	'default'     => '#f6f6f6',
	'livepreview' => '$("body").css("background-color", value);'
) );

$styling->createOption( array(
	'name'        => 'Theme Primary Color',
	'id'          => 'body_primary_color',
	'type'        => 'color-opacity',
	'default'     => '#01b888',
 ) );