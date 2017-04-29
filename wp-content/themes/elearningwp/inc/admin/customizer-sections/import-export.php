<?php
$data = $titan->createThimCustomizerSection( array(
	'name'     => __( 'Import/Export', 'thim' ),
	'desc'     => __( 'You can export then import settings from one theme to another conveniently without any problem.', 'thim' ),
	'position' => 202,
	'id'       => 'import_export',
	'icon'     => 'fa-hdd-o',
) );

$data->createOption( array(
	'name' => __( 'Import Settings', 'thim' ),
	'id'   => 'import_setting',
	'type' => 'customize-import',
	'desc' => __( 'Click Upload button then choose a JSON file (.json) from your computer to import settings to this theme.', 'thim' ),
) );

$data->createOption( array(
	'name' => __( 'Export Settings', 'thim' ),
	'id'   => 'export_setting',
	'type' => 'customize-export',
	'desc' => __( 'Simply click Download button to export all your settings to a JSON file (.json).', 'thim' ),
) );
