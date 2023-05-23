<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage ENERGO
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Energo_Resizer' ) ) {
	$img_obj = new Energo_Resizer();
} else {
	$img_obj = array();
}

$options = energo_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
	
	<div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
		<div class="inner-box m-b40">
			<span class="post-date"><?php echo get_the_date(); ?></span>
			<ul class="post-info clearfix">
				<?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
				<li><i class="far fa-folder"></i><?php echo implode( ', ', (array)$term_list ); ?></li>
				<li><i class="far fa-user"></i><?php esc_html_e('By', 'energo'); ?> <?php the_author(); ?></li>
				<li><i class="far fa-comment"></i><?php comments_number( 'Comments (0)', 'Comment (1)', 'Comments (%)' ); ?></li>
			</ul>
			<h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
			<figure class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_post_thumbnail('energo_710x360'); ?></a></figure>
			<div class="btn-box">
				<a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><i class="flaticon-right-arrow"></i><?php esc_html_e('Read More', 'energo'); ?></a>
			</div>
		</div>
	</div>

</div>