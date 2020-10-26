<?php

namespace CiraPress;

/**
 * sync product info
 *
 * @package cirapress
 */
add_action('wp_ajax_sync_product_data', function () {
    $post = $_POST['post'] ?? null;
    $product = $_POST['product'] ?? null;

    $data = sync_product_data($post, $product);

    if ( isset($data['error']) ){
        wp_send_json_error($data);
    }

    wp_send_json_success($data);
});