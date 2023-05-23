<?php
/**
 * Blog Post Main File.
 *
 * @package ENERGO
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \ENERGO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = energo_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else { ?>

<!-- Page Title -->
<section class="page-title" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
	<div class="auto-container">
		<div class="content-box clearfix">
			<div class="title">
				<h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
			</div>
			<ul class="bread-crumb clearfix pull-right">
				<?php echo energo_the_breadcrumb(); ?>
			</ul>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details">
	<div class="auto-container">
		<div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'energo_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post();
				$term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
                <div class="thm-unit-test">
					
					<div class="blog-details-content">
						<div class="blog-post">
							<div class="news-block-one">
								<div class="inner-box">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<ul class="post-info clearfix m-b20">
										<li><i class="far fa-folder"></i><?php echo implode( ', ', (array)$term_list ); ?></li>
										<li><i class="far fa-user"></i><?php esc_html_e('By', 'energo'); ?> <?php the_author(); ?></li>
										<li><i class="far fa-comment"></i><?php comments_number( 'Comments (0)', 'Comment (1)', 'Comments (%)' ); ?></li>
									</ul>
									<figure class="image-box m-b30"><?php the_post_thumbnail('energo_710x360'); ?></figure>
									<div class="other-content">
										<div class="text">
											<?php the_content(); ?>
										</div>
                                        <?php if( has_tag() ):?>
										<div class="post-tags">
											<ul class="tags-list clearfix">
												<li><h6><?php esc_html_e('Tags:', 'energo'); ?></h6></li>
												<?php the_tags( '<li>', ', </li> <li>', '</li>' ); ?>
											</ul>
										</div>
                                        <?php endif;?>
										
										<?php if(function_exists('energo_share_us')): ?>
										<div class="post-share-option">
											<?php echo wp_kses(energo_share_us(get_the_id(), $post->post_name ), true); ?>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						
						<?php if( $options->get( 'single_post_author_box' ) ): ?>
						<div class="author-box">
							<div class="group-title">
								<h3><?php esc_html_e('About Author', 'energo'); ?></h3>
							</div>
							<div class="inner-box">
								<figure class="author-thumb"><?php echo get_avatar(get_the_author_meta('ID'), 100); ?></figure>
								<div class="inner">
									<h6><?php the_author(); ?></h6>
									<p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
								</div>
							</div>
						</div>
						<?php endif; ?>
						
						<!-- Comments Area -->
						<?php comments_template(); ?>
					</div>
					
                </div>
                <?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'energo_sidebar', $data );
				}
			?>
        </div>
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
