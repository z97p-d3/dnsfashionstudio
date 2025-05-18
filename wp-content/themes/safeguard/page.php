<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 *
 */

$safeguard_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
$safeguard_layout = isset( $safeguard_custom['pix_page_layout'] ) ? $safeguard_custom['pix_page_layout'][0] : '2';
$safeguard_sidebar = isset( $safeguard_custom['pix_selected_sidebar'][0] ) ? $safeguard_custom['pix_selected_sidebar'][0] : 'sidebar-1';

if ( ! is_active_sidebar($safeguard_sidebar) ) $safeguard_layout = '1';

?>

<?php get_header();?>
    <section class="page-content" >
        <div class="container">
            <div class="row">
            
                <?php safeguard_show_sidebar( 'left', $safeguard_layout, $safeguard_sidebar ); ?>

				<div class="<?php if ( $safeguard_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8 left-column sidebar-type-<?php echo esc_attr($safeguard_layout == 2 ? 'right' : ($safeguard_layout == 3 ? 'left' : 'hide')); ?><?php endif; ?> col-sm-12 col-xs-12">

                   <div class="rtd"> <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                        <?php $safeguard_page_com_id = $post; ?>
		                <?php the_content(); ?>
                       
                       <div class="page-links">  <?php wp_link_pages();?></div>
                       
                       
		                <?php
		                if('open' == $safeguard_page_com_id->comment_status) {
			                comments_template();
		                }
		                ?>
                    <?php endwhile; ?>
                       </div>

                </div>
                
                <?php safeguard_show_sidebar( 'right', $safeguard_layout, $safeguard_sidebar ); ?>
                
            </div>
        </div>
    </section>
<?php get_footer(); ?>