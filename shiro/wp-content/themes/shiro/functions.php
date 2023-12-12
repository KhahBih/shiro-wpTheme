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
        $default_background = array('default_color' => '#e8e8e8');
        add_theme_support( 'custom-background', $default_background);

        // Thêm menu
        register_nav_menu('primary-menu', __('Primary Menu', 'shiro'));

        // Tạo sidebar
        $sidebar = [
            'name' => __('Main Sidebar', 'shiro'),
            'id' => 'main-sidebar',
            'desciption' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',

        ];
        register_sidebar($sidebar);
    };
    add_action('init', 'shiro_theme_setup');
};

// Template function
if(!function_exists('shiro_header')){
    function shiro_header(){ ?>
        <div class="site-name">
            <?php
                if(is_home()){
                    printf('<h1><a href="%1$s" title="%2$s"></a>%3$s</h1>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename'));
                }else{
                    printf('<p><a href="%1$s" title="%2$s"></a>%3$s</p>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename'));
                }
            ?>
        </div><?php
        ?> <div class="site-decription"><?php get_bloginfo('description'); ?></div>  <?php
    }
}

// Hàm tạo phân trang
if(!function_exists('shiro_pagination')){
    function shiro_pagination(){ 
        if($GLOBALS['wp_query'] -> max_num_pages < 2){
            return '';
        } ?>
        <nav class="pagination" role="navigation">
            <?php if(get_next_posts_link()) : ?>
                <div class="prev">
                    <?php next_posts_link( __('Older post', 'shiro')); ?>
                </div>
            <?php endif; ?>
            <?php if(get_previous_posts_link()) : ?>
                <div class="next"><?php previous_posts_link( __('Newest post', 'shiro')); ?></div>
            <?php endif; ?>
        </nav>
    <?php }
}

// Tạo shiro_thumbnail
if(!function_exists('shiro_thumbnail')){
    function shiro_thumbnail($size){ 
        if(!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')){
            ?> 
                <figure class="post-thumbnail"><?php the_post_thumbnail($size); ?></figure>
            <?php
        }
    }
}

if(!function_exists('shiro_entry_header')){
    function shiro_entry_header(){ ?>
        <?php if(is_single()){
            
        }
    <?php }
}
?>