<?php /* Header Type 3 */
	$post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : get_the_ID();
	if( class_exists( 'WooCommerce' ) && safeguard_is_woo_page() && safeguard_get_option('woo_header_global','1') ){
		$post_ID = get_option( 'woocommerce_shop_page_id' ) ? get_option( 'woocommerce_shop_page_id' ) : $post_ID;
	} elseif (!is_page_template('page-home.php') && get_option('page_for_posts') != ''){
		$post_ID = get_option('page_for_posts') ? get_option('page_for_posts') : 0;
	}

	$blogname = get_option('blogname');
	$tagline = get_option('blogdescription');
	$safeguard_header = apply_filters('safeguard_header_settings', $post_ID);
	$bg_color = $safeguard_header['header_background'] == 'white' ? 'white' : 'black';
	$menu_canvas = array(
			'' => 'slidebar-panel-left left overlay',
			'fixed' => 'menu-sidebar-fixed left overlay open',
			'horizontal' => 'slidebar-panel-left left '.$safeguard_header['header_menu_animation'],
			'vertical' => 'slidebar-panel-left left '.$safeguard_header['header_menu_animation'],
	);
	$menu_class = array(
			'' => '',
			'fixed' => '',
			'horizontal' => '',
			'vertical' => 'slidebar-nav-middle',
	);
	
	$safeguard_plugin_installed = class_exists( 'TmplCustom' );
?>

<?php if ($safeguard_header['header_sidebar_view'] != 'fixed') : ?>
<div class="slidebar-panel <?php echo esc_attr($menu_class[$safeguard_header['header_sidebar_view']]) ?>">
<?php endif; ?>

<div data-off-canvas="<?php echo esc_attr($menu_canvas[$safeguard_header['header_sidebar_view']]) ?>" class="

    <?php if ($safeguard_header['header_sidebar_view'] == 'fixed') : ?>
        menu-sidebar-fixed
    <?php endif; ?>

	header-background-<?php echo esc_attr( $bg_color ) ?>

	<?php if ( $bg_color == 'white' ) : ?>
        header-color-black
        header-logo-black
	<?php else : ?>
        header-color-white
        header-logo-white
	<?php endif; ?>

	<?php echo esc_attr($safeguard_header['header_uniq_class']) ?>
	">

	<div class="side-logo">
		<a class="navbar-brand" href="<?php echo esc_url(home_url('/')) ?>">
		<?php if ( $bg_color == 'black' ) : ?>
			<?php if ($safeguard_header['logo']): ?>
				<img class="normal-logo"
				     src="<?php echo esc_url($safeguard_header['logo']) ?>"
				     alt="<?php echo esc_attr($tagline)?>"/>
			<?php elseif ($safeguard_plugin_installed):?>		 
				<img class="normal-logo"
					 src="<?php echo esc_url(get_template_directory_uri(). '/images/your-logo.png') ?>"
					 alt="<?php echo esc_attr($tagline)?>"/>		 
			<?php else: ?>
				<?php echo esc_attr($blogname)?>
			<?php endif ?>
		<?php else : ?>
			<?php if ($safeguard_header['logo_inverse']): ?>
				<img class="scroll-logo"
				     src="<?php echo esc_url($safeguard_header['logo_inverse']) ?>"
				     alt="<?php echo esc_attr($tagline)?>"/>
			<?php endif ?>
		<?php endif; ?>
		</a>
	</div>


	<?php if (class_exists('WooCommerce') && $safeguard_header['header_minicart']) : ?>
		<div class="side-cart">
			<div class="header-cart">
				<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="theme-fonts-icon_bag_alt"
				                                                       aria-hidden="true"></i></a>
				<span class="header-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
			</div>
			<span class="title"><?php esc_attr_e( 'Your Cart:', 'safeguard' )?> <span class="amount"><?php echo WC()->cart->get_cart_total(); ?></span></span>
		</div>
	<?php endif; ?>


	<?php if ( safeguard_get_option('header_search') ) : ?>
	<div class="side-search">
		<div class="side-form-search">
			<form action="<?php echo esc_url(home_url()) ?>" method="get">
				<input type="search" class="search-field" placeholder="<?php !safeguard_get_option('search_placeholder','') ? esc_attr_e('Search...', 'safeguard') : esc_attr(safeguard_get_option('search_placeholder','')) ?>" name="s" id="search" value="<?php esc_attr(the_search_query()); ?>">
				<button class="button"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
    <?php endif; ?>

	<?php echo safeguard_site_menu('nav navbar-nav'); ?>

</div>

<?php if ($safeguard_header['header_sidebar_view'] != 'fixed') : ?>
	<div class="slidebar-nav-panel  ">
		<button class="js-open-slidebar-panel-left   toggle-menu-button ">
			<span class="toggle-menu-button-icon"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> </span>
            
            <span class="sidebar-nav-name">
            	<?php echo wp_get_nav_menu_name( 'primary_nav' ); ?>
            </span>
		</button>
	</div>
<?php endif; ?>

<?php if ($safeguard_header['header_sidebar_view'] != 'fixed') : ?>
</div>
<?php endif; ?>