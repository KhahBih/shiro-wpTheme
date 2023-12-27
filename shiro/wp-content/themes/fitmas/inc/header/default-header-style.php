<?php
$fitmas_logo1 = fitmas_option('header_default_logo');
$fitmas_mobile = fitmas_option('header_mobile_logo');

$fitmas_enable_sticky_menu1 = fitmas_option( 'fitmas_enable_sticky_menu1' );
if ( $fitmas_enable_sticky_menu1 == true ) {
    $sticky = 'sticky-menu';
} else {
    $sticky = 'no-sticky';
}
?>

	<div class="popup-search-box">
    	<button class="searchClose"><i class="fal fa-times"></i></button>
        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" placeholder="<?php esc_attr_e( 'Search here... ', 'fitmas' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php esc_attr_e( 'Search here...:', 'fitmas' ) ?>" />
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
  
    <!--==============================
    Mobile Menu
    ============================== -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area text-center">
            <button class="menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
				<?php
					if( !empty( $fitmas_mobile['url'] ) ){
						$logoUrl = $fitmas_mobile['url'];
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>" >
						</a>
						<?php 
					}elseif(has_custom_logo()){
						the_custom_logo();
					}else{
						?>
						<h2>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php esc_html(bloginfo( 'name' )); ?>
							</a>
						</h2>
						<?php 
					}
				?>
            </div>
            <div class="mobile-menu">
				<?php
					wp_nav_menu(
						array(
							'container'      => false,
							'theme_location' => 'mainmenu',
							'menu_id'        => 'mainmenu',
							'menu_class'     => '',
							'echo'           => true,
							'fallback_cb'    => 'fitmas_Nav_Walker::fallback',
							'walker'         => new fitmas_Nav_Walker,
						)
					);
				?>
            </div>
        </div>
    </div>
    <!--==============================
	Header Area
==============================-->
<header class="nav-header default-header header-layout1">
	
	<div class="sticky-wrapper">
		<!-- Main Menu Area -->
		<div class="menu-area">
			<div class="container-fluid">
				<div class="row align-items-center justify-content-between">
					<div class="col-auto">
						<div class="header-logo">
							<?php
								if(!empty($fitmas_logo1['url'])){
									$logoUrl = $fitmas_logo1['url'];
									?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>">
										</a>
									<?php 
								}elseif(has_custom_logo()){
										the_custom_logo();
									}else{
									?>
										<h2>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
												<?php esc_html(bloginfo( 'name' )); ?>
											</a>
										</h2>
									<?php 
								}
							?>
						</div>
					</div>
					<div class="col-auto ms-auto">
						<nav class="main-menu d-none d-lg-inline-block">
							<?php
								wp_nav_menu(
									array(
										'container'      => false,
										'theme_location' => 'mainmenu',
										'menu_id'        => 'mainmenu',
										'menu_class'     => '',
										'echo'           => true,
										'fallback_cb'    => 'fitmas_Nav_Walker::fallback',
										'walker'         => new fitmas_Nav_Walker,
									)
								);
							?>
						</nav>
						<div class="navbar-right d-inline-flex d-lg-none">
							<button type="button" class="menu-toggle icon-btn"><i class="far fa-bars"></i></button>
						</div>
					</div>
					<div class="col-auto d-none d-lg-block">
						<div class="header-button">
							<button type="button" class="btn btn-border search-btn searchBoxToggler"><i class="fa-regular fa-magnifying-glass"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>