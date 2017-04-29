<?php
$courses->addSubSection( array(
	'name'     => esc_html__( 'LearnPress Features', 'thim' ),
	'id'       => 'learnpress_features',
	'position' => 5,
) );

$courses->createOption( array(
	'name'    => esc_html__( 'Hidden Ads', 'thim' ),
	'id'      => 'learnpress_hidden_ads',
	'type'    => 'checkbox',
	'desc'    => esc_html__( 'Hidden ads learnpress on WordPress admin.', 'thim' ),
	'default' => false,
) );