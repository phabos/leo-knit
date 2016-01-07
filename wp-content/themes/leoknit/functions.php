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
	wp_enqueue_style( 'angularLoadingCss', get_template_directory_uri() . '/css/loading-bar.css', array(), '1.0.0', false );
	wp_enqueue_style( 'carouselCss', get_template_directory_uri() . '/css/angular-carousel.css', array(), '1.0.0', false );

  	wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', array(), '1.0.0', true );
  	// wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
  	wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '1.0.0', false );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '1.0.0', true );
	wp_register_script( 'arctext', get_template_directory_uri() . '/js/jquery.arctext.js', array( 'jquery' ), '1.0.0', false );
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery', 'arctext' ), '1.0.0', false );
	wp_register_script( 'angular', get_template_directory_uri() . '/js/angularjs.js', array( 'jquery' ), '1.0.0', true );
	wp_register_script( 'angularCustom', get_template_directory_uri() . '/js/angular-custom.js', array( 'angular' ), '1.0.0', false );
	wp_register_script( 'angularAnimate', get_template_directory_uri() . '/js/angular-animate.js', array( 'angular' ), '1.0.0', true );
	wp_register_script( 'angularSanitize', get_template_directory_uri() . '/js/angular-sanitize.js', array( 'angular' ), '1.0.0', true );
	wp_register_script( 'angularLoading', get_template_directory_uri() . '/js/loading-bar.js', array( 'angular', 'angularAnimate' ), '1.0.0', true );
	wp_register_script( 'angularTouch', get_template_directory_uri() . '/js/angular-touch.js', array( 'angular' ), '1.0.0', true );
	wp_register_script( 'angularCarousel', get_template_directory_uri() . '/js/angular-carousel.js', array( 'angular', 'angularTouch' ), '1.0.0', true );
	wp_register_script( 'angularRoute', get_template_directory_uri() . '/js/angular-route.js', array( 'angular' ), '1.0.0', true );

	wp_enqueue_script( 'angular' );
  	wp_enqueue_script( 'classie' );
  	wp_enqueue_script( 'main' );
  	wp_enqueue_script( 'modernizer' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'arctext' );
	wp_enqueue_script( 'custom' );
	wp_enqueue_script( 'angularCustom' );
	wp_enqueue_script( 'angularAnimate' );
	wp_enqueue_script( 'angularSanitize' );
	wp_enqueue_script( 'angularTouch' );
	wp_enqueue_script( 'angularCarousel' );
	wp_enqueue_script( 'angularLoading' );
	wp_enqueue_script( 'angularRoute' );
}

add_action( 'wp_enqueue_scripts', 'leosknit_scripts_styles' );

/*
 * Image à la une
 */

add_theme_support( 'post-thumbnails');
