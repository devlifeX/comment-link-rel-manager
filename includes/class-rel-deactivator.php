<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://devlife.ir
 * @since      1.0.0
 *
 * @package    Rel
 * @subpackage Rel/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Rel
 * @subpackage Rel/includes
 * @author     Dariush <dariush.vesal@gmail.com>
 */
class Rel_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
    $rel = new Rel();
    $admin_rel = new Rel_Admin($rel->get_plugin_name(), $rel->get_version());
    $admin_rel->deregister_capabilities();
    delete_option( $admin_rel->rel_option );
	}

}
