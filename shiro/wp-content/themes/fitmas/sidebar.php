<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fitmas
 */
if(is_page() || is_singular('post') || is_singular('fitmas_portfolio') || is_singular('fitmas_team') && get_post_meta($post->ID, 'fitmas_metabox', true)) {
    $fitmas_commonMeta = get_post_meta($post->ID, 'fitmas_metabox', true);
} else {
    $fitmas_commonMeta = array();
}


if(is_array($fitmas_commonMeta) && array_key_exists('fitmas_sidebar_meta', $fitmas_commonMeta)){
    $fitmas_selectedSidebar = $fitmas_commonMeta['fitmas_sidebar_meta'];
}else{
    $fitmas_selectedSidebar = 'sidebar';
}

if (is_array($fitmas_commonMeta) && array_key_exists( 'fitmas_sidebar_meta', $fitmas_commonMeta ) && $fitmas_commonMeta['fitmas_sidebar_meta'] != '0' ) {
	$fitmas_selectedSidebar = $fitmas_commonMeta['fitmas_sidebar_meta'];
} else {
	$fitmas_selectedSidebar = 'sidebar';
}


?>
<aside id="secondary" class="col-xxl-4 col-lg-5 sidebar-area">
    <div class="sidebar-sticky-area">
        <?php
            if( is_active_sidebar( $fitmas_selectedSidebar ) ) {
                dynamic_sidebar( $fitmas_selectedSidebar );
            }
        ?>
    </div>
</aside>
