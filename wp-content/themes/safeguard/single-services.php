 <?php /* Template Name: Single Service */ 

$safeguard_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
$safeguard_layout = isset ($safeguard_custom['pix_page_layout']) ? $safeguard_custom['pix_page_layout'][0] : '2';
$safeguard_sidebar = isset ($safeguard_custom['pix_selected_sidebar'][0]) ? $safeguard_custom['pix_selected_sidebar'][0] : 'services-sidebar-1';

if ( ! is_active_sidebar($safeguard_sidebar) ) $safeguard_layout = '1';

?>
<?php get_header();?>

<section class="page-content">
    <div class="container">
        <div class="row">
      
		<?php safeguard_show_sidebar( 'left', $safeguard_layout, $safeguard_sidebar ); ?>
        
        <div class="<?php if ( $safeguard_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($safeguard_layout == 2 ? 'right' : ($safeguard_layout == 3 ? 'left' : 'hide')); ?> rtd">

        	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
					
				$safeguard_thumbnail = get_the_post_thumbnail($post->ID);
			
			?>

		        <?php the_content(); ?>
                
            <?php endwhile; ?>

		</div>

		<?php safeguard_show_sidebar( 'right', $safeguard_layout, $safeguard_sidebar ); ?>

		</div>
	</div>
</section>
<?php get_footer();?>
