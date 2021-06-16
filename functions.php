<?php
/**
 * Res Lemma functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'res_lemma_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function res_lemma_setup() {

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
		 * Enable support for Gutenberg images.
		 */
		add_theme_support( 'align-wide' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'res-lemma-portfolio-img', 1024, 690, true );
		add_image_size( 'res-lemma-portfolio-image', 480, 360, true );
		add_image_size( 'res-lemma-featured-entry-img', 470, 529, true );
		add_image_size( 'res-lemma-single-img', 1920, 600, true );
		add_image_size( 'res-lemma-front-featured', 480, 360, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'res-lemma' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'res_lemma_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add image size for blog posts, 600px wide (and unlimited height).
		add_image_size( 'res-lemma-blog', 600 );

		// Add stylesheet for the WordPress editor.
		add_editor_style( '/assets/css/editor-style.css' );

		// Add support for custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		// Add support for WooCommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif;
add_action( 'after_setup_theme', 'res_lemma_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function res_lemma_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'res_lemma_content_width', 1040 );
}
add_action( 'after_setup_theme', 'res_lemma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function res_lemma_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'res-lemma' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'res-lemma' ),
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'res_lemma_widgets_init' );

/**
 * Register Google font.
 */
function res_lemma_font_url() {

	$fonts_url = '';

	/*
	* Translators: If there are characters in your language that are not
	* supported by the following, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto = _x( 'on', 'roboto font: on or off', 'res-lemma' );
	$lato = _x( 'on', 'Open Sans font: on or off', 'res-lemma' );

	if ( 'off' !== $roboto || 'off' !== $lato ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Robot:400,700,300';
		}

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,700,300';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function res_lemma_scripts() {
	wp_enqueue_style( 'res-lemma-style', get_stylesheet_uri() );

	// Font Awesome
	wp_register_style( 'font-fontawesome', get_stylesheet_directory_uri() . '/assets/fonts/css/font-awesome.css', array(), '20151215' );
	wp_enqueue_style( 'font-fontawesome' );

	// Google Fonts
	wp_enqueue_style( 'res-lemma-google-font', res_lemma_font_url(), array(), null );

	wp_enqueue_script( 'res-lemma-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '202151215', true );

	// Custom Functions
	wp_enqueue_script( 'custom-functions', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '20211215', true );

	// Flexslider
	wp_register_style( 'flexslider-styles', get_stylesheet_directory_uri() . '/assets/flexslider/flexslider.css', array(), '20211215' );
	wp_enqueue_script( 'flexslider-functions', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'res-lemma-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'res_lemma_scripts' );

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function res_lemma_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'res-lemma-gutenberg', get_theme_file_uri( '/assets/css/gutenberg.css' ), false, '1.0.0', 'all' );
	wp_enqueue_style( 'res-lemma-admin-google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i' );
}
add_action( 'enqueue_block_editor_assets', 'res_lemma_gutenberg_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Customizer Settings.
 */
require get_template_directory() . '/inc/customizer/customizer-helper-settings.php';

/**
 * Load Metabox.
 */
require get_template_directory() . '/inc/meta.php';

/**
 * Display the admin notice.
 */
function res_lemma_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if ( ! get_user_meta( $user_id, 'res_lemma_ignore_customizer_notice' ) ) {
		?>

		<div class="notice notice-info ebt-notice">
			<p>
				<strong><?php esc_html_e( 'Thank you for installing the Res Lemma theme!', 'res-lemma' ); ?></strong>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=res-lemma-theme', 'res-lemma' ) ); ?>"><?php esc_html_e( 'Click here to get started', 'res-lemma' ); ?></a>
				<span style="float:right">
					<a href="?res_lemma_ignore_customizer_notice=0"><?php esc_html_e( 'Hide Notice', 'res-lemma' ); ?></a>
				</span>
			</p>
		</div>

		<?php
	}
}
add_action( 'admin_notices', 'res_lemma_admin_notice' );
/**
 * Dismiss the admin notice.
 */
function res_lemma_dismiss_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['res_lemma_ignore_customizer_notice'] ) && '0' === $_GET['res_lemma_ignore_customizer_notice'] ) {
		add_user_meta( $user_id, 'res_lemma_ignore_customizer_notice', 'true', true );
	}
}
add_action( 'admin_init', 'res_lemma_dismiss_admin_notice' );

/**
 * If the WooCommerce plugin is active, load the related functions.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/woocommerce/functions.php';
}

if ( is_admin() ) {
	require_once get_template_directory() . '/admin/welcome.php';
}
