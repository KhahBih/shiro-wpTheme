<?php get_header(); ?>

<div id="wrapper">
	<div id="container">
	<div id="content">
		<?php /* Start the Loop */ ?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'single' ); ?>
			<nav id="nav-posts">
				<div class="nav-previous"><?php previous_post_link(); ?></div>
				<div class="nav-next"><?php next_post_link(); ?> </div>                
			</nav> 
			<?php comments_template( '', true ); ?>
   
		<?php endwhile; // end of the loop. ?>

   		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<nav id="nav-below">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'shiro' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'shiro' ) ); ?></div>
			</nav><!-- END #nav-below -->
		<?php endif; ?>	

	</div><!-- END #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
