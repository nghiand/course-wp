<?php
$thim_animation = $des = $html = $css = $line_css = '';
$thim_animation .= thim_getCSSAnimation( $instance['css_animation'] );
if ( $instance['textcolor'] ) {
	$css .= 'color:' . $instance['textcolor'] . ';';
}

//foreach ( $instance['custom_font_heading'] as $i => $feature ) :
if ( $instance['font_heading'] == 'custom' ) {
	if ( $instance['custom_font_heading']['custom_font_size'] <> '' ) {
		$css .= 'font-size:' . $instance['custom_font_heading']['custom_font_size'] . 'px;';
	}
	if ( $instance['custom_font_heading']['custom_font_weight'] <> '' ) {
		$css .= 'font-weight:' . $instance['custom_font_heading']['custom_font_weight'] . ';';
	}
	if ( $instance['custom_font_heading']['custom_font_style'] <> '' ) {
		$css .= 'font-style:' . $instance['custom_font_heading']['custom_font_style'] . ';';
	}
}

//endforeach;

if ( $css ) {
	$css = ' style="' . $css . '"';
}

//if ( $instance['desc_group']['des_color'] ) {
//	$desc_css .= 'color:' . $instance['desc_group']['des_color'] . ';';
//}
//if ( $instance['desc_group']['des_font_size'] ) {
//	$desc_css .= 'font-size:' . $instance['desc_group']['des_font_size'] . 'px;';
//}
if ( $instance['bg_line'] ) {
	$line_css = ' style="background-color:' . $instance['bg_line'] . '"';
}
/*
 *
 */

$html .= '<div class="sc_heading' . $thim_animation . '">';
$html .= '<' . $instance['size'] . $css . ' class="title">' . $instance['title'] . '</' . $instance['size'] . '>';
$html .= '<span' . $line_css . ' class="line"><span>';

//if ( $instance['desc_group']['des'] <> '' ) {
//	$html .= '<div class="heading-desc" ' . $desc_css . '>' . $instance['desc_group']['des'] . '</div>';
//}
$html .= '</div>';

echo ent2ncr( $html );