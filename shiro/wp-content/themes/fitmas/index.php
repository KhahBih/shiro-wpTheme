<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fitmas
 */

get_header();
$fitmas_blogc_title = fitmas_option( 'fitmas_blog_title' );
$fitmas_blog_home_stitle = fitmas_option( 'fitmas_blog_home_stitle', '' );
$fitmas_breadcrumb_select_html = fitmas_option( 'fitmas_breadcrumb_select_html', 'h2' );
$fitmas_banner_enable = fitmas_option( 'fitmas_blog_banner_enable', true );
$fitmas_blog_layout = fitmas_option( 'fitmas_blog_layout', 'right-sidebar' );
?>
<?php if ( $fitmas_banner_enable == true ) : ?>
	<div class="breadcumb-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcumb-content">
						<<?php echo esc_attr( $fitmas_breadcrumb_select_html ); ?> class="breadcumb-title"><?php echo esc_html( $fitmas_blogc_title ); ?></<?php echo esc_attr( $fitmas_breadcrumb_select_html ); ?>>
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
<main id="primary" class="site-main blog-area space-top space-extra-bottom page-layout-<?php echo esc_attr( $fitmas_blog_layout ); ?>">
	<div class="container">
		<?php
			if ( $fitmas_blog_layout == 'grid' ) {
				get_template_part( 'template-parts/post/post-grid' );
			} else {
				get_template_part( 'template-parts/post/post-sidebar' );
			}?>
	</div>
</main>
<?php
get_footer();
