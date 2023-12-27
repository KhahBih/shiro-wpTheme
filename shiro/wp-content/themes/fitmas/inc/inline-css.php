<?php
if (class_exists('CSF')) {
    function fitmas_inline_style() {
        wp_enqueue_style('fitmas-inline', get_template_directory_uri() . '/assets/css/inline-style.css', array(), FITMAS_VERSION , 'all');
        $fitmas_css_editor = fitmas_option('fitmas_css_editor');
        if (!empty($fitmas_css_editor)) {
            $fitmas_inline = '' . esc_attr($fitmas_css_editor) . '';
            wp_add_inline_style('fitmas-inline', $fitmas_inline);
        }
    }
}
add_action('wp_enqueue_scripts', 'fitmas_inline_style');