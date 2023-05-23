<?php
$options = energo_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Logo V1
$logo = $options->get( 'logo_v1' );
$logo_dimension = $options->get( 'logo_v1_dimension' );

//Mobile Logo
$mobile_logo = $options->get( 'mobile_logo_v1' );
$mobile_logo_dimension = $options->get( 'mobile_logo_v1_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper">

	<?php if( $options->get( 'theme_preloader' ) ):?>
	<!-- preloader -->
	<div class="loader-wrap">
		<div class="preloader">
			<div class="preloader-close">x</div>
			<div id="handle-preloader" class="handle-preloader">
				<div class="animation-preloader">
					<div class="spinner"></div>
				</div>  
			</div>
		</div>
	</div>
	<!-- preloader end -->
	<?php endif; ?>
	
	<!-- main header -->
	<header class="main-header">
		<?php if( $options->get('show_top_bar_v1') ){ ?>
		<!-- header-top -->
		<div class="header-top">
			<div class="auto-container">
				<div class="top-inner clearfix">
					<?php if( $options->get('show_welcome_message_v1') ){ ?>
					<div class="text left-column pull-left">
						<h6><i class="comment-icon fas fa-comments"></i><?php echo wp_kses($options->get('welcome_message_v1'), $allowed_html); ?></h6>
					</div>
					<?php } ?>
					
					<div class="right-column pull-right clearfix">
						<ul class="info clearfix">
							<?php if( $options->get('show_update_button_v1') ){ ?>
							<li><i class="fas fa-star"></i><a href="<?php echo esc_url($options->get('update_button_link_v1')); ?>"><?php echo wp_kses($options->get('update_button_name_v1'), $allowed_html); ?></a></li>
							<?php } ?>
							
							<?php if( $options->get('show_estimate_button_v1') ){ ?>
							<li><i class="fas fa-dollar-sign"></i><a href="<?php echo esc_url($options->get('estimate_button_link_v1')); ?>"><?php echo wp_kses($options->get('estimate_button_name_v1'), $allowed_html); ?></a></li>
							<?php } ?>
							
							<?php if( $options->get('show_search_v1') ){ ?>
							<li class="search-box-outer">
								<div class="dropdown">
									<button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i><?php echo wp_kses($options->get('search_text_v1'), $allowed_html); ?></button>
									<div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
										<div class="form-container">
											<?php echo get_template_part('searchform1'); ?>
										</div>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
						
						<?php if($options->get( 'show_social_media_v1' )) {
						$icons = $options->get( 'social_media_v1' );
						if ( ! empty( $icons ) ) { ?>
						<ul class="social-links clearfix">
							<?php foreach ( $icons as $h_icon ) {
							$header_social_icons = json_decode( urldecode( energo_set( $h_icon, 'data' ) ) );
							if ( energo_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', energo_set( $header_social_icons, 'icon' ) ); ?>
							<li><a href="<?php echo esc_url(energo_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(energo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(energo_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fab <?php echo esc_attr( energo_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
							<?php } ?>
						</ul>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- header-lower -->
		<?php } ?>
		
		<div class="header-lower">
			<div class="auto-container">
				<div class="outer-box clearfix">
					<div class="menu-area pull-left clearfix">
						<div class="logo-box pull-left">
							<figure class="logo"><?php echo energo_logo( $logo_type, $logo, $logo_dimension, $logo_text, $logo_typography ); ?></figure>
						</div>
						<!--Mobile Navigation Toggler-->
						<div class="mobile-nav-toggler">
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
						</div>
						<nav class="main-menu navbar-expand-md navbar-light">
							<div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
										'container_class'=>'navbar-collapse collapse navbar-right',
										'menu_class'=>'nav navbar-nav',
										'fallback_cb'=>false,
										'items_wrap' => '%3$s',
										'container'=>false,
										'depth'=>'3',
										'walker'=> new Bootstrap_walker()
									) ); ?>
								</ul>
							</div>
						</nav>
					</div>
					
					<?php if( $options->get('phone_title_v1') and $options->get('phone_number_v1') ){ ?>
					<div class="nav-right pull-right clearfix">
						<div class="support-box">
							<h5><i class="fas fa-headphones"></i><?php echo wp_kses($options->get('phone_title_v1'), $allowed_html); ?> <span><?php echo wp_kses($options->get('phone_number_v1'), $allowed_html); ?></span></h5>
							<ul class="info-box">
								<?php if( $options->get('show_address_v1') ){ ?>
								<li>
									<i class="far fa-map"></i>
									<h6><?php echo wp_kses($options->get('address_title_v1'), $allowed_html); ?></h6>
									<span><?php echo wp_kses($options->get('address_v1'), $allowed_html); ?></span>
								</li>
								<?php } ?>
								
								<?php if( $options->get('show_email_address_v1') ){ ?>
								<li>
									<i class="far fa-envelope-open"></i>
									<h6><?php echo wp_kses($options->get('email_address_title_v1'), $allowed_html); ?></h6>
									<span><a href="mailto:<?php echo wp_kses($options->get('email_address_v1'), $allowed_html); ?>"><?php echo wp_kses($options->get('email_address_v1'), $allowed_html); ?></a></span>
								</li>
								<?php } ?>
								
								<?php if( $options->get('show_working_hours_v1') ){ ?>
								<li>
									<i class="far fa-clock"></i>
									<h6><?php echo wp_kses($options->get('working_hours_title_v1'), $allowed_html); ?></h6>
									<span><?php echo wp_kses($options->get('working_hours_v1'), $allowed_html); ?></span>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!--sticky Header-->
		<div class="sticky-header">
			<div class="auto-container">
				<div class="outer-box">
					<div class="menu-area pull-left clearfix">
						<div class="logo-box pull-left">
							<figure class="logo"><?php echo energo_logo( $logo_type, $logo, $logo_dimension, $logo_text, $logo_typography ); ?></figure>
						</div>
						<nav class="main-menu clearfix">
							<!--Keep This Empty / Menu will come through Javascript-->
						</nav>
					</div>
					<div class="nav-right pull-right clearfix">
						<div class="support-box">
							<h5><i class="fas fa-headphones"></i><?php echo wp_kses($options->get('phone_title_v1'), $allowed_html); ?> <span><?php echo wp_kses($options->get('phone_number_v1'), $allowed_html); ?></span></h5>
							<ul class="info-box">
								<?php if( $options->get('show_address_v1') ){ ?>
								<li>
									<i class="far fa-map"></i>
									<h6><?php echo wp_kses($options->get('address_title_v1'), $allowed_html); ?></h6>
									<span><?php echo wp_kses($options->get('address_v1'), $allowed_html); ?></span>
								</li>
								<?php } ?>
								
								<?php if( $options->get('show_email_address_v1') ){ ?>
								<li>
									<i class="far fa-envelope-open"></i>
									<h6><?php echo wp_kses($options->get('email_address_title_v1'), $allowed_html); ?></h6>
									<span><a href="mailto:<?php echo wp_kses($options->get('email_address_v1'), $allowed_html); ?>"><?php echo wp_kses($options->get('email_address_v1'), $allowed_html); ?></a></span>
								</li>
								<?php } ?>
								
								<?php if( $options->get('show_working_hours_v1') ){ ?>
								<li>
									<i class="far fa-clock"></i>
									<h6><?php echo wp_kses($options->get('working_hours_title_v1'), $allowed_html); ?></h6>
									<span><?php echo wp_kses($options->get('working_hours_v1'), $allowed_html); ?></span>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- main-header end -->

	<!-- Mobile Menu  -->
	<div class="mobile-menu">
		<div class="menu-backdrop"></div>
		<div class="close-btn"><i class="fas fa-times"></i></div>

		<nav class="menu-box">
			<div class="nav-logo"><?php echo energo_logo( $logo_type, $mobile_logo, $mobile_logo_dimension, $logo_text, $logo_typography ); ?></div>
			<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            
            <?php if( $options->get('show_mobile_sidebar_v1')) { ?>
                <div class="contact-info">
                    <h4><?php echo wp_kses($options->get('mobile_contact_title_v1'), $allowed_html); ?></h4>
                    <ul>
                        <?php if( $options->get('mobile_address_v1') ){ ?>
                        <li><?php echo wp_kses($options->get('mobile_address_v1'), $allowed_html); ?></li>
                        <?php } ?>
                        
                        <?php if( $options->get('mobile_phone_number_v1') ){ ?>
                        <li><a href="tel:<?php echo esc_attr(phone_number($options->get('mobile_phone_number_v1'))); ?>"><?php echo wp_kses($options->get('mobile_phone_number_v1'), $allowed_html); ?></a></li>
                        <?php } ?>
                        
                        <?php if( $options->get('mobile_email_address_v1') ){ ?>
                        <li><a href="mailto:<?php echo wp_kses($options->get('mobile_email_address_v1'), $allowed_html); ?>"><?php echo wp_kses($options->get('mobile_email_address_v1'), $allowed_html); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="social-links">
                    <?php if($options->get( 'show_mobile_social_media_v1' )) {
                    $icons = $options->get( 'mobile_social_media_v1' );
                    if ( ! empty( $icons ) ) { ?>
                    <ul class="clearfix">
                        <?php foreach ( $icons as $h_icon ) {
                        $header_social_icons = json_decode( urldecode( energo_set( $h_icon, 'data' ) ) );
                        if ( energo_set( $header_social_icons, 'enable' ) == '' ) {
                            continue;
                        }
                        $icon_class = explode( '-', energo_set( $header_social_icons, 'icon' ) ); ?>
                        <li><a href="<?php echo esc_url(energo_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(energo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(energo_set( $header_social_icons, 'color' )); ?>" target="_blank"><span class="fab <?php echo esc_attr( energo_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
                        <?php } ?>
                    </ul>
                    <?php } } ?>
                </div>
    		<?php } ?>
		</nav>
	</div><!-- End Mobile Menu -->
	