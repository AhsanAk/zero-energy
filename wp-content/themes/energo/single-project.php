<?php get_header();
$data = \ENERGO\Includes\Classes\Common::instance()->data('single-project')->get(); ?>

<!-- Page Title -->
<section class="page-title" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
	<div class="auto-container">
		<div class="content-box clearfix">
			<div class="title">
				<h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></h1>
			</div>
			<ul class="bread-crumb clearfix pull-right">
				<?php echo energo_the_breadcrumb(); ?>
			</ul>
		</div>
	</div>
</section>
<!-- End Page Title -->

<?php while (have_posts()) : the_post(); ?>

<!-- project-details -->
<section class="project-details">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-lg-6 col-md-12 col-sm-12 image-column">
				<div class="image-box">
					<?php $top_image = get_post_meta( get_the_id(), 'top_image', true );
					$bottom_image = get_post_meta( get_the_id(), 'bottom_image', true ); ?>
					<figure class="image image-1"><img src="<?php echo wp_get_attachment_url($top_image['id']);?>" alt="<?php esc_attr_e('Top Image', 'energo'); ?>"></figure>
					<figure class="image image-2"><img src="<?php echo wp_get_attachment_url($bottom_image['id']);?>" alt="<?php esc_attr_e('Bottom Image', 'energo'); ?>"></figure>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 content-column">
				<div class="content-box">
					<div class="text">
						<h3><?php esc_html_e('Project Details', 'energo'); ?></h3>
						<?php the_content(); ?>
					</div>
					<ul class="info-list clearfix">
						<?php if(get_post_meta( get_the_id(), 'location', true )) { ?>
						<li>
							<h6><?php esc_html_e('Location', 'energo'); ?></h6>
							<p><?php echo get_post_meta( get_the_id(), 'location', true ); ?></p>
						</li>
						<?php } ?>
						
						<?php if(get_post_meta( get_the_id(), 'project_year', true )) { ?>
						<li>
							<h6><?php esc_html_e('Project Year', 'energo'); ?></h6>
							<p><?php echo get_post_meta( get_the_id(), 'project_year', true ); ?></p>
						</li>
						<?php } ?>
						
						<?php if(get_post_meta( get_the_id(), 'project_value', true )) { ?>
						<li>
							<h6><?php esc_html_e('Price Value', 'energo'); ?></h6>
							<p><?php echo get_post_meta( get_the_id(), 'project_value', true ); ?></p>
						</li>
						<?php } ?>
						
						<?php if(get_post_meta( get_the_id(), 'project_head', true )) { ?>
						<li>
							<h6><?php esc_html_e('Project Head', 'energo'); ?></h6>
							<p><?php echo get_post_meta( get_the_id(), 'project_head', true ); ?></p>
						</li>
						<?php } ?>
					</ul>
					<div class="lower-box clearfix">
						<?php $btn_title = get_post_meta( get_the_id(), 'btn_title', true );
						$btn_link = get_post_meta( get_the_id(), 'btn_link', true );
						?>
						
						<?php if($btn_link and $btn_title) { ?>
						<div class="btn-box pull-left">
							<a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><?php echo wp_kses($btn_title, true); ?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- project-details end -->

<?php endwhile; ?>

<?php get_footer(); ?>