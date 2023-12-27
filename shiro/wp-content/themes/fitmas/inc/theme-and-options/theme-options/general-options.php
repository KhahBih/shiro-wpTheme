<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
CSF::createSection( $fitmasthemeoption, array(
    'title'  => esc_html__( 'General', 'fitmas' ),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Preloader Options', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_enable_preloader',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Preloader', 'fitmas' ),
            'subtitle' => esc_html__( 'Select Site Preloader. Default Enable', 'fitmas' ),
        ),
        array(
            'id'          => 'fitmas_preloader_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader color One', 'fitmas' ),
            'dependency'  => array( 'fitmas_enable_preloader', '==', 'true' ),
            'output'      => '.preloader .loader::after',
            'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'id'          => 'fitmas_preloader2_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader color Two', 'fitmas' ),
            'dependency'  => array( 'fitmas_enable_preloader', '==', 'true' ),
            'output'      => '.preloader .loader',
            'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'id'          => 'fitmas_preloader3_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader Full Width Background', 'fitmas' ),
            'dependency'  => array( 'fitmas_enable_preloader', '==', 'true' ),
            'output'      => '.preloader',
            'output_mode' => 'background-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Comment Options', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_enable_page_cmt',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Enable Comment for page', 'fitmas' ),
            'subtitle' => esc_html__( 'Enable Comment section on Page', 'fitmas' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Top To Bottom Button Settings', 'fitmas' ),
        ),
        array(
            'id'       => 'fitmas_enable_top_to_bottom',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Enable Top To Bottom Icon', 'fitmas' ),
            'subtitle' => esc_html__( 'Enable Top To Bottom Icon', 'fitmas' ),
        ),
        
    ),
) );