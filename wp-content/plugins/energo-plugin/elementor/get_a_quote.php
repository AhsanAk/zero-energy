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
class Get_A_Quote extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_get_a_quote';
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
        return esc_html__( 'Get a Quote', 'energo' );
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
            'get_a_quote',
            [
                'label' => esc_html__( 'Get a Quote', 'energo' ),
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
            'cf7_shortocde',
            [
                'label' => esc_html__('Select Contact Form 7', 'energo'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => get_contact_form_7_list(),
            ]
        );
		$this->end_controls_section();
		
		//Feedback
        $this->start_controls_section(
            'feedback_tab',
            [
                'label' => esc_html__( 'Feedback', 'energo' ),
            ]
        );
		$this->add_control(
            'bg_image1',
            [
                'label' => __( 'Background Image', 'energo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'video_url',
            [
                'label'       => __( 'Video URL', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'energo' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 26,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'energo' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__( 'Order By', 'energo' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'energo' ),
                    'title'      => esc_html__( 'Title', 'energo' ),
                    'menu_order' => esc_html__( 'Menu Order', 'energo' ),
                    'rand'       => esc_html__( 'Random', 'energo' ),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'energo' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'energo' ),
                    'ASC'  => esc_html__( 'ASC', 'energo' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'energo'),
                'options' => get_categories_list('testimonials_cat')
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

        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-energo' );
        $args = array(
            'post_type'      => 'testimonials',
            'posts_per_page' => energo_set( $settings, 'query_number' ),
            'orderby'        => energo_set( $settings, 'query_orderby' ),
            'order'          => energo_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( energo_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = energo_set( $settings, 'query_category' );
        $query = new \WP_Query( $args ); ?>
        
        <!-- investor-section -->
        <section class="investor-section bg-color-2">
            <figure class="image-layer"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'energo'); ?>"></figure>
            <div class="outer-container">
                <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image1']['id'])); ?>);"></div>
                <figure class="quote-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/quote-2.png'); ?>" alt="<?php esc_attr_e('quote icon', 'energo'); ?>"></figure>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_5">
                                <div class="content-box">
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
									
									<?php if($settings['cf7_shortocde']){ ?>
                                    <div class="form-inner">
										<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
						
						<?php if ( $query->have_posts() ) { ?>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="right-column">
                                <div class="video-inner">
									<?php if($settings['video_url']) { ?>
                                    <div class="video-btn">
                                        <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="vid-pp" data-flashy-type="video"><i class="flaticon-play-button"></i>
                                            <span class="border-animation"></span>
                                            <span class="border-animation border-2"></span>
                                            <span class="border-animation border-3"></span>
                                        </a>
                                    </div>
									<?php } ?>
                                    <span class="big-text"><?php echo wp_kses( $settings['transparent_text'], true ); ?></span>
                                </div>
                                <div class="testimonial-inner">
                                    <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                        <div class="testimonial-content">
                                            <figure class="testimonial-thumb"><?php the_post_thumbnail('energo_80x80'); ?></figure>
                                            <div class="text">
                                                <p><?php echo wp_kses(energo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                            </div>
                                            <div class="author-box">
												<?php $rating = get_post_meta( get_the_id(), 'testimonial_rating', true );
												if(!empty($rating)){ ?>
												<ul class="rating clearfix">
													<?php for ($x = 1; $x <= 5; $x++) {
														if($x <= $rating) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-o"></i></li>';
													} ?>
												</ul>
												<?php } ?>
                                                <h5><?php the_title(); ?></h5>
                                				<span class="designation"><?php echo get_post_meta( get_the_id(), 'designation', true ); ?></span>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- investor-section end -->
        
        <?php
		
		wp_reset_postdata();
    }
}
