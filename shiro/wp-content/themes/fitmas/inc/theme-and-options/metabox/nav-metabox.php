<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

//
// Set a unique slug-like ID
//
$navmeta = 'fitmas_navmeta';

//
// Create menu options
//
CSF::createNavMenuOptions( $navmeta, array(
    'data_type' => 'serialize',
) );

CSF::createSection( $navmeta, array(
    'fields' => array(

        array(
            'id'    => 'fitmas_nav_megamenu_show',
            'type'  => 'switcher',
            'title' => esc_html__( 'Enable Mega menu', 'fitmas' ),
            'label' => esc_html__( 'Enable this options if you need Mega Menu', 'fitmas' ),
        ),

        array(
            'id'          => 'fitmas_nav_mmenu_column',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Column', 'fitmas' ),
            'subtitle'    => esc_html__( 'Select your Sub Menu Column Section', 'fitmas' ),
            'placeholder' => esc_html__( 'Select an option', 'fitmas' ),
            'default'     => '4',
            'options'     => array(
                'column_2' => esc_html__( 'Column 2', 'fitmas' ),
                'column_3' => esc_html__( 'Column 3', 'fitmas' ),
                'column_4' => esc_html__( 'Column 4', 'fitmas' ),
                'column_5' => esc_html__( 'Column 5', 'fitmas' ),
                'column_6' => esc_html__( 'Column 6', 'fitmas' ),
            ),
            'dependency'  => array( 'fitmas_nav_megamenu_show', '==', 'true' ),
        ),
    ),
) );
