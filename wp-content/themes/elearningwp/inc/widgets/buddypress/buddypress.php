<?php

/**
 * Class BuddyPress_Widget
 *
 * Widget Name: BuddyPress
 *
 * Author: Ken
 */
class BuddyPress_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'buddypress',
			__( 'Thim: BuddyPress', 'thim' ),
			array(
				'description' => __( 'Show BuddyPress navigation menu.', 'thim' ),
				'help'        => '',
			),
			array(),
			array(
				'label' => array(
					'type'    => 'text',
					'label'   => __( 'Label', 'thim' ),
					'default' => __( 'BuddyPress', 'thim' ),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

/**
 * Register widget
 */
function thim_buddypress_register_widget() {
	register_widget( 'BuddyPress_Widget' );
}

add_action( 'widgets_init', 'thim_buddypress_register_widget' );
