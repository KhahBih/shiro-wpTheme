<?php
get_header(); ?>
<div id="wrapper">
	<div id="container">
	<div id="content">
		<?php the_post(); ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Tag Archives: %s', 'shiro' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
		</header>
		<?php rewind_posts(); ?>
		
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'tag' ); ?>
		<?php endwhile; ?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<nav id="nav-below">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'shiro' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'shiro' ) ); ?></div>
			</nav><!-- end #nav-below -->
		<?php endif; ?>		        
	</div><!-- END #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>