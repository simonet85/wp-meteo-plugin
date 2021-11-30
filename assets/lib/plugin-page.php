<?php

$main_menu_url = 'jsforwp-likes-3-2-completed';

function jsforwp_admin_menu() {
  global $main_menu_url;
	add_menu_page(
    'Affiche la Mété de la cote d\'ivoire',
    'Météo CI',
    'manage_options',
    $main_menu_url . '.php',
    'jsforwp_admin_page',
    'dashicons-cloud',
    76
  );
}
add_action( 'admin_menu', 'jsforwp_admin_menu' );

function jsforwp_admin_page(){
	?>
	
  <div class="container">
		<h1 class="display-1 mark" >
      <?php esc_html_e( 'Météo en Coté d\'Ivoire', 'jsforwp-axios-ajax' ); ?>
    </h1>
    <!-- table start -->
    <table class="table table-striped display" id="table_id">
      <thead>
        <tr>
          <th>userId</th>
          <th>id</th>
          <th>title</th>
          <th>completed</th>
        </tr>
      </thead>
        <tbody >
          <tr></tr>
        </tbody> 
    </table>
    <!-- table ends -->
 
    <!-- Mdal starts -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- <a href="../css/admin-style.css"></a> -->
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Todo Details</h4>
          </div>
          <div class="modal-body" >
            <div class="userId"><p>userId : </p><span></span></div>

            <div class="id"><p>id : </p><span></span></div>
            <div class="title"><p>title : </p><span></span></div>
            <div class="completed"><p>completed : </p><span></span></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal ends -->

 
	<?php
}

//Load admin style
function meteo_admin_enqueue_styles(){

  wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', [], '', 'all');

  wp_enqueue_style( 'datatable-css', 'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"', [], '', 'all');

  wp_enqueue_style('roboto-slab-font-css','https://fonts.googleapis.com/css?family=Roboto+Slab',[],'','all');
  
  wp_enqueue_style('main-css', plugins_url('../css/admin-style.css',__FILE__),[], '','all');

 
    // wp_enqueue_style( 'jsforwp-backend-css', plugins_url( '/assets/css/backend-main.css', __FILE__ ), [], time(), 'all' );
  
 

}
add_action('admin_enqueue_scripts', 'meteo_admin_enqueue_styles');


function jsforwp_backend_scripts( $hook ) {

  // global $main_menu_url;
  // if( $hook != 'toplevel_page_' . $main_menu_url ) {
  //   return;
  // }

  // $nonce = wp_create_nonce( 'jsforwp_likes_reset_nonce' );

  wp_enqueue_script('pagination-js',plugins_url('../js/pagination.js', __FILE__),[],'',true);
  
  wp_enqueue_script('pagination-min-js',plugins_url('../js/pagination.js', __FILE__),[],'',true);
  
  wp_enqueue_script('popper-js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', [], '', true);
  
  wp_enqueue_script('bootstrap-js','https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', [], '', true);
  
  wp_enqueue_script('dataTables-js','https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js', [], '', true);

  wp_enqueue_script('bootstrap4','https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js', [], '', true);
  
  wp_enqueue_script('axios-js', 'https://unpkg.com/axios/dist/axios.min.js', [], '', true);
  
  wp_enqueue_script('jsforwp-backend-js', plugins_url( '../js/backend-main.js', __FILE__ ), ['dataTables-js','popper-js','bootstrap-js','jquery', 'axios-js'], time(), true );
  
  // wp_localize_script(
  //   'jsforwp-backend-js',
  //   'jsforwp_globals',
  //   [
  //     'ajax_url'    => admin_url( 'admin-ajax.php' ),
  //     'total_likes' => get_option( 'jsforwp_likes' ),
  //     'nonce'       => $nonce
  //   ]
  // );
}
add_action( 'admin_enqueue_scripts', 'jsforwp_backend_scripts' );

// function jsforwp_reset_likes( ) {

//   check_ajax_referer( 'jsforwp_likes_reset_nonce' );

//   update_option( 'jsforwp_likes', 0 );

//   $response['total_likes'] = 0;
//   $response['type'] = 'success';

//   $response = json_encode($response);
//   echo $response;

//   die();

// }
// add_action( 'wp_ajax_jsforwp_reset_likes', 'jsforwp_reset_likes' );
