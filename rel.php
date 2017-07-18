<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://devlife.ir
 * @since             1.0.0
 * @package           Rel
 *
 * @wordpress-plugin
 * Plugin Name:       rel
 * Plugin URI:        http://devlife.ir
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dariush
 * Author URI:        http://devlife.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rel-activator.php
 */
function activate_rel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rel-activator.php';
	Rel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rel-deactivator.php
 */
function deactivate_rel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rel-deactivator.php';
	Rel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rel' );
register_deactivation_hook( __FILE__, 'deactivate_rel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rel() {

	$plugin = new Rel();
	$plugin->run();

}
run_rel();
