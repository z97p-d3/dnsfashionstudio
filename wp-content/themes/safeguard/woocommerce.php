<?php
/* Woocommerce template. */
$safeguard_id = safeguard_woo_get_page_id();
$safeguard_isProduct = false;

if ( is_single() && get_post_type() == 'product' ) {
	$safeguard_isProduct = true;
}

$safeguard_custom = $safeguard_id > 0 ? get_post_custom($safeguard_id) : array();
$safeguard_layout = isset ($safeguard_custom['pix_page_layout']) ? reset($safeguard_custom['pix_page_layout']) : '2';
$safeguard_sidebar = isset ($safeguard_custom['pix_selected_sidebar'][0]) ? reset($safeguard_custom['pix_selected_sidebar']) : 'sidebar-1';

if ( $safeguard_isProduct === true ) {
	$safeguard_useSettingsGlobal = safeguard_get_option( 'shop_settings_global_product', 'on' );
	if ( $safeguard_useSettingsGlobal == 'on' ) {
		$safeguard_layout = safeguard_get_option( 'shop_settings_sidebar_type', '2');
		$safeguard_sidebar = safeguard_get_option( 'shop_settings_sidebar_content', 'product-sidebar-1' );
	}
}

if ( ! is_active_sidebar($safeguard_sidebar) ) $safeguard_layout = '1';

get_header(); ?>


<section class="page-section">
	<div class="container">
		<div class="row">
			<main class="main-content">

				<?php safeguard_show_sidebar( 'left', $safeguard_layout, $safeguard_sidebar, 1 ); ?>

				<div class="rtd <?php if ( $safeguard_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($safeguard_layout == 2 ? 'right' : ($safeguard_layout == 3 ? 'left' : 'hide')); ?>">

					<?php  woocommerce_content(); ?>

				</div>

				<?php safeguard_show_sidebar( 'right', $safeguard_layout, $safeguard_sidebar, 1 ); ?>

			</main>

		</div>
	</div>
</section>

<?php get_footer();?>
