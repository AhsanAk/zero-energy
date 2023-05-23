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
class Facts_Counter extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_facts_counter';
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
        return esc_html__( 'Facts Counter V1', 'energo' );
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
            'facts_counter',
            [
                'label' => esc_html__( 'Facts Counter V1', 'energo' ),
            ]
        );
		$this->add_control(
            'left_image',
            [
                'label' => __( 'Left Background Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'right_image',
            [
                'label' => __( 'Right Background Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'transparent_text',
            [
                'label'       => __( 'Transparent Text', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'slides',
            [
                'label'   => esc_html__( 'Facts Counter', 'energo' ),
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
                            'name' => 'icon',
                            'label' => esc_html__('Select Icon', 'energo'),
                            'type' => Controls_Manager::SELECT2,
							'label_block' => true,
                            'options' => get_fontawesome_icons(),
                        ],
                        [
                            'name' => 'counter_start',
                            'label' => esc_html__('Counter Start', 'energo'),
                            'type' => Controls_Manager::NUMBER,
                            'default' => 0,
                        ],
                        [
                            'name' => 'counter_stop',
                            'label' => esc_html__('Counter Stop', 'energo'),
                            'type' => Controls_Manager::NUMBER,
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
        
        <!-- funfact-section -->
        <section class="funfact-section centred green-bg">
            <span class="big-text"><?php echo wp_kses( $settings['transparent_text'], true ); ?></span>
            <div class="bg-layer">
                <div class="bg-1" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['left_image']['id'])); ?>);"></div>
                <div class="bg-2" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['right_image']['id'])); ?>);"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <?php foreach($settings['slides'] as $key => $item) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                        <div class="counter-block-one wow slideInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($item['counter_stop']); ?>"><?php echo wp_kses($item['counter_start'], $allowed_tags); ?></span>
                                </div>
                                <h5><?php echo wp_kses($item['title'], true); ?></h5>
                                <div class="icon-box"><i class="<?php echo esc_attr($item['icon']); ?>"></i></div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->

        <?php
    }
}
