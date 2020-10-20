<?php

/**
 * Register menu positions
 *
 * @package cirapress
 */
add_action('after_setup_theme', function() {
    register_nav_menus([
        'primary' => __('Nav: Primary', 'cirapress'),
    ]);
});