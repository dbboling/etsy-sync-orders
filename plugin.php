<?php

/*
Plugin Name: Etsy Order Sync
Plugin URI: https://example.com/etsy-order-sync/
Description: This plugin syncs Etsy orders with WooCommerce.
Version: 0.0.2
Author: Darrien Boling
Author URI: https://dboling.com/
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The main plugin file.
 */
class Etsy_Order_Sync {

    /**
     * The plugin name.
     *
     * @var string
     */
    public static $plugin_name = 'Etsy Order Sync';

    /**
     * The plugin version.
     *
     * @var string
     */
    public static $plugin_version = '0.0.2';

    /**
     * The plugin author.
     *
     * @var string
     */
    public static $plugin_author = 'Darrien Boling';

    /**
     * The plugin author URI.
     *
     * @var string
     */
    public static $plugin_author_uri = 'https://dboling.com/';

    /**
     * The plugin init hook.
     */
    public static function init() {
        // Load the plugin functions.
        require_once plugin_dir_path( __FILE__ ) . 'functions.php';
    }
}

add_action( 'plugins_loaded', [ Etsy_Order_Sync::class, 'init' ] );
