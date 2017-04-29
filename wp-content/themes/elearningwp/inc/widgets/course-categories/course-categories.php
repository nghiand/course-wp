<?php

/**
 * Class Course_Categories_Widget
 *
 * Widget Name: Course Categories
 *
 * Author: Ken
 */
class Course_Categories_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'course-categories',
			__( 'Thim: Course Categories', 'thim' ),
			array(
				'description' => __( 'Show course categories', 'thim' ),
				'help'        => '',
			),
			array(),
			array(
				'title'        => array(
					'type'  => 'text',
					'label' => __( 'Title', 'thim' ),
				),
				'show_counts'  => array(
					'type'    => 'checkbox',
					'label'   => __( 'Show course counts', 'thim' ),
					'default' => false,
				),
				'hierarchical' => array(
					'type'    => 'checkbox',
					'label'   => __( 'Show hierarchy', 'thim' ),
					'default' => false,
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
function thim_course_categories_register_widget() {
	register_widget( 'Course_Categories_Widget' );
}

add_action( 'widgets_init', 'thim_course_categories_register_widget' );
