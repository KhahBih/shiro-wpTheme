<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fitmas
 */


$post_author = fitmas_option('fitmas_single_post_author', true);
$post_date = fitmas_option('fitmas_single_post_date', true);
$post_comment_number = fitmas_option('fitmas_single_post_cmnt', true);
$post_cat_name = fitmas_option('fitmas_single_post_cat', true);
$post_tag = fitmas_option('fitmas_single_post_tag', true);
$post_share = fitmas_option('fitmas_post_share', true);
$post_nav = fitmas_option('fitmas_post_nav', true);
$author_profile = fitmas_option('fitmas_author_profile', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single'); ?>>
	
		<?php
		if ( get_post_format() === 'gallery' ) {
			get_template_part( 'template-parts/post/post-format-gallery' );
		} else if ( get_post_format() === 'video' ) {
			get_template_part( 'template-parts/post/post-format-video' );
		} else if ( get_post_format() === 'audio' ) {
			get_template_part( 'template-parts/post/post-format-audio' );
		} else {
			get_template_part( 'template-parts/post/post-format-others' );
		}
		?>
		<div class="blog-content">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="blog-meta">
					
						<?php if ($post_author == true) : ?>
							<?php fitmas_posted_by(); ?>
						<?php endif; ?>

						<?php if ($post_date == true) :?>
							<?php fitmas_posted_on(); ?>
						<?php endif; ?>

						<?php if ( get_comments_number() != 0 && $post_comment_number == true) : ?>
							<?php fitmas_comment_count(); ?>
						<?php endif; ?>

						<?php if ($post_cat_name == true) :?>
							<?php fitmas_post_categories(); ?>
						<?php endif; ?>
					
				</div>
			<?php endif; ?>


			<div class="entry-content">
				<?php
				the_title( '<h2 class="blog-title">', '</h2>' );
				the_content( sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fitmas' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fitmas' ),
					'after'  => '</div>',
				) );
				?>
			</div>
		</div><!-- .entry-content -->
	
	

	<?php if (has_tag() && $post_tag == true) :?>
        <footer class="post-footer">
            <div class="share-links">
				<?php fitmas_post_tags(); ?>
            </div>
			<?php if ( function_exists( 'fitmas_post_share' ) && $post_share == true) {
				fitmas_post_share();
			} ?>
        </footer><!-- .entry-footer -->
	<?php endif; ?>
	
	<?php

	$total_post = wp_count_posts('post')->publish;
	if($total_post > 1 && $post_nav == true) {
		fitmas_next_prev_post_link();
	}

	if( $author_profile == true ){
		get_template_part( 'inc/author','info');
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->