<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customizer-options
 *
 * @author Tuannv
 */
require_once "generate-less-to-css.php";

class Customize_Options {

	function __construct() {
		add_action( 'tf_create_options', array( $this, 'create_customizer_options' ) );
		add_action( 'customize_save_after', array( $this, 'generate_to_css' ) );

		/* Unregister Default Customizer Section */
		add_action( 'customize_register', array( $this, 'unregister' ) );
	}

	function unregister( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'title_tagline' );
		$wp_customize->remove_section( 'nav' );
		$wp_customize->remove_section( 'static_front_page' );
	}

	function create_customizer_options() {
		$titan = TitanFramework::getInstance( 'thim' );
		/* Register Customizer Sections */
		//include heading
		include TP_THEME_DIR . "/inc/admin/customizer-sections/logo.php";

		include TP_THEME_DIR . "/inc/admin/customizer-sections/header.php";
		//include TP_THEME_DIR . "/inc/admin/customizer-sections/header-headerbar.php";
//		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-layout.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-logo-options.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-mainmenu.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-mobile.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-offcanvas.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-submenu.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-stickymenu.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-topdrawer.php";
//		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-toolbar.php";

		//include styling
		include TP_THEME_DIR . "/inc/admin/customizer-sections/styling.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/styling-color.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/styling-layout.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/styling-pattern.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/styling-rtl.php";

		//include display setting
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display-archive.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display-frontpage.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display-postpage.php";


		//include typography
		include TP_THEME_DIR . "/inc/admin/customizer-sections/typography.php";

		//include footer
		include TP_THEME_DIR . "/inc/admin/customizer-sections/footer.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/footer-copyright.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/footer-options.php";

		//include woocommerce
		if ( class_exists( 'WooCommerce' ) ) {
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce-archive.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce-setting.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce-single.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce-sharing.php";
		}
		// include customizer courses
		if ( class_exists( 'LearnPress' ) ) {
			include TP_THEME_DIR . "/inc/admin/customizer-sections/learnpress.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/learnpress-archive.php";
			include TP_THEME_DIR . "inc/admin/customizer-sections/learnpress-features.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/learnpress-single.php";
		}
		//include Custom Css
		include TP_THEME_DIR . "/inc/admin/customizer-sections/custom-css.php";
		//include Import/Export
		include TP_THEME_DIR . "/inc/admin/customizer-sections/import-export.php";
		//include Share this in post
		include TP_THEME_DIR . "/inc/admin/metabox-sections/share-this.php";
		include TP_THEME_DIR . "/inc/admin/metabox-sections/one-courses.php";
		include TP_THEME_DIR . "/inc/admin/metabox-sections/one-courses-v1.php";
	}

	function generate_to_css() {
		$options = get_theme_mods();
		themeoptions_variation( $options );
		generate( TP_THEME_DIR . 'style', '.css', $options );
	}
}

new Customize_Options();

global $primary_color;
$primary_color = "['#51C4D4', '#FF4E56', '#F14911', '#7CC577', '#E85140', '#3B5898', '#FFFFFF', '#000000']";