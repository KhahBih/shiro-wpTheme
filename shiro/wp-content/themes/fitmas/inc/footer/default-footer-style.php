<?php 
$fitmas_copyright = fitmas_option( 'fitmas_copyright_text' );
?>
<div class="container footer-default">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="widget-area">
        <div class="row justify-content-between">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>	

            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>
        </div>
    </div>
	<?php endif?>
</div>
<div class="copyright-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto align-self-center"><p class="copyright-text text-center"><?php echo wp_kses( $fitmas_copyright, 'fitmas_allow_html' ); ?></p></div>
        </div>                
    </div>
</div>