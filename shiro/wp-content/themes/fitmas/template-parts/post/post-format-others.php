<?php 
if( is_single() ){
    $thum = 'blog-thumb';
}else{
    $thum = 'blog-img';
}
if ( has_post_thumbnail() ) : ?>

	<div class="post-thumbnail-wrapper <?php echo esc_attr( $thum ); ?>">
		<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'fitmas-large' ) ?>"
		     alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
	</div>

<?php endif; ?>