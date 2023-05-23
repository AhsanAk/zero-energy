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
class Faqs extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_faqs';
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
        return esc_html__('Faqs', 'energo');
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
            'faqs',
            [
                'label' => esc_html__('Faqs', 'energo'),
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label'       => esc_html__('Sub Title', 'energo'),
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
                'label'       => esc_html__('Title', 'energo'),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'text_limit',
            [
                'label'   => esc_html__('Text Limit', 'energo'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 22,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__('Number of Post', 'energo'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__('Order By', 'energo'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__('Date', 'energo'),
                    'title'      => esc_html__('Title', 'energo'),
                    'menu_order' => esc_html__('Menu Order', 'energo'),
                    'rand'       => esc_html__('Random', 'energo'),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__('Order', 'energo'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__('DESC', 'energo'),
                    'ASC'  => esc_html__('ASC', 'energo'),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'label' => esc_html__('Category', 'energo'),
                'type' => Controls_Manager::SELECT,
                'options' => get_categories_list('faqs_cat')
            ]
        );
        $this->end_controls_section();
		
		//Contact Info
		$this->start_controls_section(
            'sidebar_contact_tab',
            [
                'label' => esc_html__('Contact Info', 'energo'),
            ]
        );
		$this->add_control(
            'sidebar_image',
            [
                'label' => esc_html__('Sidebar Image', 'energo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
            ]
        );
		$this->add_control(
            'icon_image',
            [
                'label' => esc_html__('Icon Image', 'energo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
            ]
        );
		$this->add_control(
            'sidebar_text',
            [
                'label'       => __( 'Sidebar Text', 'energo' ),
                'type'        => Controls_Manager::TEXTAREA,
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
		$this->add_control(
            'phone_title',
            [
                'label'       => __( 'Phone Title', 'energo' ),
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

        $paged = energo_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

        $this->add_render_attribute('wrapper', 'class', 'themerange-energo');
        $args = array(
            'post_type'      => 'faqs',
            'posts_per_page' => energo_set($settings, 'query_number'),
            'orderby'        => energo_set($settings, 'query_orderby'),
            'order'          => energo_set($settings, 'query_order'),
            'paged'          => $paged
        );

        if( energo_set($settings, 'query_category') ) $args['faqs_cat'] = energo_set($settings, 'query_category');
        $query = new \WP_Query($args);

        if($query->have_posts()) { ?>

		<!-- faq-page-section -->
        <section class="faq-page-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
					<?php if($settings['subtitle']) { ?>
                    <div class="title-top">
                        <div class="shape-box">
                            <span class="shape shape-1">//</span>
                            <span class="shape shape-2">\\</span>
                        </div>
                        <h6><?php echo wp_kses($settings['subtitle'], true); ?></h6>
                    </div>
					<?php } ?>
                    <h2><?php echo wp_kses($settings['title'], true); ?></h2>
                </div>
                <div class="search-form">
                    <?php echo get_template_part('searchform2'); ?>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="faq-content">
                            <ul class="accordion-box">
								<?php $i=1; while ($query->have_posts() ) : $query->the_post(); ?>
                                <li class="accordion block <?php if($i==1) echo 'active-block'; ?>">
                                    <div class="acc-btn <?php if($i==1) echo 'active'; ?>">
                                        <div class="icon-outer"></div>
                                        <h6><?php the_title(); ?></h6>
                                    </div>
                                    <div class="acc-content <?php if($i==1) echo 'current'; ?>">
                                        <div class="text">
                                            <p><?php echo wp_kses(energo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                        </div>
                                    </div>
                                </li>
								<?php $i++; endwhile; ?>
                            </ul>
                        </div>
                    </div>
					
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="faq-sidebar default-sidebar">
                            <div class="sidebar-content">
                                <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-7.png'); ?>);"></div>
                                <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-8.png'); ?>);"></div>
                                <figure class="image-layer"><img src="<?php echo esc_url(wp_get_attachment_url($settings['sidebar_image']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'energo'); ?>"></figure>
                                <div class="upper-box">
                                    <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'energo'); ?>"></div>
                                    <h5><?php echo wp_kses( $settings['sidebar_text'], true ); ?></h5>
									
									<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                                    <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a>
									<?php } ?>
                                </div>
								
								<?php if($settings['phone_title'] and $settings['phone_number']) { ?>
                                <div class="support-box">
                                    <div class="icon-box"><i class="fa fa-headphones"></i></div>
                                    <h6><?php echo wp_kses( $settings['phone_title'], true ); ?></h6>
                                    <h5><a href="tel:<?php echo esc_attr(phone_number($settings['phone_number'])); ?>"><?php echo wp_kses( $settings['phone_number'], true ); ?></a></h5>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-page-section end -->

        <?php }

        wp_reset_postdata();
    }
}
