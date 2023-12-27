<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fitmas
 */

get_header();

$fitmas_error_page_banner = fitmas_option( 'fitmas_error_page_banner', true );
$fitmas_error_page_title = fitmas_option( 'fitmas_error_page_title' );
$fitmas_breadcrumb_select_html = fitmas_option( 'fitmas_breadcrumb_select_html', 'h2' );
$fitmas_error_image = fitmas_option( 'fitmas_error_image' );
$fitmas_not_found_text = fitmas_option( 'fitmas_not_found_text' );
$fitmas_go_back_home = fitmas_option( 'fitmas_go_back_home', true );
$fitmas_error_page_button_text = fitmas_option( 'fitmas_error_page_button_text', esc_html( 'Back To HomePage', 'fitmas' ) );

?>
<?php if ( $fitmas_error_page_banner == true ): ?>
	<div class="breadcumb-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcumb-content">
						<<?php echo esc_attr($fitmas_breadcrumb_select_html); ?> class="breadcumb-title">
							<?php if ( !empty( $fitmas_error_page_title ) ) {
								echo esc_html( $fitmas_error_page_title );
							} ?>
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

<main id="primary" class="content-area space">
	
	<div class="error-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
					<?php if ( !empty( $fitmas_error_image['url'] ) ) : ?>
					<div class="error-thumb">
						<img src="<?php echo esc_url( $fitmas_error_image['url'] ); ?>" alt="<?php echo esc_attr( $fitmas_error_image['alt'] ) ?>" class="error-thumb">
					</div>
					<?php else : ?>
						<div class="text-404">
							<h2 class="big-404"><?php echo esc_html__( '404','fitmas' ); ?></h2>
						</div>
					<?php endif; ?>
					
					<div class="error-content">
						<?php echo wp_kses( $fitmas_not_found_text, fitmas_allow_html() ); ?>
					</div>
                    
					<?php if ( $fitmas_go_back_home == true ): ?>
						<div class="error-button button">
							<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php echo esc_html( $fitmas_error_page_button_text ); ?> </span></a>
						</div>
					<?php endif;?>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
