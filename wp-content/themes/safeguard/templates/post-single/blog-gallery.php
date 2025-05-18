<?php
/**
 * The template includes blog post format gallery.
 *
 * @package Pix-Theme
 * @since 1.0
 */
	global $post;
	// get the gallery images
	$size = (is_front_page()) && !is_home() ? 'portfolio-3col' : 'blog-post';
	$gallery = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('post_gallery', 'type=image&size='.$size.'') :'';
 
	$argsThumb = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		//'exclude' => get_post_thumbnail_id()
	);
	$attachments = get_posts($argsThumb);
	$safeguard_format  = get_post_format();
	$safeguard_format = !in_array($safeguard_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_format;

?>



	<?php
	if ($gallery || $attachment){
	?>

	<ul class=" carousel-post">
				<?php
				if($gallery){
					foreach ($gallery as $slide) {
						echo '<li><img src="' . esc_url($slide['url']) . '" width="' . esc_attr($slide['width']) . '" height="' . esc_attr($slide['height']) . '" alt="' .esc_attr($slide['alt']).'" title="' .esc_attr($slide['title']). '" /></li>';
					}
				}elseif ($attachments) {
					foreach ($attachments as $attachment) {
						echo '<li><img src="'.esc_url(wp_get_attachment_url($attachment->ID, 'full', false, false)).'" alt="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)).'" title="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_title', true)).'" /></li>';
					}
				}

				?>
	</ul>
	<?php } else { ?>
		<?php if ( has_post_thumbnail() ):?>
			  <?php the_post_thumbnail(); ?>
		<?php endif; ?>
	<?php } ?>

