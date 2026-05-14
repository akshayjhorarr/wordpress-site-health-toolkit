<?php
/**
 * Plugin Name: WordPress Site Health Toolkit
 * Plugin URI: https://github.com/YOUR_USERNAME/wordpress-site-health-toolkit
 * Description: Lightweight support diagnostics toolkit for WordPress and WooCommerce troubleshooting.
 * Version: 1.0
 * Author: YOUR NAME
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'admin/dashboard.php';

add_action('admin_enqueue_scripts', 'wsht_admin_styles');

function wsht_admin_styles() {

    wp_enqueue_style(
        'wsht-admin-css',
        plugin_dir_url(__FILE__) . 'assets/admin.css'
    );
}