<?php
return array(
	'title'      => 'Energo Team Setting',
	'id'         => 'energo_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'energo_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'energo' ),
				),
				array(
					'id'    => 'phone_number',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'energo' ),
				),
				array(
					'id'    => 'email_address',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'energo' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'energo' ),
				),
			),
		),
	),
);