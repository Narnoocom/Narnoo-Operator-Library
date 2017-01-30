<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followers extends MX_Controller {

    public function __construct()
       {
            parent::__construct();
            $this->authenticate->loggedIn( $this->session->userdata('logged_in') );
            $this->authenticate->authen_admin( $this->session->userdata('type') );
            $this->load->library('narnooapi');
            $this->load->library('noopaging');
            $this->load->library('fastcache');

            $this->load->library('narnooapi_operator_v2');
       }

   public function index(  )
   {
     if (!isset($_GET['page'])):
         $page = 1;
     else:
         $page = $_GET['page'];
     endif;

     //check cache first = distributors_1
     $followers = $this->fastcache->get('distributors_'.$page);

      if(empty($followers)):
          $followers = $this->narnooapi_operator_v2->getDistributors();
          //update cache
          $this->fastcache->set('distributors_'.$page,$followers,14400);
      endif;

      $details['info'] = $followers;

      $this->template->load('main_tpl','admin/followers_list_tpl',$details);

   }



}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
