<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package thim
 */
?>
<section class="error-404 not-found">
	<div class="page-404-content">
		<div class="left_404"><h2>404</h2></div>
		<div class="right_404">
			<p><?php esc_attr_e( 'The page you requested was not found, and we have a fine quess why', 'thim' ); ?></p>
			<i><?php esc_attr_e( 'If you typed the URL directly, please make sure the spelling is correct.<br/> If you clicked on link to get here, the link is outdated.', 'thim' ); ?></i>
		</div>
		<div class="clear"></div>
		<?php get_search_form(); ?>
	</div>
	<!-- .page-content -->
</section>