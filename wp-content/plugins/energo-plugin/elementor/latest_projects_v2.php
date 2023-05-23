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
class Latest_Projects_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_latest_projects_v2';
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
        return esc_html__( 'Latest Projects V2', 'energo' );
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
            'latest_projects_v2',
            [
                'label' => esc_html__( 'Latest Projects V2', 'energo' ),
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
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'energo' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 9,
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
                'options' => get_categories_list('project_cat')
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
            'post_type'      => 'project',
            'posts_per_page' => energo_set( $settings, 'query_number' ),
            'orderby'        => energo_set( $settings, 'query_orderby' ),
            'order'          => energo_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( energo_set( $settings, 'query_category' ) ) $args['project_cat'] = energo_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>

		<!-- project-style-two -->
        <section class="project-style-two sec-pad">
            <div class="auto-container">
                <div class="upper-box clearfix">
                    <div class="sec-title pull-left">
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
					
					<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                    <div class="btn-box pull-right">
                        <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrows"></i><?php echo wp_kses( $settings['btn_title'], true ); ?></a>
                    </div>
					<?php } ?>
                </div>
            </div>
            <div class="outer-container">
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                    <?php global $post;
					while ( $query->have_posts() ) : $query->the_post();
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
					$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
					?>
                    <div class="project-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <h6>[ <?php echo implode( ', ', (array)$term_list ); ?> ]</h6>
                                <figure class="image"><?php the_post_thumbnail('energo_600x380'); ?></figure>
                            </div>
                            <div class="overlay-content">
                                <h6>[ <?php echo implode( ', ', (array)$term_list ); ?> ]</h6>
                                <h5><a href="<?php echo esc_url(the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
                                <div class="view-btn"><a href="<?php echo esc_url($post_thumbnail_url); ?>" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom-in-1"></i></a></div>
                            </div>
                        </div>
                    </div>
					<?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- project-style-two end -->

		<?php }

        wp_reset_postdata();
    }
}
