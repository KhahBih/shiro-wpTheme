<?php
if(is_archive()){
	$post_item_layout = fitmas_option('fitmas_archive_layout', 'right-sidebar');
}else if(is_search()){
	$post_item_layout = fitmas_option('fitmas_search_layout', 'right-sidebar');
}else{
	$post_item_layout = fitmas_option('fitmas_blog_layout', 'right-sidebar');
}

if($post_item_layout == 'grid-ls' || $post_item_layout == 'grid-rs' || $post_item_layout == 'grid'){
	$word_count = 20;
}else{
	$word_count = 50;
}

$show_author_name = fitmas_option('fitmas_post_author', true);
$show_post_date = fitmas_option('fitmas_post_date', true);
$show_comment_number = fitmas_option('fitmas_cmnt_number', true);
$show_category = fitmas_option('fitmas_show_category', true);
$show_read_more = fitmas_option('fitmas_show_readmore', true);
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
		<?php
            if(get_post_format() === 'gallery'){
	            get_template_part( 'template-parts/post/post-format-gallery');
            }else if(get_post_format() === 'video'){
	            get_template_part( 'template-parts/post/post-format-video');
            }else if(get_post_format() === 'audio'){
	            get_template_part( 'template-parts/post/post-format-audio');
            }else{
	            get_template_part( 'template-parts/post/post-format-others');
            }
        ?>

		<div class="blog-content">

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="blog-meta">
					
					<?php if( $show_author_name == true):?>
					<?php fitmas_posted_by(); ?>
					<?php endif; ?>

					<?php if( $show_post_date == true):?>
					<?php fitmas_posted_on(); ?>
					<?php endif; ?>

					<?php if( $post_item_layout == 'full-width' || $post_item_layout == 'left-sidebar' || $post_item_layout == 'right-sidebar' ) : ?>
						<?php if ( get_comments_number() != 0 && $show_comment_number == true ) : ?>
							<?php fitmas_comment_count(); ?>
						<?php endif; ?>

						<?php if($show_category == true):?>
						<?php fitmas_post_first_category(); ?>
						<?php endif;?>
					<?php endif;?>
					
				</div>
			<?php endif; ?>

			<?php the_title( '<h3 class="blog-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<div class="post-excerpt">
				<p><?php echo fitmas_words_limit( get_the_excerpt(), $word_count ); ?><?php if ( ! empty( get_the_content() ) ) {
						echo ' [...]';
					} ?></p>
			</div>

			<?php if( $show_read_more == true ):
				$read_more_text = fitmas_option('fitmas_blog_read_text','Read More');
            ?>
			<div class="post-read-more">
					<a class="link-btn style2" href="<?php echo esc_url( get_the_permalink() ) ?>">
	                    <i class="fas fa-arrow-right"></i> <?php echo esc_html($read_more_text);?>
                    </a>
			</div>
			<?php endif; ?>
		</div>
</article>