<?php

if( ! defined( 'ABSPATH' ) ){
    exit;
}

/**
 * FAQ Base Class
 */

Class Simple_FAQ_Post_Type{

    /*
        Init
    */
    public static function init(){

        //Register the Topic Taxononmy
        self::register_topic_taxonomy();

        //Register the Post Type
        self::register_post_type();

    }

    /*
        Register Topic Taxonomy
    */
    private static function register_topic_taxonomy(){
        register_taxonomy(
            'topics',
            'simple-faq',
            array(
                'hierarchical' => false,
                'labels' => [
                    'name' => 'Topics',
                    'singular_name' => 'Topic',
                    'add_new' => 'Add Topic',
                    'add_new_item' => 'Add New Topic',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Topic',
                    'new_item' => 'New Topic',
                    'view' => 'View Topic',
                    'view_item' => 'View Topic',
                    'search_items' => 'Search Topics',
                    'not_found' => 'No Topics found',
                    'not_found_in_trash' => 'No Accordions found in Trash'
                ],
                'query_var' => true
            )
        );
    }

    /*
        Register Questions Post Type
    */
    private static function register_post_type(){
        register_post_type('simple-faq',
            array(
            'labels' => array(
                'name' => 'FAQ',
                'singular_name' => 'Question',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Question',
                'edit' => 'Edit',
                'edit_item' => 'Edit Question',
                'new_item' => 'New Question',
                'view' => 'View Question',
                'view_item' => 'View Question',
                'search_items' => 'Search Questions',
                'not_found' => 'No Questions found',
                'not_found_in_trash' => 'No Accordions found in Trash'
            ),
            'public' => false,
            'hierarchical' => false,
            'has_archive' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => false,
            'menu_icon' => 'dashicons-book-alt',
            'supports' => array(
                'title',
                'editor'
            ),
            'can_export' => true,
            'taxonomies' => array(
                'topics'
            )
        ));
    }

}
add_action( 'init', array( 'Simple_FAQ_Post_Type', 'init' ) );