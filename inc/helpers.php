<?php
/**
 * Helper functions
 *
 * @package cirapress
 */

namespace CiraPress;


/**
 * Get last-edited timestamp
 *
 * @global array $cirapress_timestamps cached timestamp values
 *
 * @param string $asset ID of asset type
 *
 * @return int UNIX timestamp
 */
function last_edited($asset = 'css') {

  global $cirapress_timestamps;

  // save timestamps to cache in global variable for this request
  if (empty($cirapress_timestamps)) {

    $filepath = get_template_directory() . '/assets/last-edited.json';

    if (file_exists($filepath)) {
      $json = file_get_contents($filepath);
      $cirapress_timestamps = json_decode($json, true);
    }

  }

  // use cached value from global variable
  if (isset($cirapress_timestamps[$asset])) {
    return absint($cirapress_timestamps[$asset]);
  }

  return 0;

}
