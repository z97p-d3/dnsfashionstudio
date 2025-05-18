<?php

	/******* TGM Plugin ********/
add_action('tgmpa_register', 'safeguard_register_required_plugins');

function safeguard_register_required_plugins() {
    
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
        
          
		/*************************************
		--------  Wordpress Plugins   --------
		*************************************/
        
        
        array(
			'name' => esc_html__( 'woocommerce', 'safeguard'), // The plugin name
			'slug' => 'woocommerce', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,

        array(
			'name' => esc_html__( 'Regenerate Thumbnails', 'safeguard'), // The plugin name
			'slug' => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,
        
        array(
			'name' => esc_html__( 'Contact Form 7', 'safeguard'), // The plugin name
			'slug' => 'contact-form-7', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,
        
		array(
            'name' => esc_html__( 'Mailchimp', 'safeguard'), // The plugin name
            'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),
		
		array(
			'name' => esc_html__( 'Meta Box', 'safeguard'), // The plugin name
			'slug' => 'meta-box', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,

		array(
            'name' => esc_html__( 'Wordpress Importer', 'safeguard'), // The plugin name
            'slug' => 'wordpress-importer', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),
        
		array(
			'name' => esc_html__( 'One Click Demo Import', 'safeguard'), // The plugin name
			'slug' => 'one-click-demo-import', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,
      
        array(
            'name' => esc_html__( 'Simple Page Ordering', 'safeguard'), // The plugin name
            'slug' => 'simple-page-ordering', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),

        array(
            'name' => esc_html__( 'Category Order and Taxonomy Terms Order', 'safeguard'), // The plugin name
            'slug' => 'taxonomy-terms-order', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),

        
        array(
            'name' => esc_html__( 'WP Tab Widget', 'safeguard'), // The plugin name
            'slug' => 'wp-tab-widget', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),
        
        array(
            'name' => esc_html__('Classic Editor', 'safeguard'), // The plugin name
            'slug' => 'classic-editor', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
        ),
        
        

        
       
		/*************************************
		--------  Templines Plugins  --------
		*************************************/
        
     	array(
			'name' => esc_html__( 'Revolution Slider', 'safeguard'), // The plugin name
			'slug' => 'revslider', // The plugin slug (typically the folder name)
			'source' => esc_url('http://assets.templines.com/plugins/revslider.zip'), // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''
		) ,

     	array(
			'name' => esc_html__( 'WPBakery Visual Composer', 'safeguard'), // The plugin name
			'slug' => 'js_composer', // The plugin slug (typically the folder name)
			'source' => esc_url('http://assets.templines.com/plugins/js_composer.zip'), // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''
		) ,


		array(
			'name' => esc_html__( 'Kaswara Modern VC Addons', 'safeguard'), // The plugin name
			'slug' => 'kaswara', // The plugin slug (typically the folder name)
            'source' =>  'http://assets.templines.com/plugins/kaswara.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''
		) ,

     	
        array(
            'name' => esc_html__( 'Font Icons Loader', 'safeguard'), // The plugin name
            'slug' => 'font-icons-loader', // The plugin slug (typically the folder name)
            'source' =>  'http://assets.templines.com/plugins/theme/safeguard/kgu2pf8nb98qmhtar5zagg5f3nvt/font-icons-loader.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '' // If set, overrides default API URL and points to an external URL
        ),
        
        array(
            'name' => esc_html__( 'Theme Plugins', 'safeguard'), // The plugin name
            'slug' => 'theme-plugins', // The plugin slug (typically the folder name)
            'source' =>  'http://assets.templines.com/plugins/theme/safeguard/kgu2pf8nb98qmhtar5zagg5f3nvt/theme-plugins.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required 
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '' // If set, overrides default API URL and points to an external URL
        ),
        

        
       
        

       
        
        
         /*************************************
		--------  Theme Plugins   --------
		*************************************/

        
        
        
        
         array(
            'name' => esc_html__( 'Mailchimp extension', 'safeguard'), // The plugin name
            'slug' => 'mailchimp-extension', // The plugin slug (typically the folder name)
            'source' =>  'http://assets.templines.com/plugins/contact-form-7-mailchimp-extension.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required 
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '' // If set, overrides default API URL and points to an external URL
        ),
        
          
       
        
         array(
            'name' => esc_html__( 'Foreground Parallax Effect Visual Composer Addon', 'safeguard'), // The plugin name
            'slug' => 'wpa-vc-parallax-addons', // The plugin slug (typically the folder name)
            'source' =>  'http://assets.templines.com/plugins/wpa-vc-parallax-addons.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required 
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '' // If set, overrides default API URL and points to an external URL
        ),
        
        


        

    );
    
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'safeguard'),
            'menu_title' => esc_html__('Install Plugins', 'safeguard'),
            'installing' => esc_html__('Installing Plugin: %s', 'safeguard'), // %s = plugin name.
            'oops' => esc_html__('Something went wrong with the plugin API.', 'safeguard'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'safeguard'), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'safeguard'), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'safeguard'), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'safeguard'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'safeguard'), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'safeguard'), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'safeguard'), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'safeguard'), // %1$s = plugin name(s).
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'safeguard'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'safeguard'),
            'return' => esc_html__('Return to Required Plugins Installer', 'safeguard'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'safeguard'),
            'complete' => esc_html__('All plugins installed and activated successfully. %s', 'safeguard'), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    
    tgmpa($plugins, $config);
    
}
	
?>