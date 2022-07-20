<?php

/**
 * Plugin Name:       Wordpress Author Box
 * Author:            Marcos Henrique
 * Author URI:        https://www.linkedin.com/in/marcos-henrique-dev/
 * Description:       Adicionar informações sobre o Autor do post
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * License:           GPL v2
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpp-author-box
 * Domain Path:       /languages
 */

if (!function_exists('add_action') || !defined('ABSPATH')) {
    wp_die();
}

define( 'PLUGIN_ASSETS_URL', plugins_url('/public/assets', __FILE__) );
define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once __DIR__ . '/vendor/autoload.php';
include_once (ABSPATH . 'wp-includes/pluggable.php');

WppAuthorBox\App::getInstance();