<?php
/**
 * Theme updater 
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	require get_template_directory() . '/inc/updater/theme-updater-admin.php';
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://themepalace.com', // Site where EDD is hosted
		'item_name'      => 'Selfgraphy Pro', // Name of theme
		'theme_slug'     => 'selfgraphy-pro', // Theme slug
		'version'        => '1.0.1', // The current version of this theme
		'author'         => 'Theme Palace', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'https://themepalace.com/my-account' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'selfgraphy-pro' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'selfgraphy-pro' ),
		'license-key'               => __( 'License Key', 'selfgraphy-pro' ),
		'license-action'            => __( 'License Action', 'selfgraphy-pro' ),
		'deactivate-license'        => __( 'Deactivate License', 'selfgraphy-pro' ),
		'activate-license'          => __( 'Activate License', 'selfgraphy-pro' ),
		'status-unknown'            => __( 'License status is unknown.', 'selfgraphy-pro' ),
		'renew'                     => __( 'Renew?', 'selfgraphy-pro' ),
		'unlimited'                 => __( 'unlimited', 'selfgraphy-pro' ),
		'license-key-is-active'     => __( 'License key is active.', 'selfgraphy-pro' ),
		'expires%s'                 => __( 'Expires %s.', 'selfgraphy-pro' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'selfgraphy-pro' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'selfgraphy-pro' ),
		'license-key-expired'       => __( 'License key has expired.', 'selfgraphy-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'selfgraphy-pro' ),
		'license-is-inactive'       => __( 'License is inactive.', 'selfgraphy-pro' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'selfgraphy-pro' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'selfgraphy-pro' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'selfgraphy-pro' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'selfgraphy-pro' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'selfgraphy-pro' )
	)

);
