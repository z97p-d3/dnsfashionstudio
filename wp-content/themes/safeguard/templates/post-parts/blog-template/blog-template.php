<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$safeguard_format  = get_post_format();
$pix_options = get_option('pix_general_settings');
$custom =  get_post_custom($post->ID);
$layout = isset ($custom['_page_layout']) ? $custom['_page_layout'][0] : '1';
$safeguard_date = $safeguard_cat = $safeguard_dev = '';
$safeguard_format = !in_array($safeguard_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_format;

$get_avatar = get_avatar(get_the_author_meta('ID'), 85);
preg_match("/src=['\"](.*?)['\"]/i", $get_avatar, $matches);
$src = !empty($matches[1]) ? $matches[1] : '';
?>

    <div class="post-description">
        <?php if(safeguard_get_option('blog_settings_author_name', 1) && $src != '') : ?>
			<a class="post-avatar" href="<?php esc_url(the_author_meta( 'user_url' )) ?>">
                <img src="<?php echo esc_url($src) ?>" alt="<?php esc_attr(the_author_meta( 'display_name' )) ?>">
        </a>
		<?php endif ?>
		<?php if(safeguard_get_option('blog_settings_author_name', 1)) : ?>
        <?php endif ?>
        <?php if( 'open' == $post->comment_status && safeguard_get_option('blog_settings_comments', 1) ) : ?>
            
        <?php endif ?>
    </div>
    <div class="post-body">
        <h4><a href="<?php esc_url(the_permalink())?>"><?php wp_kses_post(the_title())?></a></h4>

     

        <div class="rtd">
        <?php
			if ( get_option('rss_use_excerpt') == 0 && !is_search() && safeguard_get_option('blog_settings_type', 'classic') == 'classic' )
				the_content();
			elseif(function_exists('pix_display_format'))
				echo pix_display_format(get_the_excerpt());
            else
                echo get_the_excerpt();
		?>
            
              <div class="page-links">  <?php wp_link_pages();?></div>
            
		</div>

        <div class="post_footer"><a href="<?php echo esc_url(get_the_permalink())?>" class="post_read_more"><?php esc_attr_e( 'Read more', 'safeguard' )?> <i class="fa fa-long-arrow-right"></i></a></div>
    </div>



