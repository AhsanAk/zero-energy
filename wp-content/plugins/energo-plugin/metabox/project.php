<?php
return array(
	'title'      => 'Energo Project Setting',
	'id'         => 'energo_meta_project',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'energo_project_meta_setting',
			'fields' => array(
				array(
					'id'    => 'dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose Image Size', 'energo' ),
					'options'  => array(
						'size_370_370' => esc_html__( '370x370', 'energo' ),
						'size_370_770' => esc_html__( '370x770', 'energo' ),
						'size_770_370' => esc_html__( '770x370', 'energo' ),
					),
				),
				array(
					'id'       => 'top_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Top Image', 'energo' ),
					'desc'     => esc_html__( 'Upload project detail top image.', 'energo' ),
				),
				array(
					'id'       => 'bottom_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Bottom Image', 'energo' ),
					'desc'     => esc_html__( 'Upload project detail bottom image.', 'energo' ),
				),
				array(
					'id'    => 'location',
					'type'  => 'text',
					'title' => esc_html__( 'Location', 'energo' ),
				),
				array(
					'id'    => 'project_year',
					'type'  => 'text',
					'title' => esc_html__( 'Project Year', 'energo' ),
				),
				array(
					'id'    => 'project_value',
					'type'  => 'text',
					'title' => esc_html__( 'Price Value', 'energo' ),
				),
				array(
					'id'    => 'project_head',
					'type'  => 'text',
					'title' => esc_html__( 'Project Head', 'energo' ),
				),
				array(
					'id'    => 'btn_title',
					'type'  => 'text',
					'title' => esc_html__( 'Button Title', 'energo' ),
				),
				array(
					'id'    => 'btn_link',
					'type'  => 'text',
					'title' => esc_html__( 'Button Link', 'energo' ),
				),
			),
		),
	),
);