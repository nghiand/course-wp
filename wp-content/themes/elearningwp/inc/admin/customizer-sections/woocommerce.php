<?php
$url         = TP_THEME_URI . 'images/admin/layout/';
$woocommerce = $titan->createThimCustomizerSection( array(
	'name'     => __( 'WooCommerce', 'thim' ),
	'position' => 5,
	'id'       => 'woocommerce',
) );