<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postgallery = 'fitmas_postmeta_gallery';

//
// Create a metabox
//
CSF::createMetabox( $postgallery, array(
    'title'        => esc_html('Post Format image Gallery','fitmas'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'gallery',
) );

//
// Create a section
//
CSF::createSection( $postgallery, array(
    'title'  => esc_html__( 'Add Gallery Image', 'fitmas' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'          => 'fitmas_post_gallery',
            'type'        => 'gallery',
            'title'       => esc_html('Gallery','fitmas'),
            'add_title'   => esc_html('Add Image','fitmas'),
            'edit_title'  => esc_html('Edit Image','fitmas'),
            'clear_title' => esc_html('Remove Image','fitmas'),
        ),
    ),
) );