<?php 
/*
Plugin Name: wp-dev-helpers
Plugin URI: 
Version: 0.4
GitHub Plugin URI: https://github.com/mjatzgit/wp-dev-helpers
Author: Martin Jespersen
Description: What does your plugin do and what features does it offer...
*/
?>
<?php
class WPDevHelpers {
    // url to Dribbble api
    protected $apiUrl = 'http://api.dribbble.com/';
    protected $wp_helpers_git_url = 'https://github.com/mjatzgit/wp-helpers/blob/master/wp-helpers.php';
 
    // Dribbble username or user id
    protected $user;
     
    public function __construct($user)
    {
        $this->user = $user;
    }
     
    public function getPlayerShots($perPage = 15)
    {
        $user = $this->user;
         
        $json = wp_remote_get($this->apiUrl . 'players/' . $user . '/shots?per_page=' . $perPage);
         
        $array = json_decode($json['body']);
         
        $shots = $array->shots;
         
        return $shots;
    }


    /* -- Debugging functions ----------------------*/


    // Write to the Wordpress debug.log
       public function write_log ( $log )  {
          if ( is_array( $log ) || is_object( $log ) ) {
             error_log( print_r( $log, true ) );
          } else {
             error_log( $log );
          }
       }

    // display PHP vars in console ( doesnt work with ajax calls ) 
    public function print_js( $var ){ 
      $var = json_encode($var ); ?>
      <script type="text/javascript">
        console.dir( <?php echo $var ?> ); 
      </script>
      <?php 
    }

    // display print_r with <pre> tags 
    public function print_pre( $var ){
      echo '<pre>';
      print_r( $var );
      echo '</pre>';
    }
}


?>