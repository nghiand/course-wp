<?php

class Thim_Social_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'social',
			__( 'Thim: Social Links', 'thim' ),
			array(
				'description' => __( 'Social Links', 'thim' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group'),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'title'          => array(
					'type'  => 'text',
					'label' => __( 'Title', 'thim' )
				),
				'link_face'      => array(
					'type'  => 'text',
					'label' => __( 'Facebook Url', 'thim' )
				),
				'link_twitter'   => array(
					'type'  => 'text',
					'label' => __( 'Twitter Url', 'thim' )
				),
				'link_google'    => array(
					'type'  => 'text',
					'label' => __( 'Google Url', 'thim' )
				),
				'link_dribble'   => array(
					'type'  => 'text',
					'label' => __( 'Dribble Url', 'thim' )
				),
				'link_linkedin'  => array(
					'type'  => 'text',
					'label' => __( 'Linked in Url', 'thim' )
				),
				'link_pinterest' => array(
					'type'  => 'text',
					'label' => __( 'Pinterest Url', 'thim' )
				),
				'link_digg'      => array(
					'type'  => 'text',
					'label' => __( 'Digg Url', 'thim' )
				),
				'link_youtube'   => array(
					'type'  => 'text',
					'label' => __( 'Youtube Url', 'thim' )
				),
				'link_target'    => array(
					"type"    => "select",
					"label"   => __( "Link Target", "thim" ),
					"options" => array(
						"_self"  => __( "Same window", "thim" ),
						"_blank" => __( "New window", "thim" ),
					),
				),

			),
			TP_THEME_DIR . 'inc/widgets/social/'
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

function thim_social_register_widget() {
	register_widget( 'Thim_Social_Widget' );
}

add_action( 'widgets_init', 'thim_social_register_widget' );