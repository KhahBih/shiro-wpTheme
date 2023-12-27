<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fitmas
 */

get_header();

$fitmas_archiveLayout = fitmas_option( 'fitmas_archive_layout', 'right-sidebar' );
$fitmas_archive_banner = fitmas_option( 'fitmas_archive_banner', true );
$fitmas_breadcrumb_select_html = fitmas_option( 'fitmas_breadcrumb_select_html', 'h2' );
$fitmas_archive_pagination = fitmas_option( 'fitmas_archive_pagination', true );
?>
	<?php if($fitmas_archive_banner == true ) : ?>
	<div class="breadcumb-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcumb-content">
					<?php the_archive_title( '<'.esc_attr($fitmas_breadcrumb_select_html).' class="archive-title breadcumb-title">', '</'.esc_attr($fitmas_breadcrumb_select_html).'>' ); ?>
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

	<main id="primary" class="site-main content-area blog-area space-top space-extra-bottom">
		<div class="container page-layout <?php echo esc_attr($fitmas_archiveLayout); ?>">
			<?php
				if ( $fitmas_archiveLayout == 'grid' ) {
					get_template_part( 'template-parts/post/post-grid' );
				} else {
					get_template_part( 'template-parts/post/post-sidebar' );
				}
			?>
		</div>
	</main>
<?php get_footer();
