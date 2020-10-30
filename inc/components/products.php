<?php
/**
 * Products
 *
 * @package cirapress
 */

namespace CiraPress\Products;

/**
 * Render product query
 * 
 * @since 1.0.0
 * @access public
 * @return string
 */
function query($col = "4"){
    global $wp_query;

    $args = array_merge($wp_query->query_vars, [
        'post_type' => 'product'
    ]);

    query_posts($args);

    echo "<div class='row'>";
    
    while ( have_posts() ) {
        the_post();
        
        $id = get_the_ID();
        $class = join(' ', get_post_class("post clearfix col-lg-$col"));
        $title = get_the_title();
        $url = esc_url(get_permalink());
        
        $thumb = get_the_post_thumbnail($id, 'medium', [
            'class' => "img-fluid rounded"
        ]);

        $price = get_product_price($id);

        $excerpt = get_the_excerpt();
        $info = get_post_meta($id, 'product_info', true);

        echo "<article id='post-$id' class='$class'>";
            echo "<div class='card item-card h-100 border-0'>";
                echo "<header class='item-card__image rounded'>";
                    echo "<a href='$url'>$thumb</a>";
                echo "</header>";

                echo "<div class='card-body px-0 pt-3'>";
                    echo "<div class='d-flex justify-content-between align-items-start'>";
                        echo "<div class='item-title'>";
                            echo "<h3 class='h5 mb-0 post-title'>";
                                echo "<a href='$url'>$info[title]</a>";
                            echo "</h3>";
                            
                            echo "<p class='text-muted small mt-3'>$excerpt</p>";
                        echo "</div>";
                        echo "<div class='item-price'><span>$$price</span></div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</article>";
    }

    echo "</div>";

    wp_reset_query();
}

/**
 * Get product price
 * 
 * @since 1.0.0
 * @access public
 * @return array
 */
function get_product_price($id) {
    $price = 0;

    $info = get_post_meta($id, 'product_info', true);
    $default_plan_id = $info["default_plan_id"];
    $plans = get_post_meta($id, 'product_plans', true);

    $key = array_search($default_plan_id, array_column($plans, 'id'));
    $plan = $plans[$key];

    if ( ! empty($plan['pricing']) ) {
        $pricing = array_search(1, array_column($plan['pricing'], 'licenses'));
        $pricing = $plan['pricing'][$pricing];

        $price = $pricing['annual_price'];
    }

    return $price;
}
