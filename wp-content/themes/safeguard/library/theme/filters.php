<?php
/**
 * The template for registering metabox.
 *
 * @package PixTheme
 * @since 1.0
 */
add_filter( 'rwmb_meta_boxes', 'safeguard_register_meta_boxes' );

function safeguard_register_meta_boxes( $meta_boxes ) {
	
	$meta_boxes[] = array(

		'id' => 'product_options',
		'title' => esc_html__( 'Additional Title', 'safeguard' ),
		'pages' => array( 'services', 'portfolio', 'post', 'page', 'product'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'name'    => esc_html__( 'Text', 'safeguard' ),
				'id'      => "add_title_text",
				'desc'  => "",
				'type'    => 'textarea',
				'std'   => ''
			),

		)
	);
	
	
	$meta_boxes[] = array(

		'id' => 'excerpt_image',
		'title' => esc_html__( 'Excerpt image', 'safeguard' ),
		'pages' => array(  'post'   ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'name'    => esc_html__( 'Image', 'safeguard' ),
				'id'      => "excerpt_image_img",
				'desc'  => "",
				'type'    => 'image_advanced',
				'max_file_uploads'   => 1
			),

		)
	);

	$meta_boxes[] = array(

		'id' => 'portfolio_description',
		'title' => esc_html__( 'Description for Custom Layout', 'safeguard' ),
		'pages' => array('portfolio'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'name'    => esc_html__( 'Text', 'safeguard' ),
				'id'      => 'portfolio_desc',
				'desc'  => '',
				'type'    => 'wysiwyg',
				'std'   => ''
			),

		)
	);
	
	$meta_boxes[] = array(
		'id' => 'portfolio_meta',
		'title' => esc_html__( 'Portfolio Meta', 'safeguard' ),
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name'  => esc_html__( 'Created by', 'safeguard' ),
				'id'    => 'portfolio_create',
				'type'  => 'text',
				'desc' => esc_html__( 'Enter author name', 'safeguard' )
			),
			array(
				'name'  => esc_html__( 'Completed on', 'safeguard' ),
				'id'    => 'portfolio_complete',
				'type'  => 'date',
				'js_options' => array('dateFormat' => 'MM d, yy'),
				'desc' => esc_html__( 'Enter date', 'safeguard' )
			),
			array(
				'name'  => esc_html__( 'Skills', 'safeguard' ),
				'id'    => 'portfolio_skills',
				'type'  => 'text',
				'desc' => esc_html__( 'Enter skills', 'safeguard' )
			),
			array(
				'name'  => esc_html__( 'Client', 'safeguard' ),
				'id'    => 'portfolio_client',
				'type'  => 'text',
				'desc' => esc_html__( 'Enter client name', 'safeguard' )
			),
			array(
				'name'  => esc_html__( 'Client link', 'safeguard' ),
				'id'    => 'portfolio_client_link',
				'type'  => 'text',
				'desc' => esc_html__( 'Enter client link eg (http://wordpress.com/)', 'safeguard' )
			),
			array(
				'name'  => esc_html__( 'Project link', 'safeguard' ),
				'id'    => 'portfolio_button_link',
				'type'  => 'text',
				'desc' => esc_html__( 'Enter project link eg (http://wordpress.com/). Leave empty to hide button View project', 'safeguard' )
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'post_types',
		'title' => esc_html__( 'Portfolio Option', 'safeguard' ),
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name'     => esc_html__( 'Post Types', 'safeguard' ),
				'id'       => "post_types_select",
				'type'     => 'select',
				'desc' => 'Select post types',
				'options'  => array(
					'image' => 'Image',
					'video' => 'Video',
				)
			),
			array(
				'name' => esc_html__( 'Post Type For Image', 'safeguard' ),
				'id'   => 'portfolio_images',
				'type' => 'image_advanced',
				'max_file_uploads' => 25,
				'desc' => esc_html__( 'Upload images for your portfolio post.', 'safeguard' ),
			),
			array(
				'name'  => esc_html__( 'Post Type For Video', 'safeguard' ),
				'id'    => 'portfolio_video_href',
				'type'  => 'text',
				'desc' => 'Enter video link eg (http://youtu.be/DoRMzGR7ZDA)'
			),
			array(
				'name' => esc_html__( '.', 'safeguard' ),
				'id'   => "portfolio_video_width",
				'type' => 'slider',
				'desc' => esc_html__('Range video width', 'safeguard'),
				'suffix' => esc_html__( ' px', 'safeguard' ),
				'js_options' => array(
					'min'   => 100,
					'max'   => 2000,
					'step'  => 10,
				),
			),
			array(
				'name' => esc_html__( '.', 'safeguard' ),
				'id'   => "portfolio_video_height",
				'type' => 'slider',
				'desc' => esc_html__('Range video height', 'safeguard'),
				'suffix' => esc_html__( ' px', 'safeguard' ),
				'js_options' => array(
					'min'   => 100,
					'max'   => 1000,
					'step'  => 5,
				),
			),
		)
	);
	
	$meta_boxes[] = array(
		
		'id' => 'post_format',
		'title' => esc_html__( 'Post Format Options', 'safeguard' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'low',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => esc_html__('Post Standared:', 'safeguard' ),
				'id'   => "post_standared",
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'image,application,audio,video',
			),
			array(
				'name' => esc_html__('Post Gallery:','safeguard'),
				'id'   => "post_gallery",
				'type' => 'image_advanced',
				'max_file_uploads' => 25,
			),
			array(
				'name'  => esc_html__('Quote Source:', 'safeguard'),
				'id'    => "post_quote_source",
				'desc'  => '',
				'type'  => 'text',
				'std'   => '',
			),
			array(
				'name'  => esc_html__('Quote Content:', 'safeguard'),
				'id'    => "post_quote_content",
				'desc'  => '',
				'type'  => 'textarea',
				'std'   => '',
			),
			array(
				'name'  => esc_html__('Video','safeguard'),
				'id'    => "post_video",
				'desc'  => 'Video URL',
				'type'  => 'textarea',
				'std'   => '',
			)
		)
		
	);

	return $meta_boxes;
}


