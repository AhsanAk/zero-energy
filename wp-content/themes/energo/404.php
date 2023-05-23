<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Energo
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );
$error_image = $options->get( '404_page_background' );
$error_image = energo_set( $error_image, 'url', ENERGO_URI . 'assets/images/icons/wind-2.png' ); ?>

<?php get_header();
$data = \ENERGO\Includes\Classes\Common::instance()->data( '404' )->get();
$options = energo_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
    
	<!-- error-section -->
	<section class="error-section centred">
		<div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-9.png'); ?>);"></div>
		<figure class="image-layer"><img src="<?php echo esc_url($error_image); ?>" alt="<?php esc_attr_e('Awesome Image', 'energo'); ?>"></figure>
		<div class="auto-container">
			<div class="inner-box">
				<h1><?php echo wp_kses( $options->get( 'error_404' ), $allowed_html ) ? wp_kses( $options->get( 'error_404' ), $allowed_html ) : esc_html_e( '404', 'energo' ); ?></h1>
                <h2><?php echo wp_kses( $options->get( 'error_text' ), $allowed_html ) ? wp_kses( $options->get( 'error_text' ), $allowed_html ) : esc_html_e( 'Page not found', 'energo' ); ?></h2>
                <p><?php echo wp_kses( $options->get( 'error_description' ), $allowed_html ) ? wp_kses( $options->get( 'error_description' ), $allowed_html ) : esc_html_e( 'The page you are looking for was moved, removed or never existed.', 'energo' ); ?></p>
				
				<?php if ( $options->get('back_to_home_btn') ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Go Back', 'energo' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- error-section end -->

<?php
}
get_footer(); ?>
