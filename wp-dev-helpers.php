<?php 
/*
Plugin Name: wp-dev-helpers
Plugin URI: https://github.com/mjatzgit/wp-dev-helpers
Version: 0.4.4
GitHub Plugin URI: https://github.com/mjatzgit/wp-dev-helpers
GitHub Branch: master
Author: Martin Jespersen
Description: What does your plugin do and what features does it offer...
*/
?>
<?php
class WPDevHelpers {
         
    public function __construct()
    {
        
    }

    public function wp_dev_is_blog_public(){
        return get_site_option( 'blog_public', $default , false );
    }
}

function write_log ( $log )  {
	if ( is_array( $log ) || is_object( $log ) ) {
	 	error_log( print_r( $log, true ) );
	} else {
	 	error_log( $log );
	}
}

// display PHP vars in console ( doesnt work with ajax calls ) 
function print_js( $var ){ 
	$var = json_encode($var ); 
	echo =  '<script type="text/javascript">'.
		'console.dir( <?php echo $var ?> );</script>';

}

    // display print_r with <pre> tags 
function print_pre( $var ){
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
}
 

?>
