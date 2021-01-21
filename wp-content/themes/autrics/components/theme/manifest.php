<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

$manifest = array();

$manifest[ 'name' ]			 = esc_html__( 'Autrics', 'autrics' );
$manifest[ 'uri' ]			 = esc_url( 'http://themeforest.com/user/tripples' );
$manifest[ 'description' ]	 = esc_html__( 'Service WordPress Theme', 'autrics' );
$manifest[ 'version' ]		 = '1.0';
$manifest[ 'author' ]			 = 'Tripples';
$manifest[ 'author_uri' ]		 = esc_url( 'http://themeforest.com/user/tripples' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => AUTRICS_MINWP_VERSION,
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
);


?>
