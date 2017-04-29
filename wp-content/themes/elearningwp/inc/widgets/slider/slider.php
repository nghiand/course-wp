<?php

class Thim_Slider_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'slider',
			__( 'Thim: Slider', 'thim' ),
			array(
				'description'   => __( 'Thim Slider', 'thim' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'thim_slider_frames'  => array(
					'type'      => 'repeater',
					'label'     => __( 'Slider Frames', 'thim' ),
					'item_name' => __( 'Frame', 'thim' ),
					'fields'    => array(
						'thim_slider_background_image' => array(
							'type'    => 'media',
							'library' => 'image',
							'label'   => __( 'Background Image', 'thim' ),
						),
						'color_overlay'                => array(
							'type'  => 'color',
							'label' => __( 'Color Overlay images', 'thim' ),
						),
						'content'                      => array(
							'type'   => 'section',
							'label'  => 'Content Slider',
							'hide'   => true,
							'fields' => array(
								'thim_slider_icon'        => array(
									'type'    => 'media',
									'library' => 'image',
									'label'   => __( 'Icon', 'thim' ),
								),
								'thim_slider_title'       => array(
									'type'                  => 'text',
									'label'                 => __( 'Heading Slider', 'thim' ),
									'allow_html_formatting' => true,
								),
								'size'                    => array(
									'type'        => 'number',
									"label"       => __( "Custom Font Size Title", "thim" ),
									'description' => 'input custom font size: ex: 30',
									"class"       => "color-mini",
								),
								'thim_color_title'        => array(
									'type'  => 'color',
									'label' => __( 'Heading Color Title', 'thim' ),
									"class" => "color-mini",
								),
								'line-bottom'             => array(
									'type'    => 'checkbox',
									'label'   => __( 'line bottom', 'thim' ),
									'default' => false,
									"class"   => "color-mini",
								),
								'thim_slider_description' => array(
									'type'                  => 'textarea',
									'label'                 => __( 'Description', 'thim' ),
									'allow_html_formatting' => true,
									"class"                 => "clear-both",
								),
								'thim_color_des'          => array(
									'type'  => 'color',
									'label' => __( 'Description Color', 'thim' )
								),
								'thim_slider_align'       => array(
									"type"    => "select",
									"label"   => __( "Content Align:", "thim" ),
									"options" => array(
										"left"   => __( "Left", "thim" ),
										"right"  => __( "Right", "thim" ),
										"center" => __( "Center", "thim" )
									),
								),
							),
						),
					),
				),
				'thim_slider_speed'   => array(
					'type'        => 'number',
					'label'       => __( 'Animation Speed', 'thim' ),
					'description' => __( 'Animation speed in milliseconds.', 'thim' ),
					'default'     => 800,
				),
				'thim_slider_timeout' => array(
					'type'        => 'number',
					'label'       => __( 'Timeout', 'thim' ),
					'description' => __( 'How long each slide is displayed for in milliseconds.', 'thim' ),
					'default'     => 8000,
				),
				'slider_full_screen'  => array(
					'type'    => 'checkbox',
					'label'   => __( 'Full Screen', 'thim' ),
					'default' => false ),
				'show_icon_scroll'    => array(
					'type'          => 'radio',
					'label'         => __( 'Icon Scroll', 'thim' ),
					"options"       => array(
						"show" => __( "Show", "thim" ),
						"hide" => __( "Hide", "thim" )
					),
					'default'       => 'hide',
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'show_icon_scroll_type' )
					)
				),
				'text_before_btn'     => array(
					'type'          => 'text',
					'label'         => __( 'Text Before Arrow', 'thim' ),
					'state_handler' => array(
						'show_icon_scroll_type[show]' => array( 'show' ),
						'show_icon_scroll_type[hide]' => array( 'hide' ),
					),
					'default'       => 'Getting started'
				),
				'button_id'           => array(
					'type'          => 'text',
					'label'         => __( 'ID', 'thim' ),
					'state_handler' => array(
						'show_icon_scroll_type[show]' => array( 'show' ),
						'show_icon_scroll_type[hide]' => array( 'hide' ),
					),
					'description'   => __( 'id section scoll', 'thim' ),
				),
			),
			TP_THEME_DIR . 'inc/widgets/slider/'
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

	/**
	 * Enqueue the slider scripts
	 */
	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-jquery-cycle', TP_THEME_URI . 'inc/widgets/slider/js/jquery.cycle.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-cycle.swipe', TP_THEME_URI . 'inc/widgets/slider/js/jquery.cycle.swipe.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-slider', TP_THEME_URI . 'inc/widgets/slider/js/slider.js', array( 'jquery' ), '', true );
	}
}

function thim_slider_register_widget() {
	register_widget( 'Thim_Slider_Widget' );
}

add_action( 'widgets_init', 'thim_slider_register_widget' );