<?php
//Single Post
CSF::createSection($fitmasthemeoption, array(
    'parent' => 'fitmas_page_options',
    'title'  => esc_html__('Single Post / Post Details', 'fitmas'),
    'icon'   => 'fa fa-pencil',
    'fields' => array(

        array(
			'id'      => 'single_post_default_layout',
			'type'    => 'select',
			'title'   => esc_html__( 'Layout', 'fitmas' ),
			'options' => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'fitmas' ),
				'full-width'    => esc_html__( 'Full Width', 'fitmas' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'fitmas' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select single post layout', 'fitmas' ),
		),

        array(
            'id'       => 'fitmas_single_post_author',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Author Name', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show author name on post details page.', 'fitmas'),
            'default'  => true
        ),
        array(
            'id'       => 'fitmas_single_post_date',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Date', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show date on post details page.', 'fitmas'),
            'default'  => true
        ),

        array(
            'id'       => 'fitmas_single_post_cmnt',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Comments Number', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show comments number on post details page.', 'fitmas'),
            'default'  => true
        ),

        array(
            'id'       => 'fitmas_single_post_cat',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Categories', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show categories on post details page.', 'fitmas'),
            'default'  => true
        ),

        array(
            'id'       => 'fitmas_single_post_tag',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Tags', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show tags on post details page.', 'fitmas'),
            'default'  => true
        ),
        
        array(
            'id'       => 'fitmas_post_share',
            'type'     => 'switcher',
            'title'    => esc_html__('Social Share icons', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'fitmas'),
            'default'  => false
        ),

        array(
            'id'       => 'fitmas_author_profile',
            'type'     => 'switcher',
            'title'    => esc_html__('Author profile', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'fitmas'),
            'default'  => false
        ),

        array(
            'id'       => 'fitmas_post_nav',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Post Nav', 'fitmas'),
            'text_on'  => esc_html__('Yes', 'fitmas'),
            'text_off' => esc_html__('No', 'fitmas'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'fitmas'),
            'default'  => true
        ),
    ),
));