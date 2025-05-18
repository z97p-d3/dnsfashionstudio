<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $image
 * @var $url
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Imagebox
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$href = vc_build_link( $url );
$url = isset($href['url']) ? $href['url'] : '';
$blank = empty($href['target']) ? '_self' : $href['target'];

$img_id = preg_replace( '/[^\d]/', '', $image );
$img_link = wp_get_attachment_image_src( $img_id, 'large' );
$img_link = $img_link[0];
$image_meta = safeguard_wp_get_attachment($img_id);
$image_alt = $image_meta['alt'] == '' ? $image_meta['title'] : $image_meta['alt'];

			
$out = '
    <div class="image-box-item '.esc_attr($style).' '.esc_attr($class_name).' ">
    
    

    	<div class="ibi-image-wrapper" > <img src="'.esc_url($img_link).'">';
    	if ($url) {
    		$out .= '<a class="image-box-wrap" target="'.esc_attr($blank).'" href="'.esc_url($url).'"></a> ';
    	}					
$out .= '</div>';
			if ($url) {
					$out .= '<span class="ibi-title"><a target="'.esc_attr($blank).'" href="'.esc_url($url).'"> '.esc_attr($title).' </a></span>';
			} else {
					$out .= '<span class="ibi-title"> '.esc_attr($title).' </span>';
			}	
if ($content) {
	$out .= '		<div class="ibi-text">'.do_shortcode($content).'</div> ';
}

$out .= '		</div>
	';

echo $out;