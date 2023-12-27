<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fitmas
 */

get_header();
$fitmas_searchLayout = fitmas_option('fitmas_search_layout', 'right-sidebar');
$fitmas_search_banner = fitmas_option('fitmas_search_banner', true);
$fitmas_search_pagination = fitmas_option('fitmas_search_pagination', true);
$fitmas_breadcrumb_select_html = fitmas_option('fitmas_breadcrumb_select_html', 'h2');

?>
	<?php if($fitmas_search_banner == true ) : ?>
		<div class="breadcumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcumb-content">
							<<?php echo esc_attr($fitmas_breadcrumb_select_html); ?> class="breadcumb-title">
								<?php 
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'fitmas' ), '<span>' . get_search_query() . '</span>' );
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
	<?php endif; ?>

	<main id="primary" class="site-main content-area space">
		<div class="container page-layout <?php echo esc_attr($fitmas_searchLayout); ?>">
			<?php
				if ( $fitmas_searchLayout == 'grid' ) {
					get_template_part( 'template-parts/post/post-grid' );
				} else {
					get_template_part( 'template-parts/post/post-sidebar' );
				}
			?>	
		</div>
	</main><!-- #main -->
<?php get_footer();
