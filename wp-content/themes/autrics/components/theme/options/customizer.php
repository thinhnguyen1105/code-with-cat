<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: autrics_section_{section name}
 */
$options = [
	'autrics_section_theme_settings' => [
		'title'				 => esc_html__( 'Theme settings', 'autrics' ),
		'options'			 => Autrics_Theme_Includes::_customizer_options(),
		'wp-customizer-args' => [
			'priority' => 3,
		],
	],
];
