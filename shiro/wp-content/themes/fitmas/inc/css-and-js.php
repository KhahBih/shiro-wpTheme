<?php 
/**
 * Enqueue scripts and styles.
 */
function fitmas_scripts() {
	global $wp_query;
	wp_enqueue_style('bootstrap', get_theme_file_uri('assets/css/bootstrap.min.css'), array(),  FITMAS_VERSION, 'all');
	wp_enqueue_style('bootstrap-icon', get_theme_file_uri('assets/css/bootstrap-icons.css'), array(),  FITMAS_VERSION , 'all');
	wp_enqueue_style('fontawesome-all', get_theme_file_uri('assets/css/fontawesome.min.css'), array(),  FITMAS_VERSION, 'all');
	wp_enqueue_style('magnific-popup', get_theme_file_uri('assets/css/magnific-popup.min.css'), array(), FITMAS_VERSION , 'all');
	wp_enqueue_style('slick', get_theme_file_uri('assets/css/slick.min.css'), array(), FITMAS_VERSION , 'all');
	wp_enqueue_style('fitmas-theme', get_theme_file_uri('assets/css/style.css'), array(), FITMAS_VERSION , 'all');
	wp_enqueue_style('fitmas-style', get_stylesheet_uri(), array(), FITMAS_VERSION, 'all');
	wp_style_add_data( 'fitmas-style', 'rtl', 'replace' );
	wp_enqueue_style( 'fitmas-default-fonts', '//fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&display=swap' );
	wp_enqueue_style( 'fitmas-default2-fonts', '//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap' );

	//Enqueue scripts.

	wp_enqueue_script('slick-min', get_theme_file_uri('assets/js/slick.min.js'), array(), FITMAS_VERSION , true);
	wp_enqueue_script('bootstrap', get_theme_file_uri('assets/js/bootstrap.min.js'), array(), FITMAS_VERSION, true);
	wp_enqueue_script('magnific-popup', get_theme_file_uri('assets/js/jquery.magnific-popup.min.js'), array('jquery'), FITMAS_VERSION , true);
	wp_enqueue_script('counterup', get_theme_file_uri('assets/js/jquery.counterup.min.js'), array(),  FITMAS_VERSION, true);
	wp_enqueue_script('jquery-ui', get_theme_file_uri('assets/js/jquery-ui.min.js'), array(),  FITMAS_VERSION, true);
	wp_enqueue_script('imagesloaded-pkgd', get_theme_file_uri('assets/js/imagesloaded.pkgd.min.js'), array(),  FITMAS_VERSION, true);
	wp_enqueue_script('isotope', get_theme_file_uri('assets/js/isotope.pkgd.min.js'), array(),  FITMAS_VERSION, true);
	wp_enqueue_script('bmi-calculator', get_theme_file_uri('assets/js/bmi.calculator.js'), array(),  FITMAS_VERSION, true);
	wp_enqueue_script('circle-progress', get_theme_file_uri('assets/js/circle-progress.js'), array('jquery'), FITMAS_VERSION , true);
	wp_enqueue_script('fitmas-main', get_theme_file_uri('assets/js/main.js'), array('jquery'), FITMAS_VERSION , true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fitmas_scripts' );
?>