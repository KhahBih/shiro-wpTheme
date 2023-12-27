<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//
// Set a unique slug-like ID
//
$fitmasthemeoption = 'fitmas_theme_option';

//
// Create options
//
CSF::createOptions( $fitmasthemeoption, array(
	'framework_title' => wp_kses(
		sprintf( __( "fitmas Options <small>V %s</small>", 'fitmas' ), $fitmas_theme_data->get( 'Version' ) ),
		array( 'small' => array() )
	),
	'menu_title'      => esc_html__( 'Theme Options', 'fitmas' ),
	'menu_slug'       => 'theme-options',
	'menu_type'       => 'submenu',
	'menu_parent'     => 'themes.php',
	'class'           => 'fitmas-theme-option-wrapper',
	'defaults'        => fitmas_default_theme_options(),
	'footer_credit'   => wp_kses(
		__( 'Developed by: <a target="_blank" href="https://themepul.com">themepul</a>', 'fitmas' ),
		array(
			'a' => array(
				'href'   => array(),
				'target' => array(),
			),
		)
	),
) );

//
// General options
//
require_once 'general-options.php';

//
// Typography options
//
require_once 'typography-options.php';

//
// Header options
//
require_once 'header-options.php';

//
// Layout options
//
CSF::createSection( $fitmasthemeoption, array(
	'title' => esc_html__( 'Layout & Options', 'fitmas' ),
	'id'    => 'fitmas_page_options',
	'icon'  => 'fa fa-calculator',
) );

//
// Banner options
//
require_once 'banner-options.php';

//
// Blog Page options
//
require_once 'blog-page-options.php';

//
// Single Post options
//
require_once 'single-post-options.php';

//
// Archive Page options
//
require_once 'archive-page-options.php';


//
// Search Page options
//
require_once 'search-page-options.php';


//
// Error Page options
//
require_once 'error-page-options.php';

//
// WooCommerce options
//
if ( class_exists( 'WooCommerce' ) ) {

    CSF::createSection( $fitmasthemeoption, array(
        'title' => esc_html__( 'Shop Options', 'fitmas' ),
        'id'    => 'fitmas_shop_options',
        'icon'  => 'fa fa-shopping-cart',
    ) );

    //
    // Shop options
    //
    require_once 'woocommerce/shop-options.php';

    //
    // Single Shop options
    //
    require_once 'woocommerce/single-shop-page.php';
}
//
// project options
//
require_once 'portfolio-options.php';

//
// Team options
//
require_once 'team-options.php';

//
// Footer options
//
require_once 'footer-options.php';

//
// Code Editor options
//
CSF::createSection( $fitmasthemeoption, array(
	'title' => esc_html__( 'Code Editor', 'fitmas' ),
	'id'    => 'fitmas_code_editor_options',
	'icon'  => 'fa fa-code',
) );

//
// CSS options
//
CSF::createSection( $fitmasthemeoption, array(
	'parent' => 'fitmas_code_editor_options',
	'title'  => esc_html__( 'CSS Editor', 'fitmas' ),
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array(
		array(
			'id'       => 'fitmas_css_editor',
			'type'     => 'code_editor',
			'title'    => esc_html__( 'CSS Editor', 'fitmas' ),
			'settings' => array(
				'theme' => 'mbo',
				'mode'  => 'css',
			),
		),
	),
) );

//
// Backup options
//
CSF::createSection( $fitmasthemeoption, array(
	'title'       => esc_html__( 'Backup', 'fitmas' ),
	'icon'        => 'fas fa-shield-alt',
	'description' => esc_html__( 'Backup Theme Options all Data', 'fitmas' ),
	'fields'      => array(
		array(
			'type' => 'backup',
		),
	),
) );