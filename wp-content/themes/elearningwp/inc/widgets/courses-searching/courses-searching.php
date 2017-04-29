<?php

/**
 * Class Courses_Searching_Widget
 *
 * Widget Name: Courses Searching
 *
 * Author: Ken
 */
class Courses_Searching_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'courses-searching',
			__( 'Thim: Courses Searching', 'thim' ),
			array(
				'description'   => __( 'Search courses', 'thim' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'label'  => array(
					'type'    => 'text',
					'default' => __( 'What do you want to learn today?', 'thim' ),
					'label'   => __( 'Searching Label', 'thim' ),
				),
				'layout' => array(
					'type'    => 'select',
					'label'   => __( 'Layout', 'thim' ),
					"options" => array(
						"layout-01" => __( "Layout 01", "thim" ),
						"layout-02" => __( "Layout 02", "thim" )
					),
					"default" => "layout-01"
				)
			)
		);
	}

	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-courses-searching', TP_THEME_URI . 'inc/widgets/courses-searching/js/live-search.js', array( 'jquery' ), '', true );
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
function thim_courses_searching_register_widget() {
	register_widget( 'Courses_Searching_Widget' );
}

add_action( 'widgets_init', 'thim_courses_searching_register_widget' );
