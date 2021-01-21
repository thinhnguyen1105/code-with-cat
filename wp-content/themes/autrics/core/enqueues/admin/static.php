<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */
wp_enqueue_style( 'icofont', AUTRICS_CSS . '/icofont.css', null, AUTRICS_VERSION );
wp_enqueue_style('autrics-admin', AUTRICS_CSS . '/autrics-admin.css', null, AUTRICS_VERSION);
wp_enqueue_script('autrics-admin', AUTRICS_JS . '/autrics-admin.js', array('jquery'), AUTRICS_VERSION, true);