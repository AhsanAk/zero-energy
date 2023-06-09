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
class Slider_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_slider_v2';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Slider V2', 'energo' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  2.0.0
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
     * @since  2.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'slider_v2',
            [
                'label' => esc_html__( 'Slider V2', 'energo' ),
            ]
        );
        $this->add_control(
            'slides',
            [
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
						[
							'name' => 'position',
							'label'   => esc_html__( 'Position', 'energo' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'left',
							'options' => array(
								'center' => esc_html__( 'Center', 'energo' ),
								'left' => esc_html__( 'Left', 'energo' ),
							),
						],
                        [
                            'name' => 'bg_image',
                            'label' => esc_html__('Background Image', 'energo'),
                            'type' => Controls_Manager::MEDIA,
                            'default' => ['url' => Utils::get_placeholder_image_src(),],
                        ],
                        [
                            'name' => 'subtitle',
                            'label' => esc_html__('Sub Title', 'energo'),
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
                            'name' => 'text',
                            'label' => esc_html__('Text', 'energo'),
                            'type' => Controls_Manager::TEXTAREA,
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
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
        
        <!-- banner-style-two -->
        <section class="banner-style-two">
            <div class="banner-carousel owl-theme owl-carousel">
                <?php foreach($settings['slides'] as $key => $item): ?>
                <div class="slide-item <?php if($item['position'] == 'center') echo 'centred'; ?>">
                    <div class="image-layer" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h6><?php echo wp_kses($item['subtitle'], true); ?></h6>
                            <h1><?php echo wp_kses($item['title'], true); ?></h1>
                            <p><?php echo wp_kses($item['text'], true); ?></p>
							
							<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrows"></i><?php echo wp_kses($item['btn_title'], true); ?></a>
                            </div>
							<?php } ?>
                        </div>  
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- banner-style-two end -->

        <?php
    }
}
