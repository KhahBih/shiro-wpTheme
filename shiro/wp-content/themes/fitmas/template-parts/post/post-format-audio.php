<?php

if ( get_post_meta( $post->ID, 'fitmas_postmeta_audio', true ) ) {
	$audio_meta = get_post_meta( $post->ID, 'fitmas_postmeta_audio', true );
} else {
	$audio_meta = array();
}

if ( array_key_exists( 'fitmas_post_audio', $audio_meta ) && !empty($audio_meta['fitmas_post_audio'])) {
	$embade_code = $audio_meta['fitmas_post_audio'];
} else {
	$embade_code = '';
}

if( is_single() ){
    $thum = 'blog-thumb';
}else{
    $thum = 'blog-img';
}

?>


<?php if( $embade_code ) : ?>
    <div class="post-thumbnail-wrapper <?php echo esc_attr( $thum ); ?>">
        <div class="audio-iframe-wrapper">
            <?php echo fitmas_iframe_embed( $embade_code, '' ); ?>
        </div>
    </div>
<?php else : ?>
	<?php if ( has_post_thumbnail() ) : ?>

        <div class="post-thumbnail-wrapper <?php echo esc_attr( $thum ); ?>">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'fitmas-large' ) ?>"
                 alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
        </div>

	<?php endif; ?>
<?php endif; ?>