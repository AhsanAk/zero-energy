<?php
$options = energo_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Logo V2
$logo = $options->get( 'logo_v2' );
$logo_dimension = $options->get( 'logo_v2_dimension' );

//Mobile Logo
$mobile_logo = $options->get( 'mobile_logo_v2' );
$mobile_logo_dimension = $options->get( 'mobile_logo_v2_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper orange-color">

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
	<header class="main-header style-two">
		<?php if( $options->get('show_top_bar_v2') ){ ?>
		<!-- header-top -->
		<div class="header-top-two">
			<div class="top-inner clearfix">
				<div class="left-column pull-left">
					<ul class="info-list clearfix">
						<?php if( $options->get('show_phone_number_v2') ){ ?>
						<li class="support-box">
							<i class="fas fa-headphones"></i>
							<h6><?php echo wp_kses($options->get('phone_title_v2'), $allowed_html); ?> <a href="tel:<?php echo esc_attr(phone_number($options->get('phone_number_v2'))); ?>"><?php echo wp_kses($options->get('phone_number_v2'), $allowed_html); ?></a></h6>
						</li>
						<?php } ?>
						
						<?php if( $options->get('show_address_v2') ){ ?>
						<li>
							<i class="far fa-map"></i>
							<h6><?php echo wp_kses($options->get('address_v2'), $allowed_html); ?></h6>
						</li>
						<?php } ?>
						
						<?php if( $options->get('show_working_hours_v2') ){ ?>
						<li>
							<i class="far fa-clock"></i>
							<h6><?php echo wp_kses($options->get('working_hours_v2'), $allowed_html); ?></h6>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="right-column pull-right">
					<ul class="other-links clearfix">
						<?php if( $options->get('show_help_button_v2') ){ ?>
						<li><i class="fa fa-star"></i><a href="<?php echo esc_url($options->get('help_button_link_v2')); ?>"><?php echo wp_kses($options->get('help_button_name_v2'), $allowed_html); ?></a></li>
						<?php } ?>
						
						<?php if( $options->get('show_setting_button_v2') ){ ?>
						<li><a href="<?php echo esc_url($options->get('setting_button_link_v2')); ?>"><?php echo wp_kses($options->get('setting_button_name_v2'), $allowed_html); ?></a></li>
						<?php } ?>
						
						<?php if( $options->get('show_media_button_v2') ){ ?>
						<li><a href="<?php echo esc_url($options->get('media_button_link_v2')); ?>"><?php echo wp_kses($options->get('media_button_name_v2'), $allowed_html); ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<!-- header-lower -->
		<div class="header-lower">
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
				<div class="nav-right pull-right clearfix">
					<?php if( $options->get('show_search_v2') ){ ?>
					<div class="search-box-outer">
						<div class="dropdown">
							<button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i><?php echo wp_kses($options->get('search_text_v2'), $allowed_html); ?></button>
							<div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
								<div class="form-container">
									<?php echo get_template_part('searchform1'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php if($options->get( 'show_social_media_v2' )) {
					$icons = $options->get( 'social_media_v2' );
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
					
					<?php if( $options->get('show_button_v2') ){ ?>
					<div class="btn-box">
						<a href="<?php echo esc_url($options->get('button_link_v2')); ?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($options->get('button_name_v2'), $allowed_html); ?></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!--sticky Header-->
		<div class="sticky-header">
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
					<?php if( $options->get('show_search_v2') ){ ?>
					<div class="search-box-outer">
						<div class="dropdown">
							<button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i>Search</button>
							<div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
								<div class="form-container">
									<?php echo get_template_part('searchform1'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php if($options->get( 'show_social_media_v2' )) {
					$icons = $options->get( 'social_media_v2' );
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
					
					<?php if( $options->get('show_button_v2') ){ ?>
					<div class="btn-box">
						<a href="<?php echo esc_url($options->get('button_link_v2')); ?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($options->get('button_name_v2'), $allowed_html); ?></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>
	<!-- main-header end -->

	<!-- Mobile Menu  -->
	<div class="mobile-menu">
		<div class="menu-backdrop"></div>
		<div class="close-btn"><i class="fa fa-times"></i></div>

		<nav class="menu-box">
			<div class="nav-logo"><?php echo energo_logo( $logo_type, $mobile_logo, $mobile_logo_dimension, $logo_text, $logo_typography ); ?></div>
			<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            
            <?php if( $options->get('show_mobile_sidebar_v2')) { ?>
                <div class="contact-info">
                    <h4><?php echo wp_kses($options->get('mobile_contact_title_v2'), $allowed_html); ?></h4>
                    <ul>
                        <?php if( $options->get('mobile_address_v2') ){ ?>
                        <li><?php echo wp_kses($options->get('mobile_address_v2'), $allowed_html); ?></li>
                        <?php } ?>
                        
                        <?php if( $options->get('mobile_phone_number_v2') ){ ?>
                        <li><a href="tel:<?php echo esc_attr(phone_number($options->get('mobile_phone_number_v2'))); ?>"><?php echo wp_kses($options->get('mobile_phone_number_v2'), $allowed_html); ?></a></li>
                        <?php } ?>
                        
                        <?php if( $options->get('mobile_email_address_v2') ){ ?>
                        <li><a href="mailto:<?php echo wp_kses($options->get('mobile_email_address_v2'), $allowed_html); ?>"><?php echo wp_kses($options->get('mobile_email_address_v2'), $allowed_html); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="social-links">
                    <?php if($options->get( 'show_mobile_social_media_v2' )) {
                    $icons = $options->get( 'mobile_social_media_v2' );
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
	