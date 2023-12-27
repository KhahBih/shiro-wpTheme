<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postvideo = 'fitmas_postmeta_video';

//
// Create a metabox
//
CSF::createMetabox( $postvideo, array(
    'title'        => esc_html('Post Format Video','fitmas'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'video',
) );

//
// Create a section
//
CSF::createSection( $postvideo, array(
    'title'  => esc_html__( 'Add Video Link ', 'fitmas' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'fitmas_post_video',
            'type'     => 'text',
            'title'    => esc_html__( 'Video Link', 'fitmas' ),
            'subtitle' => esc_html__( 'Add Post Video Link here', 'fitmas' ),
            'default'  => 'https://www.youtube.com/watch?v=yfFYBo0jtF0'
        ),
       
    ),
) );