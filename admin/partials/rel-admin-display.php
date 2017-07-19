<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://devlife.ir
 * @since      1.0.0
 *
 * @package    Rel
 * @subpackage Rel/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! current_user_can('rel-manager') ) die;

$rel = new Rel();
$rel_admin = new Rel_Admin($rel->get_plugin_name(), $rel->get_version());
$rel_admin->rel_handler();

//rel_allow_roles
$rar = unserialize(get_option($rel_admin->rel_option));
?>

<div id="rel-wrap" class="wrap postbox">
<div class="inside">
  

  <h1><?php _e("Rel manager", "rel") ?></h1>
  <h4>
    WordPress 1.5 and above automatically assigns the nofollow attribute to all user-submitted links 
    (comment data, commenter URI, etc).
    this plugin can manage nofollow,
     Simply you can check your role and nofollow become follow
     <a href="https://codex.wordpress.org/Nofollow" target="_blank"> <?php _e("More information", "rel") ?></a>
  </h4>
  <p>
    <?php _e("Attribute", "rel") ?>
    <code>rel='nofollow'</code>
    <?php _e("become", "rel") ?>
     <code>rel='follow'</code>
    <?php _e("just select your roles.", "rel") ?>
  </p>

  <hr>

  <form method="post">

    <ul>
      <?php foreach (get_editable_roles() as $role_name => $role_info): ?>
        <li>
          <input type="checkbox" name="roles[]" <?php echo in_array($role_name, $rar) === true ? 'checked' : '' ?> value="<?php echo $role_name ?>" id="<?php echo $role_name ?>">
          <label for="<?php echo $role_name ?>"><?php _e($role_name); ?></label>
        </li>
      <?php endforeach; ?>
    </ul>

    <hr>

    <input type="submit" name="submit_rel" class="button-primary" value=" <?php _e("Save", "rel") ?>">
  </form>

  </div><!-- inside -->
</div><!-- rel-wrap -->
