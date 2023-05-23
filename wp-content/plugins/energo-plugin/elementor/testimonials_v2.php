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
class Testimonials_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_testimonials_v2';
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
        return esc_html__( 'Testimonials V2', 'energo' );
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
            'testimonials_v2',
            [
                'label' => esc_html__( 'Testimonials V2', 'energo' ),
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
            'bg_image',
            [
                'label' => __( 'Backgruond Image', 'energo' ),
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
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'energo' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 19,
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
                'default' => 2,
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
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- testimonial-style-three -->
        <section class="testimonial-style-three centred">
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
                </div>
                <div class="inner-container clearfix">
                    <div class="left-column pull-left">
                        <div class="video-inner" style="background-image: url(<?php echo esc_url(wp_get_attachment_url( $settings['bg_image']['id'] )); ?>);">
							<?php if($settings['video_url']) { ?>
                            <div class="video-btn">
                                <a href="<?php echo wp_kses( $settings['video_url'], true ); ?>" class="lightbox-image" data-caption=""><i class="flaticon-play-button"></i>
                                    <span class="border-animation"></span>
                                    <span class="border-animation border-2"></span>
                                    <span class="border-animation border-3"></span>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                    <div class="right-column pull-right">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="testimonial-content">
                            <figure class="testimonial-thumb"><?php the_post_thumbnail('energo_300x265'); ?></figure>
                            <div class="content-box">
                                <p><?php echo wp_kses(energo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
								
								<?php $rating = get_post_meta( get_the_id(), 'testimonial_rating', true );
								if(!empty($rating)){ ?>
								<ul class="rating clearfix">
									<?php for ($x = 1; $x <= 5; $x++) {
										if($x <= $rating) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-o"></i></li>';
									} ?>
								</ul>
								<?php } ?>
                                <h5><?php the_title(); ?></h5>
                                <div class="quote-icon"><i class="flaticon-quote"></i></div>
                            </div>
                        </div>
						<?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-three end -->

        <?php }

        wp_reset_postdata();
    }
}
