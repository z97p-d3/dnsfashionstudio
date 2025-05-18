<?php
/**
 * The main template file
 */

$safeguard_postpage_id = get_option( 'page_for_posts' );
$safeguard_frontpage_id = get_option( 'page_on_front' );
$safeguard_page_id = isset($wp_query) ? $wp_query->get_queried_object_id() : '';

if ( $safeguard_page_id == $safeguard_postpage_id && $safeguard_postpage_id != $safeguard_frontpage_id ) :
	$safeguard_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
	$safeguard_layout = isset( $safeguard_custom['pix_page_layout'] ) ? $safeguard_custom['pix_page_layout'][0] : '2';
	$safeguard_sidebar = isset( $safeguard_custom['pix_selected_sidebar'][0] ) ? $safeguard_custom['pix_selected_sidebar'][0] : 'sidebar-1';
else :
	$safeguard_layout = safeguard_get_option('blog_settings_sidebar_type', '2');
	$safeguard_sidebar = safeguard_get_option('blog_settings_sidebar_content', 'sidebar-1');
endif;

if ( ! is_active_sidebar($safeguard_sidebar) ) $safeguard_layout = '1';
?>
<?php get_header();?>

<section class="blog-content-section">
	<div class="container">
		<div class="row">
			<?php safeguard_show_sidebar( 'left', $safeguard_layout, $safeguard_sidebar ); ?>

			<div class="<?php if ( $safeguard_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($safeguard_layout == 2 ? 'right' : ($safeguard_layout == 3 ? 'left' : 'hide')); ?>">
			<?php
				$wp_query = new WP_Query();
	            $pp = get_option('posts_per_page');
	            $wp_query->query( 'posts_per_page='.$pp.'&paged='.$paged );
	            get_template_part( 'loop', 'index' );
			?>
			<?php 
				the_posts_pagination( array(
			        'prev_text'          => esc_html__( '&lt;', 'safeguard' ),
			        'next_text'          => esc_html__( '&gt;', 'safeguard' ),
			        'screen_reader_text' => esc_html__( '&nbsp;', 'safeguard'),
			        'type' => 'list'
			    ) );
			?>
			</div>
			<!-- end col -->

			<?php safeguard_show_sidebar( 'right', $safeguard_layout, $safeguard_sidebar ); ?>
		</div>
		<!-- end row -->
	</div>
</section>
<?php get_footer(); ?>
