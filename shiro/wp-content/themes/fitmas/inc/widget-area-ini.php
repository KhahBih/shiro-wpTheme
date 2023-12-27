<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fitmas_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'fitmas' ),
            'id'            => 'sidebar',
            'description'   => esc_html__( 'Add widgets here.', 'fitmas' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        ),
    );

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Shop Sidebar', 'fitmas' ),
                'id'            => 'fitmas-shop',
                'description'   => esc_html__( 'Add widgets here.', 'fitmas' ),
                'before_widget' => '<div id="%1$s" class="woo-widgets widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget_title">',
                'after_title'   => '</h3>',
            ),
        );
    }

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'fitmas' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'fitmas' ),
            'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        ),
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'fitmas' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'fitmas' ),
            'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        ),
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'fitmas' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'fitmas' ),
            'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        ),
    );
    
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'fitmas' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here.', 'fitmas' ),
            'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        )
    );

}
add_action( 'widgets_init', 'fitmas_widgets_init' );
?>