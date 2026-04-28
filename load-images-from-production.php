<?php

/**
 * Plugin Name: Load Images From Production (for staging/dev)
 * Description: Hooks into WP's media URL generation and replaces the domain with the production domain.
 * Author:      Billie Mead
 * Author URI:  https://github.com/devbilliemead/
 */
// If this file is called directly, abort.
defined('WPINC') or die();

// Configure these
defined('LIFP_PRODUCTION_HOST') or define('LIFP_PRODUCTION_HOST', '');
defined('LIFP_PRODUCTION_SCHEME') or define('LIFP_PRODUCTION_SCHEME', 'https');

// If prod host name hasn't been defined, bail.
if (empty(LIFP_PRODUCTION_HOST)) {
    return;
}

add_filter('wp_get_attachment_image_src', function ($image, $attachment_id, $size, $icon) {
    $parts = parse_url($image[0]);

    // Override with prod values.
    $parts['scheme'] = LIFP_PRODUCTION_SCHEME;
    $parts['host'] = LIFP_PRODUCTION_HOST;

    // Ensure all keys are set.
    $parts = array_merge(['path' => '', 'query' => ''], $parts);

    // Build the new URL.
    $image[0] = "{$parts['scheme']}://{$parts['host']}{$parts['path']}";

    if ($parts['query']) {
        $image[0] .= '?' . $parts['query'];
    }
    return $image;
    
}, 10, 4);
