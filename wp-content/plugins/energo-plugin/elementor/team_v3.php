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
class Team_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  3.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'energo_team_v3';
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
        return esc_html__( 'Team V3', 'energo' );
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
            'team_v3',
            [
                'label' => esc_html__( 'Team V3', 'energo' ),
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
                'options' => get_categories_list('team_cat')
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
            'post_type'      => 'team',
            'posts_per_page' => energo_set( $settings, 'query_number' ),
            'orderby'        => energo_set( $settings, 'query_orderby' ),
            'order'          => energo_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( energo_set( $settings, 'query_category' ) ) $args['team_cat'] = energo_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- team-style-two -->
        <section class="team-style-two sec-pad team-page-1">
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
                <div class="row clearfix">
                    <?php while($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                        <div class="team-block-two wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><?php the_post_thumbnail('energo_210x200'); ?></figure>
                                <div class="lower-content">
                                    <div class="text">
                                        <h5><?php the_title(); ?></h5>
                                    	<span class="designation"><?php echo get_post_meta( get_the_id(), 'designation', true ); ?></span>
                                    </div>
                                    <div class="inner clearfix">
                                        <ul class="info pull-left clearfix">
											<?php $phone = get_post_meta( get_the_id(), 'phone_number', true );
									 		$email = get_post_meta( get_the_id(), 'email_address', true ); ?>
											
											<?php if($phone) { ?>
                                            <li><a href="tel:<?php echo esc_attr(phone_number($phone)); ?>"><i class="fa fa-headphones"></i></a></li>
											<?php } ?>
											
											<?php if($email) { ?>
                                            <li><a href="mailto:<?php echo sanitize_email($email); ?>"><i class="fa fa-envelope-open"></i></a></li>
											<?php } ?>
                                        </ul>
										
										<?php $icons = get_post_meta( get_the_id(), 'social_profile', true );
										if( ! empty($icons ) ) : ?>
                                        <div class="share-box pull-right">
                                            <a href="javascript:;" class="share-btn"><i class="fa fa-share-alt"></i></a>
                                            <ul class="social-links clearfix">
												<?php foreach ( $icons as $h_icon ) :
												$header_social_icons = json_decode( urldecode( energo_set( $h_icon, 'data' ) ) );
												if ( energo_set( $header_social_icons, 'enable' ) == '' ) {
													continue;
												}
												$icon_class = explode( '-', energo_set( $header_social_icons, 'icon' ) ); ?>
												<li><a href="<?php echo energo_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo energo_set( $header_social_icons, 'background' ); ?>; color: <?php echo energo_set( $header_social_icons, 'color' ); ?>" target="_blank"><i class="fab <?php echo esc_attr( energo_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
												<?php endforeach; ?>
                                            </ul>
                                        </div>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- team-style-two -->
        
        <?php }

        wp_reset_postdata();
    }
}
