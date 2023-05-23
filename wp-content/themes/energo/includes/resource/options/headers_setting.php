<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'energo' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'energo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'energo' ),
				'e' => esc_html__( 'Elementor', 'energo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'energo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'energo' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'energo' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'energo' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
			    'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    ),
			    'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style OnePage', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
			    ),
			    'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style RTL', 'energo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'energo' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		
		//Welcome Message
		array(
		    'id'       => 'show_welcome_message_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Welcome Message', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Welcome Message.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'welcome_message_v1',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Welcome Message', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_welcome_message_v1', '=', true ),
	    ),
		
		//Update Button
		array(
		    'id'       => 'show_update_button_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Update Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Update Button.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'update_button_name_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Update Button Name', 'energo' ),
			'required' => array( 'show_update_button_v1', '=', true ),
		),
		array(
		    'id'       => 'update_button_link_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Update Button Link', 'energo' ),
			'required' => array( 'show_update_button_v1', '=', true ),
		),
		
		//Estimate Button
		array(
		    'id'       => 'show_estimate_button_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Estimate Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Estimate Button.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'estimate_button_name_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Estimate Button Name', 'energo' ),
			'required' => array( 'show_estimate_button_v1', '=', true ),
		),
		array(
		    'id'       => 'estimate_button_link_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Estimate Button Link', 'energo' ),
			'required' => array( 'show_estimate_button_v1', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search Icon', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Search Icon.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'search_text_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Search Text', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_search_v1', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
			'id'    => 'social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_social_media_v1', '=', true ),
		),
		
		//Logo V1
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Logo', 'energo'),
            'default' => true,
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'       => 'logo_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Image', 'energo' ),
			'subtitle' => esc_html__( 'Insert site logo image', 'energo' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'logo_v1_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'phone_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_phone_number_v1', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
			'required' => array( 'show_phone_number_v1', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'show_address_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Address.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'address_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_address_v1', '=', true ),
	    ),
		array(
		    'id'       => 'address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'default'  => '',
			'required' => array( 'show_address_v1', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'show_email_address_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Email Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Email Address.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'email_address_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_email_address_v1', '=', true ),
	    ),
		array(
		    'id'       => 'email_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
			'required' => array( 'show_email_address_v1', '=', true ),
	    ),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_working_hours_v1', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'energo' ),
			'required' => array( 'show_working_hours_v1', '=', true ),
		),
		/***********************************************************************
								Mobile Info V1
		************************************************************************/
		array(
            'id' => 'show_mobile_sidebar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Information', 'energo'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Mobile Logo
		array(
            'id' => 'show_mobile_logo_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'energo'),
            'default' => true,
		    'required' => array( 'show_mobile_sidebar_v1', '=', true ),
        ),
		array(
			'id'       => 'mobile_logo_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo', 'energo' ),
			'subtitle' => esc_html__( 'Upload logo image', 'energo' ),
		    'required' => array( 'show_mobile_logo_v1', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension_v1',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Upload Mobile Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
		    'required' => array( 'show_mobile_logo_v1', '=', true ),
		),
		
		//Contact Title
		array(
		    'id'       => 'mobile_contact_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v1', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_mobile_sidebar_v1', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v1', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v1', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_mobile_sidebar_v1', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_mobile_social_media_v1', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'energo' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'phone_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Title', 'energo' ),
			'required' => array( 'show_phone_number_v2', '=', true ),
		),
		array(
		    'id'       => 'phone_number_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'required' => array( 'show_phone_number_v2', '=', true ),
		),
		
		//Address
		array(
		    'id'       => 'show_address_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Address.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_address_v2', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'energo' ),
			'required' => array( 'show_working_hours_v2', '=', true ),
		),
		
		//Help Button
		array(
		    'id'       => 'show_help_button_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Help Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Help Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'help_button_name_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Help Button Name', 'energo' ),
			'required' => array( 'show_help_button_v2', '=', true ),
		),
		array(
		    'id'       => 'help_button_link_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Help Button Link', 'energo' ),
			'required' => array( 'show_help_button_v2', '=', true ),
		),
		
		//Setting Button
		array(
		    'id'       => 'show_setting_button_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Setting Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Setting Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'setting_button_name_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Setting Button Name', 'energo' ),
			'required' => array( 'show_setting_button_v2', '=', true ),
		),
		array(
		    'id'       => 'setting_button_link_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Setting Button Link', 'energo' ),
			'required' => array( 'show_setting_button_v2', '=', true ),
		),
		
		//Media Button
		array(
		    'id'       => 'show_media_button_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Media Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Media Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'media_button_name_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Media Button Name', 'energo' ),
			'required' => array( 'show_media_button_v2', '=', true ),
		),
		array(
		    'id'       => 'media_button_link_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Media Button Link', 'energo' ),
			'required' => array( 'show_media_button_v2', '=', true ),
		),
		
		//Logo V2
		array(
            'id' => 'normal_logo_show_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Logo', 'energo'),
            'default' => true,
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'       => 'logo_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Image', 'energo' ),
			'subtitle' => esc_html__( 'Insert site logo image', 'energo' ),
			'required' => array( 'normal_logo_show_v2', '=', true ),
		),
		array(
			'id'       => 'logo_v2_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show_v2', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search Icon', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Search Icon.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'search_text_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Search Text', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_search_v2', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
			'id'    => 'social_media_v2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_social_media_v2', '=', true ),
		),
		
		//Button
		array(
		    'id'       => 'show_button_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'button_name_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Name', 'energo' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
		    'id'       => 'button_link_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'energo' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		/***********************************************************************
								Mobile Info V2
		************************************************************************/
		array(
            'id' => 'show_mobile_sidebar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Information', 'energo'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Mobile Logo
		array(
            'id' => 'show_mobile_logo_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'energo'),
            'default' => true,
		    'required' => array( 'show_mobile_sidebar_v2', '=', true ),
        ),
		array(
			'id'       => 'mobile_logo_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo', 'energo' ),
			'subtitle' => esc_html__( 'Upload logo image', 'energo' ),
		    'required' => array( 'show_mobile_logo_v2', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension_v2',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Upload Mobile Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
		    'required' => array( 'show_mobile_logo_v2', '=', true ),
		),
		
		//Contact Title
		array(
		    'id'       => 'mobile_contact_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v2', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_mobile_sidebar_v2', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v2', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v2', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_mobile_sidebar_v2', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_mobile_social_media_v2', '=', true ),
		),
		
		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style OnePage Settings', 'energo' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v3' ),
	    ),
		
		//Welcome Message
		array(
		    'id'       => 'show_welcome_message_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Welcome Message', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Welcome Message.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'welcome_message_v3',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Welcome Message', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_welcome_message_v3', '=', true ),
	    ),
		
		//Help Button
		array(
		    'id'       => 'show_help_button_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Help Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Help Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'help_button_name_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Help Button Name', 'energo' ),
			'required' => array( 'show_help_button_v3', '=', true ),
		),
		array(
		    'id'       => 'help_button_link_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Help Button Link', 'energo' ),
			'required' => array( 'show_help_button_v3', '=', true ),
		),
		
		//Setting Button
		array(
		    'id'       => 'show_setting_button_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Setting Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Setting Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'setting_button_name_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Setting Button Name', 'energo' ),
			'required' => array( 'show_setting_button_v3', '=', true ),
		),
		array(
		    'id'       => 'setting_button_link_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Setting Button Link', 'energo' ),
			'required' => array( 'show_setting_button_v3', '=', true ),
		),
		
		//Media Button
		array(
		    'id'       => 'show_media_button_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Media Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Media Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'media_button_name_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Media Button Name', 'energo' ),
			'required' => array( 'show_media_button_v3', '=', true ),
		),
		array(
		    'id'       => 'media_button_link_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Media Button Link', 'energo' ),
			'required' => array( 'show_media_button_v3', '=', true ),
		),
		
		//Logo V3
		array(
            'id' => 'normal_logo_show4',
            'type' => 'switch',
            'title' => esc_html__('Enable Logo', 'energo'),
            'default' => true,
		    'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'       => 'logo_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Image', 'energo' ),
			'subtitle' => esc_html__( 'Insert site logo image', 'energo' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		array(
			'id'       => 'logo_v3_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		
		//Estimate Button
		array(
		    'id'       => 'show_button_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'button_link_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'energo' ),
			'required' => array( 'show_button_v3', '=', true ),
		),
		array(
		    'id'       => 'button_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'energo' ),
			'required' => array( 'show_button_v3', '=', true ),
		),
		
		//Address
		array(
		    'id'       => 'show_address_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Address.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'address_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address Title', 'energo' ),
			'required' => array( 'show_address_v3', '=', true ),
		),
		array(
		    'id'       => 'address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_address_v3', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'phone_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Title', 'energo' ),
			'required' => array( 'show_phone_number_v3', '=', true ),
		),
		array(
		    'id'       => 'phone_number_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'required' => array( 'show_phone_number_v3', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours Title', 'energo' ),
			'required' => array( 'show_working_hours_v3', '=', true ),
		),
		array(
		    'id'       => 'working_hours_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'energo' ),
			'required' => array( 'show_working_hours_v3', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search Icon', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Search Icon.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v3' ),
	    ),
		array(
		    'id'       => 'search_text_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Search Text', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_search_v3', '=', true ),
	    ),
		/***********************************************************************
								Mobile Info V3
		************************************************************************/
		array(
            'id' => 'show_mobile_sidebar_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Information', 'energo'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		//Mobile Logo
		array(
            'id' => 'show_mobile_logo_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'energo'),
            'default' => true,
		    'required' => array( 'show_mobile_sidebar_v3', '=', true ),
        ),
		array(
			'id'       => 'mobile_logo_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo', 'energo' ),
			'subtitle' => esc_html__( 'Upload logo image', 'energo' ),
		    'required' => array( 'show_mobile_logo_v3', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension_v3',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Upload Mobile Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
		    'required' => array( 'show_mobile_logo_v3', '=', true ),
		),
		
		//Contact Title
		array(
		    'id'       => 'mobile_contact_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v3', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_mobile_sidebar_v3', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v3', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v3', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_mobile_sidebar_v3', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v3',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_mobile_social_media_v3', '=', true ),
		),
		
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Onepage Settings', 'energo' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'phone_title_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Title', 'energo' ),
			'required' => array( 'show_phone_number_v4', '=', true ),
		),
		array(
		    'id'       => 'phone_number_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'required' => array( 'show_phone_number_v4', '=', true ),
		),
		
		//Address
		array(
		    'id'       => 'show_address_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Address.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_address_v4', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'energo' ),
			'required' => array( 'show_working_hours_v4', '=', true ),
		),
		
		//Help Button
		array(
		    'id'       => 'show_help_button_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Help Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Help Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'help_button_name_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Help Button Name', 'energo' ),
			'required' => array( 'show_help_button_v4', '=', true ),
		),
		array(
		    'id'       => 'help_button_link_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Help Button Link', 'energo' ),
			'required' => array( 'show_help_button_v4', '=', true ),
		),
		
		//Setting Button
		array(
		    'id'       => 'show_setting_button_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Setting Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Setting Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'setting_button_name_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Setting Button Name', 'energo' ),
			'required' => array( 'show_setting_button_v4', '=', true ),
		),
		array(
		    'id'       => 'setting_button_link_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Setting Button Link', 'energo' ),
			'required' => array( 'show_setting_button_v4', '=', true ),
		),
		
		//Media Button
		array(
		    'id'       => 'show_media_button_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Media Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Media Button.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'media_button_name_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Media Button Name', 'energo' ),
			'required' => array( 'show_media_button_v4', '=', true ),
		),
		array(
		    'id'       => 'media_button_link_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Media Button Link', 'energo' ),
			'required' => array( 'show_media_button_v4', '=', true ),
		),
		
		//Logo V2
		array(
            'id' => 'normal_logo_show3',
            'type' => 'switch',
            'title' => esc_html__('Enable Logo', 'energo'),
            'default' => true,
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'       => 'logo_v4',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Image', 'energo' ),
			'subtitle' => esc_html__( 'Insert site logo image', 'energo' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		array(
			'id'       => 'logo_v4_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search Icon', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Search Icon.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		array(
		    'id'       => 'search_text_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Search Text', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_search_v4', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		array(
			'id'    => 'social_media_v4',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_social_media_v4', '=', true ),
		),
		
		//Button
		array(
		    'id'       => 'show_button_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		array(
		    'id'       => 'button_name_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Name', 'energo' ),
			'required' => array( 'show_button_v4', '=', true ),
		),
		array(
		    'id'       => 'button_link_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'energo' ),
			'required' => array( 'show_button_v4', '=', true ),
		),
		/***********************************************************************
								Mobile Info V4
		************************************************************************/
		array(
            'id' => 'show_mobile_sidebar_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Information', 'energo'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Mobile Logo
		array(
            'id' => 'show_mobile_logo_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'energo'),
            'default' => true,
		    'required' => array( 'show_mobile_sidebar_v4', '=', true ),
        ),
		array(
			'id'       => 'mobile_logo_v4',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo', 'energo' ),
			'subtitle' => esc_html__( 'Upload logo image', 'energo' ),
		    'required' => array( 'show_mobile_logo_v4', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension_v4',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Upload Mobile Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
		    'required' => array( 'show_mobile_logo_v4', '=', true ),
		),
		
		//Contact Title
		array(
		    'id'       => 'mobile_contact_title_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v4', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_mobile_sidebar_v4', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v4', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v4', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_mobile_sidebar_v4', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v4',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_mobile_social_media_v4', '=', true ),
		),
		
		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style RTL Settings', 'energo' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v5' ),
	    ),
		
		//Welcome Message
		array(
		    'id'       => 'show_welcome_message_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Welcome Message', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Welcome Message.', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_top_bar_v5', '=', true ),
	    ),
		array(
		    'id'       => 'welcome_message_v5',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Welcome Message', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_welcome_message_v5', '=', true ),
	    ),
		
		//Update Button
		array(
		    'id'       => 'show_update_button_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Update Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Update Button.', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_top_bar_v5', '=', true ),
	    ),
		array(
		    'id'       => 'update_button_name_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Update Button Name', 'energo' ),
			'required' => array( 'show_update_button_v5', '=', true ),
		),
		array(
		    'id'       => 'update_button_link_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Update Button Link', 'energo' ),
			'required' => array( 'show_update_button_v5', '=', true ),
		),
		
		//Estimate Button
		array(
		    'id'       => 'show_estimate_button_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Estimate Button', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Estimate Button.', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_top_bar_v5', '=', true ),
	    ),
		array(
		    'id'       => 'estimate_button_name_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Estimate Button Name', 'energo' ),
			'required' => array( 'show_estimate_button_v5', '=', true ),
		),
		array(
		    'id'       => 'estimate_button_link_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Estimate Button Link', 'energo' ),
			'required' => array( 'show_estimate_button_v5', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search Icon', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Search Icon.', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_top_bar_v5', '=', true ),
	    ),
		array(
		    'id'       => 'search_text_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Search Text', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_search_v5', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_top_bar_v5', '=', true ),
	    ),
		array(
			'id'    => 'social_media_v5',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_social_media_v5', '=', true ),
		),
		
		//Logo V5
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Logo', 'energo'),
            'default' => true,
		    'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'       => 'logo_v5',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Image', 'energo' ),
			'subtitle' => esc_html__( 'Insert site logo image', 'energo' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'logo_v5_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v5' ),
	    ),
		array(
		    'id'       => 'phone_title_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_phone_number_v5', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
			'required' => array( 'show_phone_number_v5', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'show_address_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Address.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v5' ),
	    ),
		array(
		    'id'       => 'address_title_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_address_v5', '=', true ),
	    ),
		array(
		    'id'       => 'address_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'default'  => '',
			'required' => array( 'show_address_v5', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'show_email_address_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Email Address', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Email Address.', 'energo' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v5' ),
	    ),
		array(
		    'id'       => 'email_address_title_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_email_address_v5', '=', true ),
	    ),
		array(
		    'id'       => 'email_address_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
			'required' => array( 'show_email_address_v5', '=', true ),
	    ),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v5', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_title_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours Title', 'energo' ),
			'default'  => '',
			'required' => array( 'show_working_hours_v5', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'energo' ),
			'required' => array( 'show_working_hours_v5', '=', true ),
		),
		/***********************************************************************
								Mobile Info V5
		************************************************************************/
		array(
            'id' => 'show_mobile_sidebar_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Information', 'energo'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		
		//Mobile Logo
		array(
            'id' => 'show_mobile_logo_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'energo'),
            'default' => true,
		    'required' => array( 'show_mobile_sidebar_v5', '=', true ),
        ),
		array(
			'id'       => 'mobile_logo_v5',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo', 'energo' ),
			'subtitle' => esc_html__( 'Upload logo image', 'energo' ),
		    'required' => array( 'show_mobile_logo_v5', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension_v5',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'energo' ),
			'subtitle' => esc_html__( 'Upload Mobile Logo Dimentions', 'energo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
		    'required' => array( 'show_mobile_logo_v5', '=', true ),
		),
		
		//Contact Title
		array(
		    'id'       => 'mobile_contact_title_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v5', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'energo' ),
			'required' => array( 'show_mobile_sidebar_v5', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v5', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'energo' ),
			'default'  => '',
		    'required' => array( 'show_mobile_sidebar_v5', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'energo' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'energo' ),
			'default'  => '',
			'required' => array( 'show_mobile_sidebar_v5', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v5',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'energo' ),
			'required' => array( 'show_mobile_social_media_v5', '=', true ),
		),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
