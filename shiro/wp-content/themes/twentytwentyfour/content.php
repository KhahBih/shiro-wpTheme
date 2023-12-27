<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap">
		<header class="entry-header">
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        	    <?php if ( get_post_type() != 'page' ) : ?>
                <p><?php echo get_the_date(); ?> // <?php printf( __( 'by', 'shiro' )); ?> <?php the_author(); ?> </p>
                <?php endif; ?>
		</header><!-- END .entry-header -->
        
		<div class="entry-content">
			<?php if ( is_archive() || is_search() ) : ?>
				<?php the_excerpt(); ?>			
			<?php else : ?>
				<?php if ( has_post_thumbnail() ): ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<?php endif; ?>            
				<?php the_content( __( '(more &rarr;)', 'shiro' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'shiro' ), 'after' => '</div>' )		 ); ?>
			</div><!-- END .entry-content -->

			<?php endif; ?>
			<div class="clear"></div>
			<footer class="entry-meta">
				<p> 
					<?php if ( count( get_the_category() ) && ( get_post_type() != 'page' ) ) : ?>
					<?php printf( __( 'Categories: %2$s', 'shiro' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>  
					<?php endif; ?>
					<?php $tags_list = get_the_tag_list( '', ', ' ); 
					if ( $tags_list ): ?>
						<?php printf( __( '| Tags: %2$s', 'shiro' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> 
					<?php endif; ?>
	    		</p>
                <p>	
	                <?php printf( __( 'Share on:', 'shiro' ) )?> 
				
    	            <!-- get clean titles -->
        	        <?php
						ob_start();
						the_title_attribute();
						$title = ob_get_clean();
					?>                
    		        <!--Twitter -->
        		    <a href="http://twitter.com/home?status=Currently%20reading:<?php echo urlencode(the_title_attribute('echo=0')); ?>%20<?php echo urlencode( get_permalink( $post->ID ) ); ?>" target="_blank"> <?php printf( __( 'Twitter', 'shiro' ) )?></a>, 
	            	<!--Facebook-->
		            <a href="https://www.facebook.com/share.php?u=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&amp;t=<?php echo urlencode (the_title_attribute('echo=0')); ?>" target="_blank"><?php printf( __( 'Facebook', 'shiro' ) )?></a>, 
    		        <!--Delicious -->
        		    <a href="http://del.icio.us/post?v=4;url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>" target="_blank"><?php printf( __( 'Delicious', 'shiro' ) )?></a> |
                	<!--Permalink-->
	       			<a href="<?php echo get_permalink(); ?>"><?php _e( 'Permalink ', 'shiro' ); ?></a>
					<!--Admin Edit-->
					<?php edit_post_link( __( 'Edit &rarr;', 'shiro' ), '| <span class="edit-link">', '</span>' ); ?> 
	            </p>					                 
		</footer>
	</div><!-- END .entry-wrap-->            
</article>
