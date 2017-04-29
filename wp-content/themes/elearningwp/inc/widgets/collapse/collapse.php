<?php
class Collapse_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'collapse',
			__( 'Thim: Collapse', 'thim' ),
			array(
				'description' => __( 'Add Collapse', 'thim' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group'),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more',
			),
			array(),
			array(
				'collapse' => array(
					'type'      => 'repeater',
					'label'     => __( 'Collapse', 'thim' ),
					'item_name' => __( 'Collapse', 'thim' ),
					'fields'    => array(
						'title'   => array(
							"type"    => "text",
							"label"   => __( "Collapse Title", "thim" ),
							"default" => "Collapse Title",
						),
						'content' => array(
							"type"  => "textarea",
							"label" => __( "Content", "thim" ),
						),
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/collapse/'
		);
	}
	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}
function thim_collapse_register_widget() {
	register_widget( 'Collapse_Widget' );
}

add_action( 'widgets_init', 'thim_collapse_register_widget' );