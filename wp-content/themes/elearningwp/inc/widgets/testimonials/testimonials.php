<?php
if ( class_exists( 'THIM_Testimonials' ) ) {
	class Testimonials_Widget extends Thim_Widget {
		function __construct() {
			$link_images = get_template_directory_uri() . '/inc/widgets/testimonials/images/';
			parent::__construct(
				'testimonials',
				__( 'Thim: Testimonials', 'thim' ),
				array(
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
								'default'               => __( "Testimonials", "thim" ),
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

					// config
					't_config'      => array(
						'type'   => 'section',
						'label'  => __( 'Config', 'thim' ),
						'hide'   => true,
						'fields' => array(
							// text color
							'bg-color'      => array(
								'type'  => 'color',
								'label' => __( 'Background Content Color', 'thim' ),
								"class" => "color-mini"

							),
							't_text_color'  => array(
								'type'  => 'color',
								'label' => __( 'Text Content color', 'thim' ),
								"class" => "color-mini"
							),
							'author_color'  => array(
								'type'  => 'color',
								'label' => __( 'Author color', 'thim' ),
								"class" => "color-mini"
							),

							'regency_color' => array(
								'type'  => 'color',
								'label' => __( 'Regency color', 'thim' ),
								"class" => "color-mini"
							),
						),
					),
					'number'        => array(
						'type'    => 'number',
						'label'   => __( 'Number Posts', 'thim' ),
						'default' => '4'
					),
					'layout'        => array(
						"type"    => "radioimage",
						"label"   => __( "Layout", "thim" ),
						"default" => "default",
						"options" => array(
							"default"   => $link_images . 'default.jpg',
							"layout-01" => $link_images . 'layout-01.jpg',
						),
					),

					'css_animation' => array(
						"type"    => "select",
						"label"   => __( "CSS Animation", "thim" ),
						"options" => array(
							""              => __( "No", "thim" ),
							"top-to-bottom" => __( "Top to bottom", "thim" ),
							"bottom-to-top" => __( "Bottom to top", "thim" ),
							"left-to-right" => __( "Left to right", "thim" ),
							"right-to-left" => __( "Right to left", "thim" ),
							"appear"        => __( "Appear from center", "thim" )
						),
					)
				),
				TP_THEME_DIR . 'inc/widgets/testimonials/'
			);
		}

		/**
		 * Initialize the CTA widget
		 */


		function get_template_name( $instance ) {
			return 'base';
		}

		function get_style_name( $instance ) {
			return false;
		}

		function enqueue_frontend_scripts() {
			wp_enqueue_script( 'thim-owl-carousel' );
			wp_enqueue_script( 'thim-testimonial', TP_THEME_URI . 'inc/widgets/testimonials/js/testimonials.js', array( 'jquery' ), '', true );
		}
	}

	function thim_testimonials_register_widget() {
		register_widget( 'Testimonials_Widget' );
	}

	add_action( 'widgets_init', 'thim_testimonials_register_widget' );
}