<?php

/**
 * Fired during plugin activation
 *
 * @link       http://devlife.ir
 * @since      1.0.0
 *
 * @package    Rel
 * @subpackage Rel/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Rel
 * @subpackage Rel/includes
 * @author     Dariush <dariush.vesal@gmail.com>
 */
class Rel_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
    $rel = new Rel();
    $admin_rel = new Rel_Admin($rel->get_plugin_name(), $rel->get_version());
    $admin_rel->register_capabilities();

    $allow_roles = array(
      'administrator',
      'editor',
      'author',
      'contributor'
      );
    $admin_rel->handle_allow_roles($allow_roles);
  }

}
