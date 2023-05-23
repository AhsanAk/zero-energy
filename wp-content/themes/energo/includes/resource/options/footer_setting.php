<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'energo' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'energo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'energo' ),
				'e' => esc_html__( 'Elementor', 'energo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'energo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'energo' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'energo' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'energo' ),
		    'options'  => array(
			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
			    'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'energo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Copyrights
		array(
			'id'      => 'copyrights_v1',
			'type'    => 'textarea',
			'title'   => __( 'Copyrights', 'energo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Footer Menu
		array(
            'id' => 'show_footer_menu_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Menu', 'energo'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'energo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Footer Logo
		array(
            'id' => 'show_footer_bg_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Background', 'energo'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		array(
			'id'       => 'footer_bg_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background', 'energo' ),
			'subtitle' => esc_html__( 'Upload Footer background image', 'energo' ),
			'required' => array( 'show_footer_bg_v2', '=', true ),
		),
		
		//Copyrights
		array(
			'id'      => 'copyrights_v2',
			'type'    => 'textarea',
			'title'   => __( 'Copyrights', 'energo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Footer Menu
		array(
            'id' => 'show_footer_menu_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Menu', 'energo'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'energo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		//Copyrights
		array(
			'id'      => 'copyrights_v3',
			'type'    => 'textarea',
			'title'   => __( 'Copyrights', 'energo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		//Footer Menu
		array(
            'id' => 'show_footer_menu_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Menu', 'energo'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
        ),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
