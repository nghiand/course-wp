<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( have_posts() ) : ?>
	<div class="row archive-courses course-list archive_switch" itemscope itemtype="http://schema.org/ItemList">

		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			learn_press_get_template( 'archive-course-content.php' );
		endwhile;
		// Previous/next page navigation.

		?>
	</div>
	<?php
	learn_press_course_paging_nav();
endif;
?>