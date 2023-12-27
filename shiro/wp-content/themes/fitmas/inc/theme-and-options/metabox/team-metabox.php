<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$teammeta = 'fitmas_teammeta';

//
// Create a metabox
//
CSF::createMetabox( $teammeta, array(
    'title'        => esc_html__( 'Team Options', 'fitmas' ),
    'post_type'    => array( 'fitmas_team' ),
    'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $teammeta, array(
    'title'  => esc_html__( 'Team Member Options', 'fitmas' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'fitmas_team_stitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Designation', 'fitmas' ),
            'subtitle' => esc_html__( 'Add Team Designation here', 'fitmas' ),
            'default'  => esc_html__( 'CEO/Founder', 'fitmas' ),
        ),
         array(
            'id'       => 'fitmas_team_description',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Designation', 'fitmas' ),
            'subtitle' => esc_html__( 'Add Team Designation here', 'fitmas' ),
            'default'  => esc_html__( 'Milano is a certified Body Builder with over 10 years of experience in Champion Ship And Body Building Tournament.', 'fitmas' ),
        ),

        // ----------------- Contact Info -------------

        array(
            'id'       => 'fitmas_contact_info',
            'type'     => 'group',
            'title'    => esc_html__( 'Team contact Box', 'fitmas' ),
            'subtitle' => esc_html__( 'Add Team Members Info here', 'fitmas' ),
            'fields'   => array(
                array(
                    'id'       => 'fitmas_contact_info_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Icon', 'fitmas' ),
                    'default' => 'fas fa-phone-volume me-2'
                   
                ),
                array(
                    'id'       => 'fitmas_contact_info_number',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Contact Number Here', 'fitmas' ),
                    'default'  => esc_html__( '+258 8642 236', 'fitmas' ),

                ),
            ),
        ),
         //------- Fitmas Team Details Info ----------
        
        array(
            'id'       => 'fitmas_team_info',
            'type'     => 'group',
            'title'    => esc_html__( 'Team Info Box', 'fitmas' ),
            'subtitle' => esc_html__( 'Add Team Members Info here', 'fitmas' ),
            'fields'   => array(
                array(
                    'id'       => 'fitmas_team_info_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Icon', 'fitmas' ),
                ),
                array(
                    'id'       => 'fitmas_team_info_label',
                    'type'     => 'text',
                    'title'    => esc_html__( 'label', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add info Label Here', 'fitmas' ),
                ),
                array(
                    'id'       => 'fitmas_team_info_content',
                    'type'     => 'wp_editor',
                    'title'    => esc_html__( 'Content', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Team Content Here', 'fitmas' ),
                ),
            ),
            'default'  => array(
                array(
                    'fitmas_team_info_label'   => esc_html__( 'Experience', 'fitmas' ),
                    'fitmas_team_info_content' => esc_html__( 'More Than 10 Years', 'fitmas' ),
                    'fitmas_teams_social_icon' => 'fas fa-user',
                ),
                array(
                    'fitmas_team_info_label'   => esc_html__( 'Phone', 'fitmas' ),
                    'fitmas_team_info_content' => esc_html__( '+90 122 456 78', 'fitmas' ),
                    'fitmas_teams_social_icon' => 'fas fa-phone',
                ),
                 array(
                    'fitmas_team_info_label'   => esc_html__( 'Email', 'fitmas' ),
                    'fitmas_team_info_content' => esc_html__( 'info@fitmas.com', 'fitmas' ),
                    'fitmas_teams_social_icon' => 'fas fa-envelope',
                ),
                 array(
                    'fitmas_team_info_label'   => esc_html__( 'Fax', 'fitmas' ),
                    'fitmas_team_info_content' => esc_html__( '+90 122 456 78', 'fitmas' ),
                    'fitmas_teams_social_icon' => 'fas fa-fax',
                ),
            ),
        ),
    
        //------- Social Inpul ----------
        
        array(
            'id'        => 'fitmas_team_socials',
            'type'      => 'group',
            'title'     => esc_html__( 'Social Links', 'fitmas' ),
            'subtitle'     => esc_html__( 'Social Options Groups', 'fitmas' ),
            'fields'    => array(
                array(
                    'id'       => 'fitmas_team_social_label',
                    'type'     => 'text',
                    'title'    => esc_html__( 'label', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Social label Name', 'fitmas' ),
                ),
                array(
                    'id'       => 'fitmas_teams_social_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'fitmas' ),
                    'subtitle' => esc_html__( 'Add Social Icon', 'fitmas' ),
                ),
                array(
                    'id'       => 'fitmas_teams_social_url',
                    'type'     => 'link',
                    'title'    => 'Link',
                    'default'  => array(
                      'url'    => 'facebook.com',
                      'target' => '_blank'
                    ),
                ),
            ),
            'default'   => array(
              array(
                'fitmas_team_social_label' => esc_html__( 'Facebook', 'fitmas' ),
                'fitmas_teams_social_icon' => 'fab fa-facebook-f',
                'fitmas_teams_social_url' => '#',
              ),
              array(
                'fitmas_team_social_label' => esc_html__( 'Twitter', 'fitmas' ),
                'fitmas_teams_social_icon' => 'fab fa-twitter',
                'fitmas_teams_social_url' => '#',
              ),
              array(
                'fitmas_team_social_label' => esc_html__( 'Linkedin', 'fitmas' ),
                'fitmas_teams_social_icon' => 'fab fa-linkedin-in',
                'fitmas_teams_social_url' => '#',
              ),
            ),
        ),
    ),
) );