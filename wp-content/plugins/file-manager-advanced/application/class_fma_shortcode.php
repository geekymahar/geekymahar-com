<?php
/*
@package: File Manager Advanced
@Class: class_fma_shortcode
*/
define('fma_file',__FILE__);
if(class_exists('class_fma_shortcode')) {
    return;
}
class class_fma_shortcode {
      // shortcode
	   /**
		* File Manager Advanced Operations
	    */
	   var $opr = FMA_OPERATIONS;
	   /**
		* Default user path
	    */
	   var $user_path = '/file-manager-advanced/users/';
	   /**
		* Auto function
	    */
       public function __construct() {
        add_action( 'wp_ajax_fma_load_shortcode_fma_ui', array(&$this, 'fma_load_shortcode_fma_ui'));
        add_action( 'wp_ajax_nopriv_fma_load_shortcode_fma_ui', array(&$this, 'fma_load_shortcode_fma_ui'));
      }
      // connection
      public function fma_load_shortcode_fma_ui() {
		 if ( wp_verify_nonce( $_REQUEST['_fmakey'], 'fmaskey' ) ) {
			$denyUploadArr = array(
				'text/x-php',
				'text/php',
				'application/php',
				'application/x-php',
				'application/x-httpd-php',
				'application/x-httpd-php-source',
			);
			$upload_dir   = wp_upload_dir();
            $current_user = wp_get_current_user();
			$el_opr = $this->opr;
			$operations = isset($_REQUEST['operations']) ? sanitize_text_field($_REQUEST['operations']) : '';
			$pathtype = isset($_REQUEST['path_type']) ? sanitize_text_field($_REQUEST['path_type']) : 'inside';
			$read = isset($_REQUEST['r']) ? sanitize_text_field($_REQUEST['r']) : 'true';
			$write = isset($_REQUEST['w']) ? sanitize_text_field($_REQUEST['w']) : 'false';
			if(!empty($operations)){
				if($operations == 'all') {
				 $el_opr = array();
				} else {
				  $operations =  explode(',',$operations);
				  $el_opr = array_diff($el_opr, $operations); // getting operations
				}
			}
			else {
			   $el_opr = array(); 
			}
    
			 $pa = isset($_REQUEST['path']) ? sanitize_text_field($_REQUEST['path']) : '';
			 $root = site_url();
			 /** directory traversal @220723 */
			 $pa = $this->afm_sanitize_directory($pa);
			 if( !empty($pa) && $pa != '%' && $pa != '$') {
				 $path = ABSPATH.$pa;
				 $root = site_url().'/'.$pa;
			 } else if($pa == '$') {
                if ( isset( $current_user->user_login ) ) {
					      $user_dir_path = $this->user_path; // static path    
						  $user_dirname = $user_dir_path.$current_user->user_login;
                          $path = $upload_dir['basedir'].$user_dirname;
                          $root = $upload_dir['baseurl'].$user_dirname;
                }
            }
             else {
				 $path = ABSPATH;
				 $root = site_url();
			 }
			 if($pathtype == 'outside') {
				 $paths = $pa;
				 $root = !empty($_REQUEST['url']) ? esc_url_raw($_REQUEST['url']) : site_url().'/'.$pa;
			 } else {
				 $paths = $path;
			 }

			$fr = array();
			$hides = !empty($_REQUEST['hide']) ? sanitize_text_field($_REQUEST['hide']) : '';
			$rf = explode(',', $hides);

					if(!empty($rf[0]) && is_array($rf)):
					  foreach($rf as $rrf):
						$fr[] = array( 'pattern' => '!^/'.$rrf.'!','hidden' => true );
					  endforeach;
					else:
						$fr[] = array('hidden' => 'false', 'read' => $read, 'write' => $write);
					endif;
					 $re = array();

			if(!empty($rf[0]) && is_array($rf)):
				$x = 0; 
					while($x <= count($rf) - 1) {
						$re[$x] = $fr[$x];
						$x++;
					}
		    else:
				$re[0] = $fr[0];			
		   endif;

            //hide path
			if(isset($_REQUEST['hide_path']) && ($_REQUEST['hide_path'] == 'yes')) {
				$root = '';
			 }
			// max upload size 241222

			 // restricting max upload size
	        $max_upload_size = isset($_REQUEST['upload_max_size']) ? sanitize_text_field($_REQUEST['upload_max_size'])  : '0';

            // hide unexpected autogenerated folders
                    $re[] = array(
								  'pattern' => '/.tmb/',
								   'read' => false,
								   'write' => false,
								   'hidden' => true,
								   'locked' => false
								);
			        $re[] = array(
								  'pattern' => '/.quarantine/',
								   'read' => false,
								   'write' => false,
								   'hidden' => true,
								   'locked' => false
								);
					$re[] = array(
									'pattern' => '/.gitkeep/',
									'read' => false,
									'write' => false,
									'hidden' => true,
									'locked' => false
					            );
				    $re[] = array(
									'pattern' => '/.htaccess/',
									 'read' => false,
									 'write' => false,
									 'hidden' => true,
									 'locked' => false
								  );			
				require 'library/php/autoload.php';
				// getting allowed upload
				$allowUpload = array();
				$uploadDiff = array();
				if(isset($_REQUEST['upload_allow']) && !empty($_REQUEST['upload_allow'])) {
					$sanitized_upload_allow = sanitize_text_field($_REQUEST['upload_allow']);
					$allowUpload = explode(',', $sanitized_upload_allow);
					$uploadDiff = array_intersect($allowUpload, $denyUploadArr);
				}
				
				/**
				 * Disallow default php mime upload
				 */
				if(count($allowUpload) == 0 || in_array('all', $allowUpload)) {
					$denyUpload = $denyUploadArr;
					$allowUpload = array();
				} else if(count($uploadDiff) != 0) {
					$denyUpload = $denyUploadArr;
					$allowUpload = array_diff($allowUpload, $uploadDiff);	
				} else {
					$denyUpload = array('all');
				}

				if(isset($_REQUEST['enable_trash']) && ($_REQUEST['enable_trash'] == 'yes')) {
					$trash = array(
					'id'            => '1',
					'driver'        => 'Trash',
					'path'          => FMAFILEPATH.'application/library/files/.trash/',
					'tmbURL'        => site_url() . '/application/library/files/.trash/.tmb/',			
					'winHashFix'    => DIRECTORY_SEPARATOR !== '/', // to make hash same to Linux one on windows too
					'uploadDeny'    => $denyUpload,                // Recomend the same settings as the original volume that uses the trash
					'uploadAllow'   => $allowUpload,// Same as above
					'uploadOrder'   => array('deny', 'allow'),      // Same as above
					'accessControl' => 'access',                    // Same as above
					 'attributes' => $re,
				);		
					$trash_f = 't1_Lw';
				} else {
					$trash = array();
					$trash_f = '';
				}
                /**
				 * Connector
				 */
				$opts = array(
				'roots' => array(
					// Items volume
					array(
						'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
						'path'          => $paths,                 // path to files (REQUIRED)
						'URL'           => $root, // URL to files (REQUIRED)
						'trashHash'     => $trash_f,
						'winHashFix'    => DIRECTORY_SEPARATOR !== '/', // to make hash same to Linux one on windows too
						'uploadDeny'    => $denyUpload,                // All Mimetypes not allowed to upload
						'uploadAllow'   => $allowUpload,// Mimetype `image` and `text/plain` allowed to upload
						'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
						'accessControl' => 'access',                     // disable and hide dot starting files (OPTIONAL)
						'acceptedName' => 'validName',
						'uploadMaxSize' => $max_upload_size, 
						'disabled'      => $el_opr,
						'attributes' => $re,
					),
					$trash
				)
       );
// run elFinder
$fmaconnector = new elFinderConnector(new elFinder($opts));
$fmaconnector->run();
 }
 die;
}
/**
	* Sanitize directory path
    */
	public function afm_sanitize_directory($path = '') {
        if(!empty($path)) {
			$path = str_replace('..', '', htmlentities(trim($path)));
		}
		return $path;	
	}
}
new class_fma_shortcode;
?>