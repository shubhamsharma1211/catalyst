<?php
/**
 * Embedded listing.
 *
 * @var Opt_In $this
 *
 * @package Hustle
 * @since 4.0.0
 */

$module_type         = Hustle_Module_Model::EMBEDDED_MODULE;
$multiple_charts     = Hustle_Module_Model::get_embedded_types( true );
$capitalize_singular = Opt_In_Utils::get_module_type_display_name( $module_type, false, true );
$capitalize_plural   = Opt_In_Utils::get_module_type_display_name( $module_type, true, true );
$smallcaps_singular  = Opt_In_Utils::get_module_type_display_name( $module_type );
$smallcaps_plural    = Opt_In_Utils::get_module_type_display_name( $module_type, true, false );

$this->render(
	'admin/commons/sui-listing/listing',
	array(
		'page_title'          => $capitalize_plural,
		'page_message'        => esc_html__( 'Embeds allow you to insert promotions or newsletter signups directly into your content automatically or with shortcodes.', 'hustle' ),
		'total'               => $total,
		'active'              => $active,
		'modules'             => $modules,
		'module_type'         => $module_type,
		'is_free'             => $is_free,
		'capability'          => $capability,
		'capitalize_singular' => $capitalize_singular,
		'capitalize_plural'   => $capitalize_plural,
		'smallcaps_singular'  => $smallcaps_singular,
		'multiple_charts'     => $multiple_charts,
		'message'             => $message,
		'entries_per_page'    => $entries_per_page,
		'sui'                 => $sui,
	)
);