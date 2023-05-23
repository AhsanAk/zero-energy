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
class About_Us_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_about_us_v1';
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
        return esc_html__( 'About Us V1', 'energo' );
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
            'about_us_v1',
            [
                'label' => esc_html__( 'About Us V1', 'energo' ),
            ]
        );
        $this->add_control(
            'top_image',
            [
                'label' => __( 'Top Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            'left_image',
            [
                'label' => __( 'Left Bottom Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            'bulb_image',
            [
                'label' => __( 'Bulb Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'year',
            [
                'label'       => __( 'Year', 'energo' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'year_sign',
            [
                'label'       => __( 'Year Sign', 'energo' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'year_experience',
            [
                'label'       => __( 'Year Experience', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
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
            'slides',
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
                            'name' => 'show_img',
                            'label' => esc_html__('Show Image', 'energo'),
                            'type' => Controls_Manager::SWITCHER,
							'default' => false,
						],
						[
                            'name' => 'icon_image',
                            'label' => esc_html__('Icon Image', 'energo'),
                            'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
                        ],
						[
							'name' => 'icons',
							'label' => esc_html__('Enter The icons', 'energo'),
							'type' => Controls_Manager::SELECT2,
							'options'  => get_fontawesome_icons()
						],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'btn_title',
                            'label' => esc_html__('Button Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'energo'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com/', 'energo' ),
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
        
        <!-- about-section -->
        <section class="about-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_1">
                            <div class="image-box">
                                <figure class="image image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['left_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
                                <figure class="image image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['top_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
                                <figure class="image image-3"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bulb_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
                                <div class="text">
                                    <h2><?php echo wp_kses( $settings['year'], true ); ?><span><?php echo wp_kses( $settings['year_sign'], true ); ?></span></h2>
                                    <h6><?php echo wp_kses( $settings['year_experience'], true ); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
									<?php if($settings['subtitle']) { ?>
                                    <div class="title-top">
                                        <div class="shape-box">
                                            <span class="shape shape-1">//</span>
                                        </div>
                                        <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                                    </div>
									<?php } ?>
                                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                                </div>
                                <div class="inner-box">
									<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                                    <div class="single-item">
                                        <h5><?php echo wp_kses(sprintf('%02d', $i), true); ?>. <?php echo wp_kses( $item['title'], true ); ?></h5>
                                        <div class="inner">
											 <?php if( $item[ 'show_img' ] ):?>
                                            <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'energo'); ?>"></div>
                                            <?php else:?>
                                            <div class="icon-box"><i class="icon <?php echo esc_attr( $item[ 'icons' ] );?>"></i></div>
                                            <?php endif;?>
                                            <p><?php echo wp_kses( $item['text'], true ); ?></p>
											
											<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                            <h6><i class="flaticon-right-arrows"></i><a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a></h6>
											<?php } ?>
                                        </div>
                                    </div>
                                    <?php $i++; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->
        
        <?php
    }
}
