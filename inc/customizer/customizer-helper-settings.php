<?php
/**
 * Example implementation of the 'Customizer Helper'.
 *
 * @link       https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package    customizer-helper
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version    1.0.0
 */

/**
 * Load the helper class.
 */
if ( file_exists( dirname( __FILE__ ) . '/class-customizer-helper.php' ) ) {
	require_once dirname( __FILE__ ) . '/class-customizer-helper.php';
}

/**
 * Defines customizer settings
 */
function customizer_helper_settings() {

	// Stores all the panels to be added.
	$panels = array();

	// Stores all the sections to be added.
	$sections = array();

	// Stores all the settings that will be added.
	$settings = array();

	$section = 'header_image';

	$settings['header-background-height'] = array(
		'id'       => 'header-background-height',
		'label'    => esc_html__( 'Header Height (px)', 'res-lemma' ),
		'section'  => $section,
		'type'     => 'number',
		'priority' => 1,
		'default'  => '',
	);

	$settings['header-background-repeat'] = array(
		'id'       => 'header-background-repeat',
		'label'    => esc_html__( 'Header Background Repeat', 'res-lemma' ),
		'section'  => $section,
		'type'     => 'radio',
		'priority' => 12,
		'choices'  => array(
			'no-repeat' => esc_html__( 'No Repeat', 'res-lemma' ),
			'repeat'    => esc_html__( 'Tile', 'res-lemma' ),
			'repeat-x'  => esc_html__( 'Tile Horizontally', 'res-lemma' ),
			'repeat-y'  => esc_html__( 'Tile Vertically', 'res-lemma' ),
		),
		'default'  => 'no-repeat',
	);

	$settings['header-background-size'] = array(
		'id'       => 'header-background-size',
		'label'    => esc_html__( 'Header Background Size', 'res-lemma' ),
		'section'  => $section,
		'type'     => 'radio',
		'priority' => 12,
		'choices'  => array(
			'initial' => esc_html__( 'Normal', 'res-lemma' ),
			'cover'   => esc_html__( 'Cover', 'res-lemma' ),
			'contain' => esc_html__( 'Contain', 'res-lemma' ),
		),
		'default'  => 'initial',
	);

	$settings['header-background-position'] = array(
		'id'       => 'header-background-position',
		'label'    => esc_html__( 'Header Background Position', 'res-lemma' ),
		'section'  => $section,
		'type'     => 'select',
		'priority' => 13,
		'choices'  => array(
			'left'   => esc_html__( 'Left', 'res-lemma' ),
			'center' => esc_html__( 'Center', 'res-lemma' ),
			'right'  => esc_html__( 'Right', 'res-lemma' ),
		),
		'default'  => 'center',
	);

	$settings['header-background-attachment'] = array(
		'id'       => 'header-background-attachment',
		'label'    => esc_html__( 'Scroll with Page', 'res-lemma' ),
		'section'  => $section,
		'type'     => 'checkbox',
		'priority' => 14,
	);

	// Adds the panels to the $settings array.
	$settings['panels'] = $panels;

	// Adds the sections to the $settings array.
	$settings['sections'] = $sections;

	$customizer_helper = Customizer_Helper::Instance();
	$customizer_helper->add_settings( $settings );

}
add_action( 'init', 'customizer_helper_settings' );
