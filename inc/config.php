<?php

/**
 * Enqueue scripts and styles
 * 
 * @package cirapress
 */
add_action('wp_enqueue_scripts', function() {
	$timestamps = CiraPress\assets_timestamp();

	// main css
	wp_enqueue_style(
		'cirapress-style',
		get_template_directory_uri() . '/dist/styles/main.css',
		[],
		$timestamps['css']
	);


	// Bootstrap JS
	wp_enqueue_script(
		'cirapress-js',
		get_template_directory_uri() . '/dist/scripts/vendor/bootstrap.bundle.js',
		['jquery'],
		$timestamps['js'],
		true
	);

	// main js
	wp_enqueue_script(
		'cirapress-js',
		get_template_directory_uri() . '/dist/scripts/main.js',
		[],
		$timestamps['js'],
		true
	);

	// comments
	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}
});

