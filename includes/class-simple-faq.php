<?php

if( ! defined( 'ABSPATH' ) ){
    exit;
}

/**
 * FAQ Base Class
 */

Class Simple_FAQ{

    public static $version = '1.0';
    public static $plugin_url;
    public static $plugin_path;

    /*
        Start up the plugin
    */
    public static function init(){

        self::$plugin_url   = plugin_dir_url( SIMPLE_FAQ_BASE_FILE );
        self::$plugin_path  = plugin_dir_path( SIMPLE_FAQ_BASE_FILE );

        // Load all plugin base files
        self::include_all( self::$plugin_path . 'includes' );

        //Load assets
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_assets') );

    }

    /*
        Include Required Core Files
    */
    private static function include_all( $dir ){
    
        // Load the FAQ post type
        require_once self::$plugin_path . 'includes/class-faq-post-type.php';

        // Add the shortcode
        require_once self::$plugin_path . 'includes/class-simple-faq-shortcode.php';

    }

    /*
        Load Plugin Assets
    */
    public static function load_assets(){

        wp_enqueue_script( 'simple_faq', self::$plugin_url . '/assets/js/simple_faq.js', array( 'jquery' ), self::$version );

        wp_enqueue_style( 'simple_faq', self::$plugin_url . '/assets/styles/simple_faq.css', array(), self::$version );

    }

}
Simple_FAQ::init();