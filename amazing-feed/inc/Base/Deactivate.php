<?php
/**
 * @package  AmazingFeed
 */

namespace Inc\Base;

class Deactivate {
	public static function deactivate() {
		flush_rewrite_rules();

		\Inc\Cron\KamaCronPlugin::deactivate( 'af_cron_jobs' );

		$output = get_option( 'amazing_feed_settings' );
		$output[ 'cron' ][ 'status' ] = 'deactivate';
		update_option( 'amazing_feed_settings', $output );
	}
}