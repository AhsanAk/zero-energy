<?php namespace ENERGOPLUGIN\Element;

class Elementor {
	static $widgets = array(
		'slider_v1',
		'slider_v2',
		'slider_v3',
		'about_us_v1',
		'featured_services_v1',
		'services_v1',
		'facts_counter',
		'working_process_v1',
		'latest_projects_v1',
		'company_statistics',
		'team_v1',
		'testimonials_v1',
		'news_v1',
		'partners',
		'subscribe_newsletter',
		'featured_services_v2',
		'call_to_action',
		'about_us_v2',
		'services_v2',
		'latest_projects_v2',
		'why_choose_us_v1',
		'pricing_plan',
		'get_a_quote',
		'news_v2',
		'contact_detail',
		'featured_services_v3',
		'services_v3',
		'why_choose_us_v2',
		'latest_projects_v3',
		'working_process_v2',
		'about_us_v3',
		'team_v2',
		'news_v3',
		'testimonials_v2',
		'about_us_v4',
		'mission_vision',
		'our_history',
		'team_v3',
		'team_v4',
		'faqs',
		'projects_2_column',
		'projects_3_column',
		'projects_4_column',
		'projects_masonry',
		'service_details',
		'blog_2_column',
		'blog_3_column',
		'blog_list',
		'contact_info',
		'contact_us',
		'google_map',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = ENERGOPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\ENERGOPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'energo',
			[
				'title' => esc_html__( 'Energo', 'energo' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'energo' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();