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
class Mission_Vision extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  4.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_mission_vision';
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
        return esc_html__( 'Mission & Vision', 'energo' );
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
            'mission_vision',
            [
                'label' => esc_html__( 'Mission & Vision', 'energo' ),
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
            'slides',
            [
                'label'   => esc_html__( 'Mission & Vision', 'energo' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
						[
							'name' => 'icon_image',
							'label' => __( 'Icon Image', 'energo' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
						[
							'name' => 'hover_icon_image',
							'label' => __( 'Hover Icon Image', 'energo' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
                        [
                            'name' => 'tab_subtitle',
                            'label' => esc_html__('Tab Sub Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'tab_title',
                            'label' => esc_html__('Tab Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'content_subtitle',
                            'label' => esc_html__('Content Sub Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'content_title',
                            'label' => esc_html__('Content Title', 'energo'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'content_text',
                            'label' => esc_html__('Content Text', 'energo'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'features',
                            'label' => esc_html__('Features', 'energo'),
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
        
        <!-- statements-section -->
        <section class="statements-section" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
            <div class="auto-container">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
							<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                            <li class="tab-btn <?php if($i==1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($i); ?>">
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'energo'); ?>"></div>
                                <div class="icon-box-2"><img src="<?php echo esc_url(wp_get_attachment_url($item['hover_icon_image']['id'])); ?>" alt="<?php esc_attr_e('Hover Icon', 'energo'); ?>"></div>
                                <span><?php echo wp_kses( $item['tab_subtitle'], true ); ?></span>
                                <h5><?php echo wp_kses( $item['tab_title'], true ); ?></h5>
                            </li>
							<?php $i++; } ?>
                        </ul>
                    </div>
                    <div class="tabs-content">
						<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                        <div class="tab <?php if($i==1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($i); ?>">
                            <div class="content-inner">
                                <div class="row clearfix">
                                    <div class="col-xl-7 col-lg-12 col-md-12 offset-xl-5">
                                        <div class="content-box">
                                            <h5><?php echo wp_kses( $item['content_subtitle'], true ); ?></h5>
                                            <h3><?php echo wp_kses( $item['content_title'], true ); ?></h3>
                                            <p><?php echo wp_kses( $item['content_text'], true ); ?></p>
                                            <?php $features_list = $item['features'];
											if(!empty($features_list)){
											$features_list = explode("\n", ($features_list)); ?>
											<ul class="clearfix">
												<?php foreach($features_list as $features): ?>
												<li><?php echo wp_kses($features, true); ?></li>
												<?php endforeach; ?>
											</ul>
											<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php $i++; } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- statements-section end -->

        <?php
    }
}
