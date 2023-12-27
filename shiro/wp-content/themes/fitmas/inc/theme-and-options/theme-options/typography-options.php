<?php
// Create typography section
CSF::createSection( $fitmasthemeoption, array(
    'title'  => esc_html__( 'Typography', 'fitmas' ),
    'id'     => 'fitmas_typography_options',
    'icon'   => 'fa fa-text-width',
    'fields' => array(

        array(
            'id'           => 'fitmas_body_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Body', 'fitmas' ),
            'output'       => 'body',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set body typography.', 'fitmas' ),
        ),

        array(
            'id'           => 'fitmas_h1_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading One', 'fitmas' ),
            'output'       => 'h1',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading one typography.', 'fitmas' ),
        ),

        array(
            'id'           => 'fitmas_h2_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Two', 'fitmas' ),
            'output'       => 'h2',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading two typography.', 'fitmas' ),
        ),

        array(
            'id'           => 'fitmas_h3_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Three', 'fitmas' ),
            'output'       => 'h3',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading three typography.', 'fitmas' ),
        ),

        array(
            'id'           => 'fitmas_h4_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Four', 'fitmas' ),
            'output'       => 'h4',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading four typography.', 'fitmas' ),
        ),

        array(
            'id'           => 'fitmas_h5_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Five', 'fitmas' ),
            'output'       => 'h5',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading five typography.', 'fitmas' ),
        ),

        array(
            'id'           => 'fitmas_h6_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Six', 'fitmas' ),
            'output'       => 'h6',
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading six typography.', 'fitmas' ),
        ),
    ),
) );
// End typography section