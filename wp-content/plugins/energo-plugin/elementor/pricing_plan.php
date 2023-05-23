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
class Pricing_Plan extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_pricing_plan';
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
        return esc_html__( 'Pricing Plan', 'energo' );
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
            'pricing_plan',
            [
                'label' => esc_html__( 'Pricing Plan', 'energo' ),
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label'       => __( 'Sub Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
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
            'price_plan',
            [
                'label'   => esc_html__( 'Pricing Plan', 'energo' ),
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
                            'name' => 'features',
                            'label' => esc_html__('Features List', 'energo'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'currency_sign',
                            'label' => esc_html__('Currency', 'energo'),
                            'type' => Controls_Manager::TEXT,
                        ],
                        [
                            'name' => 'price',
                            'label' => esc_html__('Price', 'energo'),
                            'type' => Controls_Manager::TEXT,
                        ],
                        [
                            'name' => 'package_plan',
                            'label' => esc_html__('Package Plan', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'placeholder' => __( 'Month', 'energo' ),
                        ],
                        [
                            'name' => 'btn_title',
                            'label' => esc_html__('Button Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_link',
                            'label' => esc_html__('Button URL', 'energo'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com', 'energo' ),
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                        ],
                    ],
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
        $allowed_tags = wp_kses_allowed_html('post'); ?>
        
        <!-- pricing-section -->
        <section class="pricing-section sec-pad">
            <div class="auto-container">
                <div class="upper-box">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                            <div class="sec-title">
								<?php if($settings['subtitle']) { ?>
                                <div class="title-top">
                                    <div class="shape-box">
                                        <span class="shape shape-1">//</span>
                                    </div>
                                    <h6><?php echo wp_kses($settings['subtitle'], $allowed_tags); ?></h6>
                                </div>
								<?php } ?>
                                <h2><?php echo wp_kses($settings['title'], $allowed_tags); ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                            <div class="text">
                                <p><?php echo wp_kses($settings['text'], $allowed_tags); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <?php foreach($settings['price_plan'] as $key => $item): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="pricing-table">
                                <h5><?php echo wp_kses($item['title'], $allowed_tags); ?></h5>
                                <div class="inner-box">
                                    <div class="price-box">
                                        <h2><span class="symble"><?php echo wp_kses($item['currency_sign'], $allowed_tags); ?></span><?php echo wp_kses($item['price'], $allowed_tags); ?> <?php if($item['package_plan']) { ?><span class="month"><?php esc_html_e('Per', 'energo'); ?> <br /><?php echo wp_kses($item['package_plan'], $allowed_tags); ?></span><?php } ?></h2>
                                    </div>
									
									<?php $features_list = $item['features'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); ?>
									<ul class="feature-list clearfix">
										<?php foreach($features_list as $features): ?>
										<?php echo wp_kses($features, true); ?>
										<?php endforeach; ?>
									</ul>
									<?php } ?>
									
									<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrows"></i><?php echo wp_kses($item['btn_title'], $allowed_tags); ?></a>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- pricing-section end -->

        <?php
    }
}
