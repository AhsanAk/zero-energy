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
class Contact_Info extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_contact_info';
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
        return esc_html__( 'Contact Info', 'energo' );
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
            'contact_info',
            [
                'label' => esc_html__( 'Contact Info', 'energo' ),
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
            'image',
            [
                'label' => __( 'Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'address_title',
            [
                'label'       => __( 'Address Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'address',
            [
                'label'       => __( 'Address', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'email_title',
            [
                'label'       => __( 'Email Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
            'sales_title',
            [
                'label'       => __( 'Sales Phone Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'sales_phone',
            [
                'label'       => __( 'Sales Phone Number', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'marketing_title',
            [
                'label'       => __( 'Marketing Phone Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'marketing_phone',
            [
                'label'       => __( 'Marketing Phone Number', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'working_title',
            [
                'label'       => __( 'Working Hours Title', 'energo' ),
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
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'faqs_title',
            [
                'label'       => __( 'Faqs Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'faqs',
            [
                'label'       => __( 'Faqs', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
        
        <!-- contact-info-two -->
        <section class="contact-info-two">
            <div class="auto-container">
                <div class="sec-title centred">
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
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                        <div class="inner-box left-column">
							
                            <?php if($settings['image']['id']) { ?>
							<div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icons-shape-1.png'); ?>);"></div>
							<?php } ?>
							
							<?php if($settings['address_title'] and $settings['address']){ ?>
                            <div class="single-info-box">
                                <div class="icon-box"><i class="fa fa-map"></i></div>
                                <h6><?php echo wp_kses( $settings['address_title'], true ); ?></h6>
                                <span><?php echo wp_kses( $settings['address'], true ); ?></span>
                            </div>
                            <?php } ?>
							
							<?php if($settings['sales_title'] and $settings['sales_phone']){ ?>
                            <div class="single-info-box">
                                <div class="icon-box"><i class="fa fa-headphones"></i></div>
                                <h6><?php echo wp_kses( $settings['sales_title'], true ); ?></h6>
                                <span><a href="tel:<?php echo esc_attr(phone_number($settings['sales_phone'])); ?>"><?php echo wp_kses( $settings['sales_phone'], true ); ?></a></span>
                            </div>
                            <?php } ?>
							
							<?php if($settings['working_title'] and $settings['working_hours']){ ?>
                            <div class="single-info-box">
                                <div class="icon-box"><i class="fa fa-clock"></i></div>
                                <h6><?php echo wp_kses( $settings['working_title'], true ); ?></h6>
                                <span><?php echo wp_kses( $settings['working_hours'], true ); ?></span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <figure class="image clearfix"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                        <div class="inner-box text-right right-column">
							
							<?php if($settings['image']['id']) { ?>
                            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icons-shape-2.png'); ?>);"></div>
							<?php } ?>
							
							<?php if($settings['email_title'] and $settings['email_address']){ ?>
                            <div class="single-info-box">
                                <div class="icon-box"><i class="fa fa-envelope-open"></i></div>
                                <h6><?php echo wp_kses( $settings['email_title'], true ); ?></h6>
                                <span><a href="mailto:<?php echo sanitize_email( $settings['email_address'] ); ?>"><?php echo sanitize_email( $settings['email_address'] ); ?></a></span>
                            </div>
                            <?php } ?>
							
							<?php if($settings['marketing_title'] and $settings['marketing_phone']){ ?>
                            <div class="single-info-box">
                                <div class="icon-box"><i class="fa fa-headphones"></i></div>
                                <h6><?php echo wp_kses( $settings['marketing_title'], true ); ?></h6>
                                <span><a href="tel:<?php echo esc_attr(phone_number($settings['marketing_phone'])); ?>"><?php echo wp_kses( $settings['marketing_phone'], true ); ?></a></span>
                            </div>
                            <?php } ?>
							
							<?php if($settings['faqs_title'] and $settings['faqs']){ ?>
                            <div class="single-info-box">
                                <div class="icon-box"><i class="fa fa-question"></i></div>
                                <h6><?php echo wp_kses( $settings['faqs_title'], true ); ?></h6>
                                <span><?php echo wp_kses( $settings['faqs'], true ); ?></span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-two end -->
        
        <?php
    }
}
