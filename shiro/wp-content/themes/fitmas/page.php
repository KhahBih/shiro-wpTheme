<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fitmas
 */

get_header();

if(get_post_meta( get_the_ID(), 'fitmas_metabox', true)) {
    $fitmas_commonMeta = get_post_meta( get_the_ID(), 'fitmas_metabox', true );
} else {
    $fitmas_commonMeta = array();
}

if(array_key_exists('fitmas_meta_page_navbar', $fitmas_commonMeta)){
	$fitmas_meta_page_navbar = $fitmas_commonMeta['fitmas_meta_page_navbar'];
}else{
	$fitmas_meta_page_navbar = '';
}

if(array_key_exists('fitmas_layout_meta', $fitmas_commonMeta)){
    $fitmas_pageLayout = $fitmas_commonMeta['fitmas_layout_meta'];
}else{
    $fitmas_pageLayout = 'full-width';
}

if(array_key_exists('fitmas_sidebar_meta', $fitmas_commonMeta)){
    $fitmas_selectedSidebar = $fitmas_commonMeta['fitmas_sidebar_meta'];
}else{
    $fitmas_selectedSidebar = 'sidebar';
}

if($fitmas_pageLayout == 'left-sidebar' && is_active_sidebar($fitmas_selectedSidebar) || $fitmas_pageLayout == 'right-sidebar' && is_active_sidebar($fitmas_selectedSidebar)){
    $fitmas_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $fitmas_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if(array_key_exists('fitmas_meta_enable_banner', $fitmas_commonMeta)){
    $fitmas_postBanner = $fitmas_commonMeta['fitmas_meta_enable_banner'];
}else{
    $fitmas_postBanner = true;
}

$fitmas_enable_page_cmt = fitmas_option('fitmas_enable_page_cmt', true );
$fitmas_breadcrumb_select_html = fitmas_option('fitmas_breadcrumb_select_html', 'h2');
?>
	<?php if($fitmas_postBanner == true ) : ?>

		<div class="breadcumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcumb-content">
							<<?php echo esc_attr($fitmas_breadcrumb_select_html); ?> class="breadcumb-title">
								<?php the_title(); ?> 
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
		<div class="container <?php echo esc_attr($fitmas_pageLayout); ?>">
			<div class="page-layout">
				<div class="row">

					<?php
						if($fitmas_pageLayout == 'left-sidebar' && is_active_sidebar($fitmas_selectedSidebar)){
							get_sidebar();
						}
					?>

					<div class="<?php echo esc_attr($fitmas_pageColumnClass); ?>">
						<div class="all-posts-wrapper">

						<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'page' );
							endwhile; // End of the loop.

							if( $fitmas_enable_page_cmt == true) :
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endif;
						?>
						</div>
					</div>

					<?php
					if($fitmas_pageLayout == 'right-sidebar' && is_active_sidebar($fitmas_selectedSidebar)){
						get_sidebar();
					}?>

				</div>
			
			</div>
		</div>
	</main><!-- #main -->
<?php get_footer();
