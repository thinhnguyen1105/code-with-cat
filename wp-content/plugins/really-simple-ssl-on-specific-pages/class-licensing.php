<?php

update_option( 'rsssl_pp_license_notice_dismissed',true );
update_option( 'rsssl_per_page_license_status' ,'valid');
update_option( 'rsssl_per_page_license_key','hotrowordpressdotcom' );

defined('ABSPATH') or die("you do not have access to this page!");
if (!defined('REALLY_SIMPLE_SSL_URL')) define( 'REALLY_SIMPLE_SSL_URL', 'https://www.really-simple-ssl.com'); // you should use your own CONSTANT name, and be sure to replace it throughout this file
define( 'REALLY_SIMPLE_SSL_PER_PAGE', 'Really Simple SSL per page' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	// load our custom updater
	include( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
}

if (!class_exists("rssslpp_licensing")) {
class rssslpp_licensing {
private static $_this;

function __construct() {
	if ( isset( self::$_this ) )
			wp_die( sprintf( __( '%s is a singleton class and you cannot create a second instance.','really-simple-ssl' ), get_class( $this ) ) );

    $this->product_name = 'Really Simple SSL per page';
    $this->website = 'https://really-simple-ssl.com';
    $this->author = 'RogierLankhorst';

	self::$_this = $this;
	add_action( 'admin_init', array($this, 'plugin_updater'), 0 );
	add_action('admin_init', array($this, 'register_option'));
	add_action('admin_init', array($this, 'deactivate_license'));
	add_action('admin_init', array($this, 'activate_license'));
	add_action('wp_ajax_rsssl_pp_dismiss_license_notice', array($this,'dismiss_license_notice') );
		add_action("admin_notices", array($this, 'show_notice_license'));
}

static function this() {
	return self::$_this;
}

    /**
     * Show a license notice
     *
     * @since 2.0
     *
     */

public function show_notice_license(){
    //prevent showing the review on edit screen, as gutenberg removes the class which makes it editable.
    $screen = get_current_screen();
    if ( $screen->parent_base === 'edit' ) return;

    add_action('admin_print_footer_scripts', array($this, 'dismiss_license_notice_script'));
    $dismissed	= get_option( 'rsssl_pp_license_notice_dismissed' );
     if (!$this->license_is_valid() && !$dismissed) { ?>
         <?php if (!is_multisite()) {?>
                <div id="message" class="error fade notice is-dismissible rsssl-pp-dismiss-notice">
                <p>
                  <?php echo __("You haven't activated your Really Simple SSL per page license yet. To get all future updates, enter your license on the settings page.","really-simple-ssl-pp");?>
                        <a href="options-general.php?page=rlrsssl_really_simple_ssl&tab=license"><?php echo __("Go to the settings page","really-simple-ssl-pp");?></a>
                        or <a target="blank" href="https://www.really-simple-ssl.com/premium">purchase a license</a>
                    </p>
                </div>
            <?php } ?>
<?php
	}
}

/**
 * Process the ajax dismissal of the success message.
 *
 * @since  2.0
 *
 * @access public
 *
 */

public function dismiss_license_notice() {
	check_ajax_referer( 'rsssl-pp-dismiss-license-notice', 'nonce' );
	update_option( 'rsssl_pp_license_notice_dismissed', true);
	wp_die();
}

public function dismiss_license_notice_script() {
  $ajax_nonce = wp_create_nonce( "rsssl-pp-dismiss-license-notice" );
  ?>
  <script type='text/javascript'>
    jQuery(document).ready(function($) {

      $(".rsssl-pp-dismiss-notice.notice.is-dismissible").on("click", ".notice-dismiss", function(event){
            var data = {
              'action': 'rsssl_pp_dismiss_license_notice',
              'nonce': '<?php echo $ajax_nonce; ?>'
            };

            $.post(ajaxurl, data, function(response) {

            });
        });
    });
  </script>
  <?php
}

public function plugin_updater() {
	// retrieve our license key from the DB
	$license_key = trim( get_option( 'rsssl_per_page_license_key' ) );

	// setup the updater
	$edd_updater = new EDD_SL_Plugin_Updater( REALLY_SIMPLE_SSL_URL, dirname(__FILE__)."/really-simple-ssl-on-specific-pages.php", array(
			'version' 	=> rsssl_pp_version, 				// current version number
			'license' 	=> $license_key, 		// license key (used get_option above to retrieve from DB)
			'item_name' => REALLY_SIMPLE_SSL_PER_PAGE, 	// name of this plugin
			'author' 	=> 'Rogier Lankhorst'  // author of this plugin
		)
	);

}

public function add_license_tab($tabs){
	$tabs['license'] = __("License","really-simple-ssl-pp");
	return $tabs;
}

public function add_license_page(){
	$license 	= get_option( 'rsssl_per_page_license_key' );
	$status 	= get_option( 'rsssl_per_page_license_status' );
    $license_data = $this->get_latest_license_data();
	$license_data->license_limit =0;
	$license_data->license = 'active';
	$license_data->expires = strtotime('+1200 days');
	
	


    ?>
		<form method="post" action="options.php">
			<?php wp_nonce_field( 'rsssl_per_page_nonce', 'rsssl_per_page_nonce' ); ?>
			<?php settings_fields('rsssl_per_page_license'); ?>

            <?php
            //expired, revoked, missing, invalid, site_inactive, item_name_mismatch, no_activations_left
            $message = $this->get_error_message($license_data);

            if ($status=='valid' || $license_data->license=='site_inactive') {
                $upgrade = $license_data->license_limit == 1 ? __("a 5 sites or unlimited sites license", "really-simple-ssl-pro") : __("an unlimited sites license", "really-simple-ssl-pro");
                if ($license_data->activations_left < $license_data->license_limit) {
                    $this->rsssl_notice(sprintf(__('You have %d activations left on your license. If you need more activations you can upgrade your current license to %s on your %saccount%s page.', "really-simple-ssl-pro"), $license_data->activations_left, $upgrade, '<a href="https://really-simple-ssl.com/account" target="_blank">', '</a>'), 'warning');
                }
            }

            if ($message) {
                $this->rsssl_notice($message,'warning');
            } elseif ($license_data->license == 'deactivated'){
                if ($status=='valid'){
                    $this->rsssl_notice(__("Your license is valid, but not activated on this site", 'really-simple-ssl-pro'));
                } elseif(!empty($status)) {
                    $this->rsssl_notice(__("Your license does not seem to be valid. Please check your license key", 'really-simple-ssl-pro'));
                }
            } elseif ($status == 'valid') {
                $date = $license_data->expires;
                $date = strtotime($date);
                $date = date(get_option('date_format'), $date);
                $this->rsssl_notice(sprintf(__("Your license is valid, and expires on: %s", 'really-simple-ssl-pro'), $date ));
            } elseif ($license_data->license == 'expired') {
                $link = '<a target="_blank" href="' . $this->website . "/account/" . '">';
                $this->rsssl_notice(sprintf(__("Your license key has expired. Please renew your license key on %syour account page%s", 'really-simple-ssl-pro'), $link, '</a>'), 'warning');
            } elseif ($license_data->license_limit == '0') {
                $this->rsssl_notice(sprintf(__("Your license key cannot be activated because you have no activations left. Check on which site your license is currently activated or upgrade to a 5 site or unlimited license on your %saccount%s page.", "really-simple-ssl-pro"), '<a href="https://really-simple-ssl.com/account" target="_blank">', '</a>'), 'warning');
            }
            else {
                $this->rsssl_notice(__("Enter your license here so you keep receiving updates and support.", 'really-simple-ssl-pro'));
            }

            ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row" valign="top">
							<?php _e('Really Simple SSL per page license Key'); ?>
						</th>
						<td>
							<input id="rsssl_per_page_license_key" name="rsssl_per_page_license_key" type="password" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
							<?php if( false !== $license ) { ?>
										<?php if( $status !== false && $status == 'valid' ) { ?>
											<span style="color:green;"><?php _e('active'); ?></span>
											<input type="submit" class="button-secondary" name="rsssl_license_per_page_deactivate" value="<?php _e('Deactivate License'); ?>"/>
										<?php } else {?>
                                            <input type="submit" class="button-secondary" name="rsssl_per_page_license_key_activate"
                                                   value="<?php _e('Activate License'); ?>"/>
										<?php } ?>
									</td>
								</tr>
							<?php } else {
								?>
								<label class="description" for="rsssl_per_page_license_key"><?php _e('Enter your license key'); ?></label>
								<?php
							}?>
				</tbody>
			</table>

            <input type="submit" name="rsssl_per_page_license_key_activate" id="submit" class="button button-primary" value="<?php _e("Save changes", "really-simple-ssl-pro"); ?>">

        </form>

	<?php
}

public function register_option() {
	// creates our settings in the options table
	register_setting('rsssl_per_page_license', 'rsssl_per_page_license_key', array($this, 'sanitize_license') );
}

public function sanitize_license( $new ) {
	$old = get_option( 'rsssl_per_page_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'rsssl_per_page_license_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}



/************************************
* this illustrates how to activate
* a license key
*************************************/

public function activate_license() {
	// listen for our activate button to be clicked
	if( isset( $_POST['rsssl_per_page_license_key_activate'] ) && !isset($_POST['rsssl_license_per_page_deactivate'])) {

		// run a quick security check
	 	if( ! check_admin_referer( 'rsssl_per_page_nonce', 'rsssl_per_page_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'rsssl_per_page_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'activate_license',
			'license' 	=> $license,
			'item_name' => urlencode( REALLY_SIMPLE_SSL_PER_PAGE ), // the name of our product in EDD
			'url'       => home_url()
		);
		// Call the custom API.
		$response = 200;

		// make sure the response came back okay
		
		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		$license_data->license_limit =0;
		$license_data->license = 'active';
		$license_data->expires = strtotime('+1200 days');

		// $license_data->license will be either "valid" or "invalid"
		update_option( 'rsssl_per_page_license_status', $license_data->license );

	}
}


/***********************************************
* Illustrates how to deactivate a license key.
* This will descrease the site count
***********************************************/

public function deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['rsssl_license_per_page_deactivate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'rsssl_per_page_nonce', 'rsssl_per_page_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'rsssl_per_page_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'deactivate_license',
			'license' 	=> $license,
			'item_name' => urlencode( REALLY_SIMPLE_SSL_PER_PAGE ), // the name of our product in EDD
			'url'       => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( REALLY_SIMPLE_SSL_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' )
			delete_option( 'rsssl_per_page_license_status' );
			delete_option('rsssl_pp_license_notice_dismissed');

	}
}

    /**
     * @return array|bool|mixed|object
     *
     * Get the latest license data
     *
     * @since 2.0
     *
     */

    public function get_latest_license_data()
    {

        $license_data = false;
        // retrieve the license from the database
        $license = get_option('rsssl_per_page_license_key');

        // data to send in our API request
        $api_params = array(
            'edd_action' => 'check_license',
            'license' => $license,
            'item_name' => urlencode($this->product_name), // the name of our product in EDD
            'url' => home_url()
        );

        // Call the custom API.
        $args = array('timeout' => 15, 'sslverify' => false, 'body' => $api_params);
        $args = apply_filters('rsssl_license_verification_args', $args);

        $response = 200;

        // make sure the response came back okay
       
            $license_data = json_decode(wp_remote_retrieve_body($response));
			$license_data->license_limit =0;
			$license_data->license = 'active';
			$license_data->expires = strtotime('+1200 days');
			
			
           
                $date = $license_data->expires;
                $date = strtotime($date);
                $date = date(get_option('date_format'), $date);
                update_option('rsssl_per_page_license_expires', $date);
                set_transient('rsssl_per_page_license_status', $license_data->license, YEAR_IN_SECONDS);
                // $license_data->license will be either "deactivated" or "failed"
                if ($license_data->license == 'deactivated') {
                    delete_transient('rsssl_per_page_license_status');
                }
            
        

        return $license_data;
    }

    /**
     * @param $license_data
     * @return bool|string|void
     *
     * Get error messages
     *
     * Since 2.0
     *
     */

    public function get_error_message($license_data){
        $link = '<a target="_blank" href="' . $this->website . '">';
        $support_link = '<a target="_blank" href="https://really-simple-ssl.com/support">';
        $account_link = '<a target="_blank" href="https://really-simple-ssl.com/account">';
        $message = false;
        if ($license_data && $license_data->license =='invalid'){
            $message  = sprintf(__("This is not a valid license key. You can find your license key in your %saccount page%s or the purchase confirmation e-mail.", 'really-simple-ssl-pro'), $account_link , '</a>');
        } elseif ($license_data && ( false === $license_data->success )) {
            switch ($license_data->error) {
                case 'revoked':
                    $message = sprintf(__("Your license has been revoked. Please contact %ssupport%s", 'really-simple-ssl-pro'), $support_link, '</a>');
                    break;
                case 'missing':
                    $message = sprintf(__("Your license could not be found in the database. Please contact %ssupport%s", 'really-simple-ssl-pro'), $support_link, '</a>');
                    break;
                case 'invalid':
                case 'site_inactive':
                    $message = __("Your license has not yet been activated for this domain.", 'really-simple-ssl-pro');
                    break;
                case 'item_name_mismatch':
                    $message = __("Your license key appears to be invalid.", 'really-simple-ssl-pro');
                    break;
                case 'no_activations_left':
                    $message = sprintf(__("You have no activations left on your license. Please upgrade your license at %really-simple-ssl.com%s", 'really-simple-ssl-pro'), $link, '</a>');
                    break;
            }

        } elseif ($license_data && ( true === $license_data->success )) {
            switch ($license_data->license) {
                case 'inactive':
                    $message = __("Your license is valid, but has not yet been activated for this domain.", 'really-simple-ssl-pro');
                    break;
            }


        }elseif (!$license_data) {
            $message  = __("license data error", 'really-simple-ssl-pro');
        }

        return $message;
    }

    /**
     * @param $msg
     * @param string $type
     * @param bool $hide
     * @param bool $echo
     * @return string|void
     *
     * Generate an error message
     *
     * @since 2.0
     *
     */

    public function rsssl_notice($msg, $type='rsssl_notice_license', $hide = false, $echo=true)
    {

        if ($msg == '') return;

        $hide_class = $hide ? "rsssl-hide" : "";
        $html = '<div class="rsssl_notice_license '.$type.' ' . $hide_class . '">' . $msg . '</div>';
        if ($echo) {
            echo $html;
        } else {
            return $html;
        }
    }

    /**
     * @return bool
     *
     * Check if license is valid
     *
     * @since 2.0
     *
     */

public function license_is_valid() {

	$status	= get_option( 'rsssl_per_page_license_status' );
	if ($status && $status=="valid") return true;

	return false;

}
}} //class closure
