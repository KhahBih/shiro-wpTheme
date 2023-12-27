<?php
//search Options
CSF::createSection( $fitmasthemeoption, array(
    'parent' => 'fitmas_page_options',
    'title'  => esc_html__( 'Search Page', 'fitmas' ),
    'icon'   => 'fa fa-search',
    'fields' => array(
        array(
            'id'      => 'fitmas_search_layout',
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
            'id'       => 'fitmas_search_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable search Banner', 'fitmas' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'desc'     => esc_html__( 'Enable or disable search page banner.', 'fitmas' ),
        ),
    ),
) );