<?php
global $theme_options_data;
$column_product = 3;
if ( isset( $theme_options_data['thim_learnpress_cate_grid_column'] ) && $theme_options_data['thim_learnpress_cate_grid_column'] <> '' ) {
	$column_product = 12 / $theme_options_data['thim_learnpress_cate_grid_column'];
}
$classes   = array();
$classes[] = 'col-md-' . $column_product . ' col-sm-6 col-xs-6';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?> itemprop="itemListElement">
	<div class="inner-course" >
		<?php do_action( 'learn_press_before_course_header' ); ?>

		<div class="wrapper-course-thumbnail">
			<?php do_action( 'learn_press_before_the_title' ); ?>
			<div class="course-time">
				<span class="course-month"><?php the_time( 'M' ); ?></span>
				<span class="course-day"><?php the_time( 'd' ); ?></span>
				<span class="course-year"><?php the_time( 'Y' ); ?></span>
			</div>
		</div>
		<div class="item-list-center">
			<div class="course-title">
				<?php
				the_title( sprintf( '<h2 class="entry-title" itemprop="name"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				do_action( 'learn_press_after_the_title' );
				?>
			</div>
			<!-- .entry-header //////////////////////////-->
			<?php do_action( 'learn_press_before_course_footer' ); ?>
			<?php
			do_action( 'learn_press_entry_footer_archive' );
			?>
			<!-- .entry-footer -->
		</div>

		<?php do_action( 'learn_press_before_course_content' ); ?>
		<div class="course-excerpt" itemprop="description">
			<?php
			do_action( 'learn_press_before_the_content' );
			echo '<h6>' . __( 'Introduce about course:', 'thim' ) . '</h6>';
			the_excerpt();
			do_action( 'learn_press_after_the_content' );
			?>
		</div>
		<!-- .entry-content -->
	</div>
</article><!-- #post-## -->