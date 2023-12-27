<?php
//Team Page Options
CSF::createSection($fitmasthemeoption, array(
    'title'  => esc_html__('Team Page', 'fitmas'),
    'icon'   => 'fa fa-users',
    'fields' => array(
        array(
            'id'       => 'fitmas_team_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'fitmas'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide / Show Banner.', 'fitmas'),
        ),
        array(
            'id'         => 'fitmas_team_title',
            'type'       => 'text',
            'title'      => esc_html__('Banner Title', 'fitmas'),
            'default'    => esc_html('Team Details','fitmas'),
            'dependency' => array( 'fitmas_team_banner_enable', '==', 'true' ),
            'desc'       => esc_html__('Type team banner title here.', 'fitmas'),
        ),
        array(
            'id'         => 'fitmas_team_custom_slug',
            'type'       => 'text',
            'title'      => esc_html__('Custom Slug', 'fitmas'),
            'default'    => esc_html('fitmas-team','fitmas'),
        ),
    )
));