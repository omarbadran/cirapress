<?php
/**
 * Products
 *
 * @package cirapress
 */

namespace CiraPress\Products;

/**
 * Get product info
 * 
 * @since 1.0.0
 * @access public
 * @return string
 */
function query($col = "4") {
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
        
        echo "<article id='post-$id' class='$class'>";
            echo "<div class='card item-card h-100 border-0'>";
                
                // Header
                echo "<header class='item-card__image rounded'>";
                    echo "<a href='$url'>$thumb</a>";
                echo "</header>";

                // Body
                echo "<div class='card-body px-0 pt-3'>";
                    echo "<div class='d-flex justify-content-between align-items-start'>";
                        echo "<div class='item-title'>";
                            echo "<h3 class='h5 mb-0 text-truncate post-title'>";
                                echo "<a href='$url'>$title</a>";
                            echo "</h3>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

            echo "</div>";
        echo "</article>";
    }

    echo "</div>";

    wp_reset_query();
}