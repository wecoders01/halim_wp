<?php

/**
 * Enqueue scripts and styles.
 */
function halim_theme_file() {
    // Load Css
    wp_enqueue_style( 'poppins_fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'font_awesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
    wp_enqueue_style( 'magnific_popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'owl_carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'responsive_css', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '1.0', 'all' );
    // load halim_style css
    wp_enqueue_style( 'halim_style', get_stylesheet_uri() );

    // load Js
    wp_enqueue_script( 'proper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'magnific_popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/assets/js/imageloaded.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'halim_theme_file' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function halim_theme_setup() {

    // Loading theme textdomain
    load_theme_textdomain( 'neuron_itanvir', get_template_directory() . '/languages' );

    // GEnerate Automated Feed Link on Head
    add_theme_support( 'automatic-feed-links' );

    // Adding Automatic Title Tag
    add_theme_support( 'title-tag' );

    /**
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => __( 'Primary', 'halim' ),
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
            'script',
            'style',
            'navigation-widgets',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );

    add_theme_support( "custom-header" );
    add_theme_support( "custom-background" );
}
add_action( 'after_setup_theme', 'halim_theme_setup' );

/**
 * Enable Shortcode Any Text Widget Area
 */
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

// Limit except length to 125 characters.
// tn limited excerpt length by number of characters
function get_excerpt( $count ) {
    $excerpt = get_the_content();
    $excerpt = strip_tags( $excerpt );
    $excerpt = substr( $excerpt, 0, $count );
    $excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
    $excerpt = '<p>' . $excerpt . '..... </p>'; // '<p>'.$excerpt.'... <a href="'.get_the_permalink().'">Read More</a></p>'
    return $excerpt;
}

// custom comments form order
function halim_comment_field( $fields ) {
    $comment = $fields['comment'];
    $author  = $fields['author'];
    $email   = $fields['email'];
    $url     = $fields['url'];
    $cookies = $fields['cookies'];

    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );

    $fields['author']  = $author;
    $fields['email']   = $email;
    $fields['url']     = $url;
    $fields['comment'] = $comment;
    $fields['cookies'] = $cookies;

    return $fields;
}
add_action( 'comment_form_fields', 'halim_comment_field' );

/**
 * Register widget area.
 */
function halim_widgets_init() {
    // Main side bar for Single Blog
    register_sidebar(
        array(
            'name'          => __( 'Main Sidebar', 'halim' ),
            'id'            => 'main_sidebar',
            'description'   => __( 'Main Sidebar for Blog Page', 'halim' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    // Footer one widget
    register_sidebar(
        array(
            'name'          => __( 'Footer One', 'halim' ),
            'id'            => 'footer_one',
            'description'   => __( 'Add Footer Widget One', 'halim' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s single-footer footer-logo">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );
    // Footer one widget
    register_sidebar(
        array(
            'name'          => __( 'Footer Two', 'halim' ),
            'id'            => 'footer_two',
            'description'   => __( 'Add Footer Widget Two', 'halim' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s single-footer">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    // Footer one widget
    register_sidebar(
        array(
            'name'          => __( 'Footer Three', 'halim' ),
            'id'            => 'footer_three',
            'description'   => __( 'Add Footer Widget Three', 'halim' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s single-footer">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    // Footer one widget
    register_sidebar(
        array(
            'name'          => __( 'Footer Four', 'halim' ),
            'id'            => 'footer_four',
            'description'   => __( 'Add Footer Widget Four', 'halim' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s single-footer contact-box">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'halim_widgets_init' );

require_once get_template_directory() . '/inc/halim-activation.php';
require_once get_template_directory() . '/inc/halim-demo-content.php';

/**
 *
 * Codestar Framework
 * A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 *
 */
require get_template_directory() . '/inc/codestar-framework/codestar-framework.php';