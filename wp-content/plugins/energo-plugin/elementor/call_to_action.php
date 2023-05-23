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
class Call_To_Action extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_call_to_action';
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
        return esc_html__( 'Call To Action', 'energo' );
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
            'call_to_action',
            [
                'label' => esc_html__( 'Call to Action', 'energo' ),
            ]
        );
		$this->add_control(
            'style',
            [
                'label'   => esc_html__( 'Style', 'energo' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1' => esc_html__( 'Style 1', 'energo' ),
                    'style2' => esc_html__( 'Style 2', 'energo' ),
                ),
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
            'btn_title',
            [
                'label'       => __( 'Button Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => __( 'Button URL', 'energo' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'energo' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
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

        <!-- cta-section -->
        <section class="cta-section <?php if($settings['style'] == 'style2') echo 'alternat-2'; ?>" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <span class="big-text"><?php echo wp_kses( $settings['transparent_text'], true ); ?></span>
                    <div class="text pull-left">
                        <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                        <h3><?php echo wp_kses( $settings['text'], true ); ?></h3>
                    </div>
					
					<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                    <div class="btn-box pull-right">
                        <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrows"></i><?php echo wp_kses( $settings['btn_title'], true ); ?></a>
                    </div>
					<?php } ?>
                </div>
            </div>
        </section>
        <!-- cta-section end -->

        <?php
    }
}
