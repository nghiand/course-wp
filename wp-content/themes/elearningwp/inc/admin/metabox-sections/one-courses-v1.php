<?php
$one_courses = $titan->createMetaBox( array(
	'name'      => __( 'Get Course V1', 'thim' ),
	'post_type' => array( 'page', ),
) );
$one_courses->createOption( array(
	'name'      => __( 'Choose the one from list courses', 'thim' ),
	'id'        => 'id_course_v1',
	'type'      => 'select-posts',
	'post_type' => 'lp_course',
) );