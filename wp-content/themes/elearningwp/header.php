<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thim
 */
?><!DOCTYPE html>
<?php
global $theme_options_data;
?>
<html <?php language_attributes(); ?><?php if ( isset( $theme_options_data['thim_rtl_support'] ) && $theme_options_data['thim_rtl_support'] == '1' ) {
	echo "dir=\"rtl\"";
} ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
	<?php
	$custom_sticky = $class_header = '';
	if ( isset( $theme_options_data['thim_rtl_support'] ) && $theme_options_data['thim_rtl_support'] == '1' ) {
		$class_header .= 'rtl';
	}
	if ( isset( $theme_options_data['thim_config_att_sticky'] ) && $theme_options_data['thim_config_att_sticky'] == 'sticky_custom' ) {
		$custom_sticky .= ' bg-custom-sticky';
	}
	if ( isset( $theme_options_data['thim_header_sticky'] ) && $theme_options_data['thim_header_sticky'] == 1 ) {
		$custom_sticky .= ' sticky-header';
	}
	if ( isset( $theme_options_data['thim_header_position'] ) ) {
		$custom_sticky .= ' ' . $theme_options_data['thim_header_position'];
	}
	if ( isset( $theme_options_data['thim_header_style'] ) ) {
		$custom_sticky .= ' ' . $theme_options_data['thim_header_style'];
	}
	// mobile menu custom class
	if ( isset( $theme_options_data['thim_config_logo_mobile'] ) && $theme_options_data['thim_config_logo_mobile'] == 'custom_logo' ) {
		if ( ( isset( $theme_options_data['thim_logo_mobile'] ) && $theme_options_data['thim_logo_mobile'] <> '' ) ||
			( isset( $theme_options_data['thim_sticky_logo_mobile'] ) && $theme_options_data['thim_sticky_logo_mobile'] <> '' )
		) {
			$custom_sticky .= ' mobile-logo-custom';
		}
	}

	if ( isset( $theme_options_data['thim_favicon'] ) && $theme_options_data['thim_favicon'] ) {
		$thim_favicon     = $theme_options_data['thim_favicon'];
		$thim_favicon_src = $thim_favicon; // For the default value
		if ( is_numeric( $thim_favicon ) ) {
			$favicon_attachment = wp_get_attachment_image_src( $thim_favicon, 'full' );
			$thim_favicon_src   = $favicon_attachment[0];
		}
	} else {
		$thim_favicon_src = get_template_directory_uri() . "/images/favicon.ico";
	}
	?>
	<link rel="shortcut icon" href=" <?php echo esc_url( $thim_favicon_src ); ?>" type="image/x-icon" />
	<?php
	wp_head();
	?>
</head>

<body <?php body_class( $class_header ); ?>>
<?php if ( isset( $theme_options_data['thim_preload'] ) && $theme_options_data['thim_preload'] == '1' ) { ?>
	<div id="preload">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>
<?php } ?>

<!-- menu for mobile-->
<div id="wrapper-container" class="wrapper-container">
	<div class="content-pusher">
		<!-- Mobile Menu-->
		<?php //if ( wp_is_mobile() ) { ?>
		<nav class="visible-xs mobile-menu-container mobile-effect" role="navigation">
			<?php get_template_part( 'inc/header/menu-mobile' ); ?>
		</nav>
		<?php //} ?>
		<?php
		// stick header
		$data_height = '';
		if ( isset( $theme_options_data['thim_margin_top_header'] ) && $theme_options_data['thim_margin_top_header'] != '0' ) {
			$data_height = ' data-height-sticky="' . $theme_options_data['thim_margin_top_header'] . '"';
		}
		?>
		<header id="masthead" class="site-header affix-top<?php echo esc_attr( $custom_sticky ); ?>" role="banner"<?php echo esc_attr( $data_height ); ?>>
			<?php
			// Drawer
			if ( isset( $theme_options_data['thim_show_drawer'] ) && $theme_options_data['thim_show_drawer'] == '1' && is_active_sidebar( 'drawer_top' ) ) {
				get_template_part( 'inc/header/drawer' );
			}
			if ( isset( $theme_options_data['thim_header_style'] ) && $theme_options_data['thim_header_style'] ) {
				get_template_part( 'inc/header/' . $theme_options_data['thim_header_style'] );
			} else {
				get_template_part( 'inc/header/header_v1' );
			}
			?>
		</header>