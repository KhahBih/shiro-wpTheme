<?php
/**
 * The template for displaying all portfolio single posts
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

$fitmas_project_related = fitmas_option( 'fitmas_project_related', true );
$fitmas_project_related_title = fitmas_option( 'fitmas_project_related_title' );
$fitmas_project_banner_enable = fitmas_option( 'fitmas_project_banner_enable' );
$fitmas_breadcrumb_select_html = fitmas_option( 'fitmas_breadcrumb_select_html', 'h2' );
if ( array_key_exists( 'fitmas_layout_meta', $fitmas_commonMeta ) && !empty( $fitmas_commonMeta['fitmas_layout_meta'] ) ) {
    $fitmas_portfolio_Layout = $fitmas_commonMeta['fitmas_layout_meta'];
} else {
    $fitmas_portfolio_Layout = 'full-width';
}
if ( is_array( $fitmas_commonMeta ) && array_key_exists( 'fitmas_sidebar_meta', $fitmas_commonMeta ) ) {
    $fitmas_selectedSidebar = $fitmas_commonMeta['fitmas_sidebar_meta'];
} else {
    $fitmas_selectedSidebar = 'sidebar';
}

if ( $fitmas_portfolio_Layout == 'left-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) || $fitmas_portfolio_Layout == 'right-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) ) {
    $fitmas_portfolioColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
} else {
    $fitmas_portfolioColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if ( $fitmas_project_banner_enable == true ) {
    $fitmas_portfolio_post_Banner = true;
} if ( array_key_exists( 'fitmas_meta_enable_banner', $fitmas_commonMeta ) ) {
    $fitmas_portfolio_post_Banner = $fitmas_commonMeta['fitmas_meta_enable_banner'];
} else {
    $fitmas_portfolio_post_Banner = true;
}

?>
	<?php if ( $fitmas_portfolio_post_Banner == true ): ?>

		<div class="breadcumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcumb-content">
							<<?php echo esc_attr( $fitmas_breadcrumb_select_html ); ?> class="breadcumb-title"> <?php the_title(); ?> </<?php echo esc_attr( $fitmas_breadcrumb_select_html ); ?>>
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

	<main id="primary" class="site-main content-area portfolio-area space-top space-extra-bottom">
		<div class="container">
			<div class="page-layout <?php echo esc_attr( $fitmas_portfolio_Layout ); ?>">
				<div class="row">
					<?php
						if ( $fitmas_portfolio_Layout == 'left-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) ) {
							get_sidebar();
						}
						?>
					<div class="<?php echo esc_attr( $fitmas_portfolioColumnClass ); ?>">
						<div class="all-posts-wrapper">
                            <?php
                                while ( have_posts() ):
                                    the_post();
                                    the_content();
                                endwhile; // End of the loop.
							?>

						</div>
					</div>
					<?php
						if ( $fitmas_portfolio_Layout == 'right-sidebar' && is_active_sidebar( $fitmas_selectedSidebar ) ) {
							get_sidebar();
						}?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();