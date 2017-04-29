<?php global $theme_options_data; ?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<div class="footer">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'footer' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!--==============================powered=====================================-->
	<?php if ( isset( $theme_options_data['thim_copyright_text'] ) || is_active_sidebar( 'copyright' ) ) { ?>
		<div class="copyright-area">
			<div class="container">
				<div class="row">
					<?php
					if ( isset( $theme_options_data['thim_copyright_text'] ) ) {
						echo '<div class="col-sm-6"><p class="text-copyright">' . $theme_options_data['thim_copyright_text'] . '</p></div>';
					}
					if ( is_active_sidebar( 'copyright' ) ) : ?>
						<div class="col-sm-6 text-right">
							<?php dynamic_sidebar( 'copyright' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php } ?>
</footer><!-- #colophon -->
<?php
if ( isset( $theme_options_data['thim_show_to_top'] ) && $theme_options_data['thim_show_to_top'] == 1 ) { ?>
	<a href="#" id="back-to-top">
		<i class="fa fa-chevron-up"></i>
	</a>
<?php
}
?>
</div></div><!-- end wrapper-container and content-pusher-->

<?php if ( isset( $theme_options_data['thim_show_offcanvas_sidebar'] ) && $theme_options_data['thim_show_offcanvas_sidebar'] == '1' && is_active_sidebar( 'offcanvas_sidebar' ) ) { ?>
	<div class="slider-sidebar">
		<?php dynamic_sidebar( 'offcanvas_sidebar' ); ?>
	</div>  <!--slider_sidebar-->
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>