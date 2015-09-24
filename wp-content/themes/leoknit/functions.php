<?php

/**
 * Enqueue scripts and styles
 */
function leosknit_scripts_styles() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', false );
  wp_enqueue_style( 'style1', get_template_directory_uri() . '/css/style1.css', array(), '1.0.0', false );
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome-4.3.0/css/font-awesome.min.css', array(), '1.0.0', false );

  wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', array(), '1.0.0', true );
  wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
  wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '1.0.0', false );
  wp_enqueue_script( 'classie' );
  wp_enqueue_script( 'main' );
  wp_enqueue_script( 'modernizer' );
}

add_action( 'wp_enqueue_scripts', 'leosknit_scripts_styles' );
