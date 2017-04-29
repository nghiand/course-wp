<?php
	$user_id = get_current_user_id();
	$courses = get_user_meta( $user_id, '_lpr_course_completed', true );
	if ($courses)
		foreach( $courses as $course => $mark ) {
			$certificate = get_post_meta( $course, '_lpr_certificate', true );
			?>
			<div class="col-md-3">
			<div><?php echo esc_html(wp_get_attachment_image( $certificate ));?></div>
			</div>
			<div clas="col-md-9">
			<h2><?php echo esc_html(get_the_title( $course ));?></h2>
			<h3><?php echo __('Certification of completion this course','thim');?><h3>
			</div>
			<?php
		}
