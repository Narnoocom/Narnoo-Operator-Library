<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Videos extends MX_Controller {
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
       }
 
   public function index(  )
   {  
       $details['business'] = $this->config->item('business_name');
       if (!isset($_GET['page'])):
            $page = 1;
        else:
            $page = $_GET['page'];
        endif;
       
      
      //check cache first = images_1
      $details['videos'] = $this->fastcache->get('videos_'.$page);

      if( empty($details['videos']) ):
          $details['videos'] = $this->narnooapi_operator_v2->getVideos( $page );
          //update cache
          $this->fastcache->set('videos_'.$page,$details['videos'],14400);
      endif;

      //Profile manager
      $profile = $this->members_model->getDetails($this->userId);
      
      //isAdmin
      $details['isAdmin'] = $profile->level;
      //access controls
      $details['access'] = $profile->privilege;
      
       if($this->session->userdata('type') == 1){
            $this->template->load('user_master_tpl', 'members/user_video_grid', $details);
        } else {
            $this->template->load('main_tpl', 'videos_grid_tpl', $details);
        }
       
   }


   public function view( $id ){
     
     $this->load->helper('time');
     $details['business'] = $this->config->item('business_name');
      if(empty($id)){
            redirect('videos');
      }

      $details['id']      = $id;
      $details['video']   = $this->fastcache->get('video_' . $id);
      if( empty($details['video']) ){
        $details['video'] = $this->narnooapi_operator_v2->getVideoDetails($id);
        $this->fastcache->set('video_' . $id,$details['video'],600);
      }

      if($this->session->userdata('type') == 1){
          $details['css'] = '<link rel="stylesheet" href="'.cdn_url('css/video/progression-player.css').'" />';

          $details['jsscripts']['loads'] = '<!-- VIDEO -->
          <script src="'.cdn_url('css/build/mediaelement-and-player.min.js').'"></script>';
          $details['jsscripts']['js'] = "<script>
          $('.progression-single').mediaelementplayer({
              audioWidth: 400, // width of audio player
              audioHeight:40, // height of audio player
              startVolume: 0.5, // initial volume when the player starts
              features: ['playpause','current','progress','duration','tracks','volume','fullscreen']
              });
          </script>";

          //print_r($details['video']);
          $this->template->load('user_master_tpl', 'members/user_video',$details);


        }elseif( $this->session->userdata('type') == 2){
          $this->template->load('main_tpl', 'videos_view_tpl',$details);
        }




   }
   
   
   
}
 
/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
