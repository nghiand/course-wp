<?php
class Tab_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'tab',
			__( 'Thim: Tab', 'thim' ),
			array(
				'description' => __( 'Add tab', 'thim' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group'),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'tab' => array(
					'type'      => 'repeater',
					'label'     => __( 'Tab', 'thim' ),
					'item_name' => __( 'Tab', 'thim' ),
					'fields'    => array(
						'title'   => array(
							"type"    => "text",
							"label"   => __( "Tab Title", "thim" ),
							"default" => "Tab Title",
						),
						'content' => array(
							"type"  => "textarea",
							"label" => __( "Content", "thim" ),
							"allow_html_formatting"=>true
						),
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/tab/'
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
function thim_tab_register_widget() {
	register_widget( 'Tab_Widget' );
}

add_action( 'widgets_init', 'thim_tab_register_widget' );