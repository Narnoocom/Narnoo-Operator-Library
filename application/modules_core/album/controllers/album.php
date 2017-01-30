<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends MX_Controller {

    private $userId;

    public function __construct()
       {
            parent::__construct();

            $this->authenticate->loggedIn($this->session->userdata('logged_in'));

            $this->load->library('narnooapi');
            $this->load->library('noopaging');
            $this->load->library('narnooapi_operator_v2');

            $this->load->library('fastcache');
            $this->load->model('members_model');
            $this->userId = $this->session->userdata('userId');
            $this->load->helper('error');
       }
  /*
  *
  * date_changed: 30-01-17
  * change_log: Added albums page.
  *
  */
   public function index($page=1){

     $details['business'] = $this->config->item('business_name');
     //check cache first = album_1
     $albums = $this->fastcache->get('albums_'.$page);

     if( empty($albums) ){
         $albums = $this->narnooapi_operator_v2->getAlbums(TRUE);
         //update cache
         $this->fastcache->set('albums_'.$page,$albums,14400);
     }

     if( empty($albums->success) ){
         $html = '<div class="row">
           <div class="alert alert-info">We do not have any albums available at this time!</div>
         </div>';
     }else{
       $html = '<section>
               <div class="container">
                 <header class="section-header">
                   <span>Albums</span>
                   <h2>Our Albums</h2>
                 </header>

                 <div class="row">';
       $html .= '<!-- Shot -->';
       $c = 0;
       $num = 30;
       $num = $num - 1;

       foreach ($albums->operator_albums as $row) {

         if( !empty( $row->image ) ){
           if($c <= $num){
             $html .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                 <div class="shot shot-small">
                   <div class="shot-preview">
                     <a href="'.site_url('album/images/'.$row->album_id).'"><img src="' . $row->image->xcrop_image_path . '" alt=""></a>
                   </div>
                   <div class="shot-detail">
                     <h6>'.ucfirst( $row->album_name ).'</h6>
                   </div>
                 </div>
               </div>
               <!-- END Shot -->';
           }
           $c++;
         }

       }

       $html .= '</div>

       </div>
       </section>';
     }

     $details['html']  = $html;
     $this->template->load('user_master_tpl', 'members/user_album_grid', $details);

   }

   public function images( $id ){
     $details['business'] = $this->config->item('business_name');
     if(empty($id)){
       $this->session->set_flashdata('error', 'album_error');
       redirect('images');
     }

     //check cache first = album_1
     $details['images'] = $this->fastcache->get('album_'.$id);
     if( empty($details['images']) ){
         $details['images'] = $this->narnooapi_operator_v2->getAlbumImages($id);
         //update cache
         $this->fastcache->set('album_'.$id,$details['images'],14400);
     }


     if($this->session->userdata('type') == 1){
       $details['jsscripts']['loads']  = '<script type="text/javascript" src="'.cdn_url('assets/js/common-media.js').'"></script>';
       $this->template->load('user_master_tpl', 'members/user_album_image_grid', $details);
     }

   }

   public function widget( $num=8,$page=1 ){

      //check cache first = album_1
      $albums = $this->fastcache->get('albums_'.$page);

      if( empty($albums) ){
          $albums = $this->narnooapi_operator_v2->getAlbums(TRUE);
          //update cache
          $this->fastcache->set('albums_'.$page,$albums,14400);
      }

      if( empty($albums->success) ){
          echo 'No Albums Available';
      }else{
        $html = '<section>
                <div class="container">
                  <header class="section-header">
                    <span>Albums</span>
                    <h2>Our Albums</h2>
                    <p>Some of our image albums</p>
                  </header>

                  <div class="row">';
        $html .= '<!-- Shot -->';
        $c = 0;
        $num = $num - 1;

        foreach ($albums->operator_albums as $row) {

          if( !empty( $row->image ) ){
            if($c <= $num){
              $html .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="shot shot-small">
                    <div class="shot-preview">
                      <a href="'.site_url('album/images/'.$row->album_id).'"><img src="' . $row->image->xcrop_image_path . '" alt=""></a>
                    </div>
                    <div class="shot-detail">
                      <h6>'.ucfirst( $row->album_name ).'</h6>
                    </div>
                  </div>
                </div>
                <!-- END Shot -->';
            }
            $c++;
          }

        }

        $html .= '</div>

        </div>
        </section>';

        echo $html;

      }

   }



}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
