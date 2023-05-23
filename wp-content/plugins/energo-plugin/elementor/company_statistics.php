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
class Company_Statistics extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_company_statistics';
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
        return esc_html__( 'Company Statistics', 'energo' );
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
            'company_statistics',
            [
                'label' => esc_html__( 'Company Statistics', 'energo' ),
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
            'wind_image',
            [
                'label' => __( 'Wind Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
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
                'type'        => Controls_Manager::TEXTAREA,
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
            'skills',
            [
                'label'   => esc_html__( 'Skills', 'energo' ),
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
                            'name' => 'skill',
                            'label' => esc_html__('Skill', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						
                    ],
            ]
        );
		$this->add_control(
            'signature',
            [
                'label' => __( 'Signature', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
				'separator' => 'before',
            ]
        );
        $this->add_control(
            'author',
            [
                'label'       => __( 'Author', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'designation',
            [
                'label'       => __( 'Designation', 'energo' ),
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
        $allowed_tags = wp_kses_allowed_html('post'); ?>
        
        <!-- skills-section -->
        <section class="skills-section bg-color-2 sec-pad">
            <div class="bg-layer">
                <div class="bg-1"></div>
                <div class="bg-2"></div>
                <div class="bg-3"></div>
            </div>
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
            <div class="image-layer">
                <figure class="image image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['wind_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
                <figure class="image image-2 wow slideInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 content-column">
                        <div class="content_block_2">
                            <div class="content-box">
                                <div class="sec-title light">
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
                                <div class="progress-inner">
                                    <?php $i=1; foreach($settings['skills'] as $key => $item) { ?>
                                    <div class="progress-box">
                                        <div class="bar-box">
                                            <h6><?php echo wp_kses( $item['title'], true ); ?></h6>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($item['skill']); ?>%"></div>
                                            </div>
                                        </div>
                                        <div class="count-text"><?php echo wp_kses( $item['skill'], true ); ?>%</div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="author-box">
                                    <figure class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['signature']['id'])); ?>" alt="<?php esc_html_e('Signature', 'energo'); ?>"></figure>
                                    <div class="author-info">
                                        <h5><?php echo wp_kses( $settings['author'], true ); ?></h5>
                                        <span class="designation"><?php echo wp_kses( $settings['designation'], true ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- skills-section end -->
        
        <?php
    }
}
