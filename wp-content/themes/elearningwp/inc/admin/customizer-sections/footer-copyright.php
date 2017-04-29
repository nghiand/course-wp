<?php
$footer->addSubSection( array(
	'name'     => __( 'Copyright', 'thim' ),
	'id'       => 'display_copyright',
	'position' => 3,
) );

$footer->createOption( array(
	'name'        => __( 'Background Color', 'thim' ),
	'id'          => 'copyright_bg_color',
	'type'        => 'color-opacity',
	'default'     => '#23272D',
	'livepreview' => '$(".copyright-area").css("backgroundColor", value);'
) );

$footer->createOption( array(
	'name'        => __( 'Text Color', 'thim' ),
	'id'          => 'copyright_text_color',
	'type'        => 'color-opacity',
	'default'     => '#575C61',
	'livepreview' => '$(".copyright-area,.copyright-area a").css("color", value);'
) );
$copy_right = 'http://www.thimpress.com';

$footer->createOption( array(
	'name'        => __( 'Copyright Text', 'thim' ),
	'id'          => 'copyright_text',
	'type'        => 'textarea',
	'default'     => 'Powered By <a href="' . $copy_right . '">ThimPress</a>eLearningWP &copy; 2015',
	'livepreview' => '$(".copyright").html(function(){return "<p>"+ value + "</p>";})'
) );

$footer->createOption( array(
	'name' => __( 'Back To Top', 'thim' ),
	'id'   => 'show_to_top',
	'type' => 'checkbox',
	'des'  => __( 'show or hide back to top', 'thim' ),
) );