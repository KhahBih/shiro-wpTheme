<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// footer Style
CSF::createSection( $fitmasthemeoption, array(
    'title'  => esc_html__( 'Footer Options', 'fitmas' ),
    'id'     => 'fitmas_footer_options',
    'icon'   => 'fa fa-footer',
    'fields' => array(
        array(
			'id'            => 'site_default_footer',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Footer', 'fitmas' ),
			'placeholder'   => esc_html__( 'Default', 'fitmas' ),
			'empty_message' => esc_html__( 'No footer Template Found. You can create footer template from fitmas Footers > Add New.', 'fitmas' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'fitmas_footer',
				'posts_per_page' => - 1,
			),
			'desc'          => esc_html__( 'Select site footer from here. Selected template will be used for all pages by default.', 'fitmas' ),
		),


		array(
			'type'       => 'notice',
			'id'         => 'site_footer_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom footer selected. You can edit/create footer Template in the', 'fitmas'),
				admin_url('edit.php?post_type=fitmas_footer'),
				esc_html__('fitmas Footers', 'fitmas'),
				esc_html__('dashboard tab.', 'fitmas')
			),
		),
		// **********************************************
		//         ____ COPYRIGHT SECTION ____ 
		// **********************************************
		array(
            'type'    => 'heading',
            'style'   => 'info',
            'content' => esc_html__( 'CopyRight Section', 'fitmas' ),
			'dependency' => array( 'site_default_footer', '==', ' ' ),
        ),
        array(
            'id'            => 'fitmas_copyright_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Copyright Text', 'fitmas' ),
            'subtitle'      => esc_html__( 'Site copyright text', 'fitmas' ),
            'desc'          => esc_html__( 'Type site copyright text here.', 'fitmas' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '100px',
			'dependency' => array(
				'site_default_footer', '==', '',
			),
        ),
		// __ Color Option Footer Copyright Area
		array(
            'id'         => 'fitmas_footer_copyright_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Copyright CSS Options', 'fitmas' ),
            'subtitle'   => esc_html__( 'Add your color for footer Copyright area', 'fitmas' ),
            'dependency' => array(
				'site_default_footer', '==', '',
			),
            'fields'     => array(
                array(
                    'id'                  => 'fitmas_copyright_background_color',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Copyright Background Color', 'fitmas' ),
                    'subtitle'            => esc_html__( 'Add Your copyright Background image/color/Gradient Here', 'fitmas' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => ' .footer-copyright-wrapper',
                ),
                array(
                    'id'               => 'fitmas_copyright_text_color',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Copyright Text', 'fitmas' ),
                    'subtitle'         => esc_html__( 'Add Color for Copyright Text  ', 'fitmas' ),
                    'output'           => ' .footer-copyright-wrapper',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'fitmas_copyrightr_text_link_color',
                    'type'             => 'link_color',
                    'title'            => esc_html__( 'Copyright Text Link Color', 'fitmas' ),
                    'subtitle'         => esc_html__( 'Add color for Footer Link Color', 'fitmas' ),
                    'output'           => ' .footer-copyright-wrapper a',
                    'output_important' => true,
                ),
            ),
        ),
    ),
) );



        

       
