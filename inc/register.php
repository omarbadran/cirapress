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

/**
 * Register sidebars
 *
 * @package cirapress
 */
add_action( 'widgets_init', function () {
    register_sidebar([
        'name'          => __('Footer: Left', 'cirapress'),
        'id'            => 'footer-left',
        'description'   => __('Left footer column.', 'cirapress'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="title">',
        'after_title'   => '</h6>',
    ]);

    register_sidebar([
        'name'          => __('Footer: Center', 'cirapress'),
        'id'            => 'footer-center',
        'description'   => __('Center footer column.', 'cirapress'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="title">',
        'after_title'   => '</h6>',
    ]);

    register_sidebar([
        'name'          => __('Footer: Right', 'cirapress'),
        'id'            => 'footer-right',
        'description'   => __('Right footer column.', 'cirapress'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="title">',
        'after_title'   => '</h6>',
    ]);
});

/**
 * Register product post type
 *
 * @package cirapress
 */
add_action('init', function () {
    $args = [
        'public'            => true,
        'label'             => __('Products', 'cirapress'),
        'menu_icon'         => 'dashicons-money-alt',
        'show_in_rest'      => true,
        'supports' =>       [
            'title',
            'custom-fields',
            'editor',
            'thumbnail',
            'comments'
        ]
    ];

    register_post_type('product', $args);

    register_post_meta('product', 'product_id', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ]);

    register_post_meta('product', 'product_info', [
        'show_in_rest' => false,
        'single' => true,
        'type' => 'array',
    ]);

    register_post_meta('product', 'product_plans', [
        'show_in_rest' => false,
        'single' => true,
        'type' => 'array',
    ]);

    register_post_meta('product', 'product_features', [
        'show_in_rest' => false,
        'single' => true,
        'type' => 'array',
    ]);

    register_post_meta('product', 'product_reviews', [
        'show_in_rest' => false,
        'single' => true,
        'type' => 'array',
    ]);
});