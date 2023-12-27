<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fitmas
 */

get_header();
if ( get_post_meta( get_the_ID(), 'fitmas_metabox', true ) ) {
	$fitmas_commonMeta = get_post_meta( get_the_ID(), 'fitmas_metabox', true );
} else {
	$fitmas_commonMeta = array();
}

if ( is_array($fitmas_commonMeta) &&  array_key_exists( 'fitmas_layout_meta', $fitmas_commonMeta ) && $fitmas_commonMeta['fitmas_layout_meta'] != 'default' ) {
	$fitmas_postLayout = $fitmas_commonMeta['fitmas_layout_meta'];
} else {
	$fitmas_postLayout = fitmas_option( 'single_post_default_layout', 'right-sidebar' );
}

if ( is_array($fitmas_commonMeta) &&  array_key_exists( 'fitmas_sidebar_meta', $fitmas_commonMeta ) && $fitmas_commonMeta['fitmas_sidebar_meta'] != '0' ) {
	$fitmas_selectedSidebar = $fitmas_commonMeta['fitmas_sidebar_meta'];
} else {
	$fitmas_selectedSidebar = 'sidebar';
}

if ( $fitmas_postLayout == 'left-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) || $fitmas_postLayout == 'right-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) ) {
	$fitmas_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
} else {
	$fitmas_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if ( array_key_exists( 'fitmas_meta_enable_banner', $fitmas_commonMeta ) ) {
	$fitmas_postBanner = $fitmas_commonMeta['fitmas_meta_enable_banner'];
} else {
	$fitmas_postBanner = true;
}

$fitmas_breadcrumb_select_html = fitmas_option( 'fitmas_breadcrumb_select_html', 'h2' );
?>
	<?php if ( $fitmas_postBanner == true ): ?>
	<div class="breadcumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <<?php echo esc_attr( $fitmas_breadcrumb_select_html ); ?> class="breadcumb-title"> <?php esc_html_e( 'Blog Details','fitmas' ) ?> </<?php echo esc_attr( $fitmas_breadcrumb_select_html ); ?>>
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
	<?php endif; ?>


    <div id="primary" class="content-area blog-area space-top space-extra-bottom layout-<?php echo esc_attr( $fitmas_postLayout ); ?>">

        <div class="container post-details-wrapper">
            <div class="row">
				<?php
					if ( $fitmas_postLayout == 'left-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) ) {
						get_sidebar();
					}
				?>

                <div class="<?php echo esc_attr( $fitmas_pageColumnClass ); ?>">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
                </div>

				<?php
					if ( $fitmas_postLayout == 'right-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) ) {
						get_sidebar();
					} 
				?>
            </div>
        </div>
    </div><!-- #primary -->
<?php
get_footer();
