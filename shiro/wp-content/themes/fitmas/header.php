<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fitmas
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<?php 
	
	
    if ( is_page() || is_singular( 'post' ) || is_singular('fitmas_portfolio') || is_singular('fitmas_team') && get_post_meta( $post->ID, 'fitmas_metabox', true ) ) {
		$fitmasMeta = get_post_meta( $post->ID, 'fitmas_metabox', true );
	} else {
		$fitmasMeta = array();
	}

	if ( is_array( $fitmasMeta ) && array_key_exists( 'enable_header_style_meta', $fitmasMeta ) && $fitmasMeta['enable_header_style_meta'] == true && array_key_exists( 'header_style_meta', $fitmasMeta ) && $fitmasMeta['header_style_meta'] != '' ) {
		$header_query = new WP_Query( [
			'post_type'      => 'fitmas_header',
			'posts_per_page' => -1,
			'p'              => $fitmasMeta['header_style_meta'],
		] );
	} elseif (  !empty( fitmas_option( 'fitmas_elementor_header' ) ) ) {
		$header_query = new WP_Query( [
			'post_type'      => 'fitmas_header',
			'posts_per_page' => -1,
			'p'              => fitmas_option( 'fitmas_elementor_header' ),
		] );
	} else {
		$header_query = '';
	}
    $fitmas_enable_preloader = fitmas_option('fitmas_enable_preloader', true);
	wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <?php if( $fitmas_enable_preloader == true ) { ?>
	<div class="preloader ">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>
    <?php } ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fitmas' ); ?></a>

		<?php if(!empty( $header_query) && $header_query->have_posts()) : ?>
	        <?php
	        while ( $header_query->have_posts() ) : $header_query->the_post();
		        the_content();
	        endwhile;
	        wp_reset_postdata();
	        ?>
	    <?php else: ?>
	        <?php get_template_part( 'inc/header/default-header-style' ); ?>
        <?php endif; ?>
