<?php
/**
 * The Template for displaying all single posts.
 */
$safeguard_custom =  get_post_custom(get_queried_object()->ID);
$safeguard_layout = isset ($safeguard_custom['pix_page_layout']) ? $safeguard_custom['pix_page_layout'][0] : '2';
$safeguard_sidebar = isset ($safeguard_custom['pix_selected_sidebar'][0]) ? $safeguard_custom['pix_selected_sidebar'][0] : 'sidebar-1';

if ( ! is_active_sidebar($safeguard_sidebar) ) $safeguard_layout = '1';

get_header();

?>
<section class="blog-content-section" id="main">
	<div class="container">
		<div class="row">
		<?php safeguard_show_sidebar( 'left', $safeguard_layout, $safeguard_sidebar ); ?>
			<div class="<?php if ( $safeguard_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($safeguard_layout == 2 ? 'right' : ($safeguard_layout == 3 ? 'left' : 'hide')); ?>">
			<?php
			    // Start the loop.
			    while ( have_posts() ) : the_post();

			        /*
			         * Include the post format-specific template for the content. If you want to
			         * use this in a child theme, then include a file called called content-___.php
			         * (where ___ is the post format) and that will be used instead.
			         */
			        get_template_part( 'templates/post-single/content', get_post_format() );

			        // End the loop.
			    endwhile;
			?>
			</div>
		<?php safeguard_show_sidebar( 'right', $safeguard_layout, $safeguard_sidebar ); ?>
		</div>
	</div>
</section>

<?php get_footer();?>
