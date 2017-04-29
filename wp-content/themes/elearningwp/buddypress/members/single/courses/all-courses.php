<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function my_test_setup_nav() {
	global $bp;
	bp_core_new_nav_item(
		array(
			'name' => __( 'test','thim' ),
			'slug' => 'test',
			'parent_url' => $bp->loggedin_user->domain . $bp->slug . '/',
			'parent_slug' => $bp->slug,
			'screen_function' => 'my_profile_page_function_to_show_screen',
			'position' => 40
		)
	);

	bp_core_new_subnav_item(
		array(
			'name' => __( 'Home','thim' ),
			'slug' => 'test_sub',
			'parent_url' => $bp->loggedin_user->domain . $bp->slug . '/',
			'parent_slug' => $bp->slug,
			'screen_function' => 'my_profile_page_function_to_show_screen',
			'position' => 20,
			'item_css_id' => 'test_activity'
		)
	);

	function my_profile_page_function_to_show_screen() {

//add title and content here – last is to call the members plugin.php template
		add_action( 'bp_template_title', 'my_profile_page_function_to_show_screen_title' );
		add_action( 'bp_template_content', 'my_profile_page_function_to_show_screen_content' );
		bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
	}

	function my_profile_page_function_to_show_screen_title() {
		echo 'something';
	}

	function my_profile_page_function_to_show_screen_content() {

		echo 'weee content';

	}
}

add_action( 'bp_setup_nav', 'my_test_setup_nav' );

