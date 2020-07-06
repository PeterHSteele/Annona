<?php
/**
 * annona functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package annona
 */

if ( ! defined( 'ANNONA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ANNONA_VERSION', '1.0.0' );
}

if ( ! function_exists( 'annona_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function annona_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on annona, use a find and replace
		 * to change 'annona' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'annona', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'annona' ),
				'menu-2' => esc_html__( 'Somethin; Different', 'annona' )
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
				'annona_custom_background_args',
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
add_action( 'after_setup_theme', 'annona_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function annona_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'annona_content_width', 640 );
}
add_action( 'after_setup_theme', 'annona_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function annona_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'annona' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'annona' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'annona_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function annona_scripts() {
	if ( is_page_template( 'page-templates/featured.php' ) ){
		wp_enqueue_script( 'annona-featured-js', get_template_directory_uri() . '/js/featured.js', array(), ANNONA_VERSION, true );
	}

	wp_enqueue_style( 'annona-style', get_stylesheet_uri(), array(), ANNONA_VERSION );

	if ( is_woocommerce_activated() ){
		wp_enqueue_style( 'annona-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css' );
	}
	
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/icons/fontawesome/css/all.css' );

	wp_enqueue_script( 'annona-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ANNONA_VERSION, true );

	wp_enqueue_script( 'annona-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), ANNONA_VERSION, true );

	wp_enqueue_style( 'annona-font-quattrocento', 'https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap' );
	wp_enqueue_style( 'annona-font-norican', 'https://fonts.googleapis.com/css2?family=Norican&display=swap' );
	wp_enqueue_style( 'annona-font-catamaran', 'https://fonts.googleapis.com/css2?family=Catamaran:wght@400;700&display=swap');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'annona_scripts' );

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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter( 'widget_title', 'annona_add_widget_title_span', 10, 3 );

function annona_add_widget_title_span( $title, $instance ){
	$words = explode( " ", $title );
	$length = count( $words );
	$lastIndex = $length -1;
	$lastWord = $words[$lastIndex];
	$words[ $lastIndex ] = '<span class="emphasis">' . $lastWord . '</span>';
	return implode( $words, " " );
}

if ( ! function_exists( 'annona_check_for_jetpack' ) ) :

	function annona_check_for_jetpack(){
		return function_exists( 'jetpack_social_menu' );
	}

endif;

/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );