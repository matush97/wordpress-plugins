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

    // ===== CSV GENERATION =====

    $upload_dir = wp_upload_dir();
    $file_path = $upload_dir['path'] . '/order_' . time() . '.csv';

    $file = fopen($file_path, 'w');

    // 1. CUSTOMER INFO
    fputcsv($file, ['Firma', 'Adresa', 'Mesto', 'ICO', 'Telefon', 'Email', 'Material', 'Hrubka', 'Dekor', 'Iny dekor',
                    'Doprava', 'Typ objednavky', 'Oznacenie objednavky']);

    fputcsv($file, [
        $data['company'],
        $data['address'],
        $data['city'],
        $data['ico'],
        $data['phone'],
        $data['email'],
        $data['material'],
        $data['thickness'],
        $data['decor'],
        $data['anotherDecor'],
        $data['transport'],
        $data['orderType'],
        $data['customerOrderReference'],
    ]);

    // empty line
    fputcsv($file, []);

    // section label
    fputcsv($file, ['--- POLOZKY ---']);

    // items header
    fputcsv($file, ['Length', 'Width', 'Kusy', 'Nazov', 'Poznamka', 'Hrubka', 'Orientacia',
                    'Dolna', 'Prava', 'Horna', 'Lava', 'Blok']);

    foreach ($data['rows'] as $row) {
        fputcsv($file, [
            $row['length'],
            $row['width'],
            $row['numberOfPieces'],
            $row['title'],
            $row['note'],
            $row['hrubka'],
            $row['orientacia'],
            $row['dolna'],
            $row['prava'],
            $row['horna'],
            $row['lava'],
            $row['blok'],
        ]);
    }

    fclose($file);

    // EMAIL
    $to = 'matus.hudak@plus4u.net';
    $subject = "Nová objednávka {$data['ico']}";
    $message = "Objednávka je v prílohe. Spolocnost {$data['company']}";
    $attachments = [$file_path];

    $sent = wp_mail($to, $subject, $message, [], $attachments);

    if (!$sent) {
        wp_send_json_error([
            'message' => 'Email sa nepodarilo odoslať'
        ]);
    }

    // ===== RESPONSE =====

    wp_send_json_success([
        'message' => 'Objednávka uložená'
    ]);
}

add_action('wp_ajax_save_order_form', 'save_order_form');
add_action('wp_ajax_nopriv_save_order_form', 'save_order_form');
