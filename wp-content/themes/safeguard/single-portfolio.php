<?php /*** Portfolio Single Posts template. */

$safeguard_portfolio_layout = get_post_meta( get_the_ID(), 'pix_portfolio_layout', true ) == '' ? 'default' : get_post_meta( get_the_ID(), 'pix_portfolio_layout', true );
$safeguard_all_works_page = safeguard_get_option('portfolio_settings_link_to_all', '0');
$full_portfolio = '';
if ( $safeguard_all_works_page != 0 ) {
	$full_portfolio = get_the_permalink($safeguard_all_works_page);
}

?>
<?php get_header();?>

<section class="portfolio-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12  col-sm-12">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					?>
						<?php
						$safeguard_portfolio_gallery = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_images', 'type=image&size=full') : '';
						$safeguard_portfolio_desc = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_desc') : '';
						$safeguard_portfolio_create = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_create') : '';
						$safeguard_portfolio_complete = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_complete') : '';
						$safeguard_portfolio_skills = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_skills') : '';
						$safeguard_portfolio_client = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_client') : '';
						$safeguard_portfolio_client_link = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_client_link') : '';
						$safeguard_portfolio_button_link = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_button_link') : '';

						$safeguard_portfolio_post_type = ( class_exists( 'RW_Meta_Box' ) && rwmb_meta('post_types_select') != '' ) ? rwmb_meta('post_types_select') : 'image';

						$safeguard_portfolio_full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
						$safeguard_portfolio_link = $safeguard_portfolio_full_image[0];

						include_once( get_template_directory() . '/templates/portfolio/'.$safeguard_portfolio_layout.'.php');
						?>


					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
if ( safeguard_get_option( 'portfolio_settings_related_show', 'on' ) == 'on' ) :
	$safeguard_portfolio_related_title = safeguard_get_option( 'portfolio_settings_related_title', esc_html__('Related projects', 'safeguard' ) );
	$safeguard_portfolio_related_desc = safeguard_get_option( 'portfolio_settings_related_desc' );
	?>
	<!-- ========================== -->
	<!-- PORTFOLIO - RELATE WORKS SECTION -->
	<!-- ========================== -->
	<?php

	$portfolio_taxterms = wp_get_object_terms( $post->ID, 'portfolio_category', array('fields' => 'ids') );
	// arguments
	$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio_category',
				'field' => 'id',
				'terms' => $portfolio_taxterms
			)
		),
		'post__not_in' => array ($post->ID),
	);

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :

	?>
	<section class="portfolio-related-projects-section" id="portfolio_related_posts">
	
            
            <h3 class="b-upper-title text-center slabtextdone"><span class="slabtext slabtext-linesize-1 slabtext-linelength-13"><?php echo wp_kses_post($safeguard_portfolio_related_title); ?></span></h3>
            
            
            
            
				<div class="container">

				<div class="row">
					<div class="list-works clearfix">
						<?php
						while ( $the_query->have_posts() ) :
							$the_query->the_post();

							$safeguard_portfolio_thumbnail = get_the_post_thumbnail(get_the_id(), 'safeguard-portfolio-thumb', array('class' => 'img-responsive'));
							$safeguard_portfolio_thumbnail_full = get_the_post_thumbnail_url(get_the_ID(), 'full');


						?>
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="portfolio-item">
									<div class="portfolio-image">
										<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><?php echo wp_kses_post($safeguard_portfolio_thumbnail); ?></a>
										<div class="gallery-item-hover">
                                            <a href="<?php echo esc_url( $safeguard_portfolio_thumbnail_full ); ?>" class="fancybox">
                                                <span class="item-hover-icon"><i class="fa fa-search"></i></span>
                                            </a>
                                            <a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">
                                                <span class="item-hover-icon"><i class="fa fa-link"></i></span>
                                            </a>
                                        </div>
										<div class="portfolio-item-body">
											<div class="name"><?php echo wp_kses_post( get_the_title() ); ?></div>
											<div class="under-name"><?php echo safeguard_get_post_terms( array( 'taxonomy' => 'portfolio_category', 'items_wrap' => '%s' ) ); ?></div>
										</div>
									</div>
								</div>
							</div>
						<?php
						endwhile;

						?>
					</div>
				</div></div>
			
		</div>
	</section>
	<?php
	endif;
	wp_reset_postdata();
endif;
?>

<div class="work-footer">
	<div class="container">
		<div class="controls">
			<ul>
				<li><?php previous_post_link( '%link', '<span class="fa fa-angle-left"></span>', false, '', 'portfolio_category'); ?></li>
				<?php if ( $full_portfolio != '' ) : ?>
				<li><a href="<?php echo esc_url($full_portfolio); ?>"><span class="fa fa-th"></span></a></li>
				<?php else : ?>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>"><span class="fa fa-th"></span></a></li>
				<?php endif; ?>
				<li><?php next_post_link( '%link', '<span class="fa fa-angle-right"></span>', false, '', 'portfolio_category' ); ?></li>
			</ul>
		</div>
	</div>
</div>

<?php get_footer();?>