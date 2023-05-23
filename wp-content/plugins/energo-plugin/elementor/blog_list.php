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
class Blog_List extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_blog_list';
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
        return esc_html__( 'Blog List', 'energo' );
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
            'blog_list',
            [
                'label' => esc_html__( 'Blog List', 'energo' ),
            ]
        );
		$this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'energo' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 16,
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
                'default' => 8,
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
                'options' => get_categories_list(),
            ]
        );
        $this->end_controls_section();
		
		//Sidebar
		$this->start_controls_section(
            'sidebar_tab',
            [
                'label' => esc_html__( 'Sidebar', 'energo' ),
            ]
        );
		$this->add_control(
			'sidebar',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'manzil' ),
				'separate' => 'before',
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => energo_get_sidebars(),
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
            'post_type'      => 'post',
            'posts_per_page' => energo_set( $settings, 'query_number' ),
            'orderby'        => energo_set( $settings, 'query_orderby' ),
            'order'          => energo_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( energo_set( $settings, 'query_category' ) ) $args['category_name'] = energo_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );
        if ( $query->have_posts() ) { ?>
        
        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-list-content">
                            <?php while ( $query->have_posts() ) : $query->the_post();
							$term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <span class="post-date"><?php echo get_the_date(); ?></span>
                                        <figure class="image"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('energo_310x295'); ?></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <ul class="post-info clearfix">
											<li><i class="far fa-folder"></i><?php echo implode( ', ', (array)$term_list ); ?></li>
											<li><i class="far fa-user"></i><?php esc_html_e('By', 'energo'); ?> <?php the_author(); ?></li>
										</ul>
                                        <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
                                        <p><?php echo wp_kses(energo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                        <div class="btn-box">
                                            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><i class="flaticon-right-arrows"></i><?php esc_html_e('Read More', 'energo'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php endwhile; ?>
							
                            <div class="pagination-wrapper clearfix">
                                <?php energo_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-long-arrow-right"></i>', 'prev_text' => '<i class="fa fa-long-arrow-left"></i>')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar">
                            <?php dynamic_sidebar( $settings['sidebar'] ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->

        <?php }

        wp_reset_postdata();
    }
}
