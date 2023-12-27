<form role="search" method="get" class="search-form wp-block-search__button-outside wp-block-search__text-button wp-block-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'fitmas' ) ?></span>
	<div class="search-button wp-block-search__inside-wrapper ">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search ', 'fitmas' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'fitmas' ) ?>" />
			<button type="submit" class="search-submit wp-block-search__button wp-element-button"><span class="fas fa-search"></span></button>
	</div>
</form>