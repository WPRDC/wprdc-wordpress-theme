<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once('library/cleanup.php');

/** Required for Foundation to work properly */
require_once('library/foundation.php');

/** Format comments */
require_once('library/class-foundationpress-comments.php');

/** Register all navigation menus */
require_once('library/navigation.php');

/** Add menu walkers for top-bar and off-canvas */
require_once('library/class-foundationpress-top-bar-walker.php');
require_once('library/class-foundationpress-mobile-walker.php');

/** Create widget areas in sidebar and footer */
require_once('library/widget-areas.php');

/** Return entry meta information for posts */
require_once('library/entry-meta.php');

/** Enqueue scripts */
require_once('library/enqueue-scripts.php');

/** Add theme support */
require_once('library/theme-support.php');

/** Add Nav Options to Customer */
require_once('library/custom-nav.php');

/** Change WP's sticky post class */
require_once('library/sticky-posts.php');

/** Configure responsive image sizes */
require_once('library/responsive-images.php');

/** Interface with CKAN instance */
require_once('library/ckan.php');

/** Theme Settings */
require_once('library/theme-settings.php');

/** Custom Functions */
require_once('library/wprdc.php');

function theme_settings_add_page() {
    new ThemeSettings();
}

add_action('admin_menu', 'theme_settings_add_page');

function faq_one_page( $query ) {
    if ($query->is_main_query() && $query->is_category(['wizard-faq', 'beginner-faq', 'publisher-faq', 'faq']) ) {
        $query->query_vars['posts_per_page'] = 100;
        $query->query_vars['order'] = 'ASC';
    }
}

add_action('pre_get_posts', 'faq_one_page');
