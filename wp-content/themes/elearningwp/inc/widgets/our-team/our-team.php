<?php

class Our_Team_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'our-team',
			__( 'Thim: Our Team', 'thim' ),
			array(
				'help'        => '',
				'panels_groups' => array('thim_widget_group'),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'cat_id'        => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Select Category', 'thim' ),
					'default' => 'all',
					'options' => $this->thim_get_team_categories(),
				),
 				'number_post'        => array(
					'type'    => 'number',
					'label'   => __( 'Number Posts', 'thim' ),
					'default' => '5'
 				),
				'layout'        => array(
					"type"    => "select",
					"label"   => __( "Layout", "thim" ),
					"options" => array(
						"list1" => __( "List-01", "thim" )
					),
				),
				'columns'        => array(
					"type"    => "select",
					"label"   => __( "Column", "thim" ),
					"options" => array(
						"2" => __( "2", "thim" ),
						"3" => __( "3", "thim" ),
						"4" => __( "4", "thim" )
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
			TP_THEME_DIR . 'inc/widgets/our-team/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */
	// Get list category
	function thim_get_team_categories() {
		global $wpdb;
		$query = $wpdb->get_results( $wpdb->prepare(
			"
				  SELECT      t1.term_id, t2.name
				  FROM        $wpdb->term_taxonomy AS t1
				  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
				  WHERE t1.taxonomy = %s
				  AND t1.count > %d
				  ",
			'our_team_category', 0
		) );

		$cats        = array();
		$cats['all'] = 'All';
		if ( ! empty( $query ) ) {
			foreach ( $query as $key => $value ) {
				$cats[ $value->term_id ] = $value->name;
			}
		}

		return $cats;
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}
function thim_our_team_register_widget() {
	register_widget( 'Our_Team_Widget' );
}

add_action( 'widgets_init', 'thim_our_team_register_widget' );