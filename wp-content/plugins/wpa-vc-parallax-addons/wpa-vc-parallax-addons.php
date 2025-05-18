<?php
if(!class_exists('WPA_Parallax_Addons')){
	class WPA_Parallax_Addons{
		function __construct(){

			add_action('admin_init',array($this,'wpa_parallax_param_on_row'));

			add_filter('vc_shortcode_output', array($this, 'wpa_execute_parallax_shortcode'), 10, 3);
			
		}/* end constructor */

		function wpa_execute_parallax_shortcode($output, $obj, $attr) {
			if($obj->settings('base')=='vc_row') {
				$output .= $this->wpa_parallax_shotcodes($attr, '');
			}
			return $output;
		}

		function wpa_parallax_shotcodes($atts, $content){
			$wpa_parallax = $wpa_parallax_position = $wpa_parallax_left_settings = $wpa_parallax_image = $wpa_parallax_image_position = $wpa_parallax_ratio = $wpa_parallax_hr_offset = $wpa_parallax_vt_offset = $wpa_parallax_right_settings = $wpa_parallax_image_right = $wpa_parallax_ratio_right = $wpa_parallax_hr_offset_right = $wpa_parallax_vt_offset_right = $wpa_parallax_animation = $wpa_parallax_animation_right = "";

			extract( shortcode_atts( array(
			    'wpa_parallax' => '',
				'wpa_parallax_position' => 'wpa_parallax_both',
				'wpa_parallax_image_position' => '',
				'wpa_parallax_left_settings' => '',
				'wpa_parallax_image' => '',
				'wpa_parallax_ratio' => '1.5',
				'wpa_parallax_custom_ratio' => '',
				'wpa_parallax_hr_offset' => '0',
				'wpa_parallax_vt_offset' => '0',
				'wpa_parallax_animation' => '',
				'wpa_parallax_right_settings' => '',
				'wpa_parallax_image_right' => '',
				'wpa_parallax_ratio_right' => '1.5',
				'wpa_parallax_custom_ratio_right' => '',
				'wpa_parallax_hr_offset_right' => '0',
				'wpa_parallax_vt_offset_right' => '0',
				'wpa_parallax_animation_right' => '',
			), $atts ) );

			$output = "";

			ob_start(); 

			if ($wpa_parallax == 'wpa_parallax_enable'): 

				// parallax left settings
			    $wpa_parallax_info = (array) vc_param_group_parse_atts( $wpa_parallax_left_settings);
			    $wpa_parallax_contents = array();

			    foreach ( $wpa_parallax_info as $data ) :
			        $wpa_parallax_data = $data;

			        $wpa_parallax_data['wpa_parallax_image'] = isset( $data['wpa_parallax_image'] ) ? $data['wpa_parallax_image'] : '';
			        $wpa_parallax_data['wpa_parallax_ratio'] = isset( $data['wpa_parallax_ratio'] ) ? $data['wpa_parallax_ratio'] : '1.5';
			        $wpa_parallax_data['wpa_parallax_hr_offset'] = isset( $data['wpa_parallax_hr_offset'] ) ? $data['wpa_parallax_hr_offset'] : '0';
			        $wpa_parallax_data['wpa_parallax_vt_offset'] = isset( $data['wpa_parallax_vt_offset'] ) ? $data['wpa_parallax_vt_offset'] : '0';
			        $wpa_parallax_data['wpa_parallax_animation'] = isset( $data['wpa_parallax_animation'] ) ? $data['wpa_parallax_animation'] : '0';

			        $wpa_parallax_contents[] = $wpa_parallax_data;
			    endforeach;


				// parallax right settings
			    $wpa_parallax_info_right = (array) vc_param_group_parse_atts( $wpa_parallax_right_settings );
			    $wpa_parallax_contents_right = array();

			    foreach ( $wpa_parallax_info_right as $data ) :
			        $wpa_parallax_data_right = $data;

			        $wpa_parallax_data_right['wpa_parallax_image_right'] = isset( $data['wpa_parallax_image_right'] ) ? $data['wpa_parallax_image_right'] : '';
			        $wpa_parallax_data_right['wpa_parallax_ratio_right'] = isset( $data['wpa_parallax_ratio_right'] ) ? $data['wpa_parallax_ratio_right'] : '1.5';
			        $wpa_parallax_data_right['wpa_parallax_hr_offset_right'] = isset( $data['wpa_parallax_hr_offset_right'] ) ? $data['wpa_parallax_hr_offset_right'] : '0';
			        $wpa_parallax_data_right['wpa_parallax_vt_offset_right'] = isset( $data['wpa_parallax_vt_offset_right'] ) ? $data['wpa_parallax_vt_offset_right'] : '0';
			        $wpa_parallax_data_right['wpa_parallax_animation_right'] = isset( $data['wpa_parallax_animation_right'] ) ? $data['wpa_parallax_animation_right'] : '0';

			        $wpa_parallax_contents_right[] = $wpa_parallax_data_right;
			    endforeach; 


			    // parallax position
				$wpa_image_position = "";

				if ($wpa_parallax_image_position == 'wpa_image_bellow') {
					$wpa_image_position = 'z-index: 0;';
				} elseif ($wpa_parallax_image_position == 'wpa_image_above') {
					$wpa_image_position = 'z-index: 100;';
				}

				?>
				<div class="wpaddons-parallax-wrapper" style="<?php echo esc_attr($wpa_image_position); ?>">
					<?php if ($wpa_parallax_position == 'wpa_parallax_left' || $wpa_parallax_position == 'wpa_parallax_both'): ?>
						<div class="wpaddons-parallax-left">
							<?php foreach ($wpa_parallax_contents as $parallax_left): 
							$image_src = wp_get_attachment_image_src( $parallax_left['wpa_parallax_image'], 'full' ); 

							$offset_x_left = $offset_y_left = "";

							$parallax_ratio_left = $parallax_left['wpa_parallax_ratio'];

							if ($parallax_ratio_left == 'custom-ratio') {
								$parallax_ratio_left = $parallax_left['wpa_parallax_custom_ratio'];
							}

							if ($parallax_left['wpa_parallax_hr_offset']) {
								$offset_x_left = 'left:'.$parallax_left['wpa_parallax_hr_offset'].';';
							}
							if ($parallax_left['wpa_parallax_vt_offset']) {
								$offset_y_left = 'top:'.$parallax_left['wpa_parallax_vt_offset'].';';
							} 

							$wpa_animation_class = "";

							if ($parallax_left['wpa_parallax_animation']) {
								$wpa_animation_class = 'animated infinite '.$parallax_left['wpa_parallax_animation'].'';
							}
							?>
								
							<img class="<?php echo esc_attr($wpa_animation_class); ?>" data-enllax-ratio="<?php echo esc_attr($parallax_ratio_left); ?>" data-enllax-type="foreground" src="<?php echo esc_url($image_src[0]); ?>" style="<?php echo esc_attr($offset_x_left.''.$offset_y_left); ?>"/>
								
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ($wpa_parallax_position == 'wpa_parallax_right' || $wpa_parallax_position == 'wpa_parallax_both'): ?>
						<div class="wpaddons-parallax-right">
							<?php foreach ($wpa_parallax_contents_right as $parallax_right): 
							$image_src = wp_get_attachment_image_src( $parallax_right['wpa_parallax_image_right'], 'full' ); 

							$offset_x_right = $offset_y_right = "";

							$parallax_ratio_right = $parallax_right['wpa_parallax_ratio_right'];

							if ($parallax_ratio_right == 'custom-ratio') {
								$parallax_ratio_right = $parallax_right['wpa_parallax_custom_ratio_right'];
							}

							if ($parallax_right['wpa_parallax_hr_offset_right']) {
								$offset_x_right = 'right:'.$parallax_right['wpa_parallax_hr_offset_right'].';';
							}

							if ($parallax_right['wpa_parallax_vt_offset_right']) {
								$offset_y_right = 'top:'.$parallax_right['wpa_parallax_vt_offset_right'].';';
							} 

							$wpa_animation_class_right = "";

							if ($parallax_right['wpa_parallax_animation_right']) {
								$wpa_animation_class_right = 'animated infinite '.$parallax_right['wpa_parallax_animation_right'].'';
							}

							?>
								
							<img class="<?php echo esc_attr($wpa_animation_class_right); ?>" data-enllax-ratio="<?php echo esc_attr($parallax_ratio_right); ?>" data-enllax-type="foreground" src="<?php echo esc_url($image_src[0]); ?>" style="<?php echo esc_attr($offset_x_right.''.$offset_y_right); ?>"/>
								
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php $output .= ob_get_clean();

			return $output;
			
		} /* end wpa_parallax_shotcodes */

		function wpa_parallax_param_on_row(){
			
			if(function_exists('vc_add_params')) :

				$row_attr = array(
					array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Enable Parallax?', 'wpa-parallax' ),
					    'param_name'  => 'wpa_parallax',
					    'value'       => array(
					        esc_html__('Enable ', 'wpa-parallax') 	=> 'wpa_parallax_enable',
					        esc_html__('Disable', 'wpa-parallax')  	=> 'wpa_parallax_disable'
					    ),
					    'std'			=> 'wpa_parallax_disable',
					    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
					    'description' 	=> esc_html__( 'Enable/disable parallax', 'wpa-parallax' )
					),

					// parallax postiion
					array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Parallax position', 'wpa-parallax' ),
					    'param_name'  => 'wpa_parallax_position',
					    'value'       => array(
					        esc_html__('Left ', 'wpa-parallax') 	=> 'wpa_parallax_left',
					        esc_html__('Right', 'wpa-parallax')  	=> 'wpa_parallax_right',
					        esc_html__('Both', 'wpa-parallax')  	=> 'wpa_parallax_both'
					    ),
					    'std'			=> 'wpa_parallax_both',
					    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
					    'dependency'  => array(
					        'element' => 'wpa_parallax',
					        'value'   => array( 'wpa_parallax_enable' )
					    ),
					    'description' 	=> esc_html__( 'Select parallax position', 'wpa-parallax' )
					),


					// image postion
				    array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Image position', 'wpa-parallax' ),
					    'param_name'  => 'wpa_parallax_image_position',
					    'value'       => array(
					        esc_html__('Default ', 'wpa-parallax') 	=> '',
					        esc_html__('Bellow the content', 'wpa-parallax')  	=> 'wpa_image_bellow',
					        esc_html__('Above the content', 'wpa-parallax')  	=> 'wpa_image_above'
					    ),
					    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
					    'dependency'  => array(
					        'element' => 'wpa_parallax',
					        'value'   => array( 'wpa_parallax_enable' )
					    ),
					    'description' 	=> esc_html__( 'Select parallax position', 'wpa-parallax' )
					),
					

					// left position settings
					array(
					    'type' => 'param_group',
					    'heading' => esc_html__('Parallax Left Settings', 'wpa-parallax'),
					    'param_name' => 'wpa_parallax_left_settings',
					    // 'description' => esc_html__('Parallax left settings', 'wpa-parallax'),
					    'dependency'  => array(
					        'element' => 'wpa_parallax_position',
					        'value'   => array( 'wpa_parallax_left', 'wpa_parallax_both' )
					    ),
					    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
					    'params' => array(
					    	array(
					            'type' => 'attach_image',
					            'heading' => esc_html__( 'Parallax image', 'wpa-parallax'),
					            'param_name' => 'wpa_parallax_image',
					            'description' => esc_html__( 'Select parallax image from media library', 'wpa-parallax' ),
					        ),

						    // parallax speed
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Parallax speed', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_ratio',
							    'value'       	=> array(
							        esc_html__('Ratio 0.1', 'wpa-parallax') 	=> '0.1',
							        esc_html__('Ratio -0.1', 'wpa-parallax') => '-0.1',
							        esc_html__('Ratio 0.3', 'wpa-parallax') 	=> '0.3',
							        esc_html__('Ratio -0.3', 'wpa-parallax') => '-0.3',
							        esc_html__('Ratio 0.5', 'wpa-parallax') 	=> '0.5',
							        esc_html__('Ratio -0.5', 'wpa-parallax') => '-0.5',
							        esc_html__('Ratio 1', 'wpa-parallax') 	=> '1',
							        esc_html__('Ratio -1', 'wpa-parallax') 	=> '-1',
							        esc_html__('Ratio 1.3', 'wpa-parallax') 	=> '1.3',
							        esc_html__('Ratio -1.3', 'wpa-parallax') 	=> '-1.3',
							        esc_html__('Ratio 1.5', 'wpa-parallax') 	=> '1.5',
							        esc_html__('Ratio -1.5', 'wpa-parallax') 	=> '-1.5',
							        esc_html__('Ratio 1.7', 'wpa-parallax') 	=> '1.7',
							        esc_html__('Ratio -1.7', 'wpa-parallax') 	=> '-1.7',
							        esc_html__('Ratio 1.9', 'wpa-parallax') 	=> '1.9',
							        esc_html__('Ratio -1.9', 'wpa-parallax') 	=> '-1.9',
							        esc_html__('Ratio 2', 'wpa-parallax') 	=> '2',
							        esc_html__('Ratio -2', 'wpa-parallax') 	=> '-2',
							        esc_html__('Custom Ratio', 'wpa-parallax') 	=> 'custom-ratio'
							    ),
							    'std'			=> '0.5',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_left', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'wpa-parallax' )
							),

							array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Custom ratio', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_custom_ratio',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_ratio',
							        'value'   	=> array( 'custom-ratio')
							    ),
							    'description' 	=> esc_html__( 'Enter the custom ratio', 'wpa-parallax' )
							),


						    // horizontal offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Horizontal offset', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_hr_offset',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_left', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter horizontal offset, you can use plus or minus value to set left and right placement', 'wpa-parallax' )
							),

						    // vertical offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Vertical offset', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_vt_offset',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_left', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter vertical offset, you can use plus or minus value to set top and bottom placement', 'wpa-parallax' )
							),

							// animation
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Animation', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_animation',
							    'value'       	=> array(
							        esc_html__('None', 'wpa-parallax') 	=> '',
							        esc_html__('fadeIn', 'wpa-parallax') 	=> 'fadeIn',
							        esc_html__('fadeOut', 'wpa-parallax') 	=> 'fadeOut',
							        esc_html__('flash', 'wpa-parallax') 	=> 'flash',
							        esc_html__('----------------------------------', 'wpa-parallax') 	=> '',
							        esc_html__('wpaScale3D', 'wpa-parallax') 	=> 'wpaScale3D',
							        esc_html__('fadeInDown', 'wpa-parallax') 	=> 'fadeInDown',
							        esc_html__('fadeInLeft', 'wpa-parallax') 	=> 'fadeInLeft',
							        esc_html__('fadeInRight', 'wpa-parallax') 	=> 'fadeInRight',
							        esc_html__('fadeInUp', 'wpa-parallax') 	=> 'fadeInUp',
							        esc_html__('pulse', 'wpa-parallax') 	=> 'pulse',
							        esc_html__('bounce', 'wpa-parallax') 	=> 'bounce',
							        esc_html__('rubberBand', 'wpa-parallax') 	=> 'rubberBand',
							        esc_html__('shake', 'wpa-parallax') 	=> 'shake',
							        esc_html__('tada', 'wpa-parallax') 	=> 'tada',
							        esc_html__('wobble', 'wpa-parallax') 	=> 'wobble',
							        esc_html__('jello', 'wpa-parallax') 	=> 'jello',
							        esc_html__('bounceIn', 'wpa-parallax') 	=> 'bounceIn',
							        esc_html__('flip', 'wpa-parallax') 	=> 'flip',
							        esc_html__('flipInX', 'wpa-parallax') 	=> 'flipInX',
							        esc_html__('flipInY', 'wpa-parallax') 	=> 'flipInY',
							        esc_html__('flipOutX', 'wpa-parallax') 	=> 'flipOutX',
							        esc_html__('flipOutY', 'wpa-parallax') 	=> 'flipOutY',
							        esc_html__('lightSpeedIn', 'wpa-parallax') 	=> 'lightSpeedIn',
							        esc_html__('lightSpeedOut', 'wpa-parallax') 	=> 'lightSpeedOut',
							        esc_html__('rotateIn', 'wpa-parallax') 	=> 'rotateIn',
							        esc_html__('rotateOut', 'wpa-parallax') 	=> 'rotateOut',
							        esc_html__('jackInTheBox', 'wpa-parallax') 	=> 'jackInTheBox',
							        esc_html__('rollIn', 'wpa-parallax') 	=> 'rollIn',
							        esc_html__('slideInDown', 'wpa-parallax') 	=> 'slideInDown',
							        esc_html__('slideInLeft', 'wpa-parallax') 	=> 'slideInLeft',
							        esc_html__('slideInUp', 'wpa-parallax') 	=> 'slideInUp',
							        esc_html__('slideOutDown', 'wpa-parallax') 	=> 'slideOutDown',
							        esc_html__('slideOutLeft', 'wpa-parallax') 	=> 'slideOutLeft',
							        esc_html__('slideOutRight', 'wpa-parallax') 	=> 'slideOutRight',
							        esc_html__('slideOutUp', 'wpa-parallax') 	=> 'slideOutUp'
							    ),
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_left', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'wpa-parallax' )
							),
					    ),
					),

					// right position settings
					array(
					    'type' => 'param_group',
					    'heading' => esc_html__('Parallax Right Settings', 'wpa-parallax'),
					    'param_name' => 'wpa_parallax_right_settings',
					    // 'description' => esc_html__('Parallax right settings', 'wpa-parallax'),
					    'dependency'  => array(
					        'element' => 'wpa_parallax_position',
					        'value'   => array( 'wpa_parallax_right', 'wpa_parallax_both' )
					    ),
					    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
					    'params' => array(
					    	array(
					            'type' => 'attach_image',
					            'heading' => esc_html__( 'Parallax image', 'wpa-parallax'),
					            'param_name' => 'wpa_parallax_image_right',
					            'description' => esc_html__( 'Select parallax image from media library', 'wpa-parallax' ),
					        ),

						    // parallax speed
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Parallax speed', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_ratio_right',
							    'value'       	=> array(
							        esc_html__('Ratio 0.1', 'wpa-parallax') 	=> '0.1',
							        esc_html__('Ratio -0.1', 'wpa-parallax') => '-0.1',
							        esc_html__('Ratio 0.3', 'wpa-parallax') 	=> '0.3',
							        esc_html__('Ratio -0.3', 'wpa-parallax') => '-0.3',
							        esc_html__('Ratio 0.5', 'wpa-parallax') 	=> '0.5',
							        esc_html__('Ratio -0.5', 'wpa-parallax') => '-0.5',
							        esc_html__('Ratio 1', 'wpa-parallax') 	=> '1',
							        esc_html__('Ratio -1', 'wpa-parallax') 	=> '-1',
							        esc_html__('Ratio 1.3', 'wpa-parallax') 	=> '1.3',
							        esc_html__('Ratio -1.3', 'wpa-parallax') 	=> '-1.3',
							        esc_html__('Ratio 1.5', 'wpa-parallax') 	=> '1.5',
							        esc_html__('Ratio -1.5', 'wpa-parallax') 	=> '-1.5',
							        esc_html__('Ratio 1.7', 'wpa-parallax') 	=> '1.7',
							        esc_html__('Ratio -1.7', 'wpa-parallax') 	=> '-1.7',
							        esc_html__('Ratio 1.9', 'wpa-parallax') 	=> '1.9',
							        esc_html__('Ratio -1.9', 'wpa-parallax') 	=> '-1.9',
							        esc_html__('Ratio 2', 'wpa-parallax') 	=> '2',
							        esc_html__('Ratio -2', 'wpa-parallax') 	=> '-2',
							        esc_html__('Custom Ratio', 'wpa-parallax') 	=> 'custom-ratio'
							    ),
							    'std'			=> '0.5',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_right', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'wpa-parallax' )
							),


							array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Custom ratio', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_custom_ratio_right',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_ratio_right',
							        'value'   	=> array( 'custom-ratio')
							    ),
							    'description' 	=> esc_html__( 'Enter the custom ratio', 'wpa-parallax' )
							),

						    // horizontal offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Horizontal offset', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_hr_offset_right',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_right', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter horizontal offset, you can use plus or minus value to set left and right placement', 'wpa-parallax' )
							),

						    // vertical offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Vertical offset', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_vt_offset_right',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_right', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter vertical offset, you can use plus or minus value to set top and bottom placement', 'wpa-parallax' )
							),

							// animation
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Animation', 'wpa-parallax' ),
							    'param_name'  	=> 'wpa_parallax_animation_right',
							    'value'       	=> array(
							        esc_html__('None', 'wpa-parallax') 	=> '',
							        esc_html__('fadeIn', 'wpa-parallax') 	=> 'fadeIn',
							        esc_html__('fadeOut', 'wpa-parallax') 	=> 'fadeOut',
							        esc_html__('flash', 'wpa-parallax') 	=> 'flash',
							        esc_html__('----------------------------------', 'wpa-parallax') 	=> '',
							        esc_html__('wpaScale3D', 'wpa-parallax') 	=> 'wpaScale3D',
							        esc_html__('fadeInDown', 'wpa-parallax') 	=> 'fadeInDown',
							        esc_html__('fadeInLeft', 'wpa-parallax') 	=> 'fadeInLeft',
							        esc_html__('fadeInRight', 'wpa-parallax') 	=> 'fadeInRight',
							        esc_html__('fadeInUp', 'wpa-parallax') 	=> 'fadeInUp',
							        esc_html__('pulse', 'wpa-parallax') 	=> 'pulse',
							        esc_html__('bounce', 'wpa-parallax') 	=> 'bounce',
							        esc_html__('rubberBand', 'wpa-parallax') 	=> 'rubberBand',
							        esc_html__('shake', 'wpa-parallax') 	=> 'shake',
							        esc_html__('tada', 'wpa-parallax') 	=> 'tada',
							        esc_html__('wobble', 'wpa-parallax') 	=> 'wobble',
							        esc_html__('jello', 'wpa-parallax') 	=> 'jello',
							        esc_html__('bounceIn', 'wpa-parallax') 	=> 'bounceIn',
							        esc_html__('flip', 'wpa-parallax') 	=> 'flip',
							        esc_html__('flipInX', 'wpa-parallax') 	=> 'flipInX',
							        esc_html__('flipInY', 'wpa-parallax') 	=> 'flipInY',
							        esc_html__('flipOutX', 'wpa-parallax') 	=> 'flipOutX',
							        esc_html__('flipOutY', 'wpa-parallax') 	=> 'flipOutY',
							        esc_html__('lightSpeedIn', 'wpa-parallax') 	=> 'lightSpeedIn',
							        esc_html__('lightSpeedOut', 'wpa-parallax') 	=> 'lightSpeedOut',
							        esc_html__('rotateIn', 'wpa-parallax') 	=> 'rotateIn',
							        esc_html__('rotateOut', 'wpa-parallax') 	=> 'rotateOut',
							        esc_html__('jackInTheBox', 'wpa-parallax') 	=> 'jackInTheBox',
							        esc_html__('rollIn', 'wpa-parallax') 	=> 'rollIn',
							        esc_html__('slideInDown', 'wpa-parallax') 	=> 'slideInDown',
							        esc_html__('slideInLeft', 'wpa-parallax') 	=> 'slideInLeft',
							        esc_html__('slideInUp', 'wpa-parallax') 	=> 'slideInUp',
							        esc_html__('slideOutDown', 'wpa-parallax') 	=> 'slideOutDown',
							        esc_html__('slideOutLeft', 'wpa-parallax') 	=> 'slideOutLeft',
							        esc_html__('slideOutRight', 'wpa-parallax') 	=> 'slideOutRight',
							        esc_html__('slideOutUp', 'wpa-parallax') 	=> 'slideOutUp'
							    ),
							    'group'			=> esc_html__( 'Parallax', 'wpa-parallax' ),
							    'dependency'  	=> array(
							        'element' 	=> 'wpa_parallax_position',
							        'value'   	=> array( 'wpa_parallax_left', 'wpa_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'wpa-parallax' )
							),
					    )
					),
				);

				vc_add_params( 'vc_row', $row_attr );

			endif; //vc_add_params

		} //custom_text_on_row

	} //WPA_Parallax_Addons

	new WPA_Parallax_Addons;
}


if ( !function_exists( 'wpa_output_before_vc_row' ) ) {
	function wpa_output_before_vc_row($atts, $content = null) {
		return WPA_Parallax_Addons::wpa_parallax_shotcodes($atts, $content);
	}
}