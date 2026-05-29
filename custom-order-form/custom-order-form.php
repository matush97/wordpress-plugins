<?php
/**
 * Plugin Name:       Custom Order Form
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.8
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-order-form
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
 * based on the registered block metadata. Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function create_block_custom_order_form_block_init() {
	wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
}
add_action( 'init', 'create_block_custom_order_form_block_init' );

function save_order_form() {
    $json = file_get_contents('php://input');

    $data = json_decode($json, true);

    if (!$data) {
        wp_send_json_error([
            'message' => 'Invalid JSON'
        ]);
    }

    // test save
    file_put_contents(
        plugin_dir_path(__FILE__) . 'orders.txt',
        json_encode($data, JSON_PRETTY_PRINT) . PHP_EOL,
        FILE_APPEND
    );

    wp_send_json_success([
        'message' => 'Objednávka uložená'
    ]);
}

add_action('wp_ajax_save_order_form', 'save_order_form');
add_action('wp_ajax_nopriv_save_order_form', 'save_order_form');
