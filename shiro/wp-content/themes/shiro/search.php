<?php
get_header(); ?>
<div id="wrapper">
	<div id="container">
	<div id="content">
    	<div class="spacer">
    	<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shiro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'search' ); ?>
			<?php endwhile; ?>
		
        	<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-below">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'shiro' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'shiro' ) ); ?></div>
				</nav><!-- END #nav-below -->
			<?php endif; ?>	            
			
			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'shiro' ); ?></h1>
					</header>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'shiro' ); ?></p>
						<?php get_search_form(); ?>
					</div>
	 			</article>
			<?php endif; ?>
    	</div>  <!-- END #spacer -->      
	</div><!-- END #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>