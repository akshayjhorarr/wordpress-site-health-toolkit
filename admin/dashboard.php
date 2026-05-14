<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'wsht_add_admin_menu');

function wsht_add_admin_menu() {

    add_menu_page(
        'Support Diagnostics',
        'Support Diagnostics',
        'manage_options',
        'wsht-dashboard',
        'wsht_dashboard_page',
        'dashicons-heart',
        30
    );
}

function wsht_dashboard_page() {

    $php_version = phpversion();

    $wp_version = get_bloginfo('version');

    $memory_limit = ini_get('memory_limit');

    $woocommerce_active = class_exists('WooCommerce')
        ? 'Active'
        : 'Not Active';

    $response = wp_remote_get(rest_url());

    $rest_api_status = !is_wp_error($response)
        ? 'Working'
        : 'Issue Detected';

    $debug_mode = defined('WP_DEBUG') && WP_DEBUG
        ? 'Enabled'
        : 'Disabled';

    $cron_status = defined('DISABLE_WP_CRON') && DISABLE_WP_CRON
        ? 'Disabled'
        : 'Enabled';

?>

<div class="wrap">

    <h1>WordPress Site Health Toolkit</h1>

    <table class="widefat striped" style="max-width: 800px;">

        <thead>
            <tr>
                <th>Check</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>PHP Version</td>
                <td><?php echo esc_html($php_version); ?></td>
            </tr>

            <tr>
                <td>WordPress Version</td>
                <td><?php echo esc_html($wp_version); ?></td>
            </tr>

            <tr>
                <td>Memory Limit</td>
                <td><?php echo esc_html($memory_limit); ?></td>
            </tr>

            <tr>
                <td>WooCommerce Status</td>
                <td><?php echo esc_html($woocommerce_active); ?></td>
            </tr>

            <tr>
                <td>REST API Status</td>
                <td><?php echo esc_html($rest_api_status); ?></td>
            </tr>

            <tr>
                <td>WP_DEBUG</td>
                <td><?php echo esc_html($debug_mode); ?></td>
            </tr>

            <tr>
                <td>WP Cron</td>
                <td><?php echo esc_html($cron_status); ?></td>
            </tr>

        </tbody>

    </table>

</div>

<?php
}