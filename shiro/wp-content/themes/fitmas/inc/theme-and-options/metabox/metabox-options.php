<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$fitmasmetabox = 'fitmas_metabox';

//
// Create a metabox
//
CSF::createMetabox( $fitmasmetabox, array(
    'title'        => 'Metabox Options',
    'post_type'    => array( 'page', 'post', 'fitmas_portfolio', 'fitmas_team' ),
    'show_restore' => true,
) );

// Create layout section
CSF::createSection( $fitmasmetabox, array(
	'title'  => esc_html__( 'Header Settings ', 'fitmas' ),
	'icon'   => 'fa fa-header',
	'fields' => array(

		array(
			'id'      => 'enable_header_style_meta',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Enable Header Template', 'fitmas' ),
			'default' => false
		),
		array(
			'id'      => 'header_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Header', 'fitmas' ),
            'subtitle'         => esc_html__( 'Select Your Header, we are used Theme Default Header', 'fitmas' ),
			'placeholder'   => esc_html__( 'Default', 'fitmas' ),
			'empty_message' => esc_html__( 'No header template found. You can create header template from fitmas Headers > Add New.', 'fitmas' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'fitmas_header',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select header for this page', 'fitmas'),
			'dependency' => array( 'enable_header_style_meta', '==', 'true' ),
		),
	)
) );

// Create layout section
CSF::createSection( $fitmasmetabox, array(
    'title'  => esc_html__( 'Layout', 'fitmas' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'          => 'fitmas_layout_meta',
            'type'        => 'select',
            'title'       => esc_html__( 'Layout', 'fitmas' ),
            'options'     => array(
                'default'       => esc_html__( 'Default', 'fitmas' ),
                'full-width'    => esc_html__( 'Full Width', 'fitmas' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'fitmas' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'fitmas' ),
            ),
            'default' => 'default',
            'desc'        => esc_html__( 'Select layout', 'fitmas' ),
        ),
        array(
            'id'         => 'fitmas_sidebar_meta',
            'type'       => 'select',
            'title'      => esc_html__( 'Sidebar', 'fitmas' ),
            'options'    => 'fitmas_sidebars',
            'dependency' => array( 'fitmas_layout_meta', 'any', 'left-sidebar,right-sidebar' ),
            'desc'       => esc_html__( 'Select sidebar you want to show with this page.', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_meta_page_navbar',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Pagination', 'fitmas' ),
            'subtitle' => esc_html__( 'This Options only for Default page', 'fitmas' ),
            'default'  => true,
        ),
        array(
            'id'          => 'fitmas_meta_page_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Padding', 'fitmas' ),
            'subtitle'    => esc_html__( 'Add Page Padding If you need', 'fitmas' ),
            'output'      => '.site-main.content-area',
            'output_mode' => 'padding',
        ),
    ),
) );

// Create a section
CSF::createSection( $fitmasmetabox, array(
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'fitmas' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'fitmas_meta_enable_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'fitmas' ),
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'default'  => true,
            'desc'     => esc_html__( 'Enable or disable banner.', 'fitmas' ),
        ),
        array(
            'id'                    => 'fitmas_meta_banner_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'fitmas' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => '',
                'background-size'               => '',
                'background-position'           => '',
                'background-repeat'             => 'no-repeat',
            ),
            'dependency'            => array( 'fitmas_meta_enable_banner', '==', true ),
            'output'                => '.breadcroumb-area',
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'fitmas' ),
        ),
        array(
            'id'         => 'fitmas_meta_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'fitmas' ),
            'output'     => '.breadcroumn-contnt .brea-title',
            'dependency' => array( 'fitmas_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'fitmas' ),
        ),

        array(
            'id'         => 'fitmas_meta_breadcrumb_normal_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Breadcrumb Text Color', 'fitmas' ),
            'output'     => '.bre-sub span',
            'subtitle'   => esc_html__( 'Breadcrumb Text Color', 'fitmas' ),
            'dependency' => array( 'fitmas_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb text color.', 'fitmas' ),
        ),

        array(
            'id'         => 'fitmas_meta_breadcrumb_link_color',
            'type'       => 'link_color',
            'title'      => esc_html__( 'Breadcrumb Link Color', 'fitmas' ),
            'output'     => array( '.bre-sub span a' ),
            'subtitle'   => esc_html__( 'Breadcrumb Link color', 'fitmas' ),
            'dependency' => array( 'fitmas_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb link and link hover color.', 'fitmas' ),
        ),

    ),
) );

// Create Footer section
CSF::createSection( $fitmasmetabox, array(
	'title'  => esc_html__('Footer Settings ', 'fitmas'),
	'icon'   => 'fa fa-wordpress',
	'fields' => array(

		array(
			'id'      => 'footer_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Footer', 'fitmas' ),
            'subtitle'         => esc_html__( 'Select Your Footer, we are used Theme Default Footer', 'fitmas' ),
			'placeholder'   => esc_html__( 'Default', 'fitmas' ),
			'empty_message' => esc_html__( 'No Footer Template Found. You can create footer template from fitmas Footers > Add New.', 'fitmas' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'fitmas_footer',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select footer for this page', 'fitmas'),
		),
	)
));