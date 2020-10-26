<?php
/**
 * Freemius Integration
 *
 * @package cirapress
 */

namespace CiraPress\Freemius;

require_once 'vendor/freemius/Freemius.php';

$freemius = new \Freemius_Api('developer', '9577', 'pk_b34b8fef836df86133740ca3fe0af', 'sk_pU{_MRLLhcu4Fp;$]:xc@Zgo=LO9c');

    
/**
 * Get product info
 * 
 * @since 1.0.0
 * @access public
 * @return array
 */
function get_product_info($id) {
    global $freemius;

    $result = $freemius->Api("/plugins/$id.json");

    if ( is_object($result) ) {
        $result = (array) $result;
    }

    return $result;
}

/**
 * Get product plans
 * 
 * @since 1.0.0
 * @access public
 * @return array
 */
function get_product_plans($id) {
    global $freemius;

    $result = $freemius->Api("/plugins/$id/plans.json");

    if ( is_object($result) ) {
        $result = json_decode(json_encode($result->plans), true);
    }

    foreach ($result as &$plan) {
        $pricing = $freemius->Api("/plugins/$id/plans/$plan[id]/pricing.json");

        if ( is_object($pricing) ) {
            $plan['pricing'] = json_decode(json_encode($pricing->pricing), true);
        }
    }

    return $result;
}

/**
 * Get product features
 * 
 * @since 1.0.0
 * @access public
 * @return array
 */
function get_product_features($id) {
    global $freemius;

    $result = $freemius->Api("/plugins/$id/features.json");

    if ( is_object($result) ) {
        $result = json_decode(json_encode($result->features), true);
    }

    return $result;
}

/**
 * Get product reviews
 * 
 * @since 1.0.0
 * @access public
 * @return array
 */
function get_product_reviews($id) {
    global $freemius;

    $result = $freemius->Api("/plugins/$id/reviews.json");

    if ( is_object($result) ) {
        $result = json_decode(json_encode($result->reviews), true);
    }

    return $result;
}
