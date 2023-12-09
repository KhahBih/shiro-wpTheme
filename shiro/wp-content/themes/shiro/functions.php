<?php
define('THEME_URL', get_stylesheet_directory());
define("CORE", THEME_URL . "/core");
require_once(CORE . "/init.php");

if( !isset($content_width)){
    $content_width = 620;
}

if( !function_exists('shiro_theme_setup')){
    function shiro_theme_setup(){
        // Thiết lập text domain
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('shiro', $language_folder);

        // Tự động thêm RSS lên <head>
        add_theme_support('automatic-feed-links');

        // Thêm post thumnails
        add_theme_support( 'post-thumbnails');

        // Post format
        add_theme_support( 'post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));

        // Them tilte tag
        add_theme_support( 'title-tag');

        // Thêm custom background
        add_theme_support( 'custom-background');

        // Thêm menu
        
    };
    add_action('init', 'shiro_theme_setup');
};
?>