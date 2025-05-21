<?php
/**
 * Plugin Name: SCM User Management
 * Description: User access and settings functionality.
 * Version: 1.0.1
 * Author: Screechy Cat Media
 * Author URI: https://screechycatmedia.com
 * GitHub Plugin URI: 3JsandaK/scm-user-management-engine
 * GitHub Branch: main
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path(__FILE__) . 'includes/class-scm-um-shortcodes.php';

function scm_um_register_shortcodes() {
    $shortcodes = new SCM_UM_Shortcodes();
    add_shortcode('scm_login', [$shortcodes, 'login_form']);
    add_shortcode('scm_register', [$shortcodes, 'registration_form']);
    add_shortcode('scm_account', [$shortcodes, 'account_page']);
    add_shortcode('scm_settings', [$shortcodes, 'settings_page']);
    add_shortcode('scm_protect', [$shortcodes, 'protected_content']);
}
add_action('init', 'scm_um_register_shortcodes');
