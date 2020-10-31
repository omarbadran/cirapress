<?php
/**
 * Filters
 *
 * @package CiraPress
 */

namespace CiraPress;

add_filter( 'term_links-post_tag', function( array $links ) {
    return preg_replace_callback(
        '|href="[^"]*/([^"]+?)/?"|',
        function( array $matches ) {
            list( $href, $slug ) = $matches;
            return "class=\"badge badge-soft-success text-success mr-1 mb-1\" {$href}";
        },
        $links
    );
});
