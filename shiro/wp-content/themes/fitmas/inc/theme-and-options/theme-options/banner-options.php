<?php

//Banner Options
CSF::createSection( $fitmasthemeoption, array(
    'parent' => 'fitmas_page_options',
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'fitmas' ),
    'icon'   => 'fa fa-flag',
    'fields' => array(
        array(
            'id'                    => 'fitmas_banner_default_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'fitmas' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => 'to right',
                'background-size'               => 'cover',
                'background-position'           => 'center center',
                'background-repeat'             => 'no-repeat',
            ),
            'output'                => '.breadcumb-wrapper',
            'subtitle'              => esc_html__( 'Select banner default properties for all page / post. You can override this settings on individual page / post.', 'fitmas' ),
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_breadcrumb_normal_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Breadcrumb Text Color', 'fitmas' ),
            'output'   => '.breadcumb-content .breadcumb-title',
            'subtitle' => esc_html__( 'Breadcrumb Text Color', 'fitmas' ),
            'desc'     => esc_html__( 'Select breadcrumb text color.', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_breadcrumb_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Breadcrumb Link Color', 'fitmas' ),
            'output'   => array( '.bre-sub span a span' ),
            'subtitle' => esc_html__( 'Breadcrumb Link color', 'fitmas' ),
            'desc'     => esc_html__( 'Select breadcrumb link and link hover color.', 'fitmas' ),
        ),
        array(
            'id'          => 'fitmas_breadcrumb_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Breadcrumb Spacing', 'fitmas' ),
            'subtitle'    => esc_html__( 'Add Breadcrumb Content Spacing', 'fitmas' ),
            'output'      => '.breadcumb-wrapper',
            'output_mode' => 'padding', // or margin, relative
        ),
        array(
            'id'          => 'fitmas_breadcrumb_select_html',
            'type'        => 'select',
            'title'       => esc_html__( 'HTML Tag', 'fitmas' ),
            'subtitle'    => esc_html__( 'Select Title HTML Tag', 'fitmas' ),
            'placeholder' => esc_html__( 'Select an option', 'fitmas' ),
            'options'     => array(
                'h1' => esc_html__( 'H1', 'fitmas' ),
                'h2' => esc_html__( 'H2', 'fitmas' ),
                'h3' => esc_html__( 'H3', 'fitmas' ),
                'h4' => esc_html__( 'H4', 'fitmas' ),
                'h5' => esc_html__( 'H5', 'fitmas' ),
                'h6' => esc_html__( 'H6', 'fitmas' ),
            ),
            'default'     => 'h2',
        ),
    ),
) );