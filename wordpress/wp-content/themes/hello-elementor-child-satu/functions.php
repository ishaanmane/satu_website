<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function satu_enqueue_styles() {
    wp_enqueue_style(
        'hello-elementor-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'satu-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'hello-elementor-style' ),
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_style(
        'satu-header-style',
        get_stylesheet_directory_uri() . '/assets/css/satu-header.css',
        array( 'satu-child-style' ),
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_style(
    	'satu-footer-style',
    	get_stylesheet_directory_uri() . '/assets/css/satu-footer.css',
    	array( 'satu-child-style' ),
    	wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'satu_enqueue_styles' );
