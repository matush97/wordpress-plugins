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

if (!defined('ABSPATH')) {
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
function create_block_custom_order_form_block_init()
{
	wp_register_block_types_from_metadata_collection(__DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php');
}

add_action('init', 'create_block_custom_order_form_block_init');

function save_order_form()
{
	$json = file_get_contents('php://input');
	$data = json_decode($json, true);

	if (!is_array($data)) {
		wp_send_json_error([
			'message' => 'Neplatné dáta objednávky.'
		]);
	}

	/*
	 * Základné údaje zákazníka
	 */
	$company = sanitize_text_field($data['company'] ?? '');
	$address = sanitize_text_field($data['address'] ?? '');
	$city = sanitize_text_field($data['city'] ?? '');
	$ico = sanitize_text_field($data['ico'] ?? '');
	$phone = sanitize_text_field($data['phone'] ?? '');
	$email = sanitize_email($data['email'] ?? '');

	$transport = sanitize_text_field($data['transport'] ?? '');
	$orderType = sanitize_text_field($data['orderType'] ?? '');

	$customerOrderReference =
		sanitize_text_field($data['customerOrderReference'] ?? '');

	$additionalInformation =
		sanitize_textarea_field($data['additionalInformation'] ?? '');

	/*
	 * Rozmery
	 */
	$rows = [];

	if (!empty($data['rows']) && is_array($data['rows'])) {

		foreach ($data['rows'] as $row) {

			$rows[] = [

				// MATERIÁL
				'material' => sanitize_text_field(
					$row['material'] ?? ''
				),

				'thickness' => sanitize_text_field(
					$row['thickness'] ?? ''
				),

				'decor' => sanitize_text_field(
					$row['decor'] ?? ''
				),

				// ROZMER
				'length' => sanitize_text_field(
					$row['length'] ?? ''
				),

				'width' => sanitize_text_field(
					$row['width'] ?? ''
				),

				'numberOfPieces' => sanitize_text_field(
					$row['numberOfPieces'] ?? ''
				),

				'title' => sanitize_text_field(
					$row['title'] ?? ''
				),

				'hrubka' => sanitize_text_field(
					$row['hrubka'] ?? ''
				),

				'orientacia' => sanitize_text_field(
					$row['orientacia'] ?? ''
				),

				// OLEPENIE
				'note' => sanitize_text_field(
					$row['note'] ?? ''
				),

				'predna' => sanitize_text_field(
					$row['predna'] ?? ''
				),

				'zadna' => sanitize_text_field(
					$row['zadna'] ?? ''
				),

				'lava' => sanitize_text_field(
					$row['lava'] ?? ''
				),

				'prava' => sanitize_text_field(
					$row['prava'] ?? ''
				),

				'blok' => sanitize_text_field(
					$row['blok'] ?? ''
				),
			];
		}
	}


	/*
	 * Vytvorenie CSV
	 */
	$upload_dir = wp_upload_dir();

	$safe_company = sanitize_file_name($company);

	if ($safe_company === '') {
		$safe_company = 'zakaznik';
	}

	$file_path = $upload_dir['path']
		. '/order_' . $safe_company . '_' . time() . '.csv';


	$file = fopen($file_path, 'w');

	if (!$file) {
		wp_send_json_error([
			'message' => 'Nepodarilo sa vytvoriť súbor objednávky.'
		]);
	}


	/*
	 * CUSTOMER INFO
	 */
	fputcsv($file, [
		'Firma',
		'Adresa',
		'Mesto',
		'ICO',
		'Telefon',
		'Email',
		'Doprava',
		'Typ objednavky',
		'Oznacenie objednavky'
	]);

	fputcsv($file, [
		$company,
		$address,
		$city,
		$ico,
		$phone,
		$email,
		$transport,
		$orderType,
		$customerOrderReference
	]);


	/*
	 * PRÁZDNÝ RIADOK
	 */
	fputcsv($file, []);


	/*
	 * POLOŽKY
	 */
	fputcsv($file, [
		'--- POLOZKY ---'
	]);


	/*
	 * HLAVIČKA TABUĽKY
	 *
	 * Materiál, hrúbka a dekor sú teraz
	 * súčasťou KAŽDÉHO rozmeru.
	 */
	fputcsv($file, [
		'Material',
		'Hrubka materialu',
		'Dekor',
		'Dlzka',
		'Sirka',
		'Kusy',
		'Nazov',
		'Poznamka',
		'Hrubka dielca',
		'Orientacia',
		'Predna',
		'Zadna',
		'Lava',
		'Prava',
		'Blok'
	]);


	/*
	 * KAŽDÝ ROZMER
	 */
	foreach ($rows as $row) {

		fputcsv($file, [

			// materiál
			$row['material'],

			// hrúbka materiálu
			$row['thickness'],

			// dekor
			$row['decor'],

			// rozmer
			$row['length'],
			$row['width'],
			$row['numberOfPieces'],

			// ostatné
			$row['title'],
			$row['note'],
			$row['hrubka'],
			$row['orientacia'],

			// olepenie
			$row['predna'],
			$row['zadna'],
			$row['lava'],
			$row['prava'],
			$row['blok']
		]);
	}


	fclose($file);


	/*
	 * EMAIL ADMINISTRÁTOROVI
	 */
	$to = 'porez@altaviafactory.sk';

	$subject = 'Nová objednávka - ' . $company;

	$message =
		"Nová objednávka.\n\n" .
		"Spoločnosť: {$company}\n" .
		"IČO: {$ico}\n" .
		"Email: {$email}\n" .
		"Telefón: {$phone}\n\n" .
		"Doprava: {$transport}\n" .
		"Typ objednávky: {$orderType}\n" .
		"Označenie objednávky: {$customerOrderReference}\n\n" .
		"Počet rozmerov: " . count($rows) . "\n\n" .
		"Doplňujúce informácie:\n" .
		$additionalInformation;


	$attachments = [$file_path];


	$sent = wp_mail(
		$to,
		$subject,
		$message,
		[],
		$attachments
	);


	if (!$sent) {

		wp_send_json_error([
			'message' => 'Email sa nepodarilo odoslať.'
		]);
	}


	/*
	 * POTVRDENIE ZÁKAZNÍKOVI
	 */
	if ($email !== '') {

		$customerSubject =
			'Potvrdenie prijatia objednávky';

		$customerMessage =
			"Dobrý deň,\n\n" .
			"ďakujeme za Vašu objednávku.\n\n" .
			"Vaša požiadavka bola úspešne prijatá " .
			"a bude spracovaná naším tímom.\n\n" .
			"Referenčné číslo objednávky: " .
			$customerOrderReference .
			"\n\n" .
			"V prípade otázok nás kontaktujte.\n\n" .
			"S pozdravom\n" .
			"Altavia Factory";


		wp_mail(
			$email,
			$customerSubject,
			$customerMessage,
			[],
			$attachments
		);
	}


	/*
	 * RESPONSE
	 */
	wp_send_json_success([
		'message' => 'Objednávka bola úspešne odoslaná.'
	]);
}

function save_order_form_template() {

	$attachments = [];

	// upload súboru
	if (!empty($_FILES['customer_excel']['name'])) {

		require_once(ABSPATH . 'wp-admin/includes/file.php');

		$movefile = wp_handle_upload(
			$_FILES['customer_excel'],
			['test_form' => false]
		);

		if (!isset($movefile['error'])) {
			$attachments[] = $movefile['file'];
		}
	}

	// ADMIN EMAIL
	$to = 'porez@altaviafactory.sk';
	$subject = 'Nová objednávka zo šablóny';
	$message = 'Prišla nová objednávka vytvorená zo šablóny Excel.';

	$sent = wp_mail($to, $subject, $message, [], $attachments);

	if (!$sent) {
		wp_send_json_error([
			'message' => 'Email sa nepodarilo odoslať'
		]);
	}

	// RESPONSE
	wp_send_json_success([
		'message' => 'Šablóna odoslaná'
	]);
}

add_action('wp_ajax_save_order_form', 'save_order_form');
add_action('wp_ajax_nopriv_save_order_form', 'save_order_form');

add_action('wp_ajax_save_order_form_template', 'save_order_form_template');
add_action('wp_ajax_nopriv_save_order_form_template', 'save_order_form_template');
