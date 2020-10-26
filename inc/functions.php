<?php
/**
 * Helper functions
 *
 * @package cirapress
 */

namespace CiraPress;


/**
 * Get last-edited timestamp for assets
 * 
 * @since 1.0.0
 * @access public
 * @return array|bool
 */
function assets_timestamp() {
	$filepath = get_template_directory() . '/assets/last-edited.json';

	if ( file_exists($filepath) ) {
		$json = file_get_contents($filepath);
		$timestamps = json_decode($json, true);

		return $timestamps;
	}

	return false;
}

/**
 * Sync product data
 * 
 * @since 1.0.0
 * @access public
 * @return int
 */
function sync_product_data($post_id, $product_id) {
    $info = Freemius\get_product_info($product_id);
    
    if ( isset($info['error']) ){
        return $info;
    }
    
    update_post_meta($post_id, 'product_info', $info);
    
    $plans = Freemius\get_product_plans($product_id);

    if ( is_array($plans) ) {
        update_post_meta($post_id, 'product_plans', $plans);
    }

    $features = Freemius\get_product_features($product_id);

    if ( is_array($features) ) {
        update_post_meta($post_id, 'product_features', $features);
    }

    $reviews = Freemius\get_product_reviews($product_id);

    if ( is_array($reviews) ) {
        update_post_meta($post_id, 'product_reviews', $reviews);
    }


    return [
        'info' => $info,
        'plans' => $plans,
        'features' => $features,
        'reviews' => $reviews,
    ];
}