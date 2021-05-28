<?php

namespace BasePLugin;
/**
 * Class Installer
 *
 * @package BasePLugin
 */
class Installer {
	/**
	 * Run the class methods
	 *
	 * @return void
	 */
	public function run () {
		/*$this->add_version();
		$this->create_table();*/
	}

	/**
	 * Add plugin version
	 *
	 * @return void
	 */
	public function add_version () {
		$installed = get_option( 'baseplugin_installed' );
		if ( ! $installed ) {
			update_option( 'baseplugin_installed', time() );
		}
		update_option( 'baseplugin_version', BASEPLUGIN_VERSION );
	}

	/**
	 * Create necessary database table
	 *
	 * @return void
	 */
	public function create_table () {
		global $wpdb;
		$schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}baseplugin` (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`name` varchar(30) NOT NULL,
						`phone` varchar(20) NOT NULL,
						`address` varchar(255) DEFAULT NULL,
						`created_by` bigint(20) NOT NULL,
						`created_at` datetime NOT NULL,
						PRIMARY KEY (`id`)
					) {$wpdb->get_charset_collate()}";

		if ( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . '/wp-admin/includes/upgrade.php';
		}
		dbDelta( $schema );
	}
}