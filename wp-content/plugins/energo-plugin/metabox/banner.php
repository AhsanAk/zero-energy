<?php
return array(
	'id'     => 'energo_banner_settings',
	'title'  => esc_html__( "Energo Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'energo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'energo' ),
				'e' => esc_html__( 'Elementor', 'energo' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'energo' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'energo' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'energo' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'energo' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'energo' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);