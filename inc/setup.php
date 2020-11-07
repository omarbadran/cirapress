<?php

namespace CiraPress;

/**
 * Register support for various WordPress features
 * 
 * @package CiraPress
 */
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
  
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);

    add_theme_support('post-thumbnails');
});


/**
 * Setup image sizes
 * 
 * @package CiraPress
 */
add_action('after_setup_theme', function() {
	$defaults = [
        [
            'name' => 'thumbnail',
            'w'    => 100,
            'h'    => 76,
        ],
        [
            'name' => 'medium',
            'w'    => 360,
            'h'    => 272,
        ],
        [
            'name' => 'large',
            'w'    => 720,
            'h'    => 544,
        ]
	];
  
	foreach ($defaults as $size) {
        $existing_w = intval(get_option($size['name'] . '_size_w'));

        if ( $existing_w !== $size['w'] ) {
            update_option($size['name'] . '_size_h', $size['h']);
            update_option($size['name'] . '_size_w', $size['w']);
        }
    }
    
	add_image_size('lazyload', 16, 12, true);
	add_image_size('hero_xl', 2000, 1511, true);
	add_image_size('hero_md', 1500, 1133, true);
	add_image_size('hero_sm', 800, 604, true);
	add_image_size('wide', 1216, 919, false);
	add_image_size('wide_xl', 1824, 1378, false);
});