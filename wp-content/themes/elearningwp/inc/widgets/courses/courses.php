<?php

/**
 * Class Courses_Widget
 *
 * Widget Name: Courses
 *
 * Author: Ken
 */
class Courses_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'courses',
			__( 'Thim: Courses', 'thim' ),
			array(
				'description'   => __( 'Display courses', 'thim' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'heading_group'    => array(
					'type'   => 'section',
					'label'  => __( 'Heading', 'thim' ),
					'hide'   => true,
					'fields' => array(
						'title'               => array(
							'type'                  => 'text',
							'label'                 => __( 'Heading Text', 'thim' ),
							'default'               => __( "Popular Courses", "thim" ),
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
				'desc_group'       => array(
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
				'kind'             => array(
					'type'    => 'select',
					'label'   => __( 'Kind Of Courses', 'thim' ),
					'options' => array(
						'popular' => __( 'Popular courses', 'thim' ),
						'latest'  => __( 'Latest courses', 'thim' )
					),
				),
				'layout'           => array(
					'type'          => 'select',
					'label'         => __( 'Widget Layout', 'thim' ),
					'options'       => array(
						'layout-01' => __( 'Layout 01', 'thim' ),
						'layout-02' => __( 'Layout 02', 'thim' )
					),
					'default'       => 'layout-01',
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'layout_type' )
					),
				),
				'columns'          => array(
					'type'          => 'select',
					'label'         => __( 'Columns', 'thim' ),
					'options'       => array(
						'2' => __( '2', 'thim' ),
						'3' => __( '3', 'thim' ),
						'4' => __( '4', 'thim' )
					),
					'state_handler' => array(
						'layout_type[layout-01]' => array( 'show' ),
						'layout_type[layout-02]' => array( 'hide' ),
					),
				),
				'limit'            => array(
					'type'    => 'number',
					'label'   => __( 'Number Of Courses', 'thim' ),
					'default' => '4'
				),

				'link_all_courses' => array(
					'type'          => 'checkbox',
					'label'         => __( 'Show Link All Courses', 'thim' ),
					'default'       => true,
					'state_handler' => array(
						'layout_type[layout-01]' => array( 'show' ),
						'layout_type[layout-02]' => array( 'hide' ),
					),
				),
				'slider-options'   => array(
					'type'          => 'section',
					'label'         => __( 'Slider Options', 'thim' ),
					'hide'          => true,
					"class"         => "clear-both",
					'state_handler' => array(
						'layout_type[layout-01]' => array( 'show' ),
						'layout_type[layout-02]' => array( 'hide' ),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'courses_slider_opt' )
					),
					'fields'        => array(
						'courses_slider'  => array(
							'type'    => 'radio',
							'label'   => __( 'Courses Slider', 'thim' ),
							'options' => array(
								'yes' => __( 'Yes', 'thim' ),
								'no'  => __( 'No', 'thim' )
							),

							'default' => 'yes'
						),
						'row'             => array(
							'type'          => 'select',
							'label'         => __( 'Row of slider', 'thim' ),
							'options'       => array(
								'1' => __( '1', 'thim' ),
								'2' => __( '2', 'thim' )
							),
							'state_handler' => array(
								'courses_slider_opt[yes]' => array( 'show' ),
								'courses_slider_opt[no]'  => array( 'hide' ),
							),
						),
						'show_page_nav'   => array(
							'type'          => 'checkbox',
							'label'         => __( 'Show Page Navigation', 'thim' ),
							'state_handler' => array(
								'courses_slider_opt[yes]' => array( 'show' ),
								'courses_slider_opt[no]'  => array( 'hide' ),
							),
							'default'       => true
						),
						'show_navigation' => array(
							'type'          => 'checkbox',
							'label'         => __( 'Show Navigation Arrow', 'thim' ),
							'state_handler' => array(
								'courses_slider_opt[yes]' => array( 'show' ),
								'courses_slider_opt[no]'  => array( 'hide' ),
							),
							'default'       => false
						),
					),
				),


			)
		);
	}

	function get_template_name( $instance ) {
		if ( $instance['layout'] == 'layout-02' ) {
			$layout = 'layout-02';
		} else {
			$layout = 'base';
		}
		if ( thim_is_new_learnpress( '2.0' ) ) {
			$layout .= '-v2';
		} else if ( thim_is_new_learnpress( '1.0' ) ) {
			$layout .= '-v1';
		}
		return $layout;
	}

	function get_style_name( $instance ) {
		return false;
	}

	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-owl-carousel' );
	}
}

function thim_courses_register_widget() {
	register_widget( 'Courses_Widget' );
}

add_action( 'widgets_init', 'thim_courses_register_widget' );