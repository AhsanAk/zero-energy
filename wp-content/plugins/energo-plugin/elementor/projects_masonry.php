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
class Projects_Masonry extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_projects_masonry';
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
        return esc_html__('Projects Masonry', 'energo');
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
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'projects_masonry',
            [
                'label' => esc_html__('Projects Masonry', 'energo'),
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
            'number',
            [
                'label'   => esc_html__('Number of post', 'energo'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
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
            'cat_include',
            [
                'label'       => esc_html__( 'Category Include IDs', 'energo' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'Include categories, etc. by ID with comma separated.', 'energo' ),
            ]
        );
		$this->add_control(
            'cat_operator',
            [
                'label' => esc_html__('Category Operator', 'energo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'IN',
                'options' => array(
					'IN' => esc_html__('IN', 'energo'),
					'NOT IN' => esc_html__('NOT IN', 'energo'),
				),
                'condition' => [
                    'cat_include!' => ''
                ],
            ]
        );
		$this->add_control(
            'btn_title',
            [
                'label'       => __( 'Button Title', 'energo' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
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

        $paged = get_query_var('paged');
        $paged = energo_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

        $this->add_render_attribute('wrapper', 'class', 'templatepath-energo');
        $args = array(
            'post_type'      => 'project',
            'posts_per_page' => energo_set($settings, 'number'),
            'orderby'        => energo_set($settings, 'query_orderby'),
            'order'          => energo_set($settings, 'query_order'),
            'paged'          => $paged
        );
		
		//Terms
		$cat_operator = energo_set( $settings, 'cat_operator' );
        $terms_array = explode(",", energo_set( $settings, 'cat_include' ));
        if(energo_set( $settings, 'cat_include' ))
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'project_cat',
					'field' => 'id',
					'terms' => $terms_array,
					'operator' => $cat_operator
				)
			);
		
        $allowed_tags = wp_kses_allowed_html('post');
        $query = new \WP_Query($args);
        $t = '';
        $data_filtration = '';
        $data_posts = '';
        if($query->have_posts())
        {
            ob_start(); ?>

            <?php $count = 0;
            $fliteration = array();
            while($query->have_posts() ): $query->the_post();
                global $post;
                $meta = '';
                $meta1 = '';
                $post_terms = get_the_terms( get_the_id(), 'project_cat');
                foreach( (array)$post_terms as $pos_term )
					$fliteration[$pos_term->term_id] = $pos_term;
					$temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');

					$post_terms = wp_get_post_terms( get_the_id(), 'project_cat');
					$term_slug = '';
					if($post_terms)
						foreach($post_terms as $p_term)
							$term_slug .= $p_term->slug.' ';
							$post_thumbnail_id = get_post_thumbnail_id($post->ID);
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
							$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
							$dimention = get_post_meta( get_the_id(), 'dimension', true );
							if($dimention == 'size_370_770')
							{
								$image_size = 'energo_370x770';
								$class = 'col-lg-4';
							}
							elseif($dimention == 'size_770_370')
							{
								$image_size = 'energo_770x370';
								$class = 'col-lg-8 small-column';
							}
							else
							{
								$image_size = 'energo_370x370';
								$class = 'col-lg-4 small-column';
							} ?>
                
							<div class="<?php echo esc_attr($class); ?> col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
								<div class="project-block-one">
									<div class="inner-box">
										<figure class="image-box"><?php the_post_thumbnail($image_size); ?></figure>
										<div class="overlay-content">
											<div class="view-btn"><a href="<?php echo esc_url($post_thumbnail_url); ?>"><i class="flaticon-zoom-in-1"></i></a></div>
											<div class="inner">
												<h6>[ <?php echo implode( ', ', (array)$term_list ); ?> ]</h6>
												<h5><a href="<?php echo esc_url(the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
												<div class="link"><a href="<?php echo esc_url(the_permalink(get_the_id())); ?>"><i class="flaticon-right-arrows"></i></a></div>
											</div>
										</div>
									</div>
								</div>
							</div>

			<?php endwhile; ?>

			<?php wp_reset_postdata();
			$data_posts = ob_get_contents();
			ob_end_clean();
			ob_start(); ?>

			<!-- project-section -->
			<section class="project-section sec-pad portfolio-page-2 portfolio-masonry">
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
					<div class="sortable-masonry">
						<div class="filters">
							<ul class="filter-tabs filter-btns clearfix">
								<li class="filter active" data-role="button" data-filter=".all"><?php esc_html_e('View All', 'energo'); ?></li>
								<?php foreach($fliteration as $t): ?>
								<li class="filter" data-role="button" data-filter=".<?php echo esc_attr(energo_set($t, 'slug')); ?>"><?php echo wp_kses(energo_set($t, 'name'), true); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="items-container row clearfix">
							<?php echo wp_kses($data_posts, true); ?>
						</div>
					</div>
					
					<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
					<div class="more-btn centred">
						<a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrows"></i><?php echo wp_kses( $settings['btn_title'], true ); ?></a>
					</div>
					<?php } ?>
				</div>
			</section>
			<!-- project-section end -->

        <?php }
    }

}
