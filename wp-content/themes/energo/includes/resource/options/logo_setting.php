<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'energo' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'energo' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'energo' ),
		),
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
