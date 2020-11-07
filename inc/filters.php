<?php
/**
 * Filters
 *
 * @package CiraPress
 */

namespace CiraPress;

add_filter('excerpt_length', function () {
    return 22;
});

add_filter('excerpt_more', function () {
    return '...';
});

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

add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});

add_filter('parse_query', function ($query) {
    global $pagenow;
	$post_type = 'doc';
	$taxonomy  = 'doc_category';
    $q_vars    = &$query->query_vars;
    
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
});
