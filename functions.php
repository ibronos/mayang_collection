<?php
/**
 * mayang-collection functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mayang-collection
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'mc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mayang-collection, use a find and replace
		 * to change 'mc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// add image crop size
		add_image_size( '1440x617_size', 1440, 617, true );
		add_image_size( '1220x686_size', 1220, 686, true );
		add_image_size( '1220x523_size', 1220, 523, true );
		add_image_size( '980x735_size', 980, 735, true );
		add_image_size( '980x552_size', 980, 552, true );
		add_image_size( '980x420_size', 980, 420, true );
		add_image_size( '740x317_size', 740, 317, true );
		add_image_size( '740x555_size', 740, 555, true );
		add_image_size( '740x416_size', 740, 416, true );
		add_image_size( '740x494_size', 740, 494, true );
		add_image_size( '500x375_size', 500, 375, true );
		add_image_size( '500x334_size', 500, 334, true );
		add_image_size( '500x282_size', 500, 282, true );
		add_image_size( '300x169_size', 300, 169, true );
		add_image_size( '300x129_size', 300, 129, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'mc' ),
				'woocommerce-menu' => esc_html__( 'Woocommerce Menu', 'mc' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mc_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'mc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mc_content_width', 640 );
}
add_action( 'after_setup_theme', 'mc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Woo', 'mc' ),
			'id'            => 'sidebar-woo',
			'description'   => esc_html__( 'Add widgets here.', 'mc' ),
			'before_widget' => '<div id="%1$s" class="card mt-2 widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="card-header"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);
}
add_action( 'widgets_init', 'mc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mc_scripts() {
	// wp_enqueue_style( 'mc-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// wp_enqueue_style( 'mc-style', get_stylesheet_uri() . 'assets/styles.css', array(), true );
	// wp_enqueue_script( 'all', 'https://use.fontawesome.com/releases/v5.13.0/js/all.js', array(), '3.5.1', true );
	// wp_enqueue_style( 'magnific-popup-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', array(), true );
	
	// // register upgrade jquery version
	// wp_deregister_script( 'jquery' );
	// wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array('jquery'), '3.5.1', true );
	// wp_enqueue_script('jquery');

	// wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js',  array('jquery'), '3.5.1', true );
	// wp_enqueue_script( 'bootstrap', get_template_directory_uri() . 'assets/bootstrap.min.js',  array(), '4.5.0', true );

	// wp_enqueue_script( 'jquery-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array(), '3.5.1', true );
	// wp_enqueue_script( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(), '3.5.1', true );
	// wp_enqueue_script( 'scripts-2', get_template_directory_uri() . 'assets/scripts.js', array(), '3.5.1', true );


	wp_enqueue_style( 'mc-bootstrap-css', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'mc-fontawesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.min.css' );
	// wp_enqueue_style( 'mc-animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css' );
	// wp_enqueue_style( 'mc-ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons.min.css' );
	// wp_enqueue_style( 'mc-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css' );
	// wp_enqueue_style( 'mc-magnific', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.css' );
	wp_enqueue_style( 'mc-style2', get_template_directory_uri() . '/assets/styles.css' );
	wp_enqueue_style( 'mc-custom', get_template_directory_uri() . '/assets/custom.css' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//code.jquery.com/jquery-3.3.1.min.js', false, null );
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'mc-popper', get_template_directory_uri() . '/assets/lib/popper.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-hoverint', get_template_directory_uri() . '/assets/lib/superfish/hoverIntent.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-superfish', get_template_directory_uri() . '/assets/lib/superfish/superfish.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-owl', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-pop', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.min.js', array(), '20151215', true );
	wp_enqueue_script( 'mc-stick', get_template_directory_uri() . '/assets/lib/sticky/sticky.js', array(), '20151215', true );
	wp_enqueue_script( 'scripts-2', get_template_directory_uri() . '/assets/scripts.js', array(), '3.5.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/inc/woo-custom-checkout.php';
}


// var_dump($_REQUEST); exit;
