<?php
/**
 * thim functions and definitions
 *
 * @package thim
 */

define( 'THIM_THEME_VERSION', '2.4.4' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( !function_exists( 'thim_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thim_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thim, use a find and replace
		 * to change 'thim' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'thim', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'thim' ),
		) );

		// register menu for header layout 02
		global $theme_options_data;
		if ( isset( $theme_options_data['thim_header_style'] ) && $theme_options_data['thim_header_style'] == "header_v2" ) {
			register_nav_menus( array(
				'primary-right' => __( 'Primary Menu Right', 'thim' ),
			) );
		}
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );
		/* Add WooCommerce support */
		add_theme_support( 'woocommerce' );
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'thim_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif; // thim_setup
add_action( 'after_setup_theme', 'thim_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function thim_widgets_inits() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'thim' ),
		'id'            => 'sidebar-1',
		'description'   => 'Left Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
//	register_sidebar( array(
//		'name'          => __( 'Sidebar 2', 'thim' ),
//		'id'            => 'sidebar-2',
//		'description'   => 'Right Sidebar',
//		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//		'after_widget'  => '</aside>',
//		'before_title'  => '<h4 class="widget-title">',
//		'after_title'   => '</h4>',
//	) );
	register_sidebar( array(
		'name'          => 'Top Drawer',
		'id'            => 'drawer_top',
		'description'   => __( 'Drawer Top', 'thim' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Offcanvas', 'thim' ),
		'id'            => 'offcanvas_sidebar',
		'description'   => 'Drawer Right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Menu Right',
		'id'            => 'menu_right',
		'description'   => __( 'Menu Right', 'thim' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'description'   => __( 'Footer Sidebar', 'thim' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer_widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Copyright',
		'id'            => 'copyright',
		'description'   => __( 'Copyright', 'thim' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Shop', 'thim' ),
		'id'            => 'shop',
		'description'   => 'Shop Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	if ( class_exists( 'LearnPress' ) ) {
		register_sidebar( array(
			'name'          => 'Top Sidebar Courses',
			'id'            => 'top_sidebar_courses',
			'description'   => __( 'Top Sidebar Courses', 'thim' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => 'Sidebar Courses',
			'id'            => 'sidebar_courses',
			'description'   => __( 'Sidebar Courses', 'thim' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}

add_action( 'widgets_init', 'thim_widgets_inits' );

/**
 * Enqueue styles.
 */
if ( !function_exists( 'thim_styles' ) ) {
	function thim_styles() {
		global $current_blog, $theme_options_data;
		wp_register_style( 'thim-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'thim-bootstrap' );
		wp_deregister_style( 'thim-pixel-industry' );
		wp_register_style( 'thim-pixel-industry', get_template_directory_uri() . '/js/jplayer/skin/pixel-industry/pixel-industry.min.css', array(), true );
		if ( is_multisite() ) {
			if ( file_exists( TP_THEME_DIR . 'style-' . $current_blog->blog_id . '.css' ) ) {
				wp_enqueue_style( 'thim-style', get_template_directory_uri() . '/style-' . $current_blog->blog_id . '.css', array(), THIM_THEME_VERSION );
			} else {
				wp_enqueue_style( 'thim-style', get_stylesheet_uri(), array(), THIM_THEME_VERSION );
			}
		} else {
			wp_enqueue_style( 'thim-style', get_stylesheet_uri(), array(), THIM_THEME_VERSION );
		}
		if ( isset( $theme_options_data['thim_rtl_support'] ) && $theme_options_data['thim_rtl_support'] == '1' ) {
			wp_enqueue_style( 'thim-rtl', get_template_directory_uri() . '/rtl.css', array() , THIM_THEME_VERSION);
		}

		wp_enqueue_style( 'dashicons' );

	}

	add_action( 'wp_enqueue_scripts', 'thim_styles' );
}
/**
 * Enqueue scripts.
 */
if ( !function_exists( 'thim_scripts' ) ) {
	function thim_scripts() {

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( is_page_template( 'page-templates/one-courses.php' ) || is_page_template( 'page-templates/one-courses-v1.php' ) ) {
			wp_enqueue_style( 'lpr-learnpress-css' );
			wp_enqueue_style( 'lpr-time-circle-css' );

			wp_enqueue_script( 'learn-press-js' );
			wp_enqueue_script( 'lpr-alert-js' );
			wp_enqueue_script( 'lpr-time-circle-js' );
		}


		wp_deregister_script( 'thim-jquery.imagesloaded.pkgd' );
		wp_register_script( 'thim-jquery.imagesloaded.pkgd', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-jquery.imagesloaded.pkgd' );

		wp_deregister_script( 'thim-jquery.flexslider' );
		wp_register_script( 'thim-jquery.flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'thim-jquery.flexslider' );

		wp_deregister_script( 'thim-magnific-popup' );
		wp_register_script( 'thim-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'thim-magnific-popup' ); /* quick view */


		// Register the isotope script plugin:

		wp_deregister_script( 'thim-jplayer' );
		wp_register_script( 'thim-jplayer', get_template_directory_uri() . '/js/jplayer/jquery.jplayer.min.js', array( 'jquery' ), '', true );

		wp_deregister_script( 'thim-waypoints' );
		wp_register_script( 'thim-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-waypoints' );

		/* woo */
		wp_deregister_script( 'thim-owl-carousel' );
		wp_register_script( 'thim-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '', true );

		wp_deregister_script( 'thim-retina' );
		wp_register_script( 'thim-retina', get_template_directory_uri() . '/js/jquery.retina.min.js', array( 'jquery' ), '', true );

		if ( !class_exists( 'WooCommerce' ) ) {
			wp_enqueue_script( 'thim-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array( 'jquery' ), '', true );
		}

		wp_deregister_script( 'thim-custom-script' );
		wp_register_script( 'thim-custom-script', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_enqueue_script( 'thim-custom-script' );

		wp_deregister_script( 'thim-menumobile' );
		wp_register_script( 'thim-menumobile', TP_THEME_URI . 'js/menumobile.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-menumobile' );

		if ( is_post_type_archive( 'product' ) ) {
			wp_enqueue_script( 'wc-add-to-cart-variation' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'thim_scripts' );
}
// custom admin
add_action( 'admin_head', 'elearningwp_custom_css' );
function elearningwp_custom_css() {
	echo '<style>.post-type-lpr_course #display-setting .row-10,.post-type-lpr_quiz #display-setting .row-10,#customize-control-thim_learnpress_single_layout{ display: none!important;}</style>';
}

function thim_custom_admin_scripts() {
	wp_enqueue_script( 'thim-admin-custom-script', get_template_directory_uri() . '/js/admin/admin-custom-script.js', array( 'jquery' ), THIM_THEME_VERSION, true );
}

add_action( 'admin_enqueue_scripts', 'thim_custom_admin_scripts' );

/* Function which remove Plugin Update Notices */
//function thim_disable_plugin_updates( $value ) {
//	if ( isset($value) && is_object($value) ) {
//		if (isset($value->response['learnpress/learnpress.php'])) {
//			unset( $value->response['learnpress/learnpress.php'] );
//		}
//		return $value;
//	}
//}
//add_filter( 'site_transient_update_plugins', 'thim_disable_plugin_updates' );


/**
 * Check a plugin activate
 *
 * @param $plugin
 *
 * @return bool
 */
function thim_plugin_active( $plugin ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( $plugin ) ) {
		return true;
	}

	return false;
}


/**
 * load framework
 */

	require_once get_template_directory() . '/framework/tp-framework.php';
	if ( is_admin() ) {
		require TP_THEME_DIR . 'inc/admin/plugins-require.php';
	}

	require TP_THEME_DIR . 'inc/admin/customize-options.php';


/**
 * Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/* * * Tax meta class. * * */
include TP_THEME_DIR . 'inc/tax-meta.php';

if ( class_exists( 'WooCommerce' ) ) {
	// Woocomerce
	require get_template_directory() . '/woocommerce/woocommerce.php';
}

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

require TP_THEME_DIR . 'inc/aq_resizer.php';



//logo
require_once get_template_directory() . '/inc/header/logo.php';

//custom logo mobile
require_once get_template_directory() . '/inc/header/logo-mobile.php';

//pannel Widget Group
function thim_widget_group( $tabs ) {
	$tabs[] = array(
		'title'  => __( 'Thim Widget', 'thim' ),
		'filter' => array(
			'groups' => array( 'thim_widget_group' )
		)
	);

	return $tabs;
}

add_filter( 'siteorigin_panels_widget_dialog_tabs', 'thim_widget_group', 19 );






