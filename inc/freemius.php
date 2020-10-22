<?php
/**
 * Freemius Integration
 *
 * @package cirapress
 */

namespace CiraPress;

require_once 'vendor/freemius/Freemius.php';

$freemius = new \Freemius_Api('developer', '9577', 'pk_b34b8fef836df86133740ca3fe0af', 'sk_pU{_MRLLhcu4Fp;$]:xc@Zgo=LO9c');

/**
 * Get all products
 * 
 * @since 1.0.0
 * @access public
 * @return array
 */

function fs_get_products() {
    global $freemius;

    $result = $freemius->Api('/plugins.json');

    return $freemius;
}