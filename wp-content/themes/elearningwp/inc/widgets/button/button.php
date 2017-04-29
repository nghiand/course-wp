<?php
/**
 * Widget Name: Button.
 * Author: ThimPress.
 */

class Button_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'button',
			__( 'Thim: Button', 'thim' ),
			array(
				'description' => __( 'Add Button', 'thim' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group'),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'title'     => array(
					"type"    => "text",
					"default" => "READ MORE",
					"label"   => __( "Button Text", "thim" ),
				),
				'url'     => array(
					"type"    => "text",
					"default" => "#",
					"label"   => __( "Destination URL", "thim" ),
				),
				'new_window'     => array(
					"type"    => "checkbox",
					"default" => false,
					"label"   => __( "Open in New Window", "thim" ),
				),
				'icon' => array(
					'type'   => 'section',
					'label'  => __( 'Icon', 'thim' ),
					'hide'   => true,
					'fields' => array(
						'icon'      => array(
							"type"        => "icon",
							"class"       => "",
							"label"       => __( "Select Icon:", "thim" ),
							"description" => __( "Select the icon from the list.", "thim" ),
							"class_name"  => 'font-awesome',
						),
						// Resize the icon
						'icon_size' => array(
							"type"        => "number",
							"class"       => "",
							"label"       => __( "Icon Size ", "thim" ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => __( "Select the icon font size.", "thim" ),
							"class_name"  => 'font-awesome'
						),
					),
				),
				'layout'        => array(
					'type'   => 'section',
					'label'  => __( 'Layout', 'thim' ),
					'hide'   => true,
					'fields' => array(
						'button_size'          => array(
							"type"        => "select",
							"class"       => "",
							"label"       => __( "Button Size", "thim" ),
							"options"     => array(
								"normal" => "Normal",
								"medium"       => "Medium",
								"large"       => "Large",
							),
						),
						'rounding'          => array(
							"type"        => "select",
							"class"       => "",
							"label"       => __( "Rounding", "thim" ),
							"options"     => array(
								"" => "None",
								"very-rounded"       => "Very Rounded",
							),
						),
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/icon-box/'
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
}
function thim_button_register_widget() {
	register_widget( 'Button_Widget' );
}

add_action( 'widgets_init', 'thim_button_register_widget' );