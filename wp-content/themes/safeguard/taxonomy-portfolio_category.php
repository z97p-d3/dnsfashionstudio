<?php
/*** The template for displaying portfolio categories. ***/

get_header();

$safeguard_layout = safeguard_get_option('portfolio_settings_sidebar_type', '2');
$safeguard_sidebar = safeguard_get_option('portfolio_settings_sidebar_content', 'sidebar-1');

if ( ! is_active_sidebar($safeguard_sidebar) ) $safeguard_layout = '1';

$safeguard_portfolio_perrrow = safeguard_get_option('portfolio_settings_perrow', '2');
if ( $safeguard_portfolio_perrrow == '3' ) {
	$safeguard_add_class_port_col = 'col-md-4 col-sm-4 col-xs-6';
}
elseif ( $safeguard_portfolio_perrrow == '4' ) {
	$safeguard_add_class_port_col = 'col-md-3 col-sm-4 col-xs-6';
}
else {
	$safeguard_add_class_port_col = 'col-md-6 col-sm-6 col-xs-6';
}

$safeguard_portfolio_perrow = safeguard_get_option('portfolio_settings_perrow', '2');
$safeguard_portfolio_css_animation = ( safeguard_get_option('css_animation_settings_portfolio', '') != '' ) ? ' wow '.safeguard_get_option('css_animation_settings_portfolio', '') : '';
$safeguard_portfolio_type = safeguard_get_option('portfolio_settings_type', 'type_without_icons');
$safeguard_portfolio_loadmore = safeguard_get_option('portfolio_settings_loadmore', esc_html__('Load more', 'safeguard' ) );

$safeguard_portfolio_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

?>

<!-- ========================== -->
<!-- BLOG - CONTENT -->
<!-- ========================== -->
<section class="page-section">
	<div class="container">
		<div class="row">

			<?php safeguard_show_sidebar( 'left', $safeguard_layout, $safeguard_sidebar ); ?>

			<div class="<?php if ( $safeguard_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($safeguard_layout == 2 ? 'right' : ($safeguard_layout == 3 ? 'left' : 'hide')); ?>">

				<div id="portfolio-category-section" class="portfolio-list-section portfolio-perrow-<?php echo esc_attr($safeguard_portfolio_perrow); ?>">

				<?php $safeguard_portfolio_category_description = get_term_field( 'description', $safeguard_portfolio_term->term_id, 'portfolio_category' );
				if( !is_wp_error( $safeguard_portfolio_category_description ) && $safeguard_portfolio_category_description != '' ) :
				?>
					<div class="section-heading text-center">
						<div class="section-subtitle"><?php echo wp_kses_post($safeguard_portfolio_category_description);?></div>
						<div class="design-arrow"></div>
					</div>

				<?php
				endif;

					$safeguard_portfolio_categories = get_objects_in_term( $safeguard_portfolio_term->term_id, 'portfolio_category');

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(
								'post_type' => 'portfolio',
								'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
								'post__in' => $safeguard_portfolio_categories,
								'paged' => $paged
							);

					$wp_query = new WP_Query( $args );

					if ( $wp_query->have_posts() ) : ?>

						<div class="row portfolio-masonry-holder list-works clearfix">
						<?php
						while ( $wp_query->have_posts() ) :
							$wp_query->the_post();

							$safeguard_portfolio_post_type = ( class_exists( 'RW_Meta_Box' ) && rwmb_meta('post_types_select') != '' ) ? rwmb_meta('post_types_select') : 'image';

							$cats = wp_get_object_terms(get_the_id(), 'portfolio_category');
							$safeguard_cat_slugs = '';
							if ( ! empty($cats) ) {
								foreach ( $cats as $cat ) {
									$safeguard_cat_slugs .= $cat->slug . " ";
								}
							}
							$safeguard_portfolio_thumbnail = get_the_post_thumbnail(get_the_id(), 'safeguard-portfolio-thumb', array('class' => 'img-responsive'));
							$safeguard_portfolio_thumbnail_full = get_the_post_thumbnail_url(get_the_ID(), 'full');

							// potfolio category list linked
							$safeguard_portfolio_linked_list_cats = safeguard_get_post_terms( array( 'taxonomy' => 'portfolio_category', 'items_wrap' => '%s' ) );

							if ( $safeguard_portfolio_type == 'type_without_icons' || $safeguard_portfolio_type == 'type_without_space' ) : ?>

									<div class="<?php echo esc_attr($safeguard_add_class_port_col); ?> item <?php echo esc_attr($safeguard_portfolio_css_animation); ?> <?php echo esc_attr($safeguard_cat_slugs); ?>" id="post-<?php echo esc_attr(get_the_ID()); ?>">
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
													<div class="under-name"><?php echo wp_kses_post( $safeguard_portfolio_linked_list_cats ); ?></div>
												</div>
											</div>
										</div>
									</div>

							<?php
							else : ?>

									<div class="<?php echo esc_attr($safeguard_add_class_port_col); ?> item <?php echo esc_attr($safeguard_portfolio_css_animation); ?> <?php echo esc_attr($safeguard_cat_slugs); ?>" id="post-<?php echo esc_attr(get_the_ID()); ?>">
										<div class="portfolio-item">
											<div class="portfolio-image">
												<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><?php echo wp_kses_post($safeguard_portfolio_thumbnail); ?></a>
												<div class="portfolio-item-body center-body">
													<ul>
														<?php
														if ( $safeguard_portfolio_post_type == 'image' ) :
															$safeguard_portfolio_gallery = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_images', 'type=image&size=full') : '';
															$safeguard_portfolio_full_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', false);
															$safeguard_portfolio_full_image_link = $safeguard_portfolio_full_image[0];
															?>
															<li><a href="<?php echo esc_url($safeguard_portfolio_full_image_link); ?>"  rel="prettyPhoto[pp_gal_<?php echo esc_attr(get_the_id());?>]"><span class="theme-fonts-Search"></span></a></li>
															<?php
															if ( $safeguard_portfolio_gallery ) :
																foreach ( $safeguard_portfolio_gallery as $key => $slide ) :
																	if ( $key > 0 ) :
																	?>
																		<div class="portfolio-gallery-none">
																			<a href="<?php echo esc_url($slide['url']); ?>" rel="prettyPhoto[pp_gal_<?php echo esc_attr($post->ID); ?>]" ><img src="<?php echo esc_url($slide['url']); ?>" width="<?php echo esc_attr($slide['width']); ?>" height="<?php echo esc_attr($slide['height']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" title="<?php echo esc_attr($slide['title']); ?>"/></a>
																		</div>
																	<?php
																	endif;
																endforeach;
															endif;
														 ?>
														<?php
														endif; ?>
														<?php
														if ( $safeguard_portfolio_post_type == 'video' ) :
															$safeguard_portfolio_video_href = ( class_exists( 'RW_Meta_Box' ) ) ? get_post_meta( get_the_ID(), 'portfolio_video_href', true ) : '';
															if ( $safeguard_portfolio_video_href != '' ) :
																$safeguard_portfolio_video_width = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_video_width') : '';
																$safeguard_portfolio_video_height = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_video_height') : '';
																?>
																<li><a href="<?php echo esc_url($safeguard_portfolio_video_href.'?width='.esc_attr($safeguard_portfolio_video_width).'&amp;height='. esc_attr($safeguard_portfolio_video_height)) ?>" rel="prettyPhoto[pp_video_<?php echo esc_attr(get_the_id());?>]"><span class="theme-fonts-Media"></span></a></li>
															<?php
															endif;
														endif;
														?>
															<li><a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><span class="theme-fonts-Info"></span></a></li>
														<?php



														?>
													</ul>
												</div>
											</div>
											<div class="portfolio-item-footer">
												<div class="name"><?php echo wp_kses_post( get_the_title() ); ?></div>
												<div class="under-name"><?php echo wp_kses_post($safeguard_portfolio_linked_list_cats); ?></div>
											</div>
										</div>
									</div>

							<?php
							endif;

						endwhile; ?>
						</div>

						<?php
						if ( get_next_posts_link( '', $wp_query->max_num_pages ) ) {

							echo '
								<div class="row">
									<div class="col-md-12 text-center">
										<div class="portfolio-pagination">
											<span data-current="'.esc_attr($paged).'" data-max-pages="'.esc_attr($wp_query->max_num_pages).'" class="load-more">' . get_next_posts_link( wp_kses_post($safeguard_portfolio_loadmore), $wp_query->max_num_pages) . '</span>
										</div>
										<div class="portfolio-pagination-loading">
											<a href="javascript: void(0)" class="btn btn-default">'. esc_html__("Loading...", "safeguard") .'</a>
										</div>
									</div>
								</div>
							';
						}
						?>

					<?php
					endif;
				?>
				</div>

			</div>

			<?php safeguard_show_sidebar( 'right', $safeguard_layout, $safeguard_sidebar ); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>