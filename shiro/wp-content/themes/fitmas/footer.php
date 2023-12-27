<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fitmas
 */


if ( is_page() || is_singular( 'post' ) || is_singular('fitmas_portfolio') || is_singular('fitmas_team') && get_post_meta( $post->ID, 'fitmas_metabox', true ) ) {
	$fitmasMeta = get_post_meta( $post->ID, 'fitmas_metabox', true );
} else {
	$fitmasMeta = array();
}

if ( is_array( $fitmasMeta ) && array_key_exists( 'footer_style_meta', $fitmasMeta ) && $fitmasMeta['footer_style_meta'] != '' && $fitmasMeta['footer_style_meta'] != 'default' ) {
	$footer_query = new WP_Query( [
		'post_type'      => 'fitmas_footer',
		'posts_per_page' => -1,
		'p'              => $fitmasMeta['footer_style_meta'],
	] );

} elseif(!empty(fitmas_option('site_default_footer'))){
	$footer_query = new WP_Query( [
		'post_type'      => 'fitmas_footer',
		'posts_per_page' => -1,
		'p'              => fitmas_option('site_default_footer'),
	] );
}else{
	$footer_query = '';
}

$fitmas_enable_top_to_bottom = fitmas_option( 'fitmas_enable_top_to_bottom', true );
$fitmas_enable_ttb_icon = fitmas_option( 'fitmas_enable_ttb_icon', 'fa fa-angle-up' );
?>

    <footer class="site-footer footer-wrapper footer-layout1">
        <?php if(!empty($footer_query) && $footer_query->have_posts()) : ?>
            <?php
            while ( $footer_query->have_posts() ) : $footer_query->the_post();
                the_content();
            endwhile;
            wp_reset_postdata();
            ?>
        <?php else: ?>

            <?php get_template_part( 'inc/footer/default-footer-style'); ?>

        <?php endif; ?>
    </footer><!-- #colophon -->
    <?php if ( $fitmas_enable_top_to_bottom == true ) : ?>
        <div class="scroll-top">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
            </svg>
        </div>
    <?php endif;?>
</div><!-- #page -->
<?php wp_footer();?>

</body>
</html>