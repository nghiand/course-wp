<?php
$share_setting = $titan->createMetaBox( array(
	'name'      => __( 'Share This and Number Related', 'thim' ),
	'post_type' => array( 'post', ),
) );
$share_setting->createOption( array(
	'name'    => __( 'Number Related', 'thim' ),
	'id'      => 'number_related',
	'type'    => 'number',
	'default' => 4,
	'min'     => '1',
	'max'     => '10'
) );

$share_setting->createOption( array(
	'name' => __( 'Text Social', 'thim' ),
	'id'   => 'text_share_this',
	'type' => 'text',
) );
$share_setting->createOption( array(
	'name'    => __( 'Face', 'thim' ),
	'id'      => 'share_one_face',
	'type'    => 'checkbox',
	'desc'    => ' ',
	'default' => true,
) );
$share_setting->createOption( array(
	'name'    => __( 'Twitter', 'thim' ),
	'id'      => 'share_one_twitter',
	'type'    => 'checkbox',
	'desc'    => ' ',
	'default' => true,
) );
$share_setting->createOption( array(
	'name'    => __( 'Google', 'thim' ),
	'id'      => 'share_one_google_plus',
	'type'    => 'checkbox',
	'desc'    => ' ',
	'default' => true,
) );
$share_setting->createOption( array(
	'name'    => __( 'Tumblr', 'thim' ),
	'id'      => 'share_one_tumblr',
	'type'    => 'checkbox',
	'desc'    => ' ',
	'default' => true,
) );