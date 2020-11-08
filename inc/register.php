<?php

/**
 * Register menu positions
 *
 * @package CiraPress
 */
add_action('after_setup_theme', function() {
    register_nav_menus([
        'primary' => __('Nav: Primary', 'cirapress'),
    ]);
});

/**
 * Register sidebars
 *
 * @package CiraPress
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
 * @package CiraPress
 */
add_action('init', function () {
    $args = [
        'public'            => true,
        'label'             => __('Products', 'cirapress'),
        'menu_icon'         => 'dashicons-money-alt',
        'show_in_rest'      => true,
        'has_archive'       => 'products',
        'supports' =>       [
            'title',
            'custom-fields',
            'editor',
            'thumbnail',
            'excerpt'
        ]
    ];

    register_post_type('product', $args);

    register_post_meta('product', 'product_id', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ]);

    register_post_meta('product', 'product_preview_url', [
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

/**
 * Register docus post type
 *
 * @package CiraPress
 */
add_action('init', function () {
    $args = array(
        'hierarchical'      => true,
        'label'             => 'Category',
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'doc_category' ],
    );

    register_taxonomy('doc_category', [ 'doc' ], $args);
    
    $args = [
        'public'            => true,
        'label'             => __('Docs', 'cirapress'),
        'menu_icon'         => 'dashicons-format-aside',
        'show_in_rest'      => true,
        'has_archive'       => 'docs',
        'supports' =>       [
            'title',
            'custom-fields',
            'editor',
            'thumbnail',
            'excerpt'
        ],
        'taxonomies' => [
            'doc_category',
        ]
    ];

    register_post_type('doc', $args);


});


/**
 * Display a custom taxonomy dropdown in admin
 */
add_action('restrict_manage_posts', function () {
	global $typenow;
    
    $post_type = 'doc';
    $taxonomy  = 'doc_category';
    
	if ( $typenow == $post_type ) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        
		wp_dropdown_categories([
			'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
        ]);
	};
});
