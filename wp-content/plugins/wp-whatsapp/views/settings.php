<?php
if ( isset( $_GET['tab'] ) ) {
	$active_tab = sanitize_text_field( $_GET['tab'] );
} else {
	$active_tab = 'tab_one';
}
?>
<div class="wrap">
	<h1><?php echo esc_html__( 'Settings', 'wp-whatsapp' ); ?>	</h1>

	<?php settings_errors(); ?>
	<div id="njt-tabs">
		<ul class="nav-tab-wrapper nta-tab-wrapper">
			<li><a href="#tabs-1" class="nav-tab nta-selected-tab" data-action="njt_wa_save_woocommerce_setting"><?php echo esc_html__( 'WooCommerce Button', 'wp-whatsapp' ); ?></a></li>
			<li><a href="#tabs-2" class="nav-tab" data-action="njt_wa_save_analytics_setting"><?php echo esc_html__( 'Analytics', 'wp-whatsapp' ); ?></a></li>
			<li><a href="#tabs-3" class="nav-tab" data-action="njt_wa_save_url_setting"><?php echo esc_html__( 'WhatsApp URL', 'wp-whatsapp' ); ?></a></li>
			<li><a href="#tabs-4" class="nav-tab" data-action="njt_wa_save_user_role_setting"><?php echo esc_html__( 'User Role', 'wp-whatsapp' ); ?></a></li>
		</ul>
		<div class="nta-tabs-content">
			<form method="post" action="options.php">
				<div id="form-selected-account" autocomplete="off">
					<div id="tabs-1">
						<?php do_settings_sections( 'settings-whatsapp-1' ); ?>
					</div>
					<div id="tabs-2" style="display: none;">
						<?php do_settings_sections( 'settings-whatsapp-2' ); ?>
					</div>
					<div id="tabs-3" style="display: none;">
						<?php do_settings_sections( 'settings-whatsapp-3' ); ?>
					</div>
					<div id="tabs-4" style="display: none;">
						<?php do_settings_sections( 'settings-whatsapp-4' ); ?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>