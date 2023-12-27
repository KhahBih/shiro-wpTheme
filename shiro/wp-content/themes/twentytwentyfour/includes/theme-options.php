<?php
/**
 * Shiro Options
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 * @param string $hook_suffix The action passes the current page to the function. We don't
 * 	do anything if we're not on our theme options page.
 */
function shiro_admin_enqueue_scripts( $hook_suffix ) {

	wp_enqueue_style( 'shiro-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '2012-05-02' );
	wp_enqueue_script( 'shiro-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array( 'farbtastic' ), '2012-05-02' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_scripts-appearance_page_theme_options', 'shiro_admin_enqueue_scripts' );

/**
 * Register the form setting for our shiro_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, shiro_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 */
function shiro_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === shiro_get_theme_options() )
		add_option( 'shiro_theme_options', shiro_get_default_theme_options() );

	register_setting(
		'shiro_options',       // Options group, see settings_fields() call in shiro_theme_options_render_page()
		'shiro_theme_options', // Database option, see shiro_get_theme_options()
		'shiro_theme_options_validate', // The sanitization callback, see shiro_theme_options_validate()
		'shiro_custom_logo_validate' //The sanitization callback 2
	);
}
add_action( 'admin_init', 'shiro_theme_options_init' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 */
function shiro_theme_options_add_page() {
	add_theme_page(
		__( 'Shiro Options', 'Shiro' ), // Name of page
		__( 'Shiro Options', 'Shiro' ), // Label in menu
		'edit_theme_options',                  // Capability required
		'theme_options',                       // Menu slug, used to uniquely identify the page
		'shiro_theme_options_render_page'      // Function that renders the options page
	);
}
add_action( 'admin_menu', 'shiro_theme_options_add_page' );

/**
 * Returns the default options for Shiro.
 */ 
function shiro_get_default_theme_options() {
	$default_theme_options = array(
		'custom_color'   => '#FFCC00',
		'custom_favicon' => '',				
	);

	return apply_filters( 'shiro_default_theme_options', $default_theme_options );
}

/**
 * Returns the options array for Shiro.
 */
function shiro_get_theme_options() {
	return get_option( 'shiro_theme_options' );
}

/**
 * Returns the options array for Shiro.
 */
function shiro_theme_options_render_page() {
	?>
		<h1><?php printf( __( '%s Options', 'shiro' ), wp_get_theme() ); ?></h1>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'shiro_options' );
				$options = shiro_get_theme_options();
				$default_options = shiro_get_default_theme_options();
			?>

<h2><?php _e( 'Custom Color', 'shiro' ); ?></h2>

					<p><input id="link-color" type="text" name="shiro_theme_options[custom_color]"  value="<?php echo esc_attr( $options['custom_color'] ); ?>" />
							<a href="#" class="pickcolor hide-if-no-js" id="link-color-example"></a>
							<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'shiro' ); ?>">
							<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
							<br />
                            <label class="description"><?php printf( __( 'Changes the color of the blog title, the links, the widgets hover, the buttons, the meta-data, the menus hover and the background-color of the colored pages.', 'shiro' ), $default_options['custom_color'] ); ?></label><br />
							<label class="description"><?php printf( __( 'Default color: %s; Direct Code Input as HEX code or use Color Picker', 'shiro' ), $default_options['custom_color'] ); ?></label></p>
					
					<h2><?php _e( 'Custom Favicon', 'shiro' ); ?></h2><p>
						<input class="regular-text" type="text" name="shiro_theme_options[custom_favicon]" value="<?php esc_url( $options['custom_favicon'] ); ?>" />
						<label class="description" for="shiro_theme_options[custom_favicon]"><?php _e( 'Upload your .ico Favicon image (via FTP) to your server and enter the Favicon URL here.', 'shiro' ); ?></label>
						                  </p>


			<?php submit_button(); ?>
		</form>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 */
 
function shiro_theme_options_validate( $input ) {
	$output = $defaults = shiro_get_default_theme_options();

	// Our defaults for the link color may have changed, based on the color scheme.
	$output['custom_color'] = $defaults['custom_color'];

	// Link color must be 3 or 6 hexadecimal characters
	if ( isset( $input['custom_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['custom_color'] ) )
		$output['custom_color'] = '#' . strtolower( ltrim( $input['custom_color'], '#' ) );

	// Text options must be safe text with no HTML tags
 if ( isset( $input['custom_favicon'] ) ) {
         $custom_favicon = esc_url_raw( $input['custom_favicon'] );
                 if ( ! empty( $custom_favicon ) )
                         $output['custom_favicon'] = wp_filter_nohtml_kses( $custom_favicon);
 }


	return apply_filters( 'shiro_theme_options_validate', $output, $input, $defaults ); 

}

/**
 * Add a style block to the theme for the current link color.
 *
 * This function is attached to the wp_head action hook.
 */
function shiro_insert_custom_color() {
	$options = shiro_get_theme_options();
	$custom_color = esc_html( $options['custom_color'] );

	$default_options = shiro_get_default_theme_options();

?>
	<style>
			#site-title a, #site-title a:link {color: <?php echo $custom_color; ?>!important;}		
			a, a:link, a:visited {color: <?php echo $custom_color; ?>!important;}
			.widget a:hover, .widget a:active {color: <?php echo $custom_color; ?>!important;}
			#search_submit:hover, input#submit:hover, .mainpage #search_submit {background-color: <?php echo $custom_color; ?>!important;}
			.reply a:hover, .reply a:focus, .reply a:active {background-color: <?php echo $custom_color; ?>!important;}
			#content .entry-meta {border-top-color: <?php echo $custom_color; ?>!important;}
			#content #nav-below .nav-previous a:hover, #content #nav-below .nav-next a:hover, #content #nav-below .nav-previous a:focus, #content #nav-below .nav-next a:focus, #content #nav-below .nav-previous a:active, #content #nav-below .nav-next a:active, #comments .nav-previous a:hover, #comments .nav-next a:hover, #comments .nav-next a:focus, #comments .nav-previous a:focus, #comments .nav-previous a:active, #comments .nav-next a:active {background-color: <?php echo $custom_color; ?>!important;}
#primary #main-menu ul ul a:hover, #branding #main-menu ul ul ul a:hover {color: <?php echo $custom_color; ?>!important;}	
.mainpage #container {background-color: <?php echo $custom_color; ?>!important;}
#wpadminbar .quicklinks .menupop ul li a,#wpadminbar .quicklinks .menupop ul li a strong,#wpadminbar .quicklinks .menupop.hover ul li a, #wpadminbar.nojs .quicklinks .menupop:hover ul li a {color: #21759B!important;}			
#wpadminbar * {color: #CCCCCC!important;}
#wpadminbar.nojs .ab-top-menu > li.menupop:hover > .ab-item, #wpadminbar .ab-top-menu > li.menupop.hover > .ab-item {	color: #333!important;}
							
			
	</style>
<?php
}
add_action( 'wp_head', 'shiro_insert_custom_color' );