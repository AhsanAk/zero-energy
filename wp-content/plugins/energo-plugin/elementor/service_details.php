<?php namespace ENERGOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Service_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_service_details';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Service Details', 'energo' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-briefcase';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'energo' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'service_details',
            [
                'label' => esc_html__( 'Service Details', 'energo' ),
            ]
        );
		$this->add_control(
            'image',
            [
                'label' => __( 'Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'text',
            [
                'label'       => __( 'Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'features',
            [
                'label'   => esc_html__( 'Features', 'energo' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
							'name' => 'feature_image',
							'label' => __( 'Image', 'energo' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
						[
							'name' => 'feature_icon',
							'label' => esc_html__('Select Icon', 'energo'),
							'type' => Controls_Manager::SELECT2,
							'label_block' => true,
							'options' => get_fontawesome_icons(),
						],
                        [
                            'name' => 'short_text',
                            'label' => esc_html__('Short Text', 'energo'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'energo'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
                    ],
            ]
        );
        $this->end_controls_section();
		
		//Scope of Work
		$this->start_controls_section(
            'scope_work_tab',
            [
                'label' => esc_html__( 'Scope of Work', 'energo' ),
            ]
        );
		$this->add_control(
            'title2',
            [
                'label'       => __( 'Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'text2',
            [
                'label'       => __( 'Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'feature2',
            [
                'label'       => __( 'Features', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->end_controls_section();
		
		//Services Include
		$this->start_controls_section(
            'services_include_tab',
            [
                'label' => esc_html__( 'Services Include', 'energo' ),
            ]
        );
		$this->add_control(
            'image3',
            [
                'label' => __( 'Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'title3',
            [
                'label'       => __( 'Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'text3',
            [
                'label'       => __( 'Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'features3',
            [
                'label'   => esc_html__( 'Features', 'energo' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'energo'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
                    ],
            ]
        );
		$this->end_controls_section();
		
		//Things to Consider
		$this->start_controls_section(
            'things_consider_tab',
            [
                'label' => esc_html__( 'Things to Consider', 'energo' ),
            ]
        );
		$this->add_control(
            'title4',
            [
                'label'       => __( 'Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'text4',
            [
                'label'       => __( 'Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		
		//Before Install
		$this->add_control(
            'title5',
            [
                'label'       => __( 'Before Install Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'feature5',
            [
                'label'       => __( 'Before Install Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		
		//After Install
		$this->add_control(
            'title6',
            [
                'label'       => __( 'After Install Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'feature6',
            [
                'label'       => __( 'After Install Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->end_controls_section();
		
		//Sidebar
		$this->start_controls_section(
            'sidebar_tab',
            [
                'label' => esc_html__( 'Sidebar', 'energo' ),
            ]
        );
		$this->add_control(
			'sidebar',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'manzil' ),
				'separate' => 'before',
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => energo_get_sidebars(),
			]
		);
        $this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
        
        <!-- service-details -->
        <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar default-sidebar">
                            <?php dynamic_sidebar( $settings['sidebar'] ); ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            <figure class="main-image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'energo'); ?>"></figure>
                            <div class="content-one">
                                <div class="text">
                                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                    <?php echo wp_kses( $settings['text'], true ); ?>
                                </div>
								
								<?php if($settings['features']) { ?>
                                <div class="inner-box">
									<?php foreach($settings['features'] as $key => $item) { ?>
                                    <div class="single-item">
                                        <div class="image-box">
                                            <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'energo'); ?>"></figure>
                                            <div class="icon"><i class="<?php echo esc_attr(str_replace("icon ", "", $item['feature_icon'])); ?>"></i></div>
                                        </div>
                                        <div class="inner">
                                            <div class="text">
                                                <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                                <p><?php echo wp_kses( $item['short_text'], true ); ?></p>
                                            </div>
                                            <div class="overlay-text">
                                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
								<?php } ?>
                            </div>
                            <div class="content-two">
                                <div class="text">
                                    <h3><?php echo wp_kses( $settings['title2'], true ); ?></h3>
                                    <p><?php echo wp_kses( $settings['text2'], true ); ?></p>
                                </div>
                                <div class="feature-list">
                                    <div class="row clearfix">
										<?php $features_list = $settings['feature2'];
										if(!empty($features_list)){
										$features_list = explode("\n", ($features_list));
										foreach($features_list as $features): ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <div class="single-item">
                                                <div class="icon-box"><i class="fa fa-check-circle"></i></div>
												<h6><?php echo wp_kses($features, true); ?></h6>
                                            </div>
                                        </div>
										<?php endforeach;
										} ?>
                                    </div>
                                </div>
                            </div>
                            <div class="content-three">
                                <div class="text">
                                    <h3><?php echo wp_kses( $settings['title3'], true ); ?></h3>
                                    <p><?php echo wp_kses( $settings['text3'], true ); ?></p>
                                </div>
                                <div class="inner-box">
                                    <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image3']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
									
									<?php if($settings['features3']) { ?>
                                    <div class="carousel-box">
                                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                            <?php $i=1; foreach($settings['features3'] as $key => $item) { ?>
											<div class="inner">
                                                <span><?php echo wp_kses(sprintf('%02d', $i), true); ?>.</span>
                                                <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                            </div>
                                            <?php $i++; } ?>
                                        </div>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                            <div class="content-four">
                                <div class="text">
                                    <h3><?php echo wp_kses( $settings['title4'], true ); ?></h3>
                                    <p><?php echo wp_kses( $settings['text4'], true ); ?></p>
                                </div>
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <h5><?php echo wp_kses( $settings['title5'], true ); ?></h5>
												
												<?php $features_list = $settings['feature5'];
												if(!empty($features_list)){
												$features_list = explode("\n", ($features_list)); ?>
                                                <ul>
                                                    <?php foreach($features_list as $features): ?>
                                                    <li><?php echo wp_kses($features, true); ?></li>
													<?php endforeach; ?>
                                                </ul>
												<?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <h5><?php echo wp_kses( $settings['title6'], true ); ?></h5>
												
												<?php $features_list = $settings['feature6'];
												if(!empty($features_list)){
												$features_list = explode("\n", ($features_list)); ?>
                                                <ul>
                                                    <?php foreach($features_list as $features): ?>
                                                    <li><?php echo wp_kses($features, true); ?></li>
													<?php endforeach; ?>
                                                </ul>
												<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-details end -->
        
        <?php
    }
}
