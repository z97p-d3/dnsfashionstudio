<?php    
/**
 * Shortcode attributes 
 * @var $atts
 * @var $template
 * @var $cat_serv
 * @var $count
 * @var $buttext
 * @var $css_animation
 * @var $sidebar_id
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Services
 */
$sidebar_id = '';
$sticky = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$out = $cnt = '';


$wrapClasses = array(
    ($textposition) ? 'services-text-' . $textposition : '',
    ($texttransform) ? 'services-text-' . $texttransform : '',
    ( $style == 'classic' ) ? 'services-style1' : 'services-style2'
);

$wrapDivClass = implode(' ', $wrapClasses);

$out = '<div class="' . $wrapDivClass . '">';

if( $template == 'isotop' && $cat_serv == '' ):
	$out .= '<p>'.esc_html__('No departments selected. To fix this, please login to your WP Admin area and set the departments you want to show by editing this shortcode and setting one or more departments in the multi checkbox field "Departments".', 'safeguard');
else: 

if (!isset($css_animation))
	$css_animation = '';

$out .= $css_animation != '' && $css_animation != 'none' ? '<div class="services portfolio-list-section animated" data-animation="' . esc_attr($css_animation) . '">' : '<div class="services portfolio-list-section">';
		
$args = array(
			'post_type' => 'services', 
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
if( is_numeric($count) )
	$args['showposts'] = $count;
else
	$args['posts_per_page'] = -1;
	
$wp_query = new WP_Query( $args );

if($template == 'isotop'){
	
	  
	$services = get_objects_in_term( explode( ",", $cat_serv ), 'services_category');	

	$args = array(
				'posts_per_page' => -1,
				'post_type' => 'services', 
				'orderby' => 'menu_order',
				'post__in' => $services,			 
				'order' => 'ASC'
			);
	if( is_numeric($count) )
		$args['showposts'] = $count;
	else
		$args['posts_per_page'] = -1;
		
	$wp_query = new WP_Query( $args );
 
$out .= ' 
	<div class="folio-isotop-filter row">
		<div class="col-md-12">
			<ul class="folio-option-set clearfix" >
				<li><a href="#" data-filter="*" class="selected">'.esc_html__('All services', 'safeguard').'</a></li>';

				 
				$categories = explode(',',$cat_serv);
			//	if (is_array($cat_serv))
				foreach ( $categories as $cat ) {
					$category = get_term_by('slug', trim($cat), 'services_category');
					$group = $category->slug;
					$out .= '
					<li><a href="#" data-filter=".'.$group.'">'.$category->name.'</a></li>
					';
				}

$out .= '
			</ul>
		</div>
	</div>
	<div class="row portfolio-masonry-holder list-works clearfix">
		';	
		
			if ($wp_query->have_posts()):
				while ($wp_query->have_posts()) :
					$wp_query->the_post();		
					$cats = wp_get_object_terms(get_the_ID(), 'services_category');							
					if ($cats){
						$cat_slugs = '';
						foreach( $cats as $cat ){
							$cat_slugs .= $cat->slug . " ";
						}
					} 
					$thumbnail = get_the_post_thumbnail(get_the_ID(), 'safeguard-services-thumb', array('class' => 'full-width'));
					/*
					$t_id = $cat->term_id;
					$cat_meta = get_option("services_category_$t_id");
					*/
				    $show_btn = $buttext == '' ? '' : '<a class="btn btn-style-global  btn-style-0" href="'.esc_url(get_permalink(get_the_ID())).'"><span>'.wp_kses_post($buttext).'</span></a>';
					$out .= '
						<div class="col-xs-12 col-sm-4 item '.esc_attr($cat_slugs).'">
                        <div class="service-item">
                        <div class="service-item-image">
							<a href="'.esc_url(get_permalink(get_the_ID())).'"><div class="img-hover-effect">'.wp_kses_post($thumbnail).'</div></a>
                            </div>
                             <div class="service-item-footer">
							<h4>'.wp_kses_post(get_the_title()).'</h4>
							<p>'.safeguard_limit_words(get_the_excerpt(), 20).'</p>
							'.wp_kses_post($show_btn).'
						</div></div></div>
					';
		
				endwhile;
			endif;
		
$out .= '

	</div>
		';				
			
} elseif($template == 'landing') {


	$services = get_objects_in_term( explode( ",", $cat_serv ), 'services_category');


	$cat_serv_id = array();
	$cat_serv_array = explode(",", $cat_serv);
	foreach ($cat_serv_array as $key => $value) {
		$term = get_term_by('slug',  $value , 'services_category');	
	
		array_push($cat_serv_id, $term->term_id);
	}



	$args = array(
				'posts_per_page' => -1,
				'post_type' => 'services', 
				'orderby' => 'menu_order',
				// 'post__in' => $services,			 
				'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'services_category',
							'field'    => 'slug',
							'terms'    => $cat_serv_array
						)
			));
		
	$wp_query = new WP_Query( $args );







	$out .= ' 
			<div class="container-fluid inner-offset">     
				<div class="row">
			';
	$per_row = !isset($per_row) ? 'col-sm-3' : $per_row;
	if ($wp_query->have_posts()):
			while ($wp_query->have_posts()) :
				$wp_query->the_post();
				$thumbnail = get_the_post_thumbnail(get_the_ID(), 'safeguard-services-thumb', array('class'	=> "safeguard-services-thumb-width"));
                $show_btn = $buttext == '' ? '' : '<a class="btn btn-style-global  btn-style-0" href="'.esc_url(get_permalink(get_the_ID())).'"><span>'.wp_kses_post($buttext).'</span></a>';
	$out .= '
				<div class="col-xs-12  '.esc_attr($per_row).'">
                    <div class="service-item">
					<div class="service-item-image">
                    <a href="'.esc_url(get_permalink(get_the_ID())).'"><div class="img-hover-effect">'.wp_kses_post($thumbnail).'</div></a>
                    </div>
                    <div class="service-item-footer">
					<h4>'. wp_kses_post(get_the_title()) .'</h4>
					<p>'. safeguard_limit_words(get_the_excerpt(), 20) .'</p>
					'.wp_kses_post($show_btn).'
				</div></div></div>
    ';
			endwhile;
		endif;
	
	$out .= '
				</div>               
			</div>
			';
	
} else {
$out .= '
	<div class="row">
		<div class="col-sm-12 col-md-3 '.esc_attr($sticky).'">
			<div class="sidebar-services"> 
					<ul>
						<li class="active"><a href>'.esc_html__('All services', 'safeguard').'</a></li>';
						$args = array( 'taxonomy' => 'services_category', 'hide_empty' => '0', 'title_li'=> '', 'show_count' => '0', 'echo' => '0');
						$categories = wp_list_categories ($args);
$out .= '
						'.$categories.'
					</ul>
			</div>';

ob_start();
dynamic_sidebar( $sidebar_id );
$sidebar_value = ob_get_contents();
ob_end_clean();
$sidebar_value = trim( $sidebar_value );
 
$out .= '<div class="sidebar-widgets"> '. $sidebar_value .'</div>';     



$out .= '		</div>
		<div class="col-sm-12 col-md-9">
			<div class="row services">
		';
									
	if ($wp_query->have_posts()):
		while ($wp_query->have_posts()) :
			$wp_query->the_post();		
			$cats = wp_get_object_terms(get_the_ID(), 'services_category');											   
			 
			$thumbnail = get_the_post_thumbnail(get_the_ID(), 'safeguard-services-thumb', array('class' => 'safeguard-services-thumb-width'));

            $show_btn = $buttext == '' ? '' : '<a class="btn btn-style-global  btn-style-0" href="'.esc_url(get_permalink(get_the_ID())).'"><span>'.wp_kses_post($buttext).'</span></a>';
$out .= '		
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
         <div class="service-item">
					<div class="service-item-image">
			<div class="img-hover-effect"><a href="'.esc_url(get_permalink(get_the_ID())).'">'.wp_kses_post($thumbnail).'</a></div>
            </div>
             <div class="service-item-footer">
			<h4>'.wp_kses_post(get_the_title()).'</h4>
			<p>'.safeguard_limit_words(get_the_excerpt(), 20).'</p>
			'.wp_kses_post($show_btn).'
		</div></div></div>
		';

		endwhile;
	endif;
	 
$out .= '
			</div>
		</div>
	</div>
	';
}		
    $out .= '</div>';
$out .= '</div>';
endif;	
echo $out;