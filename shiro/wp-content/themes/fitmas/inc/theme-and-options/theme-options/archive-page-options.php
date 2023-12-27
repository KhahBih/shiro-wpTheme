<?php
//Archive Options
CSF::createSection( $fitmasthemeoption, array(
    'parent' => 'fitmas_page_options',
    'title'  => esc_html__( 'Archive Page', 'fitmas' ),
    'icon'   => 'fa fa-archive',
    'fields' => array(
        array(
            'id'      => 'fitmas_archive_layout',
            'type'    => 'select',
            'title'   => esc_html__( 'Archive Layout', 'fitmas' ),
            'options' => array(
                'grid'          => esc_html__( 'Grid Full', 'fitmas' ),
                'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'fitmas' ),
                'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'fitmas' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'fitmas' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'fitmas' ),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__( 'Select blog page layout.', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_archive_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Archive Banner', 'fitmas' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'desc'     => esc_html__( 'Enable or disable archive page banner.', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_archive_pagination',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Archive Pagination', 'fitmas' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'desc'     => esc_html__( 'Enable or disable archive Pagination.', 'fitmas' ),
        ),
        array(
            'id'         => 'fitmas_archive_banner_title_static_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Static Title Color', 'fitmas' ),
            'output'     => '.page-header .container h2.archive-title',
            'dependency' => array( 'fitmas_archive_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner Static title color.', 'fitmas' ),
        ),
        array(
            'id'         => 'fitmas_archive_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'fitmas' ),
            'output'     => '.archive-title span',
            'dependency' => array( 'fitmas_archive_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'fitmas' ),
        ),
    ),
) );