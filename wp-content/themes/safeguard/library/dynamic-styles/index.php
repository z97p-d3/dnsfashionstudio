<?php //header("Content-type: text/css; charset: UTF-8");
$_REQUEST['pageID']= get_the_ID();

$safeguard_customize = get_option( 'safeguard_customize_options' );

if(get_post_meta($_REQUEST['pageID'], 'page_google_font', 1) != '' && substr_count(get_post_meta($_REQUEST['pageID'], 'page_google_font', 1), 'Select+Google+Font') == 0){
    $safeguard_font = preg_split('/\:/', get_post_meta($_REQUEST['pageID'], 'page_google_font', 1));
    $safeguard_font = str_replace('+', ' ', !isset($safeguard_font[0]) || $safeguard_font[0] == '' ? '' : str_replace('+', ' ', $safeguard_font[0]));
} else {
    $safeguard_font = safeguard_get_option('font', get_option('safeguard_default_font'));
}
$safeguard_font_weight = get_post_meta($_REQUEST['pageID'], 'page_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_font_weight', 1) : safeguard_get_option('font_weight', get_option('safeguard_default_font_weight'));
if(get_post_meta($_REQUEST['pageID'], 'page_google_font_title', 1) != '' && substr_count(get_post_meta($_REQUEST['pageID'], 'page_google_font_title', 1), 'Select+Google+Font') == 0){
    $safeguard_title = preg_split('/\:/', get_post_meta($_REQUEST['pageID'], 'page_google_font_title', 1));
    $safeguard_title = str_replace('+', ' ', !isset($safeguard_title[0]) || $safeguard_title[0] == '' ? '' : str_replace('+', ' ', $safeguard_title[0]));
} else {
    $safeguard_title = safeguard_get_option('font', get_option('safeguard_default_title'));
}
$safeguard_font = get_post_meta($_REQUEST['pageID'], 'page_font', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_font', 1) : safeguard_get_option('font', get_option('safeguard_default_font'));
$safeguard_font_weight = get_post_meta($_REQUEST['pageID'], 'page_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_font_weight', 1) : safeguard_get_option('font_weight', get_option('safeguard_default_font_weight'));
$safeguard_title = get_post_meta($_REQUEST['pageID'], 'page_title_font', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_title_font', 1) : safeguard_get_option('title_font', get_option('safeguard_default_title'));
$safeguard_title_weight = get_post_meta($_REQUEST['pageID'], 'page_title_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_title_font_weight', 1) : safeguard_get_option('title_font_weight', get_option('safeguard_default_title_weight'));
$safeguard_subtitle = get_post_meta($_REQUEST['pageID'], 'page_subtitle_font', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_subtitle_font', 1) : safeguard_get_option('subtitle_font', get_option('safeguard_default_subtitle'));
$safeguard_subtitle_weight = get_post_meta($_REQUEST['pageID'], 'page_subtitle_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_subtitle_font_weight', 1) : safeguard_get_option('subtitle_font_weight', get_option('safeguard_default_subtitle_weight'));

$safeguard_main_color = safeguard_get_option('style_settings_main_color', get_option('safeguard_default_main_color'));
$safeguard_gradient_color = safeguard_get_option('style_settings_gradient_color', get_option('safeguard_default_gradient_color'));
$safeguard_additional_color = get_post_meta($_REQUEST['pageID'], 'page_additional_color', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_additional_color', 1) : safeguard_get_option('style_settings_additional_color', get_option('safeguard_default_additional_color'));
$page_color = get_post_meta($_REQUEST['pageID'], 'page_main_color', 1);
if($page_color){
	$safeguard_main_color = $page_color;
	$safeguard_gradient_color = '';
}
$page_gradient_color = get_post_meta($_REQUEST['pageID'], 'page_gradient_color', 1);
if($page_gradient_color){
	$safeguard_gradient_color = $page_gradient_color;
}

$page_layout = get_post_meta($_REQUEST['pageID'], 'page_layout', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_layout', 1) : safeguard_get_option('style_general_settings_layout', 'normal');
$page_bg_image = get_post_meta($_REQUEST['pageID'], 'boxed_bg_image', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'boxed_bg_image', 1) : safeguard_get_option('general_settings_bg_image', '');
$page_bg_color = get_post_meta($_REQUEST['pageID'], 'page_bg_color', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_bg_color', 1) : safeguard_get_option('style_settings_bg_color', '');

$tab_bg_image_fixed = safeguard_get_option('tab_bg_image_fixed', '0');
$tab_bg_color = safeguard_get_option('tab_bg_color', get_option('safeguard_default_tab_bg_color')); //safeguard_hex2rgb(safeguard_get_option('tab_bg_color', '#000000'));
$tab_bg_color_gradient = safeguard_get_option('tab_bg_color_gradient', get_option('safeguard_default_tab_bg_color_gradient'));
$tab_gradient_direction = safeguard_get_option('tab_gradient_direction', get_option('safeguard_default_tab_gradient_direction'));
$tab_bg_opacity = safeguard_get_option('tab_bg_opacity', get_option('safeguard_default_tab_bg_opacity'));
$tab_padding_top = safeguard_get_option('tab_padding_top', get_option('safeguard_default_tab_padding_top'));
$tab_padding_bottom = safeguard_get_option('tab_padding_bottom', get_option('safeguard_default_tab_padding_bottom'));
$tab_margin_bottom = safeguard_get_option('tab_margin_bottom', get_option('safeguard_default_tab_margin_bottom'));
$tab_border = safeguard_get_option('tab_border', get_option('safeguard_default_tab_border'));

if($page_layout == 'boxed' && $page_bg_image) {
    include_once(get_template_directory() . '/library/dynamic-styles/boxed.php');
}
include_once(get_template_directory() . '/library/dynamic-styles/header.php');
include_once(get_template_directory() . '/library/dynamic-styles/font.php');
if($safeguard_main_color != ''){
    include_once(get_template_directory() . '/library/dynamic-styles/main_color.php');
}
if($safeguard_main_color != '' && $safeguard_gradient_color != ''){
    include_once(get_template_directory() . '/library/dynamic-styles/gradient_color.php');
}
if($safeguard_additional_color != ''){
    include_once(get_template_directory() . '/library/dynamic-styles/additional_color.php');
}


?>


<?php
/*   PAGE CUSTOM MAIN COLOR   */

if($page_color) :

?>

html .isotope-item .slide-desc,
html .header-cart-count,
html .yp-demo-link {
    background: <?php echo esc_attr($page_color)?> !important;
}
html .wrap-features .wrap-feature-item .feature-item .number,
html .nav-tabs-vertical > li.active > a,
html .nav-tabs-vertical > li.active > a:focus,
html .nav-tabs-vertical > li.active > a:hover,
html .icon_box_wrap i:before,
html .steps i:before, html .steps i:after,
html .service-icon i{
	color: <?php echo esc_attr($page_color)?>;
}
html ::selection {
	background: <?php echo esc_attr($page_color)?>; /* Safari */
	color: #fff;
}
html ::-moz-selection {
	background: <?php echo esc_attr($page_color)?>; /* Firefox */
	color: #fff;
}

html [data-off-canvas] li a:hover {
    color:  <?php echo esc_attr($page_color)?>;
}
html body nav li > a:hover {
	color:  <?php echo esc_attr($page_color)?> !important;
}

.wrap-fixed-menu .menu-item .subtitle{
 color:  <?php echo esc_attr($page_color)?>;
}

html .vc_custom_1476544911048 a {
	background-color: <?php echo esc_attr($page_color)?> !important;
}
html .vc_custom_1476548097131 {
    background-color: <?php echo esc_attr($page_color)?> !important;
}

<?php endif?>


<?php if($safeguard_customize['safeguard_custom_css']):?>
<?php echo wp_kses_post($safeguard_customize['safeguard_custom_css']) ?>
<?php endif?>