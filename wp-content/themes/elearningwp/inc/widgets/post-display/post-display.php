<?php

class Post_Display_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'post-display',
			__( 'Thim: Post Display', 'thim' ),
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
							'default'               => __( "Latest News", "thim" ),
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

				't_config'      => array(
					'type'   => 'section',
					'label'  => __( 'Config Color', 'thim' ),
					'hide'   => true,
					'fields' => array(
						// text color
						'title_color' => array(
							'type'  => 'color',
							'label' => __( 'Title Color', 'thim' ),
							"class" => "color-mini"
						),
						'meta_color'  => array(
							'type'  => 'color',
							'label' => __( 'Meta color', 'thim' ),
							"class" => "color-mini"
						),
					),
				),
				'number_posts'  => array(
					'type'    => 'number',
					'label'   => __( 'Number Posts', 'thim' ),
					'default' => __( "4", "thim" )
				),
				'columns'       => array(
					'type'    => 'select',
					'label'   => __( 'Columns', 'thim' ),
					"options" => array(
						"1" => __( "1", "thim" ),
						"2" => __( "2", "thim" )
					),
					'default' => __( "1", "thim" )
				),

				'orderby'       => array(
					"type"    => "select",
					"label"   => __( "Order by", "thim" ),
					"options" => array(
						"date"    => __( "Date", "thim" ),
						"title"   => __( "Title", "thim" ),
						"comment" => __( "Comment", "thim" ),
						"random"  => __( "Random", "thim" ),
					),
				),
				'order'         => array(
					"type"    => "select",
					"label"   => __( "Order", "thim" ),
					"options" => array(
						"asc"  => __( "ASC", "thim" ),
						"desc" => __( "DESC", "thim" )
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
			TP_THEME_DIR . 'inc/widgets/post-display/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return 'basic';
	}
}

function thim_post_display_register_widget() {
	register_widget( 'Post_Display_Widget' );
}

add_action( 'widgets_init', 'thim_post_display_register_widget' );