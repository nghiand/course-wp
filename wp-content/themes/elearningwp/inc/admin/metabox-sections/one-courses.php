<?php
$one_courses = $titan->createMetaBox( array(
	'name'      => __( 'Get Course', 'thim' ),
	'post_type' => array( 'page', ),
) );
$one_courses->createOption( array(
	'name'      => __( 'Choose the one from list courses', 'thim' ),
	'id'        => 'id_course',
	'type'      => 'select-posts',
	'post_type' => 'lpr_course',
) );