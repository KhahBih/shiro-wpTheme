<?php
/**
 * Template Name: Full-Width, No Sidebar
 */

get_header(); ?>
<div id="wrapper">
	<div id="container" class="full-width">
	<div id="content">
		<?php the_post(); ?>
		<?php get_template_part( 'content', 'page' ); ?>
		<?php comments_template( '', true ); ?>
	</div><!-- END #content -->
<?php get_footer(); ?>