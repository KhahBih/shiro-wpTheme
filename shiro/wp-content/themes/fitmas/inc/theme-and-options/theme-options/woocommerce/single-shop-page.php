<?php
//Single Shop Page Options
CSF::createSection($fitmasthemeoption, array(
    'parent' => 'fitmas_shop_options',
    'title'  => esc_html__('Single Shop Page', 'fitmas'),
    'icon'   => 'fa fa-long-arrow-right',
    'fields' => array(
        array(
            'id'      => 'fitmas_single_shop_layout',
            'type'    => 'select',
            'title'   => esc_html__('Single Shop Layout', 'fitmas'),
            'options' => array(
                'grid'          => esc_html__('Full Width', 'fitmas'),
                'left-sidebar'  => esc_html__('Left Sidebar', 'fitmas'),
                'right-sidebar' => esc_html__('Right Sidebar', 'fitmas'),
            ),
            'default' => 'grid',
            'desc'    => esc_html__('Select Single Shop page layout.', 'fitmas'),
        ),
        array(
            'id'       => 'fitmas_single_shop_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'fitmas'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide / Show Banner.', 'fitmas'),
        ),
    )
));