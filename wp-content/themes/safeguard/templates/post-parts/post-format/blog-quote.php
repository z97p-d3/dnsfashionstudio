<?php
	global $post;
	// get meta options/values
	$safeguard_content = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('post_quote_content') : '';
	$safeguard_source = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('post_quote_source') : '';
	$safeguard_format  = get_post_format();
	$safeguard_format = !in_array($safeguard_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_format;
	$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	$post_date = strtotime($post->post_date);

	$categories = wp_get_post_categories($post->ID,array('fields' => 'all'));
	$comments = wp_count_comments($post->ID);
?>


		
			<blockquote>
				<?php echo wp_kses_post($safeguard_content); ?>
				<div class="blog-quote-source"><?php echo wp_kses_post($safeguard_source)?></div>
			</blockquote>
		
