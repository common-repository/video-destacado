<?php 
/**
 *
 *
 * Add Scripts and CSS
 */

function video_destacado_scripts() {
	wp_register_script('my-script', plugins_url('video-destacado') . '/js/vd-admin.js');
	wp_enqueue_script('my-script');
	//wp_enqueue_script('jquery');
}
function video_destacado_styles() {
	wp_register_style('my-css', plugins_url('video-destacado') . '/css/vd-admin.css');
	wp_enqueue_style('my-css');
}
add_action('admin_print_scripts', 'video_destacado_scripts');
add_action('admin_print_styles', 'video_destacado_styles');
