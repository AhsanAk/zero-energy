<?php
///----Blog widgets---
//Popular Post
class Energo_Popular_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_Popular_Post', /* Name */esc_html__('Energo Popular Post','energo'), array( 'description' => esc_html__('Show the Popular Post', 'energo' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="post-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			
			<div class="widget-content">
				<div class="post-inner">
					<?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					$this->posts($query_string); ?>
				</div>
			</div>
		</div>

		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Recent News', 'energo');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'energo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'energo'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php global $post;
			while( $query->have_posts() ): $query->the_post(); ?>
			<div class="post">
				<figure class="post-thumb"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_post_thumbnail('energo_70x70'); ?></a></figure>
				<span class="post-date"><?php echo get_the_date(); ?></span>
				<h6><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h6>
			</div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----Services Widgets---
//Materials
class Energo_Materials extends WP_Widget
{

	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_Materials', /* Name */esc_html__('Energo Materials','energo'), array( 'description' => esc_html__('Show the Materials in services sidebar', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget);?>
		
		<div class="sidebar-widget downloads-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			
			<div class="widget-content">
				<p><?php echo wp_kses_post($instance['content']); ?></p>
				<ul class="download-list clearfix">
					<li>
						<div class="inner">
							<a href="<?php echo esc_url($instance['file_url1']); ?>">
								<?php if($instance['file_icon1']) { ?><div class="icon-box"><i class="<?php echo esc_attr($instance['file_icon1']); ?>"></i></div><?php } ?>
								<h6><?php echo wp_kses_post($instance['file_name1']); ?></h6>
								<?php if($instance['file_size1']) { ?><span>[<?php echo wp_kses_post($instance['file_size1']); ?>]</span><?php } ?>
							</a>
						</div>
					</li>
					<li>
						<div class="inner">
							<a href="<?php echo esc_url($instance['file_url2']); ?>">
								<?php if($instance['file_icon2']) { ?><div class="icon-box"><i class="<?php echo esc_attr($instance['file_icon2']); ?>"></i></div><?php } ?>
								<h6><?php echo wp_kses_post($instance['file_name2']); ?></h6>
								<?php if($instance['file_size2']) { ?><span>[<?php echo wp_kses_post($instance['file_size2']); ?>]</span><?php } ?>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>

        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['file_name1'] = $new_instance['file_name1'];
		$instance['file_url1'] = $new_instance['file_url1'];
		$instance['file_icon1'] = $new_instance['file_icon1'];
		$instance['file_size1'] = $new_instance['file_size1'];
		
		$instance['file_name2'] = $new_instance['file_name2'];
		$instance['file_url2'] = $new_instance['file_url2'];
		$instance['file_icon2'] = $new_instance['file_icon2'];
		$instance['file_size2'] = $new_instance['file_size2'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Materials', 'energo');
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$file_name1 = ($instance) ? esc_attr($instance['file_name1']) : '';
		$file_url1 = ($instance) ? esc_attr($instance['file_url1']) : '';
		$file_icon1 = ($instance) ? esc_attr($instance['file_icon1']) : '';
		$file_size1 = ($instance) ? esc_attr($instance['file_size1']) : '';
		
		$file_name2 = ($instance) ? esc_attr($instance['file_name2']) : '';
		$file_url2 = ($instance) ? esc_attr($instance['file_url2']) : '';
		$file_icon2 = ($instance) ? esc_attr($instance['file_icon2']) : '';
		$file_size2 = ($instance) ? esc_attr($instance['file_size2']) : '';

		?>

		<p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('file_name1')); ?>"><?php esc_html_e('File Name 1:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_name1')); ?>" name="<?php echo esc_attr($this->get_field_name('file_name1')); ?>" type="text" value="<?php echo esc_attr($file_name1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_url1')); ?>"><?php esc_html_e('File URL 1:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_url1')); ?>" name="<?php echo esc_attr($this->get_field_name('file_url1')); ?>" type="text" value="<?php echo esc_attr($file_url1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_icon1')); ?>"><?php esc_html_e('File Icon 1:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_icon1')); ?>" name="<?php echo esc_attr($this->get_field_name('file_icon1')); ?>" type="text" value="<?php echo esc_attr($file_icon1); ?>" placeholder="flaticon-pdf" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_size1')); ?>"><?php esc_html_e('File Size 1:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_size1')); ?>" name="<?php echo esc_attr($this->get_field_name('file_size1')); ?>" type="text" value="<?php echo esc_attr($file_size1); ?>" />
        </p>

		<p>
            <label for="<?php echo esc_attr($this->get_field_id('file_name2')); ?>"><?php esc_html_e('File Name 2:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_name2')); ?>" name="<?php echo esc_attr($this->get_field_name('file_name2')); ?>" type="text" value="<?php echo esc_attr($file_name2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_url2')); ?>"><?php esc_html_e('File URL 2:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_url2')); ?>" name="<?php echo esc_attr($this->get_field_name('file_url2')); ?>" type="text" value="<?php echo esc_attr($file_url2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_icon2')); ?>"><?php esc_html_e('File Icon 2:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_icon2')); ?>" name="<?php echo esc_attr($this->get_field_name('file_icon2')); ?>" type="text" value="<?php echo esc_attr($file_icon2); ?>" placeholder="flaticon-pdf" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_size2')); ?>"><?php esc_html_e('File Size 2:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('file_size2')); ?>" name="<?php echo esc_attr($this->get_field_name('file_size2')); ?>" type="text" value="<?php echo esc_attr($file_size2); ?>" />
        </p>

		<?php
	}

}

//Contact Info
class Energo_Contact_Info extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_Contact_Info', /* Name */esc_html__('Energo Contact Info','energo'), array( 'description' => esc_html__('Show the Contact Info in services sidebar.', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget); ?>
      		
		<div class="sidebar-content">
			<div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-7.png'); ?>);"></div>
			<div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-8.png'); ?>);"></div>
			<figure class="image-layer"><img src="<?php echo esc_url($instance['image']); ?>" alt="<?php esc_attr('Awesome Image', 'energo'); ?>"></figure>
			<div class="upper-box">
				<div class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icon-56.png'); ?>" alt="<?php esc_attr('Icon', 'energo'); ?>"></div>
				<h5><?php echo wp_kses_post($instance['job_text']); ?></h5>
				
				<?php if($instance['btn_link'] and $instance['btn_title']) { ?>
				<a href="<?php echo esc_url($instance['btn_link']); ?>" class="theme-btn"><?php echo wp_kses_post($instance['btn_title']); ?></a>
				<?php } ?>
			</div>
			
			<?php if($instance['phone_number']) { ?>
			<div class="support-box">
				<div class="icon-box"><i class="fa fa-headphones"></i></div>
				<h6><?php esc_html_e('Phone', 'energo'); ?></h6>
				<h5><a href="tel:<?php echo esc_attr(phone_number($instance['phone_number'])); ?>"><?php echo wp_kses_post($instance['phone_number']); ?></a></h5>
			</div>
			<?php } ?>
		</div>

        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['image'] = strip_tags($new_instance['image']);
		$instance['job_text'] = $new_instance['job_text'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['phone_number'] = $new_instance['phone_number'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$image = ($instance) ? esc_attr($instance['image']) : get_template_directory_uri(). '/assets/images/resource/sidebar-1.png';
		$job_text = ($instance) ? esc_attr($instance['job_text']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$phone_number = ($instance) ? esc_attr($instance['phone_number']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e('Image URL:', 'energo'); ?></label>
            <input placeholder="<?php esc_attr_e('Image URL', 'energo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text" value="<?php echo esc_attr($image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('job_text')); ?>"><?php esc_html_e('Job Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('job_text')); ?>" name="<?php echo esc_attr($this->get_field_name('job_text')); ?>" ><?php echo wp_kses_post($job_text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr( $btn_title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_number')); ?>"><?php esc_html_e('Phone Number:', 'energo'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('phone_number')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_number')); ?>" value="<?php echo esc_attr($phone_number); ?>" />
        </p>
               
		<?php 
	}
}

///----footer widgets---
//About Company
class Energo_About_Company_V1 extends WP_Widget
{

	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_About_Company_V1', /* Name */esc_html__('Energo About Company V1','energo'), array( 'description' => esc_html__('Show the About Company in footer v1', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>
		
		<div class="logo-widget">
			<figure class="footer-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr('Logo', 'energo'); ?>"></a></figure>
			
			<?php if($instance['email_title'] and $instance['email_address']) { ?>
			<div class="support-box">
				<i class="fa fa-envelope-open"></i>
				<h6><?php echo wp_kses_post($instance['email_title']); ?></h6>
				<a href="mailto:<?php echo sanitize_email($instance['email_address']); ?>"><?php echo sanitize_email($instance['email_address']); ?></a>
			</div>
			<?php } ?>
			<div class="text">
				<p><?php echo wp_kses_post($instance['content']); ?></p>
			</div>
		</div>

        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_image'] = strip_tags($new_instance['logo_image']);
		$instance['email_title'] = $new_instance['email_title'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ($instance) ? esc_attr($instance['logo_image']) : get_template_directory_uri(). '/assets/images/footer-logo.png';
		$email_title = ($instance) ? esc_attr($instance['email_title']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		?>

		<p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image URL:', 'energo'); ?></label>
            <input placeholder="<?php esc_attr_e('Image URL', 'energo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email_title')); ?>"><?php esc_html_e('Email Title: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title')); ?>" name="<?php echo esc_attr($this->get_field_name('email_title')); ?>" type="text" value="<?php echo esc_attr( $email_title ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Address:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>

		<?php
	}

}

//Recent Post
class Energo_From_Blog extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_From_Blog', /* Name */esc_html__('Energo From Blog','energo'), array( 'description' => esc_html__('Show the From Blog in footer v1', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget); ?>
		
		<div class="post-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			
			<div class="post-inner">
				<?php $query_string = 'posts_per_page='.$instance['number'];
				if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
				$this->posts($query_string); ?>
			</div>
			
			<?php if($instance['btn_link'] and $instance['btn_title']) { ?>
			<div class="link">
				<h6><a href="<?php echo esc_url($instance['btn_link']); ?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses_post($instance['btn_title']); ?></a></h6>
			</div>
			<?php } ?>
		</div>

		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('From Blog', 'energo');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		$btn_title = ( $instance ) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ( $instance ) ? esc_attr($instance['btn_link']) : '';
		?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'energo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'energo'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr( $btn_title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php global $post;
			while( $query->have_posts() ): $query->the_post(); ?>
			<div class="post">
				<span class="post-date"><?php echo get_the_date(); ?></span>
				<h6><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h6>
			</div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----footer widgets v2---
//About Company V2
class Energo_About_Company_V2 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_About_Company_V2', /* Name */esc_html__('Energo About Company V2','energo'), array( 'description' => esc_html__('Show the About Company V2 in Footer Two.', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
			
			<div class="logo-widget">
				<figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr('Logo', 'energo'); ?>" /></a></figure>
				<h5><?php echo wp_kses_post($instance['bold_content']); ?></h5>
				<div class="text">
					<p><?php echo wp_kses_post($instance['content']); ?></p>
				</div>
				
				<?php if( $instance['show'] ): ?>
				<?php echo wp_kses_post(energo_get_social_icons2()); ?>
				<?php endif; ?>
			</div>

        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['logo_image'] = $new_instance['logo_image'];
		$instance['bold_content'] = $new_instance['bold_content'];
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ($instance) ? esc_attr($instance['logo_image']) : get_template_directory_uri(). '/assets/images/logo-4.png';
		$bold_content = ($instance) ? esc_attr($instance['bold_content']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : ''; ?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image URL:', 'energo'); ?></label>
            <input placeholder="<?php esc_attr_e('Image URL', 'energo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bold_content')); ?>"><?php esc_html_e('Bold Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('bold_content')); ?>" name="<?php echo esc_attr($this->get_field_name('bold_content')); ?>" ><?php echo wp_kses_post($bold_content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'energo'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
		<?php 
	}
	
}

//Work Gallery
class Energo_Work_Gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_Work_Gallery', /* Name */esc_html__('Energo Work Gallery','energo'), array( 'description' => esc_html__('Show the Work Gallery in Footer v2', 'energo' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="gallery-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			
			<div class="widget-content">
				<ul class="image-list clearfix">
					<?php $args = array('post_type' => 'project', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat', 'field' => 'id','terms' => (array)$instance['cat']));
					$this->posts($args); ?>
				</ul>
			</div>
		</div>

        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Work Gallery';
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'energo'); ?></label>
            <input placeholder="<?php esc_attr_e('Popular Gallery', 'energo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'energo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'energo'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
			global $post; ?>
            <li>
				<figure class="image">
					<?php the_post_thumbnail('energo_85x85', array('class' => 'img-fluid rounded')); ?>
					<a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="flaticon-right-arrow"></i></a>
				</figure>
			</li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

///----footer widgets v3---
//About Company V3
class Energo_About_Company_V3 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_About_Company_V3', /* Name */esc_html__('Energo About Company V3','energo'), array( 'description' => esc_html__('Show the About Company V3 in Footer Three.', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
			
			<div class="logo-widget">
				<figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr('Logo', 'energo'); ?>" /></a></figure>
				<div class="text">
					<p><?php echo wp_kses_post($instance['content']); ?></p>
				</div>
				
				<?php if( $instance['show'] ): ?>
				<?php echo wp_kses_post(energo_get_social_icons2()); ?>
				<?php endif; ?>
			</div>

        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['logo_image'] = $new_instance['logo_image'];
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ($instance) ? esc_attr($instance['logo_image']) : get_template_directory_uri(). '/assets/images/logo-6.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : ''; ?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image URL:', 'energo'); ?></label>
            <input placeholder="<?php esc_attr_e('Image URL', 'energo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'energo'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
		<?php 
	}
	
}

//Subscribe Newsletter
class Energo_Newsletter extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Energo_Newsletter', /* Name */esc_html__('Energo Newsletter','energo'), array( 'description' => esc_html__('Show the Newsletter in footer v3', 'energo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="footer-widget subscribe-widget">
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
				
				<div class="widget-content">
					<p><?php echo wp_kses_post($instance['content']); ?></p>
					<form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="post">
						<div class="form-group">
							<i class="icon far fa-envelope-open"></i>
							<input type="hidden" id="uri8" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
							<input type="email" name="email" placeholder="<?php esc_attr_e('Email Address', 'energo'); ?>">
							<button type="submit" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><?php esc_html_e('Subscribe', 'energo'); ?></button>
						</div>
					</form>
				</div>
			</div>

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Newsletter', 'energo');
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '#';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'energo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'energo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'energo'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'energo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
        
		<?php 
	}
	
}
