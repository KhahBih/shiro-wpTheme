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
        <?php if(is_single()) : ?>
            <h1><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                <?php the_title(); ?>
            </a></h1>
        <?php else : ?>
             <h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                <?php the_title(); ?>
            </a></h2>
        <?php endif; ?>
    <?php
    }
};

if(!function_exists('shiro_entry_meta')){
    function shiro_entry_meta(){ ?>
        <?php if( !is_page()) : ?>
            <div class="entry-meta">
                <?php 
                    printf( __('<span class="author">Posted by %1$s ', 'shiro'), get_the_author());
                    printf( __('<span class="date-published"></br>At %1$s ', 'shiro'), get_the_date());
                    printf( __('<span class="category"></br>Thể loại: %1$s</br>', 'shiro'), get_the_category_list(', '));

                    if( comments_open()) : 
                        echo '<span class="meta-reply">';
                            comments_popup_link(__('leave a comment', 'shiro'),
                            __('One comment', 'shiro'),
                            __('% comment', 'shiro'),
                            __('Read all comments', 'shiro'));
                        echo '</span>';
                    endif;
                ?>
            </div>
        <?php endif; ?>
    <?php }
};

if(!function_exists('shiro_entry_content')){
    function shiro_entry_content(){ 
        if(!is_single()){
            the_excerpt();
        }else{
            the_content();
        }
        // Phân trang trong single
        $link_pages = [
            'before' => __('<p>Page: ','shiro'),
            'after' => '</p>',
            'nextpagelink' => __('Next page', 'shiro'),
            'previouspagelink' => __('Previous page', 'shiro')
        ];
        wp_link_pages($link_pages);
    }
};

function shiro_readmore(){
    return '<a class="read-more" href="'. get_permalink( get_the_ID()). '" >'. __('[ Xem thêm ]', 'shiro') . '</a>';
};
add_filter('excerpt_more', 'shiro_readmore');

// Hiển thị tag
if(!function_exists('shiro_entry_tag')){
    function shiro_entry_tag(){ 
        if(has_tag()){
            echo '<div class="entry-tag">';
            printf(__('Tagged in %1$s', 'shiro'), get_the_tag_list('', ','));
            echo '</div>';
        }
    }
};