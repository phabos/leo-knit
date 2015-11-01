<?php

/*
 * Include theme class
 */
require_once(__DIR__ . '/inc/PostCollection.class.php');
require_once(__DIR__ . '/inc/Post.class.php');
require_once(__DIR__ . '/inc/Helper.class.php');

/**
 * Enqueue scripts and styles
 */
function leosknit_scripts_styles() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', false );
  wp_enqueue_style( 'style1', get_template_directory_uri() . '/css/style1.css', array(), '1.0.0', false );
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome-4.3.0/css/font-awesome.min.css', array(), '1.0.0', false );
	wp_enqueue_style( 'slickslider', get_template_directory_uri() . '/css/slick.css', array(), '1.0.0', false );
	wp_enqueue_style( 'slicktheme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0.0', false );

  wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', array(), '1.0.0', true );
  wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
  wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '1.0.0', false );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '1.0.0', true );
	wp_register_script( 'arctext', get_template_directory_uri() . '/js/jquery.arctext.js', array( 'jquery' ), '1.0.0', false );
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery', 'arctext' ), '1.0.0', false );
	wp_register_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery'), '1.0.0', false );

  wp_enqueue_script( 'classie' );
  wp_enqueue_script( 'main' );
  wp_enqueue_script( 'modernizer' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'arctext' );
	wp_enqueue_script( 'custom' );
	wp_enqueue_script( 'slick' );
}

add_action( 'wp_enqueue_scripts', 'leosknit_scripts_styles' );

/*
 * Image à la une
 */

add_theme_support( 'post-thumbnails');
