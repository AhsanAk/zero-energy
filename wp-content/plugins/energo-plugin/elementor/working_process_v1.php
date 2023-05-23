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
class Working_Process_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_working_process_v1';
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
        return esc_html__( 'Working Process V1', 'energo' );
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
            'working_process_v1',
            [
                'label' => esc_html__( 'Working Process V1', 'energo' ),
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
                            'name' => 'icon_image',
                            'label' => esc_html__('Icon Image', 'energo'),
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
        
        <!-- working-section -->
        <section class="working-section sec-pad">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
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
                                    <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                                </div>
								<?php } ?>
                                <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                            <div class="text">
                                <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <?php $i=1; foreach($settings['slides'] as $key => $item) {
					if($i==1 or $i==3)
						$icon_url = get_template_directory_uri().'/assets/images/icons/arrow-1.png';
					else if($i==2)
						$icon_url = get_template_directory_uri().'/assets/images/icons/arrow-2.png';
					else
						$icon_url = '';
					?>
                    <div class="col-lg-3 col-md-6 col-sm-12 working-block">
                        <div class="working-block-one wow fadeInLeft animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="shape" style="background-image: url(<?php echo esc_url($icon_url); ?>);"></div>
                                <h6><?php esc_html_e('Step', 'energo'); ?></h6>
                                <h2><?php echo wp_kses(sprintf('%02d', $i), true); ?>...</h2>
								<?php $icon_image = get_post_meta( get_the_id(), 'icon_image', true ); ?>
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'energo'); ?>"></div>
                                <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
                            </div>
                        </div>
                    </div>
					<?php $i++; } ?>
                </div>
            </div>
        </section>
        <!-- working-section end -->

        <?php
    }
}
