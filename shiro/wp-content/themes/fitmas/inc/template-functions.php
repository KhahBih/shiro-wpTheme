<?php

if ( !function_exists( 'fitmas_option' ) ) {
    function fitmas_option( $option = '', $default = null ) {
        $defaults = fitmas_default_theme_options();
        $options = get_option( 'fitmas_theme_option' );
        $default = ( !isset( $default ) && isset( $defaults[$option] ) ) ? $defaults[$option] : $default;
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}


if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
function fitmas_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'fitmas-woo-active';
	}else{
		$classes[] = 'fitmas-woo-deactivate';
	}

	//Check Elementor Page Builder Used or not
	$elementor_used = get_post_meta(get_the_ID(), '_elementor_edit_mode', true);

	if(is_archive() || is_search()){
		$classes[]        = !!$elementor_used ? 'page-builder-not-used' : 'page-builder-not-used';
	}else{
		$classes[]        = !!$elementor_used ? 'page-builder-used' : 'page-builder-not-used';
	}

	return $classes;
}
add_filter( 'body_class', 'fitmas_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fitmas_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'fitmas_pingback_header' );


/**
 * Words limit
 */
function fitmas_words_limit($text, $limit) {
	$words = explode(' ', $text, ($limit + 1));

	if (count($words) > $limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}


/**
 * Get excluded sidebar list
 */
if( ! function_exists( 'fitmas_sidebars' ) ) {
	function fitmas_sidebars() {
		$default = esc_html__('Default', 'fitmas');
		$options = array($default);
		// set ids of the registered sidebars for exclude
		$exclude = array( 'fitmas-footer-widget' );

		global $wp_registered_sidebars;

		if( ! empty( $wp_registered_sidebars ) ) {
			foreach( $wp_registered_sidebars as $sidebar ) {
				if( ! in_array( $sidebar['id'], $exclude ) ) {
					$options[$sidebar['id']] = $sidebar['name'];
				}
			}
		}

		return $options;
	}
}


/**
 * Iframe embed
 */

function fitmas_iframe_embed( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'fitmas_iframe_embed', 10, 2 );

/**
 * Allow Html
 */
if ( !function_exists( 'fitmas_allow_html' ) ) {
	function fitmas_allow_html(){
		return array(
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'title'  => array(),
				'rel'    => array(),
			),
			'strong' => array(),
			'small'  => array(),
			'span'   => array(
			        'style' => array(),
            ),
			'p'      => array(),
			'br'     => array(),
			'img'    => array(
				'src'    => array(),
				'title'  => array(),
				'alt'    => array(),
				'width'  => array(),
				'height' => array(),
				'class'  => array(),
			),
			'h1'     => array(
				'class' => array(),
			),
			'h2'     => array(
				'class' => array(),
			),
			'h3'     => array(
				'class' => array(),
			),
			'h4'     => array(
				'class' => array(),
			),
			'h5'     => array(
				'class' => array(),
			),
			'h6'     => array(
				'class' => array(),
			),
		);
    }
}

/**
 * Next - Prev Post Link
 */
if ( !function_exists( 'fitmas_next_prev_post_link' ) ) {
	function fitmas_next_prev_post_link() {
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		if ( ! $prev_post && ! $next_post ) {
			return;
		}
		?>
		<nav class="fitmas-post-navication-thum" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'fitmas' ); ?></h2>
			<div class="nav-links">
				<?php
				if ( $prev_post ) : ?>
					<div class="nav-previous post-thum-nav">
	
						<div class="nav-holder">
							<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>" class="nav-label">
								<span class="nav-subtitle"><?php esc_html_e( 'Previous Post', 'fitmas' ); ?></span>
							</a>
						</div>
	
					</div>
				<?php endif; ?>
				<?php
				if ( $next_post ) : ?>
					<div class="nav-next post-thum-nav">
	
						<div class="nav-holder">
							<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>" class="nav-label">
								<span class="nav-subtitle"><?php esc_html_e( 'Next Post', 'fitmas' ); ?></span>
							</a>
						</div>
	
					</div>
	
				<?php endif; ?>
			</div>
		</nav>
		<?php
	} 
}

/**
 * Check if a post is a custom post type.
 *
 * @param mixed $post Post object or ID
 *
 * @return boolean
 */
function fitmas_custom_post_types( $post = null ) {
	$custom_post_list = get_post_types( array( '_builtin' => false ) );

	// there are no custom post types
	if ( empty ( $custom_post_list ) ) {
		return false;
	}

	$custom_types     = array_keys( $custom_post_list );
	$current_post_type = get_post_type( $post );

	// could not detect current type
	if ( ! $current_post_type ) {
		return false;
	}

	return in_array( $current_post_type, $custom_types );
}


/**
 * Add span tag in archive list count number
 */
function fitmas_add_span_archive_count($links) {
	$links = str_replace('</a>&nbsp;(', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('get_archives_link', 'fitmas_add_span_archive_count');


/**
 * Add span tag in category list count number
 */

function fitmas_add_span_category_count($links) {
	$links = str_replace('</a> (', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('wp_list_categories', 'fitmas_add_span_category_count');

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'fitmas_posted_on' ) ) :

	function fitmas_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'fitmas' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-calendar-check"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;


/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'fitmas_posted_by' ) ) :

	function fitmas_posted_by() {
		$author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
		$byline = sprintf(
			/* translators: %s: post author with link. */
			__( '<a href="%1$s" class="author vcard">%2$s</a>', 'fitmas' ),
			$author_url,
			esc_html( get_the_author() )
		);

		echo '<span class="byline"><i class="far fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;


/**
 * Prints HTML with meta information for the tags.
 */
if ( ! function_exists( 'fitmas_post_tags' ) ) :

	function fitmas_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'fitmas'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tagcloud"><span class="share-links-title">' .esc_html__('Tags:','fitmas').'</span>' .esc_html__(' %1$s', 'fitmas') . '</span>', $tags_list); // WPCS: XSS OK.


			}

		}
	}
endif;

/**
 * Prints HTML with meta information for the categories.
 */

if ( ! function_exists( 'fitmas_post_categories' ) ) :

	function fitmas_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'fitmas'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__('%1$s', 'fitmas') . '</span>', $categories_list); // WPCS: XSS OK.
			}

		}
	}
endif;

/**
 * Prints post's first category
 */

if ( ! function_exists( 'fitmas_post_first_category' ) ) :

	function fitmas_post_first_category(){

		$post_category_list = get_the_terms(get_the_ID(), 'category');

		$post_first_category = $post_category_list[0];
		if ( ! empty( $post_first_category->slug )) {
			echo '<span class="cat-links"><i class="far fa-folder"></i><a href="'.get_term_link( $post_first_category->slug, 'category' ).'">' . $post_first_category->name . '</a></span>';
		}

	}
endif;

/**
 * Prints HTML with meta information for the comments.
 */
if ( ! function_exists( 'fitmas_comment_count' ) ) :

	function fitmas_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
			echo '<span class="comments-link"><i class="far fa-comments"></i>';
			comments_popup_link('', ''.esc_html__('1', 'fitmas').' <span class="comment-count-text">'.esc_html__('Comment', 'fitmas').'</span>', '% <span class="comment-count-text">'.esc_html__('Comments', 'fitmas').'</span>');
			echo '</span>';
		}
	}
endif;


/*--------------------------------
COMMENT PAGINATION
----------------------------------*/

if ( !function_exists( 'fitmas_comments_pagination' ) ) {
    function fitmas_comments_pagination() {
        the_comments_pagination( array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ) );
    }
}


/*--------------------------------
Allode Megamenu
----------------------------------*/

add_filter('nav_menu_css_class', 'fitmas_megamenu_class', 10, 4);
function fitmas_megamenu_class($classes, $item, $args, $depth) {
    $navmega = get_post_meta($item->ID, 'fitmas_navmeta', true);

    if (in_array('menu-item-has-children', $classes) && $depth === 0) {
        if (!empty($navmega) && $navmega['fitmas_nav_megamenu_show'] == true) {
            $megamenu = 'mega ' . $navmega['fitmas_nav_megamenu_show'];
            $classes[] = $megamenu;
            $classes = array_diff($classes, array('no-mega'));
        } else {
            $classes[] = 'no-mega';
        }
    }

    return $classes;
}