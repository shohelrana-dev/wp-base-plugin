<?php


namespace BasePLugin\Admin;

/**
 * The menu handler Class
 * @package BasePLugin\Admin
 */
class Menu {
	/**
	 * Menu constructor.
	 */
	public function __construct () {
		add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
	}

	/**
	 * Add necessary menu
	 * @return void
	 */
	public function add_admin_menu () {
		$parent_slug = 'baseplugin';
		$capability  = 'manage_options';
		add_menu_page(
			__( 'Base Plugin Page', BASEPLUGIN_TEXT_DOMAIN ),
			__( 'Base Plugin Page', BASEPLUGIN_TEXT_DOMAIN ),
			$capability,
			$parent_slug,
			[ $this, 'plugin_page' ],
			'dashicons-admin-generic'
		);

		add_submenu_page(
			$parent_slug,
			__( 'Plugin Page', BASEPLUGIN_TEXT_DOMAIN ),
			__( 'Plugin Page', BASEPLUGIN_TEXT_DOMAIN ),
			$capability,
			$parent_slug,
			[ $this, 'plugin_page' ]
		);

		add_submenu_page(
			$parent_slug,
			__( 'Settings', BASEPLUGIN_TEXT_DOMAIN ),
			__( 'Settings', BASEPLUGIN_TEXT_DOMAIN ),
			$capability,
			'settings',
			[ $this, 'settings_page' ]
		);
	}

	/**
	 * display plugin page page
	 * @return void
	 */
	public function plugin_page () {
		echo 'plugin page';
	}

	/**
	 * display settings page
	 * @return void
	 */
	public function settings_page () {
		echo 'settings page';
	}
}