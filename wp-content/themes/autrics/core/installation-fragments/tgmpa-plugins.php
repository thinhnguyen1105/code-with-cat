<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register required plugins
 */

function _action_autrics_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Unyson', 'autrics' ),
			'slug'		 => 'unyson',
			'required'	 => true,
		), 
		array(
			'name'		 => esc_html__( 'Elementor', 'autrics' ),
			'slug'		 => 'elementor',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Autrics Essentials', 'autrics' ),
			'slug'		 => 'autrics-essential',
			'required'	 => true,
			'version'	 => '1.2',
			'source'     => get_template_directory() . '/core/installation-fragments/plugins/autrics-essential.zip', // The plugin source.
      ),	
      array(
			'name'		 => esc_html__( ' MailChimp', 'autrics' ),
			'slug'		 => 'mailchimp-for-wp',
			'required'	 => true,
			
      ),	
      array(
			'name'		 => esc_html__( ' Contact form 7', 'autrics' ),
			'slug'		 => 'contact-form-7',
			'required'	 => true,
			
		),
	);


	$config = array(
		'id'			 => 'autrics', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'autrics-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => true, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', '_action_autrics_register_required_plugins' );