<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends MX_Controller {

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

   public function index(  ){
     $this->load->helper('time');
     $details['business'] = $this->config->item('business_name');
     $details['activity'] = $this->fastcache->get( 'activity' );

     if (empty($details['activity'])) {
       $details['activity'] = $this->narnooapi_operator_v2->getActivity();
       //update cache
       $this->fastcache->set('activity',$details['activity'],14400);
     }

     $details['css'] = '<link rel="stylesheet" href="'.cdn_url('assets/css/timeline.css').'" />';

     $this->template->load('user_master_tpl', 'members/user_action',$details);
   }



}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
