<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------

if ( class_exists( 'AutricsCustomPost\Autrics_CustomPost' ) ) {

	//service 

	$service = new AutricsCustomPost\Autrics_CustomPost( 'autrics' );
	$service->xs_init( 'ts_service', 'Service', 'Services', array( 'menu_icon'	 => 'dashicons-hammer',
		'supports'	 => array( 'title','editor','thumbnail','excerpt'),
		'rewrite'	 => array( 'slug' => 'service' ) ) );
		
	$service_tax = new  AutricsCustomPost\Autrics_Taxonomies('autrics');
	$service_tax->xs_init('ts_service_cat', 'Service Category', 'Service Categories', 'ts_service');


}