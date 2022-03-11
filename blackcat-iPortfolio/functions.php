<?php

/**
 * blackcat-iPortfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blackcat-iPortfolio
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blackcat_iportfolio_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on blackcat-iPortfolio, use a find and replace
		* to change 'blackcat-iportfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('blackcat-iportfolio', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary', 'blackcat-iportfolio'),
			'secondary' => esc_html__('Secondary', 'blackcat-iportfolio'),
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
			'blackcat_iportfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'blackcat_iportfolio_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blackcat_iportfolio_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blackcat_iportfolio_content_width', 640);
}
add_action('after_setup_theme', 'blackcat_iportfolio_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blackcat_iportfolio_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'blackcat-iportfolio'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'blackcat-iportfolio'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'blackcat_iportfolio_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function blackcat_iportfolio_scripts()
{
	wp_enqueue_style('blackcat-iportfolio-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('blackcat-iportfolio-style', 'rtl', 'replace');

	wp_enqueue_script('blackcat-iportfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blackcat_iportfolio_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Registering Bootstrap Secripts and styles
function blackcat_iportfolio_bootstrap_scripts()
{
	wp_enqueue_style('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array());
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array());
	wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array());
	wp_enqueue_style('boxicons', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css', array());
	wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array());
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array());
	// wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array());
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css', array());

	// wp_enqueue_style( 'favicon', get_template_directory_uri() . '/assets/img/favicon.png',array() );
	// wp_enqueue_style( 'apple-touch-icon', get_template_directory_uri() . '/assets/img/apple-touch-icon.png',array() );


	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/navigation.js', array());
	wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter.js', array());
	wp_enqueue_script('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array());
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array());
	wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array());
	wp_enqueue_script('isotope-layout', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array());
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array());
	wp_enqueue_script('typed', get_template_directory_uri() . '/assets/vendor/typed.js/typed.min.js', array());
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array());
	wp_enqueue_script('php-email-form', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array());
	wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/main.js', array());
}

add_action('wp_enqueue_scripts', 'blackcat_iportfolio_bootstrap_scripts');



/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');


add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
	if (in_array('current-menu-item', $classes)) {
		$classes[] = 'active ';
	}
	return $classes;
}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{


	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Add parent.
		$parent = acf_add_options_page(array(
			'page_title'  => __('Header'),
			'menu_title'  => __('Header'),
			'redirect'    => false,
		));

		// Add sub page.
		acf_add_options_page(array(
			'page_title'  => __('Home'),
			'menu_title'  => __('Home'),
			'parent_slug' => $parent['menu_slug'],
		));
		// Add sub page.
		acf_add_options_page(array(
			'page_title'  => __('About'),
			'menu_title'  => __('About'),
			'parent_slug' => $parent['menu_slug'],
		));
		// Add sub page.
		acf_add_options_page(array(
			'page_title'  => __('Resume'),
			'menu_title'  => __('Resume'),
			'parent_slug' => $parent['menu_slug'],
		));
		// Add sub page.
		acf_add_options_page(array(
			'page_title'  => __('Portfolio'),
			'menu_title'  => __('Portfolio'),
			'parent_slug' => $parent['menu_slug'],
		));
		// Add sub page.
		acf_add_options_page(array(
			'page_title'  => __('Services'),
			'menu_title'  => __('Services'),
			'parent_slug' => $parent['menu_slug'],
		));
		// Add sub page.
		acf_add_options_page(array(
			'page_title'  => __('Contact'),
			'menu_title'  => __('Contact'),
			'parent_slug' => $parent['menu_slug'],
		));
	}
}





//custom_post_type 
function prefix_create_custom_post_type()
{
	/*
     * The $labels describes how the post type appears.
     */
	$labels = array(
		'name'          => 'Products', // Plural name
		'singular_name' => 'Product'   // Singular name
	);

	/*
     * The $supports parameter describes what the post type supports
     */
	$supports = array(
		'title',        // Post title
		'editor',       // Post content
		'excerpt',      // Allows short description
		'author',       // Allows showing and choosing author
		'thumbnail',    // Allows feature images
		'comments',     // Enables comments
		'trackbacks',   // Supports trackbacks
		'revisions',    // Shows autosaved version of the posts
		'custom-fields' // Supports by custom fields
	);

	/*
     * The $args parameter holds important parameters for the custom post type
     */
	$args = array(
		'labels'              => $labels,
		'description'         => 'Post type post product', // Description
		'supports'            => $supports,
		'taxonomies'          => array('category', 'post_tag'), // Allowed taxonomies
		'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
		'public'              => true,  // Makes the post type public
		'show_ui'             => true,  // Displays an interface for this post type
		'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
		'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
		'show_in_admin_bar'   => true,  // Displays in the black admin bar
		'menu_position'       => 5,     // The position number in the left menu
		'menu_icon'           => true,  // The URL for the icon used for this post type
		'can_export'          => true,  // Allows content export using Tools -> Export
		'has_archive'         => true,  // Enables post type archive (by month, date, or year)
		'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
		'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
		'capability_type'     => 'post' // Allows read, edit, delete like “Post”
	);

	register_post_type('product', $args); //Create a post type with the slug is ‘product’ and arguments in $args.
}
add_action('init', 'prefix_create_custom_post_type');
