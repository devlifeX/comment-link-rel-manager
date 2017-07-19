<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://devlife.ir
 * @since      1.0.0
 *
 * @package    Rel
 * @subpackage Rel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rel
 * @subpackage Rel/admin
 * @author     Dariush <dariush.vesal@gmail.com>
 */
class Rel_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	public $rel_option = 'rel_allow_roles';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rel-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rel-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the settings page
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menu() {
		add_menu_page( 'Rel', __('Rel', 'rel'), 'rel-manager', 'rel', array($this, 'create_admin_interface'), 'dashicons-admin-tools', 57);
	}

	/**
	 * Callback function for the admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function create_admin_interface(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/rel-admin-display.php';
	}

	/**
	 * Register the capabilities for this plugin 
	 * This fucntion call in activator
	 * $all_capabilities contain all your capabilites you want in this plugin.  
	 */
	public function register_capabilities() {
		$all_capabilities = array('rel-manager');
		foreach ($all_capabilities as $key_cap => $capability) {
			$roles = get_editable_roles();
			foreach ($GLOBALS['wp_roles']->role_objects as $key => $role) {
				if (isset($roles[$key]) && is_admin()) {
					$role->add_cap($capability);
				}
			}
		}
	}

	/**
	 * Deregister the capabilities for this plugin
	 * This fucntion call in deactivator
	 */
	public function deregister_capabilities() {
		$all_capabilities = array('rel-manager');
		foreach ($all_capabilities as $key_cap => $capability) {
			$roles = get_editable_roles();
			foreach ($GLOBALS['wp_roles']->role_objects as $key => $role) {
				if (isset($roles[$key]) && is_admin() && $role->has_cap($capability)) {
					$role->remove_cap($capability);
				}
			}
		}
	}

	/**
	 * this function handle selected roles for action
	 * @return void 
	 */
	public function rel_handler() {
		if (isset($_POST['roles'])) {
			$this->handle_allow_roles($_POST['roles']);
		}
	}

	public function handle_allow_roles($roles) {
		$rel_allow_roles = get_option($this->rel_option);
		if(empty($rel_allow_roles)) {
			add_option($this->rel_option, serialize($roles));
		} else {
			update_option($this->rel_option, serialize($roles));
		}
	}

}
