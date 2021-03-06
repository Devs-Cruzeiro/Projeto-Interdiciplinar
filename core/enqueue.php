<?php
////////////////////////////////////////////////
//////////CSS and JS for WP admin///////////////
////////////////////////////////////////////////
function rhs_load_admin(){
	wp_enqueue_style( 'style_admin', get_template_directory_uri() . '/assets/css/style-admin.css', array() );
	wp_enqueue_script( 'script_admin', get_template_directory_uri().'/assets/js/script-admin.js', array( 'jquery' ), 2, true );
}
add_action( 'admin_enqueue_scripts', 'rhs_load_admin' );


////////////////////////////////////////////////
//////////////////////CSS///////////////////////
////////////////////////////////////////////////
function rhs_load_css(){
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css', array() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/fontawesome.css', array());
	wp_enqueue_style( 'style_theme', get_template_directory_uri().'/assets/css/style.css', array() );
}
add_action( 'wp_enqueue_scripts', 'rhs_load_css' );


////////////////////////////////////////////////
//////////////////////JS////////////////////////
////////////////////////////////////////////////
function rhs_load_js(){
	wp_enqueue_script( 'bootstrap-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), 1, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), 1, true );
	wp_enqueue_script( 'js_theme', get_template_directory_uri().'/assets/js/script.js', array( 'jquery' ), 2, true );
}
add_action( 'wp_enqueue_scripts', 'rhs_load_js' );