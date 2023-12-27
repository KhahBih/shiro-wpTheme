<?php
//shop Page Options
CSF::createSection( $fitmasthemeoption, array(
    'parent' => 'fitmas_shop_options',
    'title'  => esc_html__( 'Shop Page', 'fitmas' ),
    'icon'   => 'fa fa-long-arrow-right',
    'fields' => array(
        array(
            'id'      => 'fitmas_shop_layout',
            'type'    => 'select',
            'title'   => esc_html__( 'shop Layout', 'fitmas' ),
            'options' => array(
                'grid'          => esc_html__( 'Grid Full', 'fitmas' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'fitmas' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'fitmas' ),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__( 'Select shop page layout.', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_shop_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'fitmas' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'desc'     => esc_html__( 'Hide / Show Banner.', 'fitmas' ),
        ),
		
		array(
            'id'      => 'fitmas_shop_item',
            'type'    => 'number',
            'title'   => esc_html__( 'Display Item', 'fitmas' ),
			'subtitle'   => esc_html__( 'Display your Woocommerce product', 'fitmas' ),
            'default' => 8,
        ),
    ),
) );