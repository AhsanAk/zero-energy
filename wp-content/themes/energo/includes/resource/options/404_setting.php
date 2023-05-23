<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'energo' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'energo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'energo' ),
				'e' => esc_html__( 'Elementor', 'energo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'energo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'energo' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		
		//404 Content
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'energo' ),
			'desc'     => esc_html__( 'Insert background image to show', 'energo' ),
		),
		array(
			'id'    => 'error_404',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'energo' ),
			'desc'  => esc_html__( 'Enter 404 title that you want to show.', 'energo' ),
		),
		array(
			'id'    => 'error_text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Text', 'energo' ),
			'desc'  => esc_html__( 'Enter 404 text that you want to show.', 'energo' ),
		),
		array(
			'id'    => 'back_to_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'energo' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'energo' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'energo' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'energo' ),
			'default'  => esc_html__( 'Go Back]', 'energo' ),
			'required' => array( 'back_to_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);
