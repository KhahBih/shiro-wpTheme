<?php
CSF::createSection( $fitmasthemeoption, array(
    'parent' => 'fitmas_page_options',
    'title'  => esc_html__( 'Error 404', 'fitmas' ),
    'icon'   => 'fa fa-exclamation-triangle',
    'fields' => array(

        array(
            'id'       => 'fitmas_error_page_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Error Banner', 'fitmas' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'desc'     => esc_html__( 'Enable or disable search page banner.', 'fitmas' ),
        ),
        array(
            'id'         => 'fitmas_error_page_title',
            'type'       => 'text',
            'title'      => esc_html__( 'Banner Title', 'fitmas' ),
            'desc'       => esc_html__( 'Type Banner Title Here.', 'fitmas' ),
            'dependency' => array( 'fitmas_error_page_banner', '==', 'true' ),
        ),
        array(
            'id'           => 'fitmas_error_image',
            'type'         => 'media',
            'title'        => esc_html__( 'Error Image', 'fitmas' ),
            'library'      => 'image',
            'button_title' => esc_html__( 'Upload Image', 'fitmas' ),
            'desc'         => esc_html__( 'Upload error page image', 'fitmas' ),
        ),
        array(
            'id'            => 'fitmas_not_found_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Not Found Text', 'fitmas' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '150px',
            'desc'          => esc_html__( 'Type not found text here.', 'fitmas' ),
        ),

        array(
            'id'       => 'fitmas_go_back_home',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Go Back Home Button', 'fitmas' ),
            'text_on'  => esc_html__( 'Yes', 'fitmas' ),
            'text_off' => esc_html__( 'No', 'fitmas' ),
            'desc'     => esc_html__( 'Enable or disable go back home button.', 'fitmas' ),
            'default'  => true,
        ),
        array(
            'id'         => 'fitmas_error_page_button_text',
            'type'       => 'text',
            'dependency' => array( 'fitmas_go_back_home', '==', 'true' ),
            'title'      => esc_html__( 'Bottom Text', 'fitmas' ),
            'desc'       => esc_html__( 'Type Banner Title Here.', 'fitmas' ),
            'default'    => esc_html__( 'Go Back Home', 'fitmas' ),
        ),
    ),
) );