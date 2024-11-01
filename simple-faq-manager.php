<?php
/**
 * Plugin Name: Simple FAQ Manager
 * Description: Adds an FAQ section to the site that can be displayed with a shortcode
 * Version: 1.0.1
 * Author: Jonathan Boss
 * Author URI: https://simplistics.ca
 */

define( 'SIMPLE_FAQ_BASE_FILE', __FILE__ );

if( ! class_exists( 'Simple_FAQ' ) ){
    require_once 'includes/class-simple-faq.php';
}