<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Header Setings
CSF::createSection( $fitmasthemeoption, array(
    'id'     => 'fitmas_header_settings',
    'title'  => esc_html__( 'Header Settings', 'fitmas' ),
    'icon'   => 'fa fa-header',
    'fields' => array(
		array(
			'id'            => 'fitmas_elementor_header',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Header', 'fitmas' ),
			'placeholder'   => esc_html__( 'Default', 'fitmas' ),
			'empty_message' => esc_html__( 'No Header Template Found. You can create header template from fitmas Headers > Add New.', 'fitmas' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'fitmas_header',
				'posts_per_page' => -1,
			),
			'desc'          => esc_html__( 'Select site header from here. Selected template will be used for all pages by default.', 'fitmas' ),
		),


		array(
			'type'       => 'notice',
			'id'         => 'site_header_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom header selected. You can edit/create Header Template in the', 'fitmas'),
				admin_url('edit.php?post_type=fitmas_header'),
				esc_html__('fitmas Headers', 'fitmas'),
				esc_html__('dashboard tab.', 'fitmas')
			),
			'dependency' => array(
				'fitmas_elementor_header',
				'!=',
				'',
			),
		),

		array(
			'id'           => 'header_default_logo',
			'type'         => 'media',
			'title'        => esc_html__( 'Header Logo', 'fitmas' ),
			'subtitle'        => esc_html__( 'Add Your Header Logo', 'fitmas' ),
			'library'      => 'image',
			'url'          => false,
			'button_title' => esc_html__( 'Upload Logo', 'fitmas' ),
			'desc'         => esc_html__( 'Upload logo image', 'fitmas' ),
			'dependency'   => array(
				'fitmas_elementor_header',
				'==',
				'',
			),
		),
		        array(
			'id'           => 'header_mobile_logo',
			'type'         => 'media',
			'title'        => esc_html__( 'Mobile Version Logo', 'fitmas' ),
            'subtitle'        => esc_html__( 'Add Your Header Logo For Mobile', 'fitmas' ),
			'library'      => 'image',
			'url'          => false,
			'button_title' => esc_html__( 'Upload Logo', 'fitmas' ),
			'desc'         => esc_html__( 'Upload logo image', 'fitmas' ),
			'dependency'   => array(
				'fitmas_elementor_header',
				'==',
				'',
			),
		),


		array(
			'id'         => 'logo_image_size',
			'type'       => 'dimensions',
			'title'      => esc_html__( 'Logo Image Size', 'fitmas' ),
			'output'     => '.site-branding img',
			'width'      => true,
			'height'     => true,
			'desc'       => esc_html__( 'Select logo image size.', 'fitmas' ),
			'dependency' => array(
				'fitmas_elementor_header',
				'==',
				'',
			),
		),
		//______-------________------________---------
        //__________ HEADER ONE MENU OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Menu Options', 'fitmas' ),
           'dependency' => array(
				'fitmas_elementor_header',
				'==',
				'',
			),
        ),
        array(
            'id'         => 'fitmas_header_one_group',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Site Header Options', 'fitmas' ),
            'subtitle'   => esc_html__( 'Add your Site Header Options here', 'fitmas' ),
            'default'  => esc_html__( 'Copyright © 2023. All Rights Reserved.', 'fitmas' ),
           'dependency' => array(
				'fitmas_elementor_header',
				'==',
				'',
			),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Parent Menu Options', 'fitmas' ),
                ),
                array(
                    'id'       => 'fitmas_header_one_menu_color',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Menu Color', 'fitmas' ),
                    'subtitle' => esc_html__( 'Nav Menu Normal and Hover Color', 'fitmas' ),
                    'output'   => '.main-menu > ul > li > a',
                ),
                array(
                    'id'          => 'fitmas_header_one_area_background_color',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Header Area Background Color', 'fitmas' ),
                    'subtitle'    => esc_html__( 'Add Color For Header Area Background Color', 'fitmas' ),
                    'output'      => '.menu-area',
                    'output_mode' => 'background-color',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Sub menu Options', 'fitmas' ),
                ),
                array(
                    'id'       => 'fitmas_header_one_submenu_color',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Text Color', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'fitmas' ),
                    'output'   => '.main-menu ul.sub-menu li a',
                ),
                array(
                    'id'          => 'fitmas_header_one_submenu_bgcolor',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'fitmas' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'fitmas' ),
                    'output'      => '.main-menu ul.sub-menu li a',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'fitmas_header_one_submenu_bgcolor_hover',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'fitmas' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'fitmas' ),
                    'output'      => '.main-menu ul.sub-menu li a:hover',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'fitmas_header_one_submenu_border_color',
                    'type'        => 'color',
                    'title'       => esc_html__( 'border Color', 'fitmas' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub menu', 'fitmas' ),
                    'output'      => '.main-menu ul.sub-menu li',
                    'output_mode' => 'border-color',
                ),
            ),
        ),
	)
) );