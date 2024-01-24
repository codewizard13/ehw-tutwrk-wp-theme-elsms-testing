<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'elsm-astra-child-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), false, 'all' );

}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/* DOESN'T WORK YET */
// function enqueuing_admin_scripts(){
 
// 	// wp_enqueue_style('admin-your-css-file-handle-name', get_template_directory_uri().'/admin/wpadmin.css');
// 	wp_enqueue_style( 'elsm-astra-child-admin-css', get_stylesheet_directory_uri() . '/admin/wpadmin.css', array('astra-theme-css'), false, 'all' );

// }

// add_action( 'admin_enqueue_scripts', 'enqueuing_admin_scripts' );


// /**
//  * Register and enqueue a custom stylesheet in the WordPress admin.
//  */
// function wpdocs_enqueue_custom_admin_style() {
// 	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
// 	wp_enqueue_style( 'custom_wp_admin_css' );
// }
// add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );



/**
 * ADD basic "Hello World" type text for demo purposes to WP Admin Dashboard
 */
function ehw_wpadmin_add_hello() {

  wp_add_dashboard_widget('ehw_add_hello', 'Hepperle Hello Section', 'hello_hepperle');

}
add_action('wp_dashboard_setup', 'ehw_wpadmin_add_hello');

function hello_hepperle() {
	echo "<h3>Hello Hepperle!</h3>";
}

/**
 * THIS is a hack that DOES work, but we need to figure out the proper way to enqueue admin bar scripts
 */
// From here: https://wordpress.stackexchange.com/questions/110895/adding-custom-stylesheet-to-wp-admin
add_action('admin_head', 'my_custom_fonts'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function my_custom_fonts() {
  echo '<style>
	/* Style for CUSTOM admin bar post counter nodes */
	li[id^="wp-admin-bar-ehw"],
	li#wp-admin-bar-ehw_videos_count {
		background: navy !important;
		border-right: solid white 1px;
		margin-right: .3rem;
	}
  </style>';
}