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
class Contact_Detail extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_contact_detail';
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
        return esc_html__( 'Contact Detail', 'energo' );
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
            'contact_detail',
            [
                'label' => esc_html__( 'Contact Detail', 'energo' ),
            ]
        );
        $this->add_control(
            'address',
            [
                'label'       => __( 'Address', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'email_address',
            [
                'label'       => __( 'Email Address', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'phone_number',
            [
                'label'       => __( 'Phone Number', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'working_hours',
            [
                'label'       => __( 'Working Hours', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
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
        
        <!-- contact-info-section -->
        <section class="contact-info-section bg-color-1">
            <div class="auto-container">
                <div class="inner-container clearfix">
					<?php if($settings['address']){ ?>
                    <div class="single-info-box">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa fa-map"></i></div>
                            <div class="light-icon"><i class="fa fa-map"></i></div>
                            <h6><?php echo wp_kses( $settings['address'], true ); ?></h6>
                        </div>
                    </div>
					<?php } ?>
					
					<?php if($settings['email_address'] or $settings['phone_number']){ ?>
                    <div class="single-info-box">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa fa-headphones"></i></div>
                            <div class="light-icon"><i class="fa fa-headphones"></i></div>
                            <h6><a href="mailto:<?php echo sanitize_email( $settings['email_address'] ); ?>"><?php echo sanitize_email( $settings['email_address'] ); ?></a><br /><a href="tel:<?php echo esc_attr(phone_number($settings['phone_number'])); ?>"><?php echo wp_kses( $settings['phone_number'], true ); ?></a></h6>
                        </div>
                    </div>
					<?php } ?>
					
					<?php if($settings['working_hours']){ ?>
                    <div class="single-info-box">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa fa-clock"></i></div>
                            <div class="light-icon"><i class="fa fa-clock"></i></div>
                            <h6><?php echo wp_kses( $settings['working_hours'], true ); ?></h6>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </section>
        <!-- contact-info-section end -->
        
        <?php
    }
}
