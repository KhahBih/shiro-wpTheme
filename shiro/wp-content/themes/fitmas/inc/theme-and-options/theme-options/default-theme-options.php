<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function fitmas_default_theme_options() {
    return array(
        'fitmas_copyright_text'   => wp_kses(
            __( '&copy; Copyright 2023 fitmas All Rights Reserved', 'fitmas' ),
            array(
                'a'      => array(
                    'href' => array(),
                ),
                'strong' => array(),
                'small'  => array(),
                'span'   => array(),
            )
        ),

        'fitmas_not_found_text'   => wp_kses(
            __( '<h2 class="fw-medium"> Page Not Found</h2><p class="error-content">The page you are looking for is not available or doesn’t belong to this website!</p>', 'fitmas' ),
            array(
                'a' => array(
                    'href' => array(),
                ),
                'strong' => array(),
                'small'  => array(),
                'span'   => array(),
                'p'      => array(),
                'h1'     => array(
					'class' => array(),
				),
                'h2'     => array(
					'class' => array(),
				),
                'h3'     => array(
					'class' => array(),
				),
                'h4'     => array(
					'class' => array(),
				),
                'h5'     => array(
					'class' => array(),
				),
                'h6'     => array(
					'class' => array(),
				),
                '<br/>'  => array(),
            )
        ),
        'fitmas_blog_title'       => esc_html__( 'Blog Standard', 'fitmas' ),
        'fitmas_error_page_title' => esc_html__( 'Page not found.', 'fitmas' ),
    );
}

add_filter( 'csf_welcome_page', '__return_false' );