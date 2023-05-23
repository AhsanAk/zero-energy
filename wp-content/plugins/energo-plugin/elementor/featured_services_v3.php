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
class Featured_Services_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  3.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_featured_services_v3';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  3.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Featured Services V3', 'energo' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  3.0.0
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
     * @since  3.0.0
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
     * @since  3.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'featured_services_v3',
            [
                'label' => esc_html__( 'Featured Services V3', 'energo' ),
            ]
        );
        $this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'energo' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 9,
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
                'default' => 4,
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
                'options' => get_categories_list('service_cat'),
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
            'post_type'      => 'service',
            'posts_per_page' => energo_set( $settings, 'query_number' ),
            'orderby'        => energo_set( $settings, 'query_orderby' ),
            'order'          => energo_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( energo_set( $settings, 'query_category' ) ) $args['service_cat'] = energo_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- service-style-five -->
        <section class="service-style-five">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <?php $i=1; while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="service-block-five">
                        <div class="inner-box">
                            <div class="upper-box">
                                <figure class="image-box"><?php the_post_thumbnail('energo_300x155'); ?></figure>
                                <div class="inner">
									<?php $icon_image = get_post_meta( get_the_id(), 'service_icon', true ); ?>
                                    <div class="icon-box"><img src="<?php echo wp_get_attachment_url($icon_image['id']);?>" alt="<?php esc_attr_e('Icon', 'energo'); ?>"></div>
                                    <h5><?php the_title(); ?></h5>
                                </div>
                            </div>
                            <div class="lower-box">
                                <div class="text">
                                    <p><?php echo wp_kses(energo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                </div>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrows"></i><?php esc_html_e('Read More', 'energo'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php $i++; endwhile; ?>
                </div>
            </div>
        </section>
        <!-- service-style-five end -->

        <?php }

        wp_reset_postdata();
    }
}
