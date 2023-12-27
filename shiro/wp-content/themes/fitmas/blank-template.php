<?php
/**
 *Template Name: Blank Template
 */

get_header();

if ( get_post_meta( get_the_ID(), 'fitmas_metabox', true ) ) {
    $fitmas_commonMeta = get_post_meta( get_the_ID(), 'fitmas_metabox', true );
} else {
    $fitmas_commonMeta = array();
}

if ( array_key_exists( 'fitmas_meta_enable_banner', $fitmas_commonMeta ) ) {
    $fitmas_postBanner = $fitmas_commonMeta['fitmas_meta_enable_banner'];
} else {
    $fitmas_postBanner = true;
}

if ( array_key_exists( 'fitmas_meta_custom_title', $fitmas_commonMeta ) ) {
    $fitmas_customTitle = $fitmas_commonMeta['fitmas_meta_custom_title'];
} else {
    $fitmas_customTitle = '';
}

$fitmas_breadcrumb_select_html = fitmas_option( 'fitmas_breadcrumb_select_html', 'h2' );

?>
<?php if ( $fitmas_postBanner == true ): ?>
	<div class="breadcumb-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcumb-content">
						<<?php echo esc_attr($fitmas_breadcrumb_select_html); ?> class="breadcumb-title">
							<?php
								if ( !empty( $fitmas_customTitle ) ) {
									echo esc_html( $fitmas_customTitle );
								} else {
									the_title();
								}
							?>
						</<?php echo esc_attr($fitmas_breadcrumb_select_html); ?>>

						<?php if( function_exists('bcn_display') ) : ?>
							<div class="breadcumb-menu">
								<div class="bre-sub">
									<?php bcn_display(); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>

	<main id="primary" class="site-main content-area">
		<?php the_content();?>
	</main><!-- #main -->

<?php get_footer();
