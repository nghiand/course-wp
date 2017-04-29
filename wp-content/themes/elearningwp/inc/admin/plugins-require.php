<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once TP_FRAMEWORK_LIBS_DIR . 'class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'tp_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function tp_register_required_plugins() {
	$plugins = array(
		//              example
		array(
			'name'     => 'Regenerate Thumbnails',
			// The plugin name
			'slug'     => 'regenerate-thumbnails',
			'required' => false,
		),
		array(
			'name'     => 'SiteOrigin Page Builder',
			// The plugin name
			'slug'     => 'siteorigin-panels',
			// The plugin source
			'required' => true,
		),

		array(
			'name'     => 'Black Studio TinyMCE Widget',
			// The plugin name
			'slug'     => 'black-studio-tinymce-widget',
			// The plugin source
			'required' => false,

		),
		array(
			'name'     => 'Contact Form 7', // The plugin name
			'slug'     => 'contact-form-7', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),

		array(
			'name'     => 'WooCommerce', // The plugin name
			'slug'     => 'woocommerce', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     => 'YITH Woocommerce Compare', // The plugin name
			'slug'     => 'yith-woocommerce-compare', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     => 'YITH WooCommerce Wishlist', // The plugin name
			'slug'     => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     => 'Widget Logic', // The plugin name
			'slug'     => 'widget-logic', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     => 'bbPress', // The plugin name
			'slug'     => 'bbpress', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     => 'BuddyPress', // The plugin name
			'slug'     => 'buddypress', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     => 'WooCommerce Quantity Increment', // The plugin name
			'slug'     => 'woocommerce-quantity-increment', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),

		array(
			'name'               => 'Thim Our Team',
			// The plugin name
			'slug'               => 'thim-our-team',
			// The plugin slug (typically the folder name)
			'source'             => get_template_directory() . '/inc/plugins/thim-our-team.zip',
			// The plugin source
			'required'           => false,
			// If false, the plugin is only 'recommended' instead of required
			'version'            => '1.0',
			// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false,
			// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false,
			// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '',
			// If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Testimonials By ThimPress',
			// The plugin name
			'slug'               => 'thim-testimonials',
			// The plugin slug (typically the folder name)
			'source'             => get_template_directory() . '/inc/plugins/thim-testimonials.zip',
			// The plugin source
			'required'           => false,
			// If false, the plugin is only 'recommended' instead of required
			'version'            => '1.0',
			// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false,
			// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false,
			// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '',
			// If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     => 'LearnPress',
			'slug'     => 'learnpress',
			'required' => true,
		),

		array(
			'name'     => 'LearnPress Course Review', // The plugin name
			'slug'     => 'learnpress-course-review', // The plugin slug (typically the folder name)
			'required' => false, // If false, the plugin is only 'recommended' instead of required
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       => 'thim', // Text domain - likely want to be the same as your theme.
		'default_path' => '', // Default absolute path to pre-packaged plugins
		'parent_slug'  => 'themes.php', // Default parent menu slug
		'menu'         => 'install-required-plugins', // Menu slug
		'has_notices'  => true, // Show admin notices or not
		'is_automatic' => false, // Automatically activate plugins after installation or not
		'message'      => '', // Message to output right before the plugins table
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'thim' ),
			'menu_title'                      => __( 'Install Plugins', 'thim' ),
			'installing'                      => __( 'Installing Plugin: %s', 'thim' ),
			// %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', 'thim' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'thim' ),
			// %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'thim' ),
			// %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'thim' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'thim' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'thim' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'thim' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'thim' ),
			// %1$s = dashboard link
			'nag_type'                        => 'updated'
			// Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa( $plugins, $config );
}
