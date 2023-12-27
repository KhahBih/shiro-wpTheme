<?php
/**
 * Template Name: Colored Background, No Sidebar
 */

get_header(); ?>
	<div id="wrapper" class="mainpage">
    	<div id="container"  class="full-width">
		<div id="content">
		<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- END #content -->

<?php get_footer(); ?>



