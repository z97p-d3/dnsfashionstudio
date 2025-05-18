<?php /* Header Type 1 */
	$post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : get_the_ID();
	if( class_exists( 'WooCommerce' ) && safeguard_is_woo_page() && safeguard_get_option('woo_header_global','1') ){
		$post_ID = get_option( 'woocommerce_shop_page_id' ) ? get_option( 'woocommerce_shop_page_id' ) : $post_ID;
	} 

	$blogname = get_option('blogname');
	$tagline = get_option('blogdescription');
	$safeguard_header = apply_filters('safeguard_header_settings', $post_ID);
	$safeguard_header['header_background'] = $safeguard_header['header_background'] == '' ? 'white' : $safeguard_header['header_background'];
	$hover_effect = $safeguard_header['header_hover_effect'] > 0 ? 'cl-effect-'.$safeguard_header['header_hover_effect'] : '';

	$safeguard_logo_stl = safeguard_get_option('general_settings_logo_width') != '' ? 'max-width:'.esc_attr(safeguard_get_option('general_settings_logo_width')).'px;' : '';
	$safeguard_logo_stl .= safeguard_get_option('general_settings_logo_padding_top') != '' ? 'padding-top:'.esc_attr(safeguard_get_option('general_settings_logo_padding_top')).'px;' : '';
	$safeguard_logo_stl .= safeguard_get_option('general_settings_logo_padding_right') != '' ? 'padding-right:'.esc_attr(safeguard_get_option('general_settings_logo_padding_right')).'px;' : '';
	$safeguard_logo_stl .= safeguard_get_option('general_settings_logo_padding_bottom') != '' ? 'padding-bottom:'.esc_attr(safeguard_get_option('general_settings_logo_padding_bottom')).'px;' : '';
	$safeguard_logo_stl .= safeguard_get_option('general_settings_logo_padding_left') != '' ? 'padding-left:'.esc_attr(safeguard_get_option('general_settings_logo_padding_left')).'px;' : '';
	$safeguard_logo_stl = $safeguard_logo_stl != '' ? 'style="'.($safeguard_logo_stl).'"' : '';

	$safeguard_logo_text = safeguard_get_option('general_settings_logo_text') != '' ? '<div class="logo-text">'.wp_kses_post(safeguard_get_option('general_settings_logo_text')).'</div>' : '';
	
	
	$safeguard_plugin_installed = class_exists( 'TmplCustom' );
	
	
?>


	<header class="header

    <?php if ($safeguard_header['header_bar']) : ?>
	    header-topbar-view
	    header-topbarbox-1-<?php echo esc_attr($safeguard_header['header_topbarbox_1_position']) ?>
        header-topbarbox-2-<?php echo esc_attr($safeguard_header['header_topbarbox_2_position']) ?>
    <?php endif; ?>

        header-<?php echo esc_attr($safeguard_header['header_layout']) ?>-width

    <?php if ($safeguard_header['header_sticky'] == 'fixed') : ?>
        navbar-fixed-top
        navbar-fixed-js
    <?php elseif ($safeguard_header['header_sticky'] == 'sticky') : ?>
        navbar-fixed-top
        navbar-sticky-top
    <?php elseif ($safeguard_header['header_sticky'] == 'scroll') : ?> 
        navbar-fixed-top
        navbar-fixed-js
        navbar-sticky-scroll
    <?php endif; ?>

		header-background-<?php echo esc_attr( $safeguard_header['header_background'] ) ?><?php echo esc_attr( in_array($safeguard_header['header_background'], array('trans-white', 'trans-black')) ? '-rgba0' . $safeguard_header['header_transparent'] : '' ) ?>

	<?php if ( in_array($safeguard_header['header_background'], array('trans-white', 'white')) ) : ?>
        header-color-black
        header-logo-black
	<?php else : ?>
        header-color-white
        header-logo-white
	<?php endif; ?>

        header-navibox-1-<?php echo esc_attr($safeguard_header['header_navibox_1_position']) ?>
        header-navibox-2-<?php echo esc_attr($safeguard_header['header_navibox_2_position']) ?>
        header-navibox-3-<?php echo esc_attr($safeguard_header['header_navibox_3_position']) ?>
        header-navibox-4-<?php echo esc_attr($safeguard_header['header_navibox_4_position']) ?>

	<?php echo esc_attr($safeguard_header['mobile_sticky']) ?>
	<?php echo esc_attr($safeguard_header['mobile_topbar']) ?>
	<?php echo esc_attr($safeguard_header['tablet_minicart']) ?>
	<?php echo esc_attr($safeguard_header['tablet_search']) ?>
	<?php echo esc_attr($safeguard_header['tablet_phone']) ?>
	<?php echo esc_attr($safeguard_header['tablet_socials']) ?> 

	<?php echo esc_attr($safeguard_header['header_uniq_class']) ?>

       ">
		<div class="container container-boxed-width">
		<?php if ($safeguard_header['header_bar']) : ?>
			<div class="top-bar header-top-bar">
				<div class="container">
					<div class="header-topbarbox-1">
						<ul>
							<?php if ($safeguard_header['header_email']) : ?>
								<li><?php echo wp_kses_post(safeguard_get_option('header_email', '')) ?></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="header-topbarbox-2">
		                <?php
			            if ( has_nav_menu( 'top_nav' ) ) {
                            wp_nav_menu(array(
                                    'theme_location'  => 'top_nav',
                                    'container'       => false,
                                    'menu_id'		  => 'top-menu',
                                    'menu_class'      => '',
                                    'depth'           => 1
                            ));
                        }
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>
			<nav id="nav" class="navbar nav-level-1">
				<div class="container ">
					<div class="header-navibox-1 header-level1-box-left">
						<button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button ">
							<span class="toggle-menu-button-icon"><span></span> <span></span> <span></span> <span></span>
								<span></span> <span></span></span>
						</button>
						<a class="navbar-brand scroll" href="<?php echo esc_url(home_url('/')) ?>" <?php echo wp_kses_post($safeguard_logo_stl)?>>
							<?php if ($safeguard_header['logo']): ?>
								<img class="normal-logo"
								     src="<?php echo esc_url($safeguard_header['logo']) ?>"
								     alt="<?php echo esc_attr($tagline)?>"/>
							<?php elseif ($safeguard_plugin_installed):?>		 
								<img class="normal-logo"
								     src="<?php echo esc_url(get_template_directory_uri() . '/images/your-logo.png') ?>"
								     alt="<?php echo esc_attr($tagline)?>"/>
							<?php else: ?>
								<?php echo esc_attr($blogname)?>
							<?php endif ?>
							<?php if ($safeguard_header['logo_inverse']): ?>
								<img class="scroll-logo hidden-xs"
								     src="<?php echo esc_url($safeguard_header['logo_inverse']) ?>"
								     alt="<?php echo esc_attr($tagline)?>"/>
							<?php endif ?>
						</a>
						<?php echo wp_kses_post($safeguard_logo_text); ?>
					</div>
					<?php if ( $safeguard_header['header_menu'] ) : ?>
					<div class="header-navibox-2 header-level1-box-center" id="center-flex">
						<?php echo safeguard_site_menu('yamm main-menu nav navbar-nav ' . esc_attr($hover_effect). ' ' .esc_attr($safeguard_header['header_marker']) ); ?>
					</div>
					<?php endif; ?>

					<div class="header-navibox-3 header-level1-box-right">
						<ul class="nav navbar-nav hidden-xs">
						<?php if ( $safeguard_header['header_socials'] ) : ?>
							<?php if (safeguard_get_option('social_facebook', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_facebook', '')); ?>"
								       target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php } ?>
							<?php if (safeguard_get_option('social_twitter', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_twitter', '')); ?>"
								       target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php } ?>
							<?php if (safeguard_get_option('social_google', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_google', '')); ?>"
								       target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<?php } ?>
							<?php if (safeguard_get_option('social_instagram', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_instagram', '')); ?>"
								       target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php } ?>
							<?php if (safeguard_get_option('social_pinterest', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_pinterest', '')); ?>"
								       target="_blank"><i class="fa fa-pinterest"></i></a></li>
							<?php } ?>
							<?php if (safeguard_get_option('social_custom_url_1', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_custom_url_1', '')); ?>"
								       target="_blank"><i
												class="fa <?php echo esc_attr(safeguard_get_option('social_custom_icon_1', '')); ?>"></i></a>
								</li>
							<?php } ?>
							<?php if (safeguard_get_option('social_custom_url_2', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_custom_url_2', '')); ?>"
								       target="_blank"><i
												class="fa <?php echo esc_attr(safeguard_get_option('social_custom_icon_2', '')); ?>"></i></a>
								</li>
							<?php } ?>
							<?php if (safeguard_get_option('social_custom_url_3', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(safeguard_get_option('social_custom_url_3', '')); ?>"
								       target="_blank"><i
												class="fa <?php echo esc_attr(safeguard_get_option('social_custom_icon_3', '')); ?>"></i></a>
								</li>
							<?php } ?>
						<?php endif; ?>

							<?php if ( safeguard_get_option('header_search') ) : ?>
							<li class="header-search-icon"><a class="btn_header_search" href="#"><i class="fa fa-search"></i></a></li>
						    <?php endif; ?>

							<?php if ( $safeguard_header['header_menu_add_position'] != 'disable' ) : ?>
							<li>
								<button class=" js-toggle-<?php echo esc_attr($safeguard_header['header_menu_add_position'] == 'screen' ? 'screen' : $safeguard_header['header_menu_add_position'].'-slidebar') ?> toggle-menu-button ">
									<span class="toggle-menu-button-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
										<span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
								</button>
							</li>
							<?php endif; ?>

							<?php if ($safeguard_header['header_phone']) : ?>
								<li class="no-hover header-phone"><?php echo wp_kses_post(safeguard_get_option('header_phone', '')) ?> </li>
							<?php endif; ?>

						</ul>
						<?php if (class_exists('WooCommerce') && $safeguard_header['header_minicart']) : ?>
						<div class="header-navibox-4">
							<div class="header-cart">
								<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="theme-fonts-icon_bag_alt "
								                                                       aria-hidden="true"></i></a>
								<span class="header-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
							</div>
						</div>
					    <?php endif; ?>
					</div>

				</div>
			</nav>
		</div>
	</header>
