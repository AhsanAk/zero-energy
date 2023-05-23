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
class Our_History extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  4.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_our_history';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  4.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Our History', 'energo' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  4.0.0
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
     * @since  4.0.0
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
     * @since  4.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'our_history',
            [
                'label' => esc_html__( 'Our History', 'energo' ),
            ]
        );
		$this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
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
                'label'   => esc_html__( 'Our History', 'energo' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'year',
                            'label' => esc_html__('Year', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
							'name' => 'image',
							'label' => __( 'Image', 'energo' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
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
        
        <!-- history-section -->
        <section class="history-section sec-pad centred">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
            <div class="auto-container">
                <div class="sec-title light centred">
					<?php if($settings['subtitle']) { ?>
                    <div class="title-top">
                        <div class="shape-box">
                            <span class="shape shape-1">//</span>
                            <span class="shape shape-2">\\</span>
                        </div>
                        <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                    </div>
					<?php } ?>
                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                    <div class="title-text">
                        <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                    </div>
                </div>
            </div>
            <div class="outer-container">
                <div class="five-item-carousel owl-carousel owl-theme owl-nav-none">
					<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                    <div class="history-block-one">
                        <div class="inner-box">
                            <span><?php echo wp_kses( $item['year'], true ); ?></span>
                            <div class="inner">
                                <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'energo'); ?>"></figure>
                                <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </section>
        <!-- history-section end -->

        <?php
    }
}
