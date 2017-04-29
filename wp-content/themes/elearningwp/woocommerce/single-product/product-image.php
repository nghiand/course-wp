<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>

<?php
global $theme_options_data;

// Zoom out product image
if (isset($theme_options_data['thim_woo_set_effect']) && $theme_options_data['thim_woo_set_effect'] == "zoom_out") {
	wp_enqueue_script( 'thim-retina' );	
}
?>
<script type="text/javascript">
	jQuery(function ($) {
		if (jQuery().flexslider && jQuery(".woocommerce #product-carousel").length) {
			jQuery('#product-carousel').flexslider({
						animation: "slide",
						controlNav   : false,
						directionNav : false,
						animationLoop: false,
						slideshow    : false,
						itemWidth    : 90,
						itemMargin   : 5,
						touch        : false,
						useCSS       : false,
						smoothHeight : false,

						asNavFor: '#product-slider'
					});
			window.addEventListener("load", function () {
				jQuery('#product-slider').flexslider({
					animation: "slide",
					controlNav   : false,
					directionNav : false,
					animationLoop: false,
					slideshow    : false,
					smoothHeight : true,
					touch        : true,
					useCSS       : false,

					sync: "#product-carousel"
				});
			});
		}
	});
</script>
<div class="images">
	<div id="product-slider" class="flexslider">
	<ul class="slides">
	<?php
		if ( has_post_thumbnail() ) {

			$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
			$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );

			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			// Zoom out product image
			if (isset($theme_options_data['thim_woo_set_effect']) && $theme_options_data['thim_woo_set_effect'] == "zoom_out") {
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="retina woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></li>', $image_link, $image_title, $image ), $post->ID );
			}else {
				// Popup
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></li>', $image_link, $image_title, $image ), $post->ID );
			}

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'thim' ) ), $post->ID );

		}
	?>

	<?php
		// Get all gallery by large size
		$attachment_ids = $product->get_gallery_attachment_ids();

		if ( $attachment_ids ) {
			?>
			<?php

				$loop = 0;
				$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

				foreach ( $attachment_ids as $attachment_id ) {

					$classes = array( 'zoom' );

					if ( $loop == 0 || $loop % $columns == 0 )
						$classes[] = 'first';

					if ( ( $loop + 1 ) % $columns == 0 )
						$classes[] = 'last';

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link )
						continue;

					$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
					$image_class = esc_attr( implode( ' ', $classes ) );
					$image_title = esc_attr( get_the_title( $attachment_id ) );

					// Zoom out product image
					if (isset($theme_options_data['thim_woo_set_effect']) && $theme_options_data['thim_woo_set_effect'] == "zoom_out") {
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" class="retina %s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
					}else {
						// Popup
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
					}

					$loop++;
				}

			?>
			<?php
		}
	?>
	</ul>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
