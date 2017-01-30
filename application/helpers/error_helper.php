<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function media_error_handler(){

    $ci = & get_instance();
    //look for a flash session variable and then output the error if need be..
    $error = $ci->session->flashdata('error');

    if( !empty($error) ){

      if($error == 'image_error'){

        $html = '<div id="media-error" class="row">
                    <div class="col-lg-12">
                      <div class="alert alert-info text-center">The requested media item is unavailable or has been removed by the owner.</div>
                    </div>
                </div>';

        return $html;
      }elseif($error == 'access_error'){
        $html = '<div id="media-error" class="row">
                    <div class="col-lg-12">
                      <div class="alert alert-info text-center">The page you requested does not exist.</div>
                    </div>
                </div>';

        return $html;
      }elseif($error == 'album_error'){
        $html = '<div id="media-error" class="row">
                    <div class="col-lg-12">
                      <div class="alert alert-info text-center">The requested album item is unavailable or has been removed by the owner.</div>
                    </div>
                </div>';

        return $html;
      }elseif($error == 'description_error'){
        $html = '<div id="media-error" class="row">
                    <div class="col-lg-12">
                      <div class="alert alert-info text-center">The requested description text is unavailable or has been removed by the owner.</div>
                    </div>
                </div>';

        return $html;
      }elseif($error == 'login_error'){
        $html = '<p class="text-center" style="color:Red">Your username and password is incorrect!</p>';

        return $html;
      }

    }

}

?>
