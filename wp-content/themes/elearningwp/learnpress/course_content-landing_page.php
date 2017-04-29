<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php do_action( 'learn_press_before_course_landing_content' ); ?>

<div id="course-landing">
	<div class="row">
		<div class="col-md-8">
			<?php do_action( 'learn_press_course_landing_price' ) ?>
		</div>		
		<div class="col-md-4">
			<?php do_action( 'learn_press_course_landing_student' ) ?>
		</div>
	</div>
	<hr>
	<?php do_action( 'learn_press_course_landing_content' ); ?>
</div>

<?php do_action( 'learn_press_after_course_landing_content' ); ?>

<div class="menu-scoll-landing">
	<div class="container">
		<div class="row">
			<ul class="tab-btns col-md-6 col-sm-12">
				<li>
					<a class="tab-btn" href="#landing-desc"><?php echo __( 'Description', 'thim' ) ?></a>
				</li>
				<li>
					<a class="tab-btn" href="#landing-curriculum"><?php echo __( 'Curriculum', 'thim' ) ?></a>
				</li>
			</ul>
			<div class="col-md-6">
				<?php do_action( 'learn_press_menu_course_landing' ); ?>
			</div>
		</div>
	</div>
</div>
