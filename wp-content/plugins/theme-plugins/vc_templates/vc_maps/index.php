<?php 
/**  Theme_vc_index  **/

add_action( 'vc_before_init', 'tmpl_integrateWithVC', 200 );

function tmpl_integrateWithVC() {
    /** Fonts Icon Loader */

    $safeguard_vcFiles = array(
        'vc_common',
        'vc_business',
        'vc_safeguard',
    );
    
    

    tmpl_load_vc_files($safeguard_vcFiles, 'vc_templates/vc_maps/');


	return true;

}


function tmpl_load_vc_files($files,$dir = false){
		if (!is_array($files))
			return false;

		$dir = '';
				
		$tmplDirectory = plugin_dir_path( __FILE__ );	
		

		foreach($files as $_file){
			$filename = $dir . $_file;			
			if (file_exists($tmplDirectory . '/'.$filename.'.php')){			
                require_once($tmplDirectory . '/'.$filename.'.php');				
			}
		}
	}
?>
