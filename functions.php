<?php
/**
 * yourweblayout functions and definitions
 *
 * @package yourweblayout
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'yourweblayout_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yourweblayout_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yourweblayout' ),
		'secondary' => __( 'Secondary Menu', 'yourweblayout' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
}
endif; // yourweblayout_setup
add_action( 'after_setup_theme', 'yourweblayout_setup' );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function yourweblayout_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	/**register_sidebar( array(
		'name'          => __( 'Projects Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-projects',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );*/
}
add_action( 'widgets_init', 'yourweblayout_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yourweblayout_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'yourweblayout-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-javascript', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '1.1.1', true );
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/theme.js', array( 'bootstrap-javascript' ), '1.1.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yourweblayout_scripts' );

/**
 * Hide theme editor link.
 */
function remove_menu_elements() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
}
add_action( 'admin_init', 'remove_menu_elements', 102 );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Register Bootstrap navigation walker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Filter to apply modal attributes to nav link
 */
add_filter( 'nav_menu_link_attributes', 'boot_nav_modal', 10, 3 );
function boot_nav_modal( $atts, $item, $args )
{
  // The ID of the target menu item
  $menu_target = 101;

  // inspect $item
  if ($item->ID == $menu_target) {
    $atts['data-toggle'] = 'modal';
    $atts['data-target'] = '#myModal';
  }
  return $atts;
}

/*filter to modify flexslider javascript for carousel on http://rwd.yourweblayout.com/demo/carousel-slider-2*/
function metaslider_flex_params($options, $slider_id, $settings) {
	if ($slider_id == 195) {//chedk for slider ID (optional)
		$options['animationLoop'] = "true"; //this will loop the carousel instead of rewinding
	}
	return $options;
}

add_filter('metaslider_flex_slider_parameters', 'metaslider_flex_params', 10, 3);

//Add Project ID field to Projects
function new_projects_fields( $fields ) {
	$fields['project_id'] = array(
	    'name' 			=> __( 'Project ID', 'projects' ),
	    'description' 	=> __( 'Enter a Project ID for this project.', 'projects' ),
	    'type' 			=> 'text',
	    'default' 		=> '',
	    'section' 		=> 'info'
	);

	return $fields;
}
add_filter( 'projects_custom_fields', 'new_projects_fields' );

//Display new meta field on archives pages
function display_new_projects_fields() {
	global $post;
	$project_id = esc_attr( get_post_meta( $post->ID, '_project_id', true ) );

	echo '<p>' . __( 'Project ID: ', 'projects' ) . $project_id . '</p>';
}
add_action( 'projects_after_loop_item', 'display_new_projects_fields', 10 );

//Add Mineral Multicheck field to Projects
function woo_projects_custom_fields( $mineral ){
	$mineral['multicheck'] = array(
            'name'          => __( 'Mineral', 'projects' ),
            'description'   => __( 'Choose one or more minerals', 'projects' ),
            'type'          => 'multicheck',
            'default'       => 'coal',
            'section'       => 'info',
            'options'       => array( 'coal' => 'Coal', 'gold' => 'Gold', 'nickel' => 'Nickel', 'other' => 'Other' )
        );

    return $mineral;
}
add_filter( 'projects_custom_fields', 'woo_projects_custom_fields' );

//Display new meta field on archives pages
function display_projects_custom_fields() {
	global $post;
	$mineral = esc_attr( get_post_meta( $post->ID, '_mineral', true ) );
	$mineral['multicheck'] = array(
            'name'          => __( 'Mineral', 'projects' ),
            'description'   => __( 'Choose one or more minerals', 'projects' ),
            'type'          => 'multicheck',
            'default'       => 'coal',
            'section'       => 'info',
            'options'       => array( 'coal' => 'Coal', 'gold' => 'Gold', 'nickel' => 'Nickel', 'other' => 'Other' )
        );

    return $mineral;

	echo '<p>' . __( 'Mineral: ', 'projects' ) . $mineral . '</p>';
}
add_action( 'projects_after_loop_item', 'display_projects_custom_fields', 20 );

//clean up ACF
function wpex_clean_shortcodes($content){
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('acf_the_content', 'wpex_clean_shortcodes');

// Use shortcodes in widgets
add_filter('widget_text', 'do_shortcode');