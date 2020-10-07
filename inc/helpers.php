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
 * @return int
 */
function assets_timestamp() {
	$filepath = get_template_directory() . '/assets/last-edited.json';

	if (file_exists($filepath)) {
		$json = file_get_contents($filepath);
		$timestamps = json_decode($json, true);

		return $timestamps;
	}

	return false;
}
