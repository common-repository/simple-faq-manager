<?php

if( ! defined( 'ABSPATH' ) ){
    exit;
}

/**
 * Simple FAQ Shortcode
 */

Class Simple_FAQ_Shortcode{

    /*
        Init
    */
    public static function init(){

        //add hooks
        self::add_hooks();
        
        //add topic query var
        add_filter( 'query_vars', array( __CLASS__, 'add_query_var' ) );

        //add the shortcode
        add_shortcode( 'simple-faq', array( __CLASS__, 'display_faq' ) );

    }

    /*
        Add Hooks
    */
    private static function add_hooks(){

        //Admin Notice
        add_action( 'admin_notices', array( __CLASS__, 'shortcode_notice') );

    }

    /*
        Add Query Var
    */
    public static function add_query_var( $vars ){
        $vars[] = 'faq-topic';
        return $vars;
    }

    /*
        Add shortcode notice
    */
    public static function shortcode_notice(){
        $screen = get_current_screen();
        if( 'simple-faq' == $screen->post_type ){
            include_once Simple_FAQ::$plugin_path . '/views/shortcode-notice.php';
        }
    }

    /*
        Display the FAQ
    */
    public static function display_faq( $atts ){

        $topics = get_terms( 'topics', [
            'hide_empty' => true,
            'orderby' => 'id',
            'order' => 'ASC'
        ] );
        $topic_selected = get_query_var( 'faq-topic' );
        if( empty( $topic_selected ) ){
            $topic_selected = $topics[0]->term_id;
        } 

        $args = [
            'post_type' => 'simple-faq',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC'
        ];
        $args['tax_query'] = [
            [
                'taxonomy' => 'topics',
                'terms' => (int)$topic_selected
            ]
        ];
        $topic_selected = get_term( (int)$topic_selected, 'topics' );

        $questions = new WP_Query( $args );

        ob_start();
            include_once Simple_FAQ::$plugin_path . '/views/faq.php';
        return ob_get_clean();

    }

}
Simple_FAQ_Shortcode::init();