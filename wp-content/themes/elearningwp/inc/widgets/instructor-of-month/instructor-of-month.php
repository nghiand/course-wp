<?php

/**
 * Class Instructor_Of_Month_Widget
 *
 * Widget Name: Instructor Of Month
 *
 * Author: Ken
 */
class Instructor_Of_Month_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'instructor-of-month',
			__( 'Thim: Instructor Of Month', 'thim' ),
			array(
				'description'   => __( 'Show instructor of month who created popular courses.', 'thim' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'heading_group' => array(
					'type'   => 'section',
					'label'  => __( 'Heading', 'thim' ),
					'hide'   => true,
					'fields' => array(
						'title'               => array(
							'type'                  => 'text',
							'label'                 => __( 'Heading Text', 'thim' ),
							'default'               => __( "Instructor of the month", "thim" ),
							'allow_html_formatting' => true
						),
						'textcolor'           => array(
							'type'  => 'color',
							'label' => __( 'Text Heading color', 'thim' ),
							"class" => "color-mini",
						),
						'size'                => array(
							"type"    => "select",
							"label"   => __( "Size Heading", "thim" ),
							"default" => "h3",
							"options" => array(
								"h2" => __( "h2", "thim" ),
								"h3" => __( "h3", "thim" ),
								"h4" => __( "h4", "thim" ),
								"h5" => __( "h5", "thim" ),
								"h6" => __( "h6", "thim" )
							),
							"class"   => "color-mini",
						),
						'font_heading'        => array(
							"type"          => "select",
							"label"         => __( "Font Heading", "thim" ),
							"default"       => "default",
							"options"       => array(
								"default" => __( "Default", "thim" ),
								"custom"  => __( "Custom", "thim" )
							),
							"description"   => __( "Select Font heading.", "thim" ),
							'state_emitter' => array(
								'callback' => 'select',
								'args'     => array( 'font_heading_type' )
							),
							"class"         => "color-mini",
						),
						'custom_font_heading' => array(
							'type'          => 'section',
							'label'         => __( 'Custom Font Heading', 'thim' ),
							'hide'          => true,
							"class"         => "clear-both",
							'state_handler' => array(
								'font_heading_type[custom]'  => array( 'show' ),
								'font_heading_type[default]' => array( 'hide' ),
							),
							'fields'        => array(
								'custom_font_size'   => array(
									"type"        => "number",
									"label"       => __( "Font Size", "thim" ),
									"suffix"      => "px",
									"default"     => "18",
									"description" => __( "custom font size", "thim" ),
									"class"       => "color-mini",
								),
								'custom_font_weight' => array(
									"type"        => "select",
									"label"       => __( "Custom Font Weight", "thim" ),
									"options"     => array(
										"normal" => __( "Normal", "thim" ),
										"bold"   => __( "Bold", "thim" ),
										"100"    => __( "100", "thim" ),
										"200"    => __( "200", "thim" ),
										"300"    => __( "300", "thim" ),
										"400"    => __( "400", "thim" ),
										"500"    => __( "500", "thim" ),
										"600"    => __( "600", "thim" ),
										"700"    => __( "700", "thim" ),
										"800"    => __( "800", "thim" ),
										"900"    => __( "900", "thim" )
									),
									"description" => __( "Select Custom Font Weight", "thim" ),
									"class"       => "color-mini",
								),
							),
						),
					),
				),
				'desc_group'    => array(
					'type'   => 'section',
					'label'  => __( 'Description', 'thim' ),
					'hide'   => true,
					'fields' => array(
						'des'             => array(
							'type'                  => 'textarea',
							'label'                 => __( 'Descriptions', 'thim' ),
							"description"           => __( "descriptions", "thim" ),
							'allow_html_formatting' => true
						),
						'des_color'       => array(
							'type'    => 'color',
							'label'   => __( 'Description color', 'thim' ),
							'default' => '',
							"class"   => "color-mini",
						),
						'des_font_size'   => array(
							"type"        => "number",
							"label"       => __( "Font Size", "thim" ),
							"suffix"      => "px",
							"default"     => "16",
							"description" => __( "custom font size", "thim" ),
							"class"       => "color-mini",
						),
						'des_font_weight' => array(
							"type"        => "select",
							"label"       => __( "Custom Font Weight", "thim" ),
							"options"     => array(
								"normal" => __( "Normal", "thim" ),
								"bold"   => __( "Bold", "thim" ),
								"100"    => __( "100", "thim" ),
								"200"    => __( "200", "thim" ),
								"300"    => __( "300", "thim" ),
								"400"    => __( "400", "thim" ),
								"500"    => __( "500", "thim" ),
								"600"    => __( "600", "thim" ),
								"700"    => __( "700", "thim" ),
								"800"    => __( "800", "thim" ),
								"900"    => __( "900", "thim" )
							),
							"description" => __( "Select Custom Font Weight", "thim" ),
							"class"       => "color-mini",
						),
					),
				),
				'limit'         => array(
					'type'    => 'number',
					'label'   => __( 'Number Of Feature courses', 'thim' ),
					'default' => '4'
				)
			)
		);
	}

	function get_template_name( $instance ) {
		if ( thim_is_new_learnpress( '2.0' ) ) {
			return 'base-v2';
		} else if ( thim_is_new_learnpress( '1.0' ) ) {
			return 'base-v1';
		}else{
			return 'base';
		}
	}

	function get_style_name( $instance ) {
		return false;
	}
}

/**
 * Register widget
 */
function thim_instructor_of_month_register_widget() {
	register_widget( 'Instructor_Of_Month_Widget' );
}

add_action( 'widgets_init', 'thim_instructor_of_month_register_widget' );
